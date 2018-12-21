<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EmplacementsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EmplacementsController Test Case
 */
class EmplacementsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emplacements'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
		$this->session($this->AuthAdmin);
        $this->get('/emplacements');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->session($this->AuthAdmin);
        $this->get('/emplacements/view/1');
        $this->assertResponseContains('1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->session($this->AuthAdmin);
        $this->get('/emplacements/add');
        $this->assertResponseOk();
        $data = [
            'id' => null,
            'nom_emplacement' => 'TestNom',
            'accronyme_emplacement' => 'TEST',
            'actif' => 1
        ];
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/emplacements/add', $data);

		
        $this->assertResponseSuccess();
        $query = $this->emplacements->find('all', ['conditions' => ['emplacements.id' => $data['id']]]);
        $this->assertNotEmpty($query);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->AuthAdmin);
        $newName = 'testname2';
        $emplacements = $this->emplacements->find('all')->first();
        $emplacements->name = $newName;
        $emplacementId = $emplacements->id;
		
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->post('/emplacements/edit/' . $emplacementId, $emplacement->toArray());
		
        $this->assertResponseSuccess();
        $query = $this->emplacements->find('all', ['conditions' => ['emplacements.id' => $emplacementId]])->first();
        $this->assertEquals($newName, $query->name);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->session($this->AuthAdmin);
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/emplacements/delete/1');
        $this->assertResponseSuccess();
        $query = $this->emplacements->find('all', ['conditions' => ['emplacements.id' => 1]])->first();
        $this->assertEmpty($query);
    }
}
