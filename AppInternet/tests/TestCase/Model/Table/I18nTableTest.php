<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\I18nTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\I18nTable Test Case
 */
class I18nTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\I18nTable
     */
    public $I18n;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.i18n'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('I18n') ? [] : ['className' => I18nTable::class];
        $this->I18n = TableRegistry::getTableLocator()->get('I18n', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->I18n);

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
