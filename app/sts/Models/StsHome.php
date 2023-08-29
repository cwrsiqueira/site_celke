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
        $viewHomeTop = new StsRead();
        // $viewHomeTop->execRead("sts_homes_tops", "WHERE id = :id LIMIT :limit", "id=1&limit=1");
        $viewHomeTop->fullRead("SELECT title_top_one, title_top_two, title_top_three, link_btn_top, txt_btn_top, image_top FROM sts_homes_tops WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $this->data['top'] = $viewHomeTop->getResult();

        $viewHomeServ = new StsRead();
        $viewHomeServ->fullRead("SELECT serv_title, serv_icon_one, serv_title_one, serv_desc_one, serv_icon_two, serv_title_two, serv_desc_two, serv_icon_three, serv_title_three, serv_desc_three FROM sts_homes_services WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $this->data['serv'] = $viewHomeServ->getResult();

        $viewHomePrem = new StsRead();
        $viewHomePrem->fullRead("SELECT prem_title, prem_subtitle, prem_desc, prem_img, prem_txt_btn, prem_link_btn FROM sts_homes_premiums WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $this->data['prem'] = $viewHomePrem->getResult();

        return $this->data;
    }
}
