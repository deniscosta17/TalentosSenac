<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

class ContatoController extends AppController
{

    public function index()
    {
        $tableContacts = TableRegistry::get("Contacts");
        $tableSettings = TableRegistry::get("Settings");
        $contactEntity = $tableContacts->newEntity();
        //$horarioFaleConosco = $tableSettings->find()->where(['identifier' => 'horario_fale_conosco'])->first()->value;

        if($this->request->is("post"))
        {
            $contactEntity = $tableContacts->patchEntity($contactEntity, $this->request->data);

            $tableContacts->save($contactEntity);

            $this->Flash->success("O seu contato foi enviado com sucesso.");

           
            //$email = new CakeEmail 

            $email = new Email('default');
            $email->template('fale_conosco')
                ->emailFormat('html')
                ->viewVars(['dados' => $this->request->data])
                ->to('sac@rj.senac.br')
                ->from('denis.costa@bblender.com.br')
                //->from('nao-responda@rj.senac.br')
                ->subject("[Talentos Senac 2016] Fale Conosco")
                ->send();

            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact("horarioFaleConosco", "contactEntity"));
    }
}