<?php

namespace Sts\Models;

use Sts\Models\helpers\StsCreate;
use Sts\Models\helpers\StsRead;

/**
 * Registrar contatos no banco de dados
 */
class StsContato
{
    /** @var array $data Recebe os dados */
    private array $data;

    public function index(): ?array
    {
        $viewContact = new StsRead();
        $viewContact->fullRead("SELECT title_contact, desc_contact, icon_company, title_company, desc_company, icon_address, title_address, desc_address, icon_email, title_email, desc_email, title_form, bg_img_contact FROM sts_contents_contacts WHERE id=:id LIMIT :limit", "id=1&limit=1");
        $this->data = $viewContact->getResult();

        return $this->data;
    }

    /**
     * Recebe os dados
     * Executa o helper que inclui os dados no banco de dados
     * Retorna as mensagens de sucesso ou erro
     *
     * @param array $data
     * @return boolean
     */
    public function create(array $data): bool
    {
        $this->data = $data;

        $createContactMsg = new StsCreate();
        $createContactMsg->execCreate("sts_contacts_msgs", $this->data);

        if ($createContactMsg->getResult()) {
            $_SESSION['msg'] = "<p class='alert-success'>Mensagem enviada com sucesso.</p>";
            return true;
        } else {
            $_SESSION['msg'] = "<p class='alert-danger'>Mensagem não enviada.</p>";
            return false;
        }
    }
}
