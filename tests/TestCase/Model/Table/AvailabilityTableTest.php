<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvailabilityTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvailabilityTable Test Case
 */
class AvailabilityTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AvailabilityTable
     */
    public $Availability;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Availability',
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
        $config = TableRegistry::getTableLocator()->exists('Availability') ? [] : ['className' => AvailabilityTable::class];
        $this->Availability = TableRegistry::getTableLocator()->get('Availability', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Availability);

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
