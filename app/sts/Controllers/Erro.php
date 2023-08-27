<?php

namespace Sts\Controllers;

use Core\configView;

/**
 * Chamar página Erro
 */
class Erro
{
    private ?array $data;

    /**
     * Index
     *
     * @return void
     */
    public function index(): void
    {
        $this->data = ["Erro" => "Contacte o suporte: " . EMAILSUPORTE];
        $loadView = new configView("sts/Views/erro/index", $this->data);
        $loadView->loadView();
    }
}
