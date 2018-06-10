<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class GetInfoHelper extends Helper {

    public function initialize(array $config) {
        
    }

    function getUserData($id, $fields = []) {

        if (!$id)
            return '';

        $ObjUsers = TableRegistry::get('Users');
        return $user_data = $ObjUsers->find()->select($fields)->where(['id' => $id])->first();
    }

    function getProjects($conditions = []) {

        $Projects = TableRegistry::get('Projects');
        return $Projects->find()->where($conditions)->all();
    }

    function getReqName($id, $fields = ['title']) {

        $ObjM = TableRegistry::get('Requirments');
        return $ObjM->find()->select($fields)->where(['id' => $id])->first();
    }

    function getProjectName($id, $fields = ['name']) {

        $ObjM = TableRegistry::get('Projects');
        return $ObjM->find()->select($fields)->where(['id' => $id])->first();
    }

    function getTaskName($id, $fields = ['title']) {

        $ObjM = TableRegistry::get('Tasks');
        return $ObjM->find()->select($fields)->where(['id' => $id])->first();
    }

    function getCountTasks($req_id = null, $status = null, $task_type = null, $assign_to = null, $ProjectIdz = null) {

        $ObjM = TableRegistry::get('Tasks');
        if ($req_id != null) {
            $conditions['requirment_id'] = $req_id;
        }
        if ($task_type != null) {
            $conditions['task_type'] = $task_type;
        }
        if ($status != null) {
            $conditions['status'] = $status;
        }
        if ($assign_to != null) {
            $conditions['assign_to'] = $assign_to;
        }
        if ($ProjectIdz != null) {
            $conditions['project_id IN'] = $ProjectIdz;
        }

        return $ObjM->find()->select([])->where($conditions)->count();
    }

    function getCity($id, $fields = []) {

        $ObjCities = TableRegistry::get('Cities');
        return $ObjCities->find()->select($fields)->where(['id' => $id])->count();
    }

    function getLocation($id, $fields = []) {

        $ObjLocations = TableRegistry::get('Locations');
        return $ObjLocations->find()->select($fields)->where(['id' => $id])->first();
    }

    function getLocationCount($conditions = []) {

        $Locations = TableRegistry::get('Locations');
        return $Locations->find()->where($conditions)->count();
    }

    function getProductCityCount($conditions = []) {

        $Products = TableRegistry::get('Products');

        return $Products->find('list', [
                            'keyField' => 'city_id',
                            'valueField' => 'count'
                        ])
                        ->select([
                            'city_id',
                            'count' => $Products->find()->func()->count('*')
                        ])
                        ->where($conditions)
                        ->group('city_id')
                        ->order(['count' => 'DESC'])
                        ->limit(150)
                        ->toArray();

        //  return  $Products->find()->where($conditions)->count();
    }

    function getProductLocationCount($conditions = []) {

        $Products = TableRegistry::get('Products');

        return $Products->find('list', [
                            'keyField' => 'location_id',
                            'valueField' => 'count'
                        ])
                        ->select([
                            'location_id',
                            'count' => $Products->find()->func()->count('*')
                        ])
                        ->where($conditions)
                        ->group('location_id')
                        ->order(['count' => 'DESC'])
                        ->limit(150)
                        ->toArray();
        //  return  $Products->find()->where($conditions)->count();
    }

}
