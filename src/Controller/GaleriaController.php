<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class GaleriaController extends AppController
{

    public function index($id = null)
    {
        $tableGalleries = TableRegistry::get("Galleries");
        $galleries = $tableGalleries->find()->all();


        if(!empty($id)) {
            $gallery = $tableGalleries->find()->where(['id' => $id])->first();
        }


        $this->set(compact("galleries", "gallery"));
    }

}