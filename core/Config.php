<?php

namespace Core;

/**
 * Classe Abstrata Config
 * Define as constantes de configuração do sistema
 */
abstract class Config
{
    /**
     * Função de configuração das constantes do sistema
     *
     * @return void
     */
    protected function config(): void
    {
        // URL DO PROJETO
        define('URL', 'http://localhost/celke_site/');
        define('URLADM', 'http://localhost/celke_adm/');

        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');

        // CREDENCIAIS DO BANCO DE DADOS
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'celke');
        define('PORT', 3306);

        // CONTATOS
        define('EMAILADM', 'cwrsiqueira@msn.com');
        define('EMAILSUPORTE', 'suporte@sistema.com.br');
    }
}
