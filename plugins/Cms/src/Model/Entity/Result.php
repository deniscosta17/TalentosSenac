<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Result Entity.
 */
class Result extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'position' => true,
        'name' => true,
    ];
}
