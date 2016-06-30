<?php
namespace Cms\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gallery Entity.
 */
class Gallery extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'type' => true,
        'attachment' => true,
        'url' => true,
    ];
}
