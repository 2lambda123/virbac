<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobsOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobsOrdersTable Test Case
 */
class JobsOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobsOrdersTable
     */
    public $JobsOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jobs_orders',
        'app.standars_lists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobsOrders') ? [] : ['className' => JobsOrdersTable::class];
        $this->JobsOrders = TableRegistry::get('JobsOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobsOrders);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
