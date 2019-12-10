<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OutputFixture
 */
class OutputFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'output';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_output' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'date_output' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'current_timestamp()', 'comment' => '', 'precision' => null],
        'description' => ['type' => 'string', 'length' => 250, 'null' => false, 'default' => null, 'collate' => 'latin1_spanish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_output'], 'length' => []],
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
                'id_output' => 1,
                'date_output' => 1567524816,
                'description' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
