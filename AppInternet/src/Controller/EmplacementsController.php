<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Emplacements Controller
 *
 * @property \App\Model\Table\EmplacementsTable $Emplacements
 *
 * @method \App\Model\Entity\Emplacement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmplacementsController extends AppController
{

public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['index', 'view', 'findName', 'autocompleteemplacements']);
	}

		public function isAuthorized($user)
	{
		$action = $this->request->getParam('action');
		// Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
		// authentifiés sur l'application
		if (in_array($action, ['index','view'])) {
			return true;
		}

		// Toutes les autres actions nécessitent un slug
		$userid = $user['id'];
		if (!$userid) {
			return false;
		}
		
		if ($this->Auth->user('typeuser_id') == '3') {
			return true;
		}
		
		return false;
	}
	
	public function findName() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Emplacements->find('all', array(
                'conditions' => array('emplacements.nom_emplacement LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['nom_emplacement'], 'value' => $result['nom_emplacement']);
            }
            echo json_encode($resultArr);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $emplacements = $this->paginate($this->Emplacements);

        $this->set(compact('emplacements'));
    }

    /**
     * View method
     *
     * @param string|null $id Emplacement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $emplacement = $this->Emplacements->get($id, [
            'contain' => []
        ]);

        $this->set('emplacement', $emplacement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $emplacement = $this->Emplacements->newEntity();
        if ($this->request->is('post')) {
            $emplacement = $this->Emplacements->patchEntity($emplacement, $this->request->getData());
            if ($this->Emplacements->save($emplacement)) {
                $this->Flash->success(__('The emplacement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emplacement could not be saved. Please, try again.'));
        }
		
        $this->set(compact('emplacement'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Emplacement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $emplacement = $this->Emplacements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $emplacement = $this->Emplacements->patchEntity($emplacement, $this->request->getData());
            if ($this->Emplacements->save($emplacement)) {
                $this->Flash->success(__('The emplacement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The emplacement could not be saved. Please, try again.'));
        }
        $this->set(compact('emplacement'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Emplacement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $emplacement = $this->Emplacements->get($id);
        if ($this->Emplacements->delete($emplacement)) {
            $this->Flash->success(__('The emplacement has been deleted.'));
        } else {
            $this->Flash->error(__('The emplacement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	public function findActif(Query $query, array $options)
    {
        $query->where([
            $this->alias() . '.actif' => 1
        ]);
        return $query;
    }
	
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
