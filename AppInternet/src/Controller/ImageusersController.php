<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Imageusers Controller
 *
 * @property \App\Model\Table\ImageusersTable $Imageusers
 *
 * @method \App\Model\Entity\Imageuser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImageusersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $imageusers = $this->paginate($this->Imageusers);
		$files = $this->Imageusers->find('all', ['order' => ['Imageusers.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);

        $this->set(compact('imageusers'));
    }

    /**
     * View method
     *
     * @param string|null $id Imageuser id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imageuser = $this->Imageusers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('imageuser', $imageuser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imageuser = $this->Imageusers->newEntity();
        if ($this->request->is('post')) {
			if (!empty($this->request->getData('Imageusers.name'))) {
			
				$imagename = $this->request->getData('Imageusers.name');
				$uploadPath = 'img/';
				$uploadFile = $uploadPath.$imagename;
				
				if (move_uploaded_file($this->request->getdata('Imageusers.tmp_name'), $uploadFile)) {
					$imageuser = $this->Imageusers->patchEntity($imageuser, $this->request->getData());
					
					$imageuser->emplacementimage = $imagename;
					$imageuser->path = $uploadPath;
						
					$this->log($this->request->getData());
					$this->log($imageuser);

					if ($this->imageusers->save($imageuser)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Erreur de telechargement, veuillez reessayer'));
                    }
				} else {
					$this->Flash->error(__('Unable to upload file, please try again.'));
				}
			} else {
				$this->Flash->error(__('Please choose a file to upload.'));   																			
			}
		}
        $this->set(compact('imageuser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imageuser id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imageuser = $this->Imageusers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imageuser = $this->Imageusers->patchEntity($imageuser, $this->request->getData());
            if ($this->Imageusers->save($imageuser)) {
                $this->Flash->success(__('The imageuser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imageuser could not be saved. Please, try again.'));
        }
        $this->set(compact('imageuser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imageuser id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imageuser = $this->Imageusers->get($id);
        if ($this->Imageusers->delete($imageuser)) {
            $this->Flash->success(__('The imageuser has been deleted.'));
        } else {
            $this->Flash->error(__('The imageuser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
