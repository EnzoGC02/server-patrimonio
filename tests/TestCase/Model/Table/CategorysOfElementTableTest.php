<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategorysOfElementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategorysOfElementTable Test Case
 */
class CategorysOfElementTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategorysOfElementTable
     */
    public $CategorysOfElement;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CategorysOfElement'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategorysOfElement') ? [] : ['className' => CategorysOfElementTable::class];
        $this->CategorysOfElement = TableRegistry::getTableLocator()->get('CategorysOfElement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategorysOfElement);

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
