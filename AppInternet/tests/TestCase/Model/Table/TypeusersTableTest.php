<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeusersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeusersTable Test Case
 */
class TypeusersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeusersTable
     */
    public $Typeusers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.typeusers',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Typeusers') ? [] : ['className' => TypeusersTable::class];
        $this->Typeusers = TableRegistry::getTableLocator()->get('Typeusers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Typeusers);

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
