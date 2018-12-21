<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SystemController extends AppController
{
    public function isAuthorized()
    {
        //$action = $this->request->getParam('action');

        if($user['category'] == 3){
            return true;
        } 
        // Par défaut, on refuse l'accès.
        return true;
    }    

    public function initialize()
    {
        parent::initialize();
		$this->Auth->allow(['check15Days']);
    }
    
    
    public function index()
    {
        //$Users = $this->paginate($this->Users);
        //$this->set(compact('Users'));
		
		
		
    }
	
	public function check15Days(){
		$this->loadModel('Companies');
		$this->loadModel('Updated_companies');
		
		//debug($this->paginate($this->Updated_companies)); //retourne array avec list id companies + days
		$Companies = $this->paginate($this->Companies);		
		$Updated_companies = $this->paginate($this->Updated_companies);		
		//debug($Companies);
		
		foreach ($Companies as $companie){
			
			$pasdejala = true;
			
			foreach ($Updated_companies as $Updated_companie){
				if ($companie->id === $Updated_companie->compagnies_id) {
					
					$pasdejala = false;
					
					if ($Updated_companie->days_not_updated == -1) {
					
						continue;
					
					}	else if ($Updated_companie->days_not_updated == 16) {
						
						continue;
						
					}	else if ($Updated_companie->days_not_updated == 15) {
						
						//TODO EMAIL
						
					}
					$updated_days_count = $Updated_companie->days_not_updated + 1;
					debug($updated_days_count);
					
					$Updated = TableRegistry::get('Updated_companies');
					$_companies = $Updated->get($Updated_companie->id); // Retourne l'article avec l'id 12

					$_companies->days_not_updated = $updated_days_count;
					$Updated->save($_companies);
					
				}	
			}
			
			if ($pasdejala) {
				$Updated = TableRegistry::get('Updated_companies');
					$_companies = $Updated->newEntity();

					$_companies->compagnies_id = $companie->id;
					$_companies->days_not_updated = 0;

					$Updated->save($_companies);
			}	
		}
		
		
		
		
	}

    
    


    
}
