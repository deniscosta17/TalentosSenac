<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class FaqController extends AppController
{

    public function index()
    {
        $tableQuestions = TableRegistry::get("Questions");
        $questions = $tableQuestions->find()->all();

        $this->set(compact("questions"));
    }

}