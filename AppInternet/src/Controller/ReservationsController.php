<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 *
 * @method \App\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationsController extends AppController
{

  public function isAuthorized($user)
	{
		$action = $this->request->getParam('action');
		// Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
		// authentifiés sur l'application
		if (in_array($action, ['add', 'index'])) {
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

		// On vérifie que l'article appartient à l'utilisateur connecté
		$id = (int) $this->request->getParam('pass.0');
		$reservation = $this->Reservations->get($id);
		
		return $reservation->user_id === $user['id'];
	}
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Vols']
        ];
        $reservations = $this->paginate($this->Reservations);

        $this->set(compact('reservations'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => ['Users', 'Vols']
        ]);

        $this->set('reservation', $reservation);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
			$reservation->user_id = $this->Auth->user('id');									   
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $users = $this->Reservations->Users->find('list', ['limit' => 200]);
        //$vols = $this->Reservations->Vols->find('list', ['limit' => 200]);
		
		$this->loadModel('Emplacements');
        $emplacements = $this->Emplacements->find('list', ['limit' =>200]);
        $emplacements = $emplacements->toArray();
        reset($emplacements);
        $emplacement_id = key($emplacements);
        $vols = $this->Reservations->Vols->find('list',[
            'conditions' => ['Vols.emplacementdepart_id' => $emplacement_id],
        ]);
		
		//$vols = $this->loadModel('Vols');
		
        $this->set(compact('reservation', 'users', 'vols', 'emplacements'));
		$this->set('_serialize', ['reservation', 'users', 'vols', 'emplacements']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			if ($this->Auth->user('typeuser_id') == '3') {
				$reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
			} else {
				$reservation = $this->Reservations->patchEntity($reservation, $this->request->getData(), ['accessibleFields' => ['user_id' => false]]);
			}
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $users = $this->Reservations->Users->find('list', ['limit' => 200]);
        $vols = $this->Reservations->Vols->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'users', 'vols'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
