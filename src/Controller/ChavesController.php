<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ChavesController extends AppController {

 	 public function index($id = null)
    {
        $tableChaves = TableRegistry::get("Chaves");
        $chaves = $tableChaves->find()->all();

       
        var_dump($chaves); exit();


      // $this->set(compact("chaves", "chave"));
    }    

}



