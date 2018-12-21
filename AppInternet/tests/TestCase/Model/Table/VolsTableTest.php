<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VolsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VolsTable Test Case
 */
class VolsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VolsTable
     */
    public $Vols;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vols',
        'app.emplacements',
        'app.reservations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vols') ? [] : ['className' => VolsTable::class];
        $this->Vols = TableRegistry::getTableLocator()->get('Vols', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vols);

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
