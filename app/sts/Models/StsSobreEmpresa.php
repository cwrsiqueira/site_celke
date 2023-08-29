<?php

namespace Sts\Models;

use Sts\Models\helpers\HelpersFunctions;
use Sts\Models\helpers\StsRead;

/**
 * Faz a leitura dos dados do banco de dados
 * Abre a view Sobre Empresa e envia os dados pra view
 */
class StsSobreEmpresa
{
    /** @var array|null $data Recebe os dados da consulta */
    private ?array $data;

    /**
     * {@inheritDoc} Executa a função da classe
     *
     * @return array|null
     */
    public function index(): ?array
    {
        $viewSobre = new StsRead();
        // $viewSobre->execRead("sts_abouts_companies", "WHERE id = :id LIMIT :limit", "id=1&limit=1");
        $viewSobre->fullRead("SELECT id, about_title, about_desc, about_img FROM sts_abouts_companies WHERE sts_situation_id=:sts_situation_id LIMIT :limit", "sts_situation_id=1&limit=10");

        $this->data = $viewSobre->getResult();

        return $this->data;
    }
}
