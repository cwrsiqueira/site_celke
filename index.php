<?php

/** Chama o autoload do composer */
require './vendor/autoload.php';

/** Instancia a classe configController */
$url = new Core\ConfigController();

/** Chama o método loadPage para chamar a página */
$url->loadPage();
