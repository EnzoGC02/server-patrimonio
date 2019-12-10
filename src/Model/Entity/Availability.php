<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Availability Entity
 *
 * @property int $id_availability
 * @property string $name_availability
 *
 * @property \App\Model\Entity\Element[] $elements
 */
class Availability extends Entity
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
        'name_availability' => true,
        'elements' => true
    ];
}
