<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AjaxController extends AppController
{

    public function receber_informacoes()
    {
        $this->layout = "ajax";
        $this->autoRender = false;

        $name = $this->request->data['name'];
        $email = trim(strtolower($this->request->data['email']));

        $tableNewsletters = TableRegistry::get("Newsletters");
        $entityNewsletters = $tableNewsletters->newEntity();
        $already_exists = $tableNewsletters->find()->where(['email' => $email ])->count();

        if($already_exists == 0) {
            $entityNewsletters->name = $name;
            $entityNewsletters->email = $email;

            $tableNewsletters->save($entityNewsletters);

            $return = ['status' => 'success'];
        } else {
            $return = ['status' => 'danger'];
        }

        echo json_encode($return);
    }

    public function validate_cpf()
    {
        $this->layout = "ajax";
        $this->autoRender = false;

        $tableParticipants = TableRegistry::get("Participants");

        $participant_by_cpf = $tableParticipants->getCpf($_POST["cpf"]);

        echo json_encode($participant_by_cpf);
    }
}