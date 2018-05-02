<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use App\Utility\Lists;
use Cake\Datasource\ConnectionManager;

class MapsController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->product_file_path = WWW_ROOT . 'img' . DS . 'maps' . DS;
        $this->loadComponent('Upload');
    }

    function dashboard() {
        
    }

    public function index() {
        $this->loadModel('Cities');
        $Cities = $this->Cities->find('all')->where(['status' => 'ACTIVE', 'country_code' => 'pk'])->toArray();
        $this->set('Cities', $Cities);
    }

    public function locations($city_id = null) {
        $this->loadModel('Locations');
        $Locations = $this->Locations->find('all')->where(['city_id' => $city_id])->toArray();
        $this->set('Locations', $Locations);
        $this->set('city_id', $city_id);
         if($city_id != null){
        $this->loadModel('Cities');
        $Cities = $this->Cities->find('all')->where(['id' => $city_id, 'country_code' => 'pk'])->toArray();
        if($Cities){$this->set('city_name', $Cities[0]['title']);} 
        }
    }

    public function edit($location_id = null, $city_id = null) {
        $data = array();
        $this->loadModel('Locations');
        $Locations = $this->Locations->find()->where(['id' => $location_id])->first();
        $this->set('Locations', $Locations);
        $this->set('city_id', $city_id);
        $this->set('location_id', $location_id);

        if (!empty($this->request->data['image_file']['name'])) {
            $result = $this->Upload->upload($this->request->data['image_file'], $this->product_file_path, null, null, null);

            if (count($this->Upload->errors) > 0) {
                unset($this->request->data['image_file']);
            } else {
                $this->request->data['location_map'] = $this->Upload->result;
            }
            $data['location_map'] = $this->request->data['location_map'];
            $mapData = $this->Locations->get($location_id);
            $mapData = $this->Locations->patchEntity($mapData, $data);
            if ($this->Locations->save($mapData)) {
                $this->redirect('/admin/maps/edit/' . $location_id);
            } else {
                echo 'error';
            }
        }
    }

}
