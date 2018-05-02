<?php

// src/Controller/AppController.php



namespace App\Controller;
use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    public $sUser = [];
	public $SiteInfo = [];
    
	public function initialize()
    {
		$this->Session = $this->request->Session();
		//$this->addBehavior('Timestamp');
        $this->loadComponent('Flash');
		$this->loadComponent('Site');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'

            ],

            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'

            ],

			'authenticate' => [
				'Form' => [
					'fields' => ['username' => 'email', 'password' => 'password'],
					'finder' => 'auth'
				]
        	]
        ]);
    }



    public function beforeFilter(Event $event)
    {
		$this->Session = $this->request->Session();

		$sUser = $this->Auth->user();
		$this->sUser = $sUser ;

		if(isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin' ){ 

			$this->viewBuilder()->setLayout('admin');

			if($sUser['group_id'] != '1' ){

				return $this->redirect('/');
			}
		}

		

		$this->set('sUser' ,$sUser);
	
		
		if($this->Session->check('SiteInfo')){
	
			$SiteInfo = $this->Session->read('SiteInfo');
			
		}else{
			
			$this->loadModel('SiteInformations');
			$SiteInfo = $this->SiteInformations->find('list', ['keyField' => 'type', 'valueField' => 'value'])->toArray();
			
			$this->Session->write('SiteInfo' , $SiteInfo);
		
		 }
		
		
		$this->set('SiteInfo', $SiteInfo );
		$this->SiteInfo = $SiteInfo;
		$this->set('title' ,$SiteInfo['site-title']);

	}

	

	public function validate_email_address($email = null) {

         $regexCheck = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel|realtor)$/i';
          if (preg_match($regexCheck, $email)) {
	          return true;
          } else {
    	      return false;
          } 

    }

	

	function validate_phone_number($phone)
	{
			$ext = '';
			if(strstr($phone, "x") != FALSE)
			list($phone,$ext) = split("x", $phone, 2);
			
			$newPhone = preg_replace('/[^0-9]/', '', $phone);
			
			if (strlen($newPhone) != 10 || preg_match('/[^0-9() -]/', $phone))
			
			return FALSE;

		   $newExt = preg_replace('/[^0-9]/', '', $ext);
		
		   if (preg_match('/[^0-9() -]/', $ext))
		
			return FALSE;
		
		   $phone = $newPhone;
		
		   $phone = '(' . substr($phone, 0, 3) . ') ' . substr($phone, 3, 3) . '-' . substr($phone, 6);
		
		   if($ext != '') 
		
			$phone .= ' x' . $newExt;
		
		   return TRUE;
		
		}

  }
