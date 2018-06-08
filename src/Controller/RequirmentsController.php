<?php


namespace App\Controller;
use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use Cake\Event\Event;

use App\View\Helper\GetInfoHelper;

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
			    $retrun = $result->id;
			    
				$edata['user_id'] = $this->sUser['id'] ;
				$edata['project_id'] = $result->project_id ;
				$edata['requirement_id'] = $result->id;
				
				$edata['type'] = 'Requirement' ;
				$edata['summary'] = 'Requirement Created' ;
				$edata['description'] = 'Requirement Created' ;
				$this->AppEvents->create_event($edata);		
			}
		}
		
		echo $retrun;
		exit;
   }


   public function index($project_id = null)
    {  
	   
	    $this->loadModel('Projects');
	    $this->loadModel('ProjectFollowers');	
	   
	   	$this->set('PriortyType' ,  $this->Projects->PriortyType);	
		
	    
		$ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
		
		$pconditions['user_id'] = $this->sUser['id'];
		$Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
		$this->set('Projects', $Projects);
                
                $this->loadModel('Users');
		
		
		$TeamMembers[$this->sUser['id']] = 'You';
	    $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where( ['created_by' => $this->sUser['id']])->toArray();
	    $this->set('TeamMembers', $TeamMembers);
		 
		
		
		if($project_id){
		
		   $conditions['project_id'] = $project_id;
		
		}
		
		if($ProjectFollowers){
		 
		  $conditions['OR'] = ['project_id in ' => $ProjectFollowers , 'created_by' => $this->sUser['id'] ];	 
	  	 
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
			 	
				$edata['user_id'] = $this->sUser['id'] ;
				$edata['project_id'] = $result->project_id ;
				$edata['requirement_id'] = $result->requirment_id;
				$edata['type'] = 'Requirement' ;
				$edata['comment_id'] = $result->id;
				$edata['summary'] = 'Commented' ;
				$edata['description'] = 'Commented' ;
				$this->AppEvents->create_event($edata);	
				
			 
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
		  
		   if(isset($data['requirment_id']))
		   {
			   $Requirment = $this->Requirments->find()->select(['project_id'])->where(['id' => $data['requirment_id']])->first();
			 
			    if(isset($Requirment['project_id'])){
				
				 $data['project_id'] = $Requirment['project_id']; 
				
				   }
		   
		   }
                    $data['estimate'] = 0;
		  $data['created_by'] = $this->sUser['id'];
		  $Task = $this->Tasks->newEntity();
		  $Task= $this->Tasks->patchEntity($Task, $data);
		   
		   if ($result = $this->Tasks->save($Task))
			{
			    $edata['user_id'] = $this->sUser['id'] ;
				$edata['project_id'] = $result->project_id ;
				$edata['requirement_id'] = $result->requirment_id;
				$edata['task_id'] = $result->id;
				$edata['type'] = 'Requirement' ;
			
				$edata['summary'] = 'Task Created' ;
				$edata['description'] = 'Task Created' ;
				$this->AppEvents->create_event($edata);	
			    
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

