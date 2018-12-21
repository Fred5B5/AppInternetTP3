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
			
			$secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
			$response = null;
			$reCaptcha = new ReCaptcha($secret);
			
			if ($_POST["g-recaptcha-response"] != '') {
				$response = $reCaptcha->verifyResponse(
					$_SERVER["REMOTE_ADDR"],
					$_POST["g-recaptcha-response"]
				);
				if ($response != null) {
					$user = $this->Auth->identify();
					if ($user) {
						$this->Auth->setUser($user);
						$this->Flash->success('Vous avez été connecte.');
						return $this->redirect($this->Auth->redirectUrl());
					}
					$this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
				}
			}
			$this->Flash->error('Votre captcha est incorrecte.');
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

?>
<?php
class ReCaptchaResponse
{
    public $success;
    public $errorCodes;
}

class ReCaptcha
{
    private static $_signupUrl = "https://www.google.com/recaptcha/admin";
    private static $_siteVerifyUrl =
        "https://www.google.com/recaptcha/api/siteverify?";
    private $_secret;
    private static $_version = "php_1.0";

    /**
     * Constructor.
     *
     * @param string $secret shared secret between site and ReCAPTCHA server.
     */
    function ReCaptcha($secret)
    {
        if ($secret == null || $secret == "") {
            die("To use reCAPTCHA you must get an API key from <a href='"
                . self::$_signupUrl . "'>" . self::$_signupUrl . "</a>");
        }
        $this->_secret=$secret;
    }

    /**
     * Encodes the given data into a query string format.
     *
     * @param array $data array of string elements to be encoded.
     *
     * @return string - encoded request.
     */
    private function _encodeQS($data)
    {
        $req = "";
        foreach ($data as $key => $value) {
            $req .= $key . '=' . urlencode(stripslashes($value)) . '&';
        }

        // Cut the last '&'
        $req=substr($req, 0, strlen($req)-1);
        return $req;
    }

    /**
     * Submits an HTTP GET to a reCAPTCHA server.
     *
     * @param string $path url path to recaptcha server.
     * @param array  $data array of parameters to be sent.
     *
     * @return array response
     */
    private function _submitHTTPGet($path, $data)
    {
        $req = $this->_encodeQS($data);
        $response = file_get_contents($path . $req);
        return $response;
    }

    /**
     * Calls the reCAPTCHA siteverify API to verify whether the user passes
     * CAPTCHA test.
     *
     * @param string $remoteIp   IP address of end user.
     * @param string $response   response string from recaptcha verification.
     *
     * @return ReCaptchaResponse
     */
    public function verifyResponse($remoteIp, $response)
    {
        // Discard empty solution submissions
        if ($response == null || strlen($response) == 0) {
            $recaptchaResponse = new ReCaptchaResponse();
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = 'missing-input';
            return $recaptchaResponse;
        }

        $getResponse = $this->_submitHttpGet(
            self::$_siteVerifyUrl,
            array (
                'secret' => $this->_secret,
                'remoteip' => $remoteIp,
                'v' => self::$_version,
                'response' => $response
            )
        );
        $answers = json_decode($getResponse, true);
        $recaptchaResponse = new ReCaptchaResponse();

        if (trim($answers ['success']) == true) {
            $recaptchaResponse->success = true;
        } else {
            $recaptchaResponse->success = false;
            $recaptchaResponse->errorCodes = $answers;
        }

        return $recaptchaResponse;
    }
}

?>

