<?php

namespace Sts\Models;

use Sts\Models\helpers\StsCreate;

/**
 * Registrar contatos no banco de dados
 */
class StsContato
{
    /** @var array $data Recebe os dados */
    private array $data;

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
            $_SESSION['msg'] = "<p class='text-success'>Mensagem enviada com sucesso.</p>";
            return true;
        } else {
            $_SESSION['msg'] = "<p class='text-danger'>Mensagem não enviada.</p>";
            return false;
        }
    }
}
