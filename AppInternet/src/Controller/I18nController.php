<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * I18n Controller
 *
 * @property \App\Model\Table\I18nTable $I18n
 *
 * @method \App\Model\Entity\I18n[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class I18nController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $i18n = $this->paginate($this->I18n);

        $this->set(compact('i18n'));
    }

    /**
     * View method
     *
     * @param string|null $id I18n id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $i18n = $this->I18n->get($id, [
            'contain' => []
        ]);

        $this->set('i18n', $i18n);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $i18n = $this->I18n->newEntity();
        if ($this->request->is('post')) {
            $i18n = $this->I18n->patchEntity($i18n, $this->request->getData());
            if ($this->I18n->save($i18n)) {
                $this->Flash->success(__('The i18n has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The i18n could not be saved. Please, try again.'));
        }
        $this->set(compact('i18n'));
    }

    /**
     * Edit method
     *
     * @param string|null $id I18n id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $i18n = $this->I18n->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $i18n = $this->I18n->patchEntity($i18n, $this->request->getData());
            if ($this->I18n->save($i18n)) {
                $this->Flash->success(__('The i18n has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The i18n could not be saved. Please, try again.'));
        }
        $this->set(compact('i18n'));
    }

    /**
     * Delete method
     *
     * @param string|null $id I18n id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $i18n = $this->I18n->get($id);
        if ($this->I18n->delete($i18n)) {
            $this->Flash->success(__('The i18n has been deleted.'));
        } else {
            $this->Flash->error(__('The i18n could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
