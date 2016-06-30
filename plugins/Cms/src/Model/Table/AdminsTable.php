<?php
namespace Cms\Model\Table;

use Cake\ORM\Table;

/**
 * Table referente a tabela de Administradores do CMS.
 *
 * @author henrique <henrique@bblender.com.br>
 */
class AdminsTable extends Table
{

    /**
     *
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('admins');
        $this->displayField('username');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

}