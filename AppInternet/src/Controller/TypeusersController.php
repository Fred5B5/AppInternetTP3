<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Typeusers Controller
 *
 * @property \App\Model\Table\TypeusersTable $Typeusers
 *
 * @method \App\Model\Entity\Typeuser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeusersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $typeusers = $this->paginate($this->Typeusers);

        $this->set(compact('typeusers'));
    }

    /**
     * View method
     *
     * @param string|null $id Typeuser id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeuser = $this->Typeusers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('typeuser', $typeuser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeuser = $this->Typeusers->newEntity();
        if ($this->request->is('post')) {
            $typeuser = $this->Typeusers->patchEntity($typeuser, $this->request->getData());
            if ($this->Typeusers->save($typeuser)) {
                $this->Flash->success(__('The typeuser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The typeuser could not be saved. Please, try again.'));
        }
        $this->set(compact('typeuser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Typeuser id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeuser = $this->Typeusers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeuser = $this->Typeusers->patchEntity($typeuser, $this->request->getData());
            if ($this->Typeusers->save($typeuser)) {
                $this->Flash->success(__('The typeuser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The typeuser could not be saved. Please, try again.'));
        }
        $this->set(compact('typeuser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Typeuser id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeuser = $this->Typeusers->get($id);
        if ($this->Typeusers->delete($typeuser)) {
            $this->Flash->success(__('The typeuser has been deleted.'));
        } else {
            $this->Flash->error(__('The typeuser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
