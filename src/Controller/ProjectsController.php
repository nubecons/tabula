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

class ProjectsController extends AppController
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

		

		$this->set('title', 'Manage Requirments');

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


   public function index()
    {  
	 	
		$this->loadModel('ProjectFollowers');	
		$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
		
		if($ProjectFollowers){
			
		   $conditions['OR'] = ['user_id'=>$this->sUser['id'], 'id in '=>$ProjectFollowers] ;
	
		}else{
		   
		   $conditions['user_id'] = $this->sUser['id'];
		}
		
		if ($this->request->is('post'))
		{
			if(isset($this->request->data['search']) && $this->request->data['search'] != ''){
				
				$search = $this->request->data['search']; 
				
				$conditions[] = "( (id LIKE  '%".$search."%' )OR (name LIKE  '%".$search."%') OR (description LIKE  '%".$search."%' ))";
				
				}
		
		}
		
		
		$query = $this->Projects->find('all')->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Projects = $this->paginate($query, array('url' => '/Projects/'));
        $this->set('Projects', $Projects);
	
    }
	

public function ajaxDetail($id = null ){

	$this->viewBuilder()->setLayout(false);
	
	$Project = $this->Projects->find()->where(['id' => $id ])->first();
	$this->set('Project', $Project);
	$this->loadModel('ProjectComments');
	
	
	
   $joins = [
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'type' => 'LEFT',
                'conditions' => 'Users.id = ProjectComments.created_by'
            ],
        ];	

	$ProjectComments = $this->ProjectComments->find()
    	->select($this->ProjectComments)
	    ->select(['Users.id' , 'Users.email', 'Users.first_name', 'Users.last_name' ])
	    ->join($joins)
	    ->group('ProjectComments.id')
	    ->where(['ProjectComments.project_id' => $id ,'ProjectComments.status'=>'ACTIVE' ])
	    ->all();
	$this->set('ProjectComments', $ProjectComments);
	
	
	
	$this->loadModel('Users');	
	$TeamMembers = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
	$this->set('TeamMembers', $TeamMembers);
	
	$this->loadModel('ProjectFollowers');	

	$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $id, 'is_updated' => 'YES'])->toArray();
	$this->set('ProjectFollowers', $ProjectFollowers);
	
	
	}


  function saveComment(){
	  
	    $this->set('is_ajax' , true);
	  
	    $this->viewBuilder()->setLayout(false);
		$this->loadModel('ProjectComments');
		$retrun = 'false';
		
		if ($this->request->is('post'))
		{
		  $data = $this->request->data;
		  $data['created_by'] = $this->sUser['id'];
		  $ProjectComments = $this->ProjectComments->newEntity();
		  $ProjectComments= $this->ProjectComments->patchEntity($ProjectComments, $data);
		   
		   if ($result = $this->ProjectComments->save($ProjectComments))
			{
			
			$retrun = $result->id;
			
			$edata['user_id'] = $this->sUser['id'] ;
			$edata['project_id'] = $result->project_id ;
			$edata['type'] = 'Project' ;
			$edata['comment_id'] = $result->id;
			$edata['summary'] = 'Commented' ;
			$edata['description'] = 'Commented' ;
			$this->AppEvents->create_event($edata);	 	
			
			$ProjectComment = $this->ProjectComments->find()->where(['id' => $result->id ])->first();
			$this->set('ProjectComment' , $ProjectComment);
			  
			}else{
				echo $retrun;
		exit;
				
				}
		}else{
		echo $retrun;
		exit;
		}
   }
   
   function saveFollowers(){
	   
	    $this->viewBuilder()->setLayout(false);
		$this->loadModel('ProjectFollowers');
		$this->loadModel('AppEvents');
		
		$retrun = 'false';
		
		if ($this->request->is('post'))
		{
			
		$data = $this->request->data;
		
		$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $data['project_id'], 'is_updated' => 'YES'])->toArray();
		
		$this->ProjectFollowers->query()->update()
					->set(['is_updated' => 'NO'])
					->where(['project_id' => $data['project_id']])
					->execute();
	   
		
		 foreach($data['follower_id'] as $follower_id){
		
			 $saveData = [];
			 
			 $ProjectFollower = $this->ProjectFollowers->find()->where(['follower_id' => $follower_id ,'project_id'=> $data['project_id'] ])->first();
			 
			 if(!$ProjectFollower){
				 
				$ProjectFollower = $this->ProjectFollowers->newEntity();
				$saveData['follower_id'] =  $follower_id;
				$saveData['project_id']  =  $data['project_id'];
				$saveData['user_id']     =  $this->sUser['id'];
				
				$edata['user_id']     = $this->sUser['id'] ;
				$edata['project_id']  = $data['project_id'];
				$edata['follower_id'] = $follower_id;
				$edata['type'] = 'Project' ;
				$edata['summary'] = 'Follower added' ;
				$edata['description'] = 'Follower added' ;
				$this->AppEvents->create_event($edata);	 
				  
				}
			 
			
			 $saveData['is_updated']  =  'YES';
			 
			 $ProjectFollower= $this->ProjectFollowers->patchEntity($ProjectFollower, $saveData);
			 $result = $this->ProjectFollowers->save($ProjectFollower);
			  
		       
			 }
   	     
		 if(count($ProjectFollowers) > 0)
		 {
			$RemovedFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $data['project_id'] , 'follower_id in' => $ProjectFollowers, 'is_updated' => 'NO'])->toArray(); 
			foreach($RemovedFollowers as $follower_id) {
			 
			 	$edata['user_id']     = $this->sUser['id'] ;
				$edata['project_id']  = $data['project_id'];
				$edata['follower_id'] = $follower_id;
				$edata['type'] = 'Project' ;
				$edata['summary'] = 'Follower removed' ;
				$edata['description'] = 'Follower removed' ;
				$this->AppEvents->create_event($edata);	 	
				
				}
			 
		  }
	   
		 $retrun = 'true';
		}
		
		echo $retrun;
		exit;
   }
	
   
 public function detail($id = null)
    {}
	
	

		
			


}

