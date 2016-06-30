<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Opportunity Entity.
 */
class Opportunity extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'content' => true,
        'excerpt' => true,
        'local' => true,
        'category' => true,
    ];
}
