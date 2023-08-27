<?php

namespace Core;

/**
 * Recebe e manipula a URL e
 * Chama os controllers
 *
 * @author Carlos Wagner <cwrsiqueira@msn.com>
 */
class ConfigController extends Config
{
    private string
        /** @var string $url Recebe a URL */
        $url,
        /** @var string $urlController Recebe o controller a ser chamado */
        $urlController,
        /** @var string $urlParameter Recebe os parâmetros da URL */
        $urlParameter,
        /** @var string $urlSlugController Recebe a URL convertida em slug */
        $urlSlugController;

    private array
        /** @var string $urlArray Recebe a URL convertida em array */
        $urlArray,
        /** @var string $format Recebe os caracteres a substituir na URL */
        $format;

    /**
     * Construtor recebe manipula e valida a URL do .htaccess
     * Atribui o valor da urlController com o controller a ser chamado
     */
    public function __construct()
    {
        $this->config();
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->clearUrl();

            $this->urlArray = explode("/", $this->url);

            if (isset($this->urlArray[0])) {
                $this->urlController = $this->slugController($this->urlArray[0]);
            } else {
                $this->urlController = $this->slugController(CONTROLLERERRO);
            }
        } else {
            $this->urlController = $this->slugController(CONTROLLER);
        }

        // echo "Controller: {$this->urlController}<br>";
    }

    /**
     * Limpa a URL
     *
     * @return void
     */
    private function clearUrl(): void
    {
        //Eliminar as tag
        $this->url = strip_tags($this->url);
        //Eliminar espaços em branco
        $this->url = trim($this->url);
        //Eliminar a barra no final da URL
        $this->url = rtrim($this->url, "/");
        //Eliminar caracteres
        $this->format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        $this->format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr-------------------------------------------------------------------------------------------------';
        $this->url = strtr(utf8_decode($this->url), utf8_decode($this->format['a']), $this->format['b']);
    }

    /**
     * Recebe o controller e convertido no nome da classe
     *
     * @param string $slugController
     * @return string
     */
    private function slugController($slugController): string
    {
        //Converter para minusculo
        $this->urlSlugController = strtolower($slugController);
        //Converter o traco para espaco em braco
        $this->urlSlugController = str_replace("-", " ", $this->urlSlugController);
        //Converter a primeira letra de cada palavra para maiusculo
        $this->urlSlugController = ucwords($this->urlSlugController);
        //Retirar espaco em branco
        $this->urlSlugController = str_replace(" ", "", $this->urlSlugController);
        return $this->urlSlugController;
    }

    /**
     * Chama a página
     *
     * @return void
     */
    public function loadPage(): void
    {
        $classLoad = "\\Sts\\Controllers\\" . $this->urlController;
        $classPage = new $classLoad();
        $classPage->index();
    }
}
