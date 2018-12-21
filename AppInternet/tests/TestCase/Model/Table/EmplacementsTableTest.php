<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmplacementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmplacementsTable Test Case
 */
class EmplacementsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmplacementsTable
     */
    public $Emplacements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emplacements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Emplacements') ? [] : ['className' => EmplacementsTable::class];
        $this->Emplacements = TableRegistry::getTableLocator()->get('Emplacements', $config);
    }
	
	public function testFindActif()
    {
        $query = $this->Companies->find('active');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'name' => 'test1',
                'address' => 'test1',
                'city' => 'test1',
                'province' => 'test1',
                'postal_code' => 'test1',
                'administrative_region' => 'test1',
                'active' => 1,
                'phone' => '1234567890',
                'email' => 'test1@test1.com',
                'user_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'test2',
                'address' => 'test2',
                'city' => 'test2',
                'province' => 'test2',
                'postal_code' => 'test2',
                'administrative_region' => 'test2',
                'active' => 1,
                'phone' => '9876543210',
                'email' => 'test2@test2.com',
                'user_id' => 1
            ]
        ];
         $this->assertEquals($expected, $result);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Emplacements);

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
