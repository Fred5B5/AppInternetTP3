<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ImageusersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ImageusersTable Test Case
 */
class ImageusersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ImageusersTable
     */
    public $Imageusers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.imageusers',
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
        $config = TableRegistry::getTableLocator()->exists('Imageusers') ? [] : ['className' => ImageusersTable::class];
        $this->Imageusers = TableRegistry::getTableLocator()->get('Imageusers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Imageusers);

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
