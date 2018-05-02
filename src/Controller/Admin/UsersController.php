<?php
    namespace App\Controller\Admin;
    use App\Controller\AppController;

	use Cake\Event\Event;
	use App\Utility\Lists;

    use Cake\Datasource\ConnectionManager;

   class UsersController extends AppController
	{

	public function initialize()
	{
		parent::initialize();
	
	}
	
	public function beforeFilter(Event $event)
	{
	parent::beforeFilter($event);
	}
	
	function dashboard(){
	}
	
	public function index()
	{
		
	}
	public function add()
	{
		
	}
	public function edit($id = null)
	{
		
	}
	public function changePassword($userID)
	{
	$this->set('title', 'Change User Password');
	
	$user =$this->Users->get($userID);
	$this->set('user', $user );
	
	
	if (!$user) { error('Invalid user ID specified', ERROR_INVALID_OR_NONEXISTENT_ITEM); exit; }
	
	
	
	$error = '';
	if (!empty($this->request->data)) {
	if (empty($this->request->data['new_password']))
	
	$error = 'Please enter a new password';
	
	else if (empty($this->request->data['confirm_password']))
	
	$error = 'Please enter the new password twice';
	
	else if ($this->request->data['new_password'] != $this->request->data['confirm_password'])
	
	$error = 'The new password must be entered the same in both password fields';
	
	if($error == ''){
	
	
	
	$user = $this->Users->patchEntity($user, [
	
	'password'      => $this->request->data['new_password'],
	
	'new_password'     => $this->request->data['new_password'],
	
	'password_confirm' => $this->request->data['confirm_password'],
	
	'confirm_password' => $this->request->data['confirm_password']
	
	
	
	],
	
	
	
	['validate' => 'password']
	
	
	
	);
	
	
	
	if ($this->Users->save($user)) {
	
	
	
	$this->Flash->success('The password is successfully changed',['key' => 'message']);
	
	
	
	return $this->redirect(array('controller'=>'/Users', 'action'=>'changePassword',$userID));
	
	
	
	
	
	
	
	} else {
	
	
	
	$error = 'Sorry, there was a problem updating the user\'s password';
	
	
	
	//$this->set('errors',$user->errors());		
	
	
	
	}
	
	
	
	}
	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	$this->set('error',$error);
	
	
	
	$this->set('user',$user);
	
	
	
	
	
	
	
	}



}