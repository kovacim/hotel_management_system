<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GuestsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GuestsTable Test Case
 */
class GuestsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GuestsTable
     */
    public $Guests;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Guests'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Guests') ? [] : ['className' => GuestsTable::class];
        $this->Guests = TableRegistry::getTableLocator()->get('Guests', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Guests);

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
