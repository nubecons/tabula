<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Utility\Lists;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Configure;

use Cake\Network\Exception\ForbiddenException;

use Cake\Network\Exception\NotFoundException;

use Cake\View\Exception\MissingTemplateException;

use App\View\Helper\GetInfoHelper;

class AdvertisementsController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->product_file_path = WWW_ROOT . 'img' . DS . 'advertisements' . DS;
        $this->loadComponent('Upload');
    }

    function dashboard() {
        
    }

    public function index() {
        $this->loadModel('Advertisements');
        $Advertisements = $this->Advertisements->find('all')->where(['status' => 'active'])->toArray();
        $this->set('Advertisements', $Advertisements);
    }
    public function add() {
        $this->set( 'AdvertisementStatus' , $this->Advertisements->AdvertisementStatus);
        $this->set( 'AdvertisementPaidStatus' , $this->Advertisements->AdvertisementPaidStatus);
        $advertisement = $this->Advertisements->newEntity();
        if ($this->request->is('post'))
		{
			 $data = $this->request->data;
            
			if (!empty($this->request->data['image_file']['name']))
			{
				$result = $this->Upload->upload($this->request->data['image_file'], $this->product_file_path, null,  null ,null);
				
				if(count($this->Upload->errors) > 0)
				{
					unset($this->request->data['image_file']);
				}
				else
				{
					$this->request->data['image'] = $this->Upload->result; 
					
				}
			}
	
				
				$advertisement= $this->Advertisements->patchEntity($advertisement, $this->request->data);
				//return ;
				if ($this->Advertisements->save($advertisement))
				{
					$this->Flash->success(__('Action Successfully Completed.'));
					$this->redirect(['action' => 'index']);
				}
				
			
			
			
		}
    }

    public function edit($advertisements_id = null) {
        $data = array();
        $Advertisements = $this->Advertisements->find()->where(['id' => $advertisements_id])->first();
        $this->set('Advertisements', $Advertisements);
        $this->set('advertisements_id', $advertisements_id);
         $this->set( 'AdvertisementStatus' , $this->Advertisements->AdvertisementStatus);
        $this->set( 'AdvertisementPaidStatus' , $this->Advertisements->AdvertisementPaidStatus);

        if (!empty($this->request->data['image_file']['name'])) {
            $result = $this->Upload->upload($this->request->data['image_file'], $this->product_file_path, null, null, null);

            if (count($this->Upload->errors) > 0) {
                unset($this->request->data['image_file']);
            } else {
                $this->request->data['image'] = $this->Upload->result;
            }
            $data['image'] = $this->request->data['image'];
            $Data = $this->Advertisements->get($advertisements_id);
            $Data = $this->Advertisements->patchEntity($Data, $data);
            if ($this->Advertisements->save($Data)) {
                $this->redirect('/admin/advertisements/edit/' . $advertisements_id);
            } else {
                echo 'error';
            }
        }
    }

}
