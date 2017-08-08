<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StandarsStepsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StandarsStepsTable Test Case
 */
class StandarsStepsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StandarsStepsTable
     */
    public $StandarsSteps;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.standars_steps'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StandarsSteps') ? [] : ['className' => StandarsStepsTable::class];
        $this->StandarsSteps = TableRegistry::get('StandarsSteps', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StandarsSteps);

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
