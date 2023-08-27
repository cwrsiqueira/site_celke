<?php

namespace Sts\Models\helpers;

use PDO;
use PDOException;

/**
 * Realiza a busca de dados no banco de dados
 */
class StsRead extends StsConn
{
    /** @var string Recebe a query da consulta*/
    private string $select;
    private ?array
        /** @var array|null Recebe os valores dos parâmetros da query */
        $values = [],
        /** @var array|null Recebe o resultado da query */
        $result = [];
    private object
        /** @var object Recebe a query preparada para fazer a busca */
        $query,
        /** @var object Recebe a conexão com o banco de dados */
        $conn;

    /**
     * Recebe o resultado da consulta da query
     *
     * @return array|null
     */
    public function getResult(): ?array
    {
        return $this->result;
    }

    /**
     * Executa a busca de todos os itens de uma tabela do banco de dados
     *
     * @param string $table
     * @param string|null $terms
     * @param string|null $parseString
     * @return void
     */
    public function execRead(string $table, ?string $terms = null, ?string $parseString = null): void
    {
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }
        $this->select = "SELECT * FROM {$table} {$terms}";
        $this->execInstruction();
    }

    /**
     * Executa a busca de itens relacionados de uma tabela do banco de dados
     *
     * @param string $query
     * @param string|null $parseString
     * @return void
     */
    public function fullRead(string $query, ?string $parseString = null): void
    {
        $this->select = $query;
        if (!empty($parseString)) {
            parse_str($parseString, $this->values);
        }
        $this->execInstruction();
    }

    /**
     * Executa a query
     *
     * @return void
     */
    private function execInstruction(): void
    {
        $this->connection();
        try {
            $this->execParams();
            $this->query->execute();
            $this->result = $this->query->fetchAll();
        } catch (PDOException $e) {
            $this->result = null;
        }
    }

    /**
     * Pega a conexão com o banco de dados
     * Prepara a query para a consulta
     *
     * @return void
     */
    private function connection(): void
    {
        $this->conn = $this->db();
        $this->query = $this->conn->prepare($this->select);
        $this->query->setFetchMode(PDO::FETCH_ASSOC);
    }

    /**
     * Atribue os valores aos parâmetros da query com bindValue
     *
     * @return void
     */
    private function execParams(): void
    {
        if ($this->values) {
            foreach ($this->values as $link => $value) {
                if ($link == 'limit' || $link == 'offset' || $link == 'id') {
                    $value = (int)$value;
                }
                $this->query->bindValue(":{$link}", $value, (is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }
}
