<?php



namespace App\Controller;



use App\Controller\AppController;

use Cake\Event\Event;

use Cake\ORM\TableRegistry;

//For EMail Sending

use Cake\Mailer\AbstractTransport;

use Cake\Mailer\Email;

use Cake\Network\Exception\SocketException;

use Cake\Network\Http\Client;

use Cake\Utility\Hash;

//For Password Hashing

use Cake\Auth\DefaultPasswordHasher;

use Cake\Routing\Router;

class UsersController extends AppController {



  

    public function initialize() {



        parent::initialize();

        /* $this->loadComponent('Sendgrid');

          $this->loadComponent('Upload');

          $this->profile_file_path = WWW_ROOT . 'img' .DS. 'profile_pics' . DS;

          $this->user_documents_file_path = WWW_ROOT . 'img' .DS. 'user_documents' . DS;

          $this->allowedImages = array('jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF'); */

        $this->Session = $this->request->Session();

    }



    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);



        $this->Auth->allow(['login', 'logout', 'signup','retrievePassword', 'forgotPassword', 'forgotreset', 'guestUser']);

    }



    public function index() {
   
        $conditions['created_by'] = $this->sUser['id'];
		$query = $this->Users->find('all')->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Users = $this->paginate($query, array('url' => '/Users/'));
        $this->set('Users', $Users);

    }



    

    

    

	public function login() {
		$this->viewBuilder()->setLayout('simple');
		if($this->sUser){
			return $this->redirect('/');
			}

        if ($this->request->is('post')) {

            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                if ($user['group_id'] == '1') {
                    $this->redirect('/admin');
                }
			
			   return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Sorry, we did not recognize that email or password'));
        }


            

    }


    public function logout() {
		
		session_unset();
		session_destroy();
        return $this->redirect($this->Auth->logout());

    }



  

    

    

    public function thanks(){}

    public function guestUser() {

        $this->Session->write('User.guest', 'Yes');

        if ($this->Session->check('Auth.newurl')) {

            $url = $this->Session->read('Auth.newurl');

            $this->Session->delete('Auth.newurl');



            if ($url != '/users/login' && $url != '/users/forgotPassword' && $url != '/users/signup') {

                $this->redirect($url);

            } else {

                $this->redirect('/');

            }

        } else {

            $this->redirect('/');

        }

    }



    function testEmail() {

        $this->request->data['email'] = 'muzammilshabir@gmail.com';

        global $client_application_email, $client_application_subject;

        $header = 'The following new client application has been submitted:';

        try {

            /* $email = new Email();

              $email->template('common')

              ->emailFormat('html')

              ->viewVars(['data' => $this->request->data , 'header'=> $header , 'footer'=>'' ])

              ->from($data['email'])

              ->to($client_application_email)

              ->subject($client_application_subject)

              ->send(); */



            $subject = 'Don\'t Forget to Submit New Client Agreement with Central Signing Service, Inc.';

            $header = 'The following new client application has been submitted:';

            $footer = 'Don\'t forget to also download the <a href="' . Router::url('/', true) . 'pdf/New%20Client%20Agreement%20-final.pdf">New Client Agreement</a> and fax it back to us at 541-507-1715';



            $email = new Email();

            $email->template('common')

                    ->emailFormat('html')

                    ->viewVars(['data' => $this->request->data, 'header' => $header, 'footer' => $footer])

                    //->viewVars(['user' => '123' , 'top_message'=>$header ,])

                    ->from($client_application_email)

                    ->to($this->request->data['email'])

                    ->subject($subject)

                    ->send();



            $error = 'Thank you for your application.  We will be reviewing it shortly.';

        } catch (Exception $e) {

            echo $e->getMessage();

            $error = 'Thank you for your application.  We will be reviewing it shortly. <br> Email could not sent';

        }

        echo $error;

        exit;

        global $client_application_email;

        echo $client_application_email;

        $data['email'] = 'aaaaaaaaaaaaa';

        $footer = 'Don\'t forget to also download the <a href="http://initialhere.com/dev/pdf/New%20Client%20Agreement%20-final.pdf">New Client Agreement</a> and fax it back to us at 541-507-1715';

        if (email_data_array($data, 'muzammilshabir@gmail.com', $client_application_email, 'Don\'t Forget to Submit New Client Agreement with Central Signing Service, Inc.', 'The following new client application has been submitted:', $footer)) {

            echo "iffffff";

        } else {

            echo "else";

        }



        exit;

        $email = new Email();

        $email->template('test')

                ->emailFormat('html')

                ->viewVars(['user' => '123'])

                ->from(['no-rep@cresstech.com'])

                ->to('muzammilshabir@gmail.com') //$user['email'];

                ->subject('- Password Change Request')

                ->send();



        echo "aaaaaaaaaa";

        exit;

    }



    function retrievePassword() {

        if ($this->request->is('post')) {

            global $illegal_passwords;



            $user = $this->Users->findByEmail($this->request->data['email'])->first();



            if (!$user) {

                $error = 'Sorry, we did not recognize that email address';

            } elseif (in_array($user->password_confirm, $illegal_passwords)) {

                $error = 'Sorry, there is a problem with your account.  Please contact our office at your earliest convenience.';

            } else {





                global $forgot_password_email_from_address, $forgot_password_email_subject,

                $forgot_password_email_body, $email_line_length;





                $body = wordwrap(str_replace(array('%1', '%2', '%3'), array($user->first_name, $user->last_name,

                    $user->password_confirm), $forgot_password_email_body), $email_line_length);

                $subject = str_replace(array('%1', '%2', '%3'), array($user->first_name, $user->last_name,

                    $user->password_confirm), $forgot_password_email_subject);





                $send_to = $user->email;

                $email = new Email();

                $email->from($forgot_password_email_from_address);

                $email->to($send_to);

                $email->subject($subject);



                //if (!cs_mail($user->getEmail(), $subject, $body, $forgot_password_email_from_address))

                if (!$email->send($body))

                    $error = 'Sorry, we had a problem sending your password, please check back later';

                else

                    $error = 'Your password has been sent. please check your email shortly';

            }

            $this->set('error', $error);

        }

    }

	function forgotPassword()
	{
		
		if($this->sUser){
		
			return $this->redirect('/');
		
			}


		if ($this->request->is('post'))
		{
			$user = $this->Users->findByEmail($this->request->data['email'])->hydrate(false)->first();
			if($user)
			{
				$userEntity = $this->Users->get($user['id']);
				$userEntity->change_password_code = $change_password_code = md5(time());
				$this->Users->patchEntity($userEntity, $this->request->data);
				if ($this->Users->save($userEntity))
				{
					$this->set('user', $user);
					$confirm_link = "users/forgotreset/".$user['id']."/".$change_password_code;
					$this->set('confirm_link', $confirm_link);

					$email = new Email();
					$email->template('forgot_password')
					->emailFormat('html')
					->viewVars(['user' => $user, 'confirm_link' => $confirm_link, 'site_name' => $this->SiteInfo['site-name']])
					->from([$this->SiteInfo['contact_email']])
					->to('muzammilshabir@gmail.com') //$user['email'];
					->subject($this->SiteInfo['site-name']. '- Password Change Request')
					->send();

					$this->Flash->success(__('An email has been sent with password reset link.'));
					return $this->redirect($this->referer());
				}
			}
			else {
				$this->Flash->error(__('No user was found with the submitted email address.'));
				return $this->redirect($this->referer());
			}
		}
	}


    public function forgotreset($userid = null, $change_password_code = null) {

        if ($this->request->is('post')) {

            if ($this->request->data['new_password'] != $this->request->data['confirm_password']) {

                $this->Flash->error(__('New password and Confirm password field do not match'));

                return $this->redirect($this->referer());

            } else if (!$this->Session->check('user_id_for_reset')) {

                $this->Flash->error(__('You do not have permission to change this password'));

                return $this->redirect(['action' => 'login']);

            } else {

                $user = $this->Users->find()->where(['id' => $this->Session->read('user_id_for_reset')])->first();

                $user->id = $this->Session->read('user_id_for_reset');

                $user->password = $this->request->data['new_password'];

               /* $hasher = new DefaultPasswordHasher();

                $hasher->hash($user->password);
*/


                if ($this->Users->save($user)) {

                    $this->Flash->success(__('Your password has been changed successfully'));

                    return $this->redirect(['controller' => 'users', 'action' => 'login']);

                } else {

                    $this->Flash->error(__('Password didn\'t update, Please try again later'));

                    return $this->redirect($this->referer());

                }

            }

        } else {

            $user_data = $this->Users->find()->where(['id' => $userid, 'change_password_code' => $change_password_code])->first();

            if ($user_data) {

                $this->Session->write('user_id_for_reset', $user_data->id);

            } else {

                $this->Flash->error(__('Password reset link not valid, Please try again'));

                $this->redirect(['controller' => 'users', 'action' => 'login']);

            }

        }

    }



    /* public function __debugInfo()

      {

      return [

      'query' => $this->_query,

      'items' => $this->toArray(),

      ];

      } */



    public function signup() {
		$this->viewBuilder()->setLayout('simple');
		if($this->sUser){
			return $this->redirect('/');
			}

		
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $User_email = $this->Users->find()->where(['email' => $this->request->data['email']])->first();

            if ($User_email) {

                $this->Flash->error(__('This email already registered.'));

            } else {

                $user->group_id = '2';

                $user->confirm_code = md5(time());

                $user->password = $this->request->data['new_password'];

				//$hasher = new DefaultPasswordHasher();

              //  $hasher->hash($user->password);

                $this->request->data['password_decoded'] = $this->request->data['new_password'];



                $user = $this->Users->patchEntity($user, $this->request->data);

                if ($this->Users->save($user)) {

                    //$this->Flash->success(__('Your Account has been created successfully.'));

                    return $this->redirect(['controller' => 'users', 'action' => 'login']);

                } else {

                    $this->Flash->error(sprintf(__('The %s could not be saved. Please, try again.', true), 'user'));

                }

            }

        }

        $this->set('user', $user);

    }
	
	public function saveData() {
		
		
		$this->viewBuilder()->setLayout(false);

        $return = 'true' ;
		
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {

            $User_email = $this->Users->find()->where(['email' => $this->request->data['email']])->first();

            if ($User_email) {

                $return = 'This email already registered.';

            } else {

                $user->group_id = '2';
				
				$user->created_by = $this->sUser['id'];

                $user->confirm_code = md5(time());

                $user->password = $this->request->data['new_password'];


                $this->request->data['password_decoded'] = $this->request->data['new_password'];



                $user = $this->Users->patchEntity($user, $this->request->data);

                if ($this->Users->save($user)) {

                    //$this->Flash->success(__('Your Account has been created successfully.'));

                    //return $this->redirect(['controller' => 'users', 'action' => 'login']);

                } else {
					
					 $return = 'The user could not be saved. Please, try again.';
                    // $this->Flash->error(sprintf(__('The %s could not be saved. Please, try again.', true), 'user'));

                }

            }

        }else{
			$return = 'Ivalid request!';
			}

      echo $return;
	  exit;
	  // $this->set('user', $user);

    }


    public function dashboard() {
	
		
		
		}
	
	
	public function profile() {
		
		
		$user = $this->Users->get($this->sUser['id']);
		$this->set('user' ,$user);
		
		$this->loadModel('Countries');
		$Countries = $this->Countries->find('list', ['keyField' => 'id', 'valueField' => 'title'])->where(['status'=>'ACTIVE'])->toArray();
		$this->set('Countries', $Countries);
		
		if($this->request->is('put')) {
			
			  $User_email = $this->Users->find()->where([ 'id' != $this->sUser['id'] , 'email' => $this->request->data['email']])->first();

            if ($User_email) {

                $this->Flash->error(__('This email already registered.'));
			    return;	
			}


            $user =  $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
 				
				$this->Flash->success(__('Profile updated successfully.'));
              
			    return $this->redirect(array('controller' => '/Users', 'action' => 'profile'));

            } else {
				$this->Flash->error(__('Changes could not saved.'));
                $this->set('errors', $user->errors());

            }
		
		}
		
		
		}
		



    public function changePassword() {
		
		
        $user = $this->Users->get($this->sUser['id']);

        if (!empty($this->request->data)) {

            $user = $this->Users->patchEntity($user, [

                'old_password' => $this->request->data['old_password'],

                'password' => $this->request->data['new_password'],

                'new_password' => $this->request->data['new_password'],

                'confirm_password' => $this->request->data['confirm_password']

                    ], ['validate' => 'password']

            );

            if ($this->Users->save($user)) {
 				$this->Flash->success(__('The password is successfully changed'));
              
			    return $this->redirect(array('controller' => '/Users', 'action' => 'changePassword'));

            } else {

                $this->set('errors', $user->errors());

            }

        }

        $this->set('user', $user);

    }
}

