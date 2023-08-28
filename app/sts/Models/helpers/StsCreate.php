<?php

namespace Sts\Models\helpers;

use PDO;
use PDOException;

/**
 * Classe Helper para criar registro no banco de dados
 */
class StsCreate extends StsConn
{
    private string
        /** @var string $table Recebe o nome da tabela */
        $table,
        /** @var string $query Recebe a query */
        $query;
    private array
        /** @var array $data Recebe os dados */
        $data;
    private ?string
        /** @var string|null $result Recebe o resultado */
        $result;
    private object
        /** @var object $conn Recebe a instância da conexão ao banco de dados */
        $conn,
        /** @var object $insert Recebe a query preparada */
        $insert;

    /**
     * Recebe e atribui o resultado
     *
     * @return string|null
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * Recebe e atribui a tabela e os dados
     *
     * @param string $table
     * @param array $data
     * @return void
     */
    public function execCreate(string $table, array $data): void
    {
        $this->table = $table;
        $this->data = $data;
        $this->execReplaceValues();
    }

    /**
     * Monta as colunas e valores do insert
     * Monta a query
     *
     * @return void
     */
    private function execReplaceValues()
    {
        $columns = implode(', ', array_keys($this->data));
        $values = ':' . implode(', :', array_keys($this->data));
        $this->query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        $this->execInstructions();
    }

    /**
     * Recebe a conexão com o banco de dados
     * Executa a query preparada
     * Retorna o Id do último registro ou NULL
     *
     * @return void
     */
    private function execInstructions(): void
    {
        $this->connection();
        try {
            $this->insert->execute($this->data);
            $this->result = $this->conn->lastInsertId();
        } catch (PDOException $e) {
            $this->result = null;
        }
    }

    /**
     * Cria a conexão com o banco de dados
     * Prepara e atribui a query
     *
     * @return void
     */
    private function connection(): void
    {
        $this->conn = $this->db();
        $this->insert = $this->conn->prepare($this->query);
    }
}
