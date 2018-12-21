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
		if ($this->request->is('post') or $this->request->is('ajax')) {
			if (!empty($this->request->data['imageuser'])) {
				
				$imagename = $this->request->data['imageuser'];
				$uploadPath = 'img/';
				$uploadFile = $uploadPath.$imagename['name'];
				
				if (move_uploaded_file($imagename['tmp_name'], $uploadFile)) {
					$imageuser = $this->Imageusers->patchEntity($imageuser, $this->request->data());
					
					$imageuser->emplacementimage = $imagename['name'];
					$imageuser->path = $uploadPath;
						
					$this->log($this->request->data());
					$this->log($imageuser);

					if ($this->Imageusers->save($imageuser)) {
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
	
	public function drop()
	{
    if ($this->request->is(array('post', 'put'))) 
    {
        if(!empty($_FILES))
        {
            $fileName = $_FILES['file']['name']; //Get the image
            $file_full = WWW_ROOT.'img/';     //Image storage path        
            $file=basename($fileName);
            $ext=pathinfo($file,PATHINFO_EXTENSION); 
            $file_temp_name= $_FILES['file']['tmp_name'];
            $new_file_name = time().'.'.$ext;
            if(move_uploaded_file($file_temp_name, $file_full.$new_file_name))
            {
				$imageuser = $this->Imageusers->newEntity();
				
				$imageuser = $this->Imageusers->patchEntity($imageuser, $this->request->data());
					
				$imageuser->emplacementimage = $new_file_name;
				$imageuser->path = $file_full.$new_file_name;
						
				$this->log($this->request->data());
				$this->log($imageuser);

				if ($this->Imageusers->save($imageuser)) {
                    $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                } else {
                    $this->Flash->error(__('Erreur de telechargement, veuillez reessayer'));
                }
                echo "File Uploaded successfully";die;
            }
            else
            {
                echo "Error";die;
            }
        }
    }
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
