<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OutputTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OutputTable Test Case
 */
class OutputTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OutputTable
     */
    public $Output;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Output',
        'app.Elements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Output') ? [] : ['className' => OutputTable::class];
        $this->Output = TableRegistry::getTableLocator()->get('Output', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Output);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
