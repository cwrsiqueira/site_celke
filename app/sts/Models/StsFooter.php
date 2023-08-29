<?php

namespace Sts\Models;

use Sts\Models\helpers\StsRead;

/**
 * Faz a leitura dos dados do banco de dados
 * Abre a view Home e envia os dados pra view
 */
class StsFooter
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
        $viewFooter = new StsRead();
        $viewFooter->fullRead("SELECT footer_desc, footer_text, footer_link FROM sts_footers WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $this->data = $viewFooter->getResult();

        return $this->data;
    }
}
