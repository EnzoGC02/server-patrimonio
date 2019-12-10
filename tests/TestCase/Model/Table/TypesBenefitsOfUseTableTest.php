<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesBenefitsOfUseTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesBenefitsOfUseTable Test Case
 */
class TypesBenefitsOfUseTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesBenefitsOfUseTable
     */
    public $TypesBenefitsOfUse;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TypesBenefitsOfUse'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TypesBenefitsOfUse') ? [] : ['className' => TypesBenefitsOfUseTable::class];
        $this->TypesBenefitsOfUse = TableRegistry::getTableLocator()->get('TypesBenefitsOfUse', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesBenefitsOfUse);

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
