<?php

namespace Core;

/**
 * Carregar as páginas da View
 * 
 * @author Carlos <cwrsiqueira@msn.com>
 */
class configView
{
    private string $nameView;
    private ?array $data;

    /**
     * Receber o endereço da View e os dados
     *
     * @param string $nameView
     * @param ?array $data
     */
    public function __construct($nameView, $data)
    {
        $this->nameView = $nameView;
        $this->data = $data;
    }

    /**
     * Chamar a view
     *
     * @return void
     */
    public function loadView(): void
    {
        if (file_exists('app/' . $this->nameView . '.php')) {
            require_once 'app/sts/Views/includes/header.php';
            require_once 'app/sts/Views/includes/navbar.php';
            require_once 'app/' . $this->nameView . '.php';
            require_once 'app/sts/Views/includes/footer.php';
        } else {
            die("Erro: Tente novamente ou contacte o suporte: " . EMAILSUPORTE);
        }
    }
}
