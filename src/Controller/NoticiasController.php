<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class NoticiasController extends AppController
{

    public function index($id = null)
    {
        $tableArticles = TableRegistry::get("Articles");
        $articles = $tableArticles->find()->all();

        if(!empty($id)) {
            $article = $tableArticles->find()->where(['id' => $id])->first();
        }

        $this->set(compact("articles", "article"));
    }

}