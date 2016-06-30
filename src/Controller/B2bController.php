<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class B2bController extends AppController
{

    public function index($id = null)
    {
        $tableB2b = TableRegistry::get("B2b");
        $b2b = $tableB2b->find()->all();

        if(!empty($id)) {
            $b2b = $tableB2b->find()->where(['id' => $id])->first();
        }

        $this->set(compact("b2b", "b2b"));
    }

}