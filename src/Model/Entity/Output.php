<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Output Entity
 *
 * @property int $id_output
 * @property \Cake\I18n\FrozenTime $date_output
 * @property string $description
 *
 */
class Output extends Entity
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
        'availability_id'=>true,
        'element_id'=>true,
        'office_id'=>true,
        'date_output' => true,
        'proceedings'=>true,
        'description' => true,
    ];
}
