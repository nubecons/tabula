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

class TasksController extends AppController
{

	

	public function initialize()
	{

		parent::initialize();
	    
		$this->product_file_path = WWW_ROOT . 'img' .DS. 'Products' . DS;
	}

	public function beforeFilter(Event $event)
	{

		parent::beforeFilter($event);
		
		$this->loadComponent('Upload');

		

		$this->set('title', 'Manage Tasks');

	}
	
	function saveData(){
		$retrun = 'false';
		if ($this->request->is('post'))
		{
		  $data = $this->request->data;
		  $data['user_id'] = $this->sUser['id'];
		  $project = $this->Projects->newEntity();
		  $project= $this->Projects->patchEntity($project, $data);
		   
		   if ($result = $this->Projects->save($project))
			{
			  $this->Flash->success(__('Project created successfully.'));
			  $retrun = $result->id;	
			}
		}
		
		echo $retrun;
		exit;
   }
   
   
   
   
 function kanban(){
	 
		$this->set('priorityOptions' ,  $this->Tasks->priorityOptions);	
		
		$this->loadModel('Users');	
		$TeamMembers[$this->sUser['id']] = 'You';
	    $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where( ['created_by' => $this->sUser['id']])->toArray();
	    $this->set('TeamMembers', $TeamMembers);
		
		
		$this->loadModel('ProjectFollowers');	
		$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
	    
		
		
	
		if($ProjectFollowers){
		   $pconditions['OR'] = ['user_id'=>$this->sUser['id'], 'id in '=>$ProjectFollowers] ;
		}else{
		   $pconditions['user_id'] = $this->sUser['id'];
		}
		
	     
		$this->loadModel('Projects'); 
		$Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
		$this->set('Projects' , $Projects);
		
		$ProjectIdz = array_keys($Projects);
	
		if(count($ProjectIdz) == 0){
		
		 $this->set('NewTasks', []);
		 $this->set('InProgressTasks', []);
		 $this->set('ResolvedTasks', []);
		 $this->set('CloseTasks', []);
		
		}else{
			
		
	 $conditions['project_id IN'] = $ProjectIdz;

	 $conditions['task_type'] = 'DESIGN';
	 
	 $Newconditions = $InProgressconditions = $Resolvedconditions =$Closeconditions = $conditions;
	 
	 $Newconditions['status'] = 'New';
	 $NewTasks = $this->Tasks->find()->where($Newconditions)->all();
	 $this->set('NewTasks', $NewTasks);
	 
	 $InProgressconditions['status'] = 'In Progress';
	 $InProgressTasks = $this->Tasks->find()->where($InProgressconditions)->all();
	 $this->set('InProgressTasks', $InProgressTasks);
	 
	 $Resolvedconditions['status'] = 'Resolve';
	 $ResolvedTasks = $this->Tasks->find()->where($Resolvedconditions)->all();
	 $this->set('ResolvedTasks', $ResolvedTasks);
	 

	 $Closeconditions['status'] = 'Close';
	 $CloseTasks = $this->Tasks->find()->where($Closeconditions)->all();
	 $this->set('CloseTasks', $CloseTasks);
	 
	 }
	 
	 }	


   public function design()
    { 
	
		/*  
	    $results = $this->Tasks->find('all')->contain(['Projects'])->select($this->Tasks)->select(['Projects.id']);
		$this->set('Tasks', $results);
		
		foreach ($results as $article) {
         //echo $article->projects[0]->text;
        debug($article);
        }
		exit;
		*/
	    
		$this->set('priorityOptions' ,  $this->Tasks->priorityOptions);	
		
		$this->loadModel('Users');	
		$TeamMembers[$this->sUser['id']] = 'You';
	    $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where( ['created_by' => $this->sUser['id']])->toArray();
	    $this->set('TeamMembers', $TeamMembers);
		
		
		$this->loadModel('ProjectFollowers');	
		$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
	    
		
		
	
		if($ProjectFollowers){
		   $pconditions['OR'] = ['user_id'=>$this->sUser['id'], 'id in '=>$ProjectFollowers] ;
		}else{
		   $pconditions['user_id'] = $this->sUser['id'];
		}
		
	     
		$this->loadModel('Projects'); 
		$Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
		$this->set('Projects' , $Projects);
		
		$ProjectIdz = array_keys($Projects);
	
		if(count($ProjectIdz) == 0){
		
		 $this->set('Tasks', []);
		
		}else{
			
		
		$conditions['project_id IN'] = $ProjectIdz;
		
		$conditions['task_type'] = 'DESIGN';
		
		$query = $this->Tasks->find('all')->contain(['Projects'])
		->select($this->Tasks)->select(['Projects.name'])
		->group('Tasks.id')
		->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Tasks = $this->paginate($query, array('url' => '/Tasks/'));
        $this->set('Tasks', $Tasks);
		}
	
    }
	
	public function qa()
    {  
	 	
					 
		$conditions['task_type'] = 'QA';
		$query = $this->Tasks->find('all')->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Tasks = $this->paginate($query, array('url' => '/Tasks/'));
        $this->set('Tasks', $Tasks);
	
    }

public function detail(){
	
	$Task = $this->Tasks->find()->where(['id' => $id])->first();
	$this->set('Task', $Task);
	
	$this->loadModel('TaskComments');	
	
	$joins = [
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'type' => 'LEFT',
                'conditions' => 'Users.id = TaskComments.created_by'
            ],
        ];	
	
	
	$TaskComments = $this->TaskComments->find()
	->select($this->TaskComments)
	->select(['Users.id' , 'Users.email', 'Users.first_name', 'Users.last_name' ])
	->join($joins)
	 ->group('TaskComments.id')	
	->where(['task_id' => $id  ])->all();
	$this->set('TaskComments', $TaskComments);
	
	}
	
	

public function ajaxDetail($id = null ){

	$this->viewBuilder()->setLayout(false);
	
	$Task = $this->Tasks->find()->where(['id' => $id])->first();
	$this->set('Task', $Task);
	
	$this->loadModel('TaskComments');	
	
	$joins = [
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'type' => 'LEFT',
                'conditions' => 'Users.id = TaskComments.created_by'
            ],
        ];	
	
	
	$TaskComments = $this->TaskComments->find()
	->select($this->TaskComments)
	->select(['Users.id' , 'Users.email', 'Users.first_name', 'Users.last_name' ])
	->join($joins)
	 ->group('TaskComments.id')	
	->where(['task_id' => $id  ])->all();
	$this->set('TaskComments', $TaskComments);
	
	
/*	$this->loadModel('Users');	
	$TeamMembers = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
	$this->set('TeamMembers', $TeamMembers);
	
	$this->loadModel('ProjectFollowers');	

	$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $id, 'is_updated' => 'YES'])->toArray();
	$this->set('ProjectFollowers', $ProjectFollowers);*/
	
	
	}


  function saveComment(){
	  
	     $this->set('is_ajax' , true);
	    $this->viewBuilder()->setLayout(false);
		$this->loadModel('TaskComments');
		$retrun = 'false';
		
		if ($this->request->is('post'))
		{
		  $data = $this->request->data;
		  $data['created_by'] = $this->sUser['id'];
		  $TaskComments = $this->TaskComments->newEntity();
		  $TaskComments= $this->TaskComments->patchEntity($TaskComments, $data);
		   
		   if ($result = $this->TaskComments->save($TaskComments))
			{
			 // $this->Flash->success(__('Project created successfully.'));
			  $retrun = $result->id;	
			 
			  $TaskComment = $this->TaskComments->find()->where(['id' => $result->id ,'status'=>'ACTIVE' ])->first();
			  $this->set('TaskComment' , $TaskComment);
			  
			}else{
				echo $retrun;
		exit;
				
				}
		}else{
		echo $retrun;
		exit;
		}
   }
   


}

