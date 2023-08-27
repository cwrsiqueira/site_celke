<?php

namespace Sts\Controllers;

use Core\configView;
use Sts\Models\StsHome;

/**
 * Chamar página Home
 */
class Home
{
    private ?array $data;

    /**
     * Index
     *
     * @return void
     */
    public function index(): void
    {
        $home = new StsHome();
        $this->data = $home->index();

        $loadView = new configView("sts/Views/home/index", $this->data);
        $loadView->loadView();
    }
}
