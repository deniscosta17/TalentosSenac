<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ImprensaController extends AppController
{

    public function index($id = null)
    {
        $tableClippings = TableRegistry::get("Clippings");
        $clippings = $tableClippings->find()->all();

        if(!empty($id)) {
            $clipping = $tableClippings->find()->where(['id' => $id])->first();
        }

        $this->set(compact("clippings", "clipping"));
    }

}