<?php

namespace Sts\Controllers;

use Core\configView;
use Sts\Models\StsFooter;
use Sts\Models\StsSobreEmpresa;

/**
 * Chamar página Sobre Empresa
 */
class SobreEmpresa
{
    private ?array $data;

    /**
     * Index
     *
     * @return void
     */
    public function index(): void
    {
        $sobreEmpresa = new StsSobreEmpresa();
        $this->data['sobre'] = $sobreEmpresa->index();

        $footer = new StsFooter();
        $this->data['footer'] = $footer->index();

        $loadView = new configView("sts/Views/sobre-empresa/index", $this->data);
        $loadView->loadView();
    }
}
