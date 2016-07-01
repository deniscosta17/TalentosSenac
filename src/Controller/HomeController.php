<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;

class HomeController extends AppController
{
    public function index()
    {
        $tableBanners = TableRegistry::get("Banners");
        $tableArticles = TableRegistry::get("Articles");
        $tableParticipants = TableRegistry::get("Participants");
        $latestArticles = $tableArticles->getLatest(3);

        $participantEntity = $tableParticipants->newEntity();

        $banners = $tableBanners->find()->all();

        $key = substr(md5(uniqid(rand(1,6))), 0, 16);

        $this->set(compact("banners","latestArticles", "participantEntity"));

        if($this->request->is("post"))
        {
            $find = $tableParticipants->find()->where(['cpf' => $this->request->data['cpf'] ])->first();

            if(!empty($find->id_key)) {
                $this->checkParticipant($find);
            } else {
                $find->email = $this->request->data['email'];
                $find->tel = $this->request->data['tel'];
                $find->atualizou_seus_dados = 1;
                $find->id_key = $key;
                $find->key = $key;

                $chaves = $tableParticipants->save($find);

               /* $email = new Email('default');
                $email->template('keys')
                ->emailFormat('html')
                ->viewVars(['dados' => $this->request->data])
                ->to('sac@rj.senac.br')
                ->from($chaves->email)
                ->subject("[Talentos Senac 2016] Fale Conosco")
                ->send(); */

                $this->set('chaves',$chaves);
                return $this->render("chaves");
            }
        }
    }

    public function checkParticipant($data)
    {   
       if($data->id_key){

            $msg =  [
                        'message' => 'Você já esta cadastrado, anote sua chave pois será exigida no dia da prova.',
                        'key' => $data->id_key,
                        'name' => $data->name
                    ];


            $this->set('msg',$msg);        
            return $this->render("showmessage");

       }
    }

}