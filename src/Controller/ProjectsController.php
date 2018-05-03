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
	 	 
		$conditions['user_id'] = $this->sUser['id'];
		$query = $this->Projects->find('all')->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Projects = $this->paginate($query, array('url' => '/Projects/'));
        $this->set('Projects', $Projects);
	
    }
	

public function ajaxDetail($id = null ){

	$this->viewBuilder()->setLayout(false);
	
	$Project = $this->Projects->find()->where(['id' => $id , 'user_id' => $this->sUser['id']])->first();
	$this->set('Project', $Project);
	
	
	}
	
	
	
   
 public function detail($id = null)
    {}
	
	

		
			


}

