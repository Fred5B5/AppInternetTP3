<?php
namespace App\Controller;

use App\Controller\AppController;
		use Cake\Mailer\Email;
use Cake\Utility\Text;

Email::setConfigTransport('hotmail', [
    'host' => 'smtp.live.com',
    'port' => 25,
    'username' => 'fred909@live.ca',
    'password' => 'Jyp_909090',
    'className' => 'Smtp',
	'tls' => true
]);			  

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
 public function isAuthorized($user)
	{
		$action = $this->request->getParam('action');

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
		
		return $id === $user['id'];
	}
	
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout']);
		$this->Auth->allow(['logout', 'add']);
	}
		public function login()
	{
    if ($this->request->is('post')) {
        $user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
		}
	}
	public function logout()
	{
		$this->Flash->success('Vous avez été déconnecté.');
		return $this->redirect($this->Auth->logout());
	}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Typeusers', 'Imageusers']
        ];
        $users = $this->paginate($this->Users);
	$this->set('imageusers', $this->Users->Imageusers->find('all'));

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Typeusers', 'Imageusers', 'Reservations']
        ]);
		
		$this->set('imageusers', $this->Users->imageUsers->find('all'));

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->typeuser_id = '1';
			$user->codeconfirmation = Text::uuid();
			$email = new Email('default');
			$email->to($user->email)->subject('Essai de CakePHP Mailer')->send($user->codeconfirmation);
							
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $typeusers = $this->Users->Typeusers->find('list', ['limit' => 200]);
        $imageusers = $this->Users->Imageusers->find('list', ['limit' => 200]);
        $this->set(compact('user', 'typeusers', 'imageusers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Auth->user('typeuser_id') == '3') {
				$user = $this->Users->patchEntity($user, $this->request->getData());
			} else {
				$user = $this->Users->patchEntity($user, $this->request->getData(), ['accessibleFields' => ['typeuser_id' => false]]);
			}										  
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $typeusers = $this->Users->Typeusers->find('list', ['limit' => 200]);
        $imageusers = $this->Users->Imageusers->find('list', ['limit' => 200]);
        $this->set(compact('user', 'typeusers', 'imageusers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
