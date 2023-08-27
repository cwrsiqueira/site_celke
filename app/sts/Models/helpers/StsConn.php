<?php

namespace Sts\Models\helpers;

use PDO;
use PDOException;

/**
 * Conexão com o banco de dados
 *
 * @author Carlos Wagner
 */
abstract class StsConn
{
    private string
        /** @var string $host Recebe o nome do Host do banco de dados */
        $host = HOST,
        /** @var string $host Recebe o nome do Usuário do banco de dados */
        $user = USER,
        /** @var string $host Recebe a senha do banco de dados */
        $pass = PASS,
        /** @var string $host Recebe o nome do banco de dados */
        $dbname = DBNAME;
    /** @var int $host Recebe a porta do banco de dados */
    private int $port = PORT;
    /** @var object $host Recebe um objeto com a conexão ao banco de dados */
    private object $connect;

    /**
     * Faz a conexão com Banco de Dados
     *
     * @return object|null
     */
    public function db(): ?object
    {
        try {
            $this->connect = new PDO("mysql:host={$this->host};port={$this->port};dbname=" . $this->dbname, $this->user, $this->pass);

            return $this->connect;
        } catch (PDOException $e) {
            die("Erro: Tente novamente ou contacte o suporte: " . EMAILSUPORTE);
        }
    }
}
