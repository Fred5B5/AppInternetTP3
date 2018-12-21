<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Console\ShellDispatcher;

/**
 * Vols Controller
 *
 * @property \App\Model\Table\VolsTable $Vols
 *
 * @method \App\Model\Entity\Vol[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VolsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['index', 'view']);
	}
	public function isAuthorized($user)
	{
		$action = $this->request->getParam('action');
		// Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
		// authentifiés sur l'application
		if (in_array($action, ['index','view'])) {
			return true;
		}
		
		if ($this->Auth->user('typeuser_id') == '3') {
			return true;
		}
		
		return false;
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->loadModel('Emplacements');
        $vols = $this->paginate($this->Vols);
		$emplacements = $this->paginate($this->Emplacements);		
        $this->set(compact('vols', 'emplacements'));
    }

    /**
     * View method
     *
     * @param string|null $id Vol id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		$this->loadModel('Emplacements');
        $vol = $this->Vols->get($id, [
            'contain' => ['Reservations']
        ]);
        $vols = $this->paginate($this->Vols);
		$emplacements = $this->paginate($this->Emplacements);		
        $this->set(compact('vol', $vol, 'emplacements'));
    }
	
	public function actoionPrintPdf($id)
    {
		$shell = new ShellDispatcher();
		$output = $shell->run(['cake', 'printPdf', 'http://localhost/AppInternet/vols/view/'.$id]);
	 
		if (0 === $output) {
			$this->Flash->success('Successfully printed in PDF.');
		} else {
			$this->Flash->error('Failed to print in PDF.');
		}
	 
		return $this->redirect('/');
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vol = $this->Vols->newEntity();
        if ($this->request->is('post')) {
            $vol = $this->Vols->patchEntity($vol, $this->request->getData());
            if ($this->Vols->save($vol)) {
                $this->Flash->success(__('The vol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vol could not be saved. Please, try again.'));
        }
        $emplacements = $this->Vols->Emplacements->find('list', ['limit' => 200]);
        $this->set(compact('vol', 'emplacements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vol id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vol = $this->Vols->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vol = $this->Vols->patchEntity($vol, $this->request->getData());
            if ($this->Vols->save($vol)) {
                $this->Flash->success(__('The vol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vol could not be saved. Please, try again.'));
        }
        $emplacements = $this->Vols->Emplacements->find('list', ['limit' => 200]);
        $this->set(compact('vol', 'emplacements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vol id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vol = $this->Vols->get($id);
        if ($this->Vols->delete($vol)) {
            $this->Flash->success(__('The vol has been deleted.'));
        } else {
            $this->Flash->error(__('The vol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	/*
	public function getByType() {
        $emplacement_id = $this->request->query('emplacementdepart_id');
        $vols = $this->Vols->find('all', [
            'conditions' => ['Vols.emplacementdepart_id' => $emplacement_id],
        ]);
        $this->set('vols', $vols);
        $this->set('_serialize', ['vols']);
    }
	*/
	
	public function getEmplacements() {
		//$vols = $this->loadModel('Vols');
		
        $this->autoRender = false;
        $emplacements = $this->Emplacements->find('all', [
            'contain' => ['Vols'],
        ]);
		//log($emplacements);
        $emplacementsJ = json_encode($emplacements);
        $this->response->type('json');
        $this->response->body($emplacementsJ);
    }
}
