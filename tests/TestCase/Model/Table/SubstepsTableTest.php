<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubStepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubStepsTable Test Case
 */
class SubStepsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubStepsTable
     */
    public $SubSteps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sub_steps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SubSteps') ? [] : ['className' => SubStepsTable::class];
        $this->SubSteps = TableRegistry::get('SubSteps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubSteps);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
