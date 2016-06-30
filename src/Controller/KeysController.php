<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class KeysController extends AppController
{

    public function index($id = null)
    {
        $tableGalleries = TableRegistry::get("chaves");
        $galleries = $tableGalleries->find()->all();


        if(!empty($id)) {
            $keys = $tableGalleries->find()->where(['id_key' => $id])->first();
        }


        $this->set(compact("chaves", "chaves"));
    }

}