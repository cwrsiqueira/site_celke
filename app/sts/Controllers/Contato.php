<?php

namespace Sts\Controllers;

use Core\configView;
use Sts\Models\StsContato;

/**
 * Chamar a página Contato
 */
class Contato
{
    private ?array $data = null;
    private ?array $dataForm;

    /**
     * Página Index dos contatos
     * Trata os dados do formulário
     * Chama o model de criação do registro no banco de dados
     * Caso não exista dados abre a página do formulário
     *
     * @return void
     */
    public function index(): void
    {
        $this->data['errors'] = [];
        $this->dataForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($this->dataForm['addContMsg'])) {
            unset($this->dataForm['addContMsg']);

            $translate = ['name' => 'nome', 'email' => 'e-mail', 'subject' => 'assunto', 'content' => 'conteúdo'];

            foreach ($this->dataForm as $key => $value) {
                if ($value == '') {
                    $this->data['errors'][$key] = ['field' => $translate[$key], 'msg' => "<p>O campo " . $translate[$key] . " é obrigatório.</p>"];
                }
            }

            if (count($this->data['errors']) > 0) {
                $this->data['form'] = $this->dataForm;
                $_SESSION['errors'] = $this->data['errors'];
            }

            if (count($this->data['errors']) <= 0) {
                $createContato = new StsContato();
                if (!$createContato->create($this->dataForm)) {
                    $this->data['form'] = $this->dataForm;
                }
            }
        }

        $loadView = new configView("sts/Views/contato/index", $this->data);
        $loadView->loadView();
    }
}
