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
	 	 
		$conditions['created_by'] = $this->sUser['id'];
		
		if($project_id){
		   
		   $conditions['project_id'] = $project_id;
			
			 }
		$query = $this->Requirments->find('all')
		->select($this->Requirments)
		->Select(['Projects.name'])
		->contain(['Projects'])
		->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC', ];
        $Requirments = $this->paginate($query, array('url' => '/Requirments/'));
        $this->set('Requirments', $Requirments);
		
		//debug( $Requirments );
		//exit;
	
    }
	



		
			


}

