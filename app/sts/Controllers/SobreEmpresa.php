<?php

namespace Sts\Controllers;

use Core\configView;

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
        $this->data = [];
        $loadView = new configView("sts/Views/sobre-empresa/index", $this->data);
        $loadView->loadView();
    }
}
