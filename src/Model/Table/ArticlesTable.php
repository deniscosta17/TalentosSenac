<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ArticlesTable extends Table
{

    public function getLatest($limit = 3) {
        return $this->find()->order(['created' => 'DESC'])->limit($limit)->all();
    }

}