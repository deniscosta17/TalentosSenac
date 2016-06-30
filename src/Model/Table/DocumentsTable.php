<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class DocumentsTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->hasMany('DocumentAttachments');
    }

}