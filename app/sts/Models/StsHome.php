<?php

namespace Sts\Models;

use Sts\Models\helpers\HelpersFunctions;
use Sts\Models\helpers\StsConn;
use Sts\Models\helpers\StsRead;

/**
 * Faz a leitura dos dados do banco de dados
 * Abre a view Home e envia os dados pra view
 */
class StsHome
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
        $viewHome = new StsRead();
        // $viewHome->execRead("sts_homes_tops", "WHERE id = :id LIMIT :limit", "id=1&limit=1");
        $viewHome->fullRead("SELECT id, title_top, description_top, link_btn_top, txt_btn_top, image FROM sts_homes_tops WHERE id=:id LIMIT :limit", "id=1&limit=1");

        $this->data = $viewHome->getResult();

        return $this->data;
    }
}
