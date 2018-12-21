<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeuserTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeuserTable Test Case
 */
class TypeuserTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeuserTable
     */
    public $Typeuser;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.typeuser',
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
        $config = TableRegistry::getTableLocator()->exists('Typeuser') ? [] : ['className' => TypeuserTable::class];
        $this->Typeuser = TableRegistry::getTableLocator()->get('Typeuser', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Typeuser);

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
