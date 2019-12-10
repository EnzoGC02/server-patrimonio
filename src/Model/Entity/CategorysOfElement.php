<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CategorysOfElement Entity
 *
 * @property int $id_category
 * @property string $name_category
 * @property int $id_benefit
 */
class CategorysOfElement extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name_category' => true,
        'id_benefit' => true
    ];
}
