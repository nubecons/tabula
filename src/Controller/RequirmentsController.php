<?php

/**

 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)

 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 *

 * Licensed under The MIT License

 * For full copyright and license information, please see the LICENSE.txt

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 * @link      https://cakephp.org CakePHP(tm) Project

 * @since     0.2.9

 * @license   https://opensource.org/licenses/mit-license.php MIT License

 */

namespace App\Controller;



use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use Cake\Event\Event;

use App\View\Helper\GetInfoHelper;

/**

 * Static content controller

 *

 * This controller will render views from Template/Pages/

 *

 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html

 */

class RequirmentsController extends AppController
{

	

	public function initialize()
	{
  
		parent::initialize();
	}

	public function beforeFilter(Event $event)
	{

		parent::beforeFilter($event);
		$this->set('title', 'Manage Requirments');

	}


 function saveData(){
		$retrun = 'false';
		if ($this->request->is('post'))
		{
		  $data = $this->request->data;
		  $data['created_by'] = $this->sUser['id'];
		  $Requirment = $this->Requirments->newEntity();
		  $Requirment= $this->Requirments->patchEntity($Requirment, $data);
		   
		   if ($result = $this->Requirments->save($Requirment))
			{
			  //$this->Flash->success(__('Requirment created successfully.'));
			  $retrun = $result->id;	
			}
		}
		
		echo $retrun;
		exit;
   }


   public function index($project_id = null)
    {  
	   
	   
	    $this->loadModel('ProjectFollowers');	
		$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
	
		
	 	 
		$this->loadModel('Projects');
		$pconditions['user_id'] = $this->sUser['id'];
		$Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
		$this->set('Projects', $Projects);
		 
	//	
		
		if($project_id){
		   
		   $conditions['project_id'] = $project_id;
			
			 }elseif($ProjectFollowers){
			$conditions['project_id in '] = $ProjectFollowers;	 
				 
				 }else{
			$conditions['created_by'] = $this->sUser['id'];		 
					 }
		$query = $this->Requirments->find('all')
		->select($this->Requirments)
		->Select(['Projects.name','Projects.id'])
		->contain(['Projects'])
		->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Requirments = $this->paginate($query, array('url' => '/Requirments/'));
        $this->set('Requirments', $Requirments);
		
		//debug( $Requirments );
		//exit;
	
    }
	
public function ajaxDetail($id = null ){

	$this->viewBuilder()->setLayout(false);
	
	$Requirment = $this->Requirments->find()->where(['id' => $id])->first();
	$this->set('Requirment', $Requirment);
	
	$this->loadModel('RequirmentComments');	
	
	$joins = [
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'type' => 'LEFT',
                'conditions' => 'Users.id = RequirmentComments.created_by'
            ],
        ];	
	
	
	$RequirmentComments = $this->RequirmentComments->find()
	->select($this->RequirmentComments)
	->select(['Users.id' , 'Users.email', 'Users.first_name', 'Users.last_name' ])
	->join($joins)
	 ->group('RequirmentComments.id')
	->where(['RequirmentComments.requirment_id' => $id ,'RequirmentComments.status'=>'ACTIVE' ])->all();
	$this->set('RequirmentComments', $RequirmentComments);
	
	/*
	$this->loadModel('Users');	
	$TeamMembers = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
	$this->set('TeamMembers', $TeamMembers);
	
	$this->loadModel('ProjectFollowers');	

	$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $id, 'is_updated' => 'YES'])->toArray();
	$this->set('ProjectFollowers', $ProjectFollowers);
	*/
	
	}


  function saveComment(){
	   $this->set('is_ajax' , true);
	  
	    $this->viewBuilder()->setLayout(false);
		$this->loadModel('RequirmentComments');
		$retrun = 'false';
		
		if ($this->request->is('post'))
		{
		  $data = $this->request->data;
		  $data['created_by'] = $this->sUser['id'];
		  $RequirmentComments = $this->RequirmentComments->newEntity();
		  $RequirmentComments= $this->RequirmentComments->patchEntity($RequirmentComments, $data);
		   
		   if ($result = $this->RequirmentComments->save($RequirmentComments))
			{
			 // $this->Flash->success(__('Project created successfully.'));
			  $retrun = $result->id;	
			 
			  $RequirmentComment = $this->RequirmentComments->find()->where(['id' => $result->id  ])->first();
			  $this->set('RequirmentComment' , $RequirmentComment);
			  
			}else{
				echo $retrun;
		        exit;
				
				}
		}else{
		echo $retrun;
		exit;
		}
   }
   
  function saveTask(){
	  
	    $this->viewBuilder()->setLayout(false);
		$this->loadModel('Tasks');
		$retrun = 'false';
		
		if ($this->request->is('post'))
		{
		  $data = $this->request->data;
	
		  $data['created_by'] = $this->sUser['id'];
		  $Task = $this->Tasks->newEntity();
		  $Task= $this->Tasks->patchEntity($Task, $data);
		   
		   if ($result = $this->Tasks->save($Task))
			{
			 // $this->Flash->success(__('Project created successfully.'));
			  $retrun = $result->id;	
			 
			  $Task = $this->Tasks->find()->where(['id' => $result->id])->first();
			  $this->set('Task' , $Task);
			  
			}else{
				echo $retrun;
		        exit;
				
				}
		}else{
		echo $retrun;
		exit;
		}
		
		exit;
   }

		
			


}

