<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TypesBenefitsOfUseFixture
 */
class TypesBenefitsOfUseFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'types_benefits_of_use';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_type_benefit_of_use' => ['type' => 'integer', 'length' => 250, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name_benefit' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_type_benefit_of_use'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
            'collation' => 'latin1_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id_type_benefit_of_use' => 1,
                'name_benefit' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
