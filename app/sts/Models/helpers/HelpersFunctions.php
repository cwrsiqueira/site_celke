<?php

namespace Sts\Models\helpers;

/**
 * Funções Helpers para o desenvolvimento
 */
class HelpersFunctions
{
    /**
     * Adiciona as tags pre em volta do var_dump
     * para melhorar a leitura dos dados
     *
     * @param mixed $mixed
     * @return void
     */
    public static function var_dump_pre($mixed = null): void
    {
        echo '<pre>';
        var_dump($mixed);
        echo '</pre>';
    }
}
