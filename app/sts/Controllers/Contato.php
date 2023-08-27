<?php

namespace Sts\Controllers;

use Core\configView;

/**
 * Chamar a página Contato
 */
class Contato
{
    private ?array $data;

    /**
     * Index
     *
     * @return void
     */
    public function index(): void
    {
        $this->data = null;
        $loadView = new configView("sts/Views/contato/index", $this->data);
        $loadView->loadView();
    }
}
