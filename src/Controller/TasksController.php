<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use App\View\Helper\GetInfoHelper;

class TasksController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->tasks_file_path = WWW_ROOT . 'img' . DS . 'tasks_file' . DS;
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->loadComponent('Upload');
        $this->set('title', 'Manage Tasks');
    }

    public function design($project_id = null, $ajax = null) {


        $this->loadModel('Projects');
        $this->loadModel('ProjectFollowers');
        $this->loadModel('Requirments');
        $this->loadModel('Users');

        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);

        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
        $this->set('TeamMembers', $TeamMembers);


        $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
        $pconditions['user_id'] = $this->sUser['id'];
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
        $this->set('Projects', $Projects);

        if ($project_id != null && $project_id != 'null') {

            $conditions['project_id'] = $project_id;
        }

        if ($ProjectFollowers) {

            $conditions['OR'] = ['project_id in ' => $ProjectFollowers, 'created_by' => $this->sUser['id']];
        } else {

            $conditions['created_by'] = $this->sUser['id'];
        }


        $query = $this->Requirments->find('all')
                ->select($this->Requirments)
                ->Select(['Projects.name', 'Projects.id'])
                ->contain(['Projects'])
                ->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC',];
        $Requirments = $this->paginate($query, array('url' => '/Requirments/'));
        $this->set('Requirments', $Requirments);

        $this->set('requirement_id', '');
        if ($ajax == 'ajax') {
            $this->Flash->success(__('Design Task Successfully Creates.'));
        }
    }

    public function kanban($req_id = null) {

        $this->set('requirement_id', $req_id);

        $this->loadModel('Projects');
        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);

        $this->loadModel('Users');
        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
        $this->set('TeamMembers', $TeamMembers);


        $this->loadModel('ProjectFollowers');
        $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();

        if ($ProjectFollowers) {
            $pconditions['OR'] = ['user_id' => $this->sUser['id'], 'id in ' => $ProjectFollowers];
        } else {
            $pconditions['user_id'] = $this->sUser['id'];
        }


        $this->loadModel('Projects');
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
        $this->set('Projects', $Projects);

        $ProjectIdz = array_keys($Projects);

        if (count($ProjectIdz) == 0) {

            $this->set('NewTasks', []);
            $this->set('InProgressTasks', []);
            $this->set('ResolvedTasks', []);
            $this->set('CloseTasks', []);
        } else {


            $conditions['project_id IN'] = $ProjectIdz;

            $conditions['task_type'] = 'DESIGN';
            if ($req_id != null) {
                $conditions['requirment_id'] = $req_id;
            }

            $Newconditions = $InProgressconditions = $Resolvedconditions = $Closeconditions = $conditions;

            $Newconditions['Tasks.status'] = 'New';
            $NewTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')->where($Newconditions)->all();
            $this->set('NewTasks', $NewTasks);

            $InProgressconditions['Tasks.status'] = 'In Progress';
            $InProgressTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')
                            ->where($InProgressconditions)->all();
            $this->set('InProgressTasks', $InProgressTasks);

            $Resolvedconditions['Tasks.status'] = 'Resolve';
            $ResolvedTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')
                            ->where($Resolvedconditions)->all();
            $this->set('ResolvedTasks', $ResolvedTasks);


            $Closeconditions['Tasks.status'] = 'Close';
            $CloseTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')
                            ->where($Closeconditions)->all();
            $this->set('CloseTasks', $CloseTasks);
        }
    }

    public function qakanban($req_id = null) {

        $this->set('requirement_id', $req_id);

        $this->loadModel('Projects');
        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);



        $this->loadModel('Users');
        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
        $this->set('TeamMembers', $TeamMembers);


        $this->loadModel('ProjectFollowers');
        $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();




        if ($ProjectFollowers) {
            $pconditions['OR'] = ['user_id' => $this->sUser['id'], 'id in ' => $ProjectFollowers];
        } else {
            $pconditions['user_id'] = $this->sUser['id'];
        }


        $this->loadModel('Projects');
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
        $this->set('Projects', $Projects);

        $ProjectIdz = array_keys($Projects);

        if (count($ProjectIdz) == 0) {

            $this->set('NewTasks', []);
            $this->set('InProgressTasks', []);
            $this->set('ResolvedTasks', []);
            $this->set('CloseTasks', []);
        } else {


            $conditions['project_id IN'] = $ProjectIdz;

            $conditions['task_type'] = 'QA';
            if ($req_id != null) {
                $conditions['requirment_id'] = $req_id;
            }

            $Newconditions = $InProgressconditions = $Resolvedconditions = $Closeconditions = $conditions;

            $Newconditions['Tasks.status'] = 'New';
            $NewTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')->where($Newconditions)->all();
            $this->set('NewTasks', $NewTasks);

            $InProgressconditions['Tasks.status'] = 'In Progress';
            $InProgressTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')
                            ->where($InProgressconditions)->all();
            $this->set('InProgressTasks', $InProgressTasks);

            $Resolvedconditions['Tasks.status'] = 'Resolve';
            $ResolvedTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')
                            ->where($Resolvedconditions)->all();
            $this->set('ResolvedTasks', $ResolvedTasks);


            $Closeconditions['Tasks.status'] = 'Close';
            $CloseTasks = $this->Tasks->find()
                            ->contain(['Projects'])
                            ->select($this->Tasks)->select(['Projects.name'])
                            ->group('Tasks.id')
                            ->where($Closeconditions)->all();
            $this->set('CloseTasks', $CloseTasks);
        }
    }

    public function myTasks() {


        $this->loadModel('Projects');
        $this->loadModel('Users');
        $this->loadModel('ProjectFollowers');

        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);

        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers2 = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();

        if ($TeamMembers2) {

            $TeamMembers = $TeamMembers + $TeamMembers2;
        }

        $this->set('TeamMembers', $TeamMembers);

        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['user_id =' => $this->sUser['id'], 'status' => 'ACTIVE'])->toArray();
        $ProjectIdz = array_keys($Projects);
        $this->set('ProjectIdz', $ProjectIdz);
        if (count($ProjectIdz) > 0) {
            $conditions['Tasks.project_id IN'] = $ProjectIdz;
            $conditions['Tasks.status !='] = 'Close';
            $conditions['Tasks.assign_to'] = $this->sUser['id'];

            $Tasks = $this->Tasks->find()->where($conditions)->all();
            $this->set('Tasks', $Tasks);

            $conditions['Tasks.due_date <'] = date('Y-m-d');

            $MyDueTasks = $this->Tasks->find()->where($conditions)->count();
            $this->set('MyDueTasks', $MyDueTasks);
        } else {
            $this->set('Tasks', []);
            $this->set('MyDueTasks', 0);
        }
    }

    public function designList($req_id = null) {


        $this->loadModel('Projects');
        $this->loadModel('Users');
        $this->loadModel('ProjectFollowers');

        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);

        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers2 = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();

        if ($TeamMembers2) {

            $TeamMembers = $TeamMembers + $TeamMembers2;
        }

        $this->set('TeamMembers', $TeamMembers);



        $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();

        if ($ProjectFollowers) {

            $pconditions['OR'] = ['user_id' => $this->sUser['id'], 'id in ' => $ProjectFollowers];
        } else {
            $pconditions['user_id'] = $this->sUser['id'];
        }


        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();

        $this->set('Projects', $Projects);

        $ProjectIdz = array_keys($Projects);

        if (count($ProjectIdz) == 0) {

            $this->set('Tasks', []);
        } else {

            if ($req_id) {

                $conditions['requirment_id'] = $req_id;
            }

            $conditions['project_id IN'] = $ProjectIdz;

            $conditions['task_type'] = 'DESIGN';

            $query = $this->Tasks->find('all')->contain(['Projects'])
                    ->select($this->Tasks)->select(['Projects.name'])
                    ->group('Tasks.id')
                    ->where($conditions);
            $this->paginate['limit'] = 100;
            $this->paginate['order'] = ['Tasks.requirment_id' => 'DESC', 'Tasks.created' => 'DESC',];
            $Tasks = $this->paginate($query, array('url' => '/Tasks/'));
            $this->set('Tasks', $Tasks);
            $this->set('requirement_id', $req_id);
        }
    }

    public function qaList($req_id = null) {
        $this->loadModel('Projects');
        $this->loadModel('Users');
        $this->loadModel('ProjectFollowers');

        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);





        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers2 = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
        if ($TeamMembers2) {
            $TeamMembers = $TeamMembers + $TeamMembers2;
        }
        $this->set('TeamMembers', $TeamMembers);



        $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();




        if ($ProjectFollowers) {
            $pconditions['OR'] = ['user_id' => $this->sUser['id'], 'id in ' => $ProjectFollowers];
        } else {
            $pconditions['user_id'] = $this->sUser['id'];
        }


        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();

        $this->set('Projects', $Projects);

        $ProjectIdz = array_keys($Projects);

        if (count($ProjectIdz) == 0) {

            $this->set('Tasks', []);
        } else {

            if ($req_id) {
                $conditions['requirment_id'] = $req_id;
            }

            $conditions['project_id IN'] = $ProjectIdz;
            $conditions['task_type'] = 'QA';

            $query = $this->Tasks->find('all')->contain(['Projects'])
                    ->select($this->Tasks)->select(['Projects.name'])
                    ->group('Tasks.id')
                    ->where($conditions);
            $this->paginate['limit'] = 100;
            $this->paginate['order'] = ['Tasks.requirment_id' => 'DESC', 'Tasks.created' => 'DESC',];
            $Tasks = $this->paginate($query, array('url' => '/Tasks/'));
            $this->set('Tasks', $Tasks);
            $this->set('requirement_id', $req_id);
        }
    }

    public function qa($project_id = null, $ajax=null) {


        $this->loadModel('Projects');
        $this->loadModel('ProjectFollowers');
        $this->loadModel('Requirments');
        $this->loadModel('Users');

        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $this->set('PriortyType', $this->Projects->PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);

        $TeamMembers[$this->sUser['id']] = 'You';
        $TeamMembers = $TeamMembers + $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
        $this->set('TeamMembers', $TeamMembers);

        $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'project_id', 'valueField' => 'project_id'])->where(['follower_id' => $this->sUser['id'], 'is_updated' => 'YES'])->toArray();
        $pconditions['user_id'] = $this->sUser['id'];
        $Projects = $this->Projects->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where($pconditions)->toArray();
        $this->set('Projects', $Projects);

        if ($project_id != null && $project_id != 'null') {

            $conditions['project_id'] = $project_id;
        }

        if ($ProjectFollowers) {

            $conditions['OR'] = ['project_id in ' => $ProjectFollowers, 'created_by' => $this->sUser['id']];
        } else {

            $conditions['created_by'] = $this->sUser['id'];
        }


        $query = $this->Requirments->find('all')
                ->select($this->Requirments)
                ->Select(['Projects.name', 'Projects.id'])
                ->contain(['Projects'])
                ->where($conditions);
        $this->paginate['limit'] = 100;
        $this->paginate['order'] = ['created' => 'DESC',];
        $Requirments = $this->paginate($query, array('url' => '/Requirments/'));
        $this->set('Requirments', $Requirments);

        $this->set('requirement_id', '');
                if ($ajax == 'ajax') {
            $this->Flash->success(__('QA Task Successfully Created.'));
        }
    }

    public function detail($id = null) {
        $this->loadModel('Projects');
        $this->loadModel('Users');
        $this->loadModel('ProjectFollowers');
        $this->loadModel('TaskComments');

        $this->set('ProjectStatus', $this->Projects->ProjectStatus);
        $PriortyType = $this->Projects->PriortyType;
        $this->set('PriortyType', $PriortyType);
        $this->set('ProjectStatusClass', $this->Projects->ProjectStatusClass);
        $this->set('PriortyTypeClass', $this->Projects->PriortyTypeClass);

        $Task = $this->Tasks->find()
                        ->contain(['Projects'])
                        ->select($this->Tasks)
                        ->select(['Projects.id', 'Projects.name', 'Projects.user_id'])
                        ->group('Tasks.id')
                        ->where(['Tasks.id' => $id])->first();

        $this->set('Task', $Task);

        if ($Task['project']['user_id'] != $this->sUser['id']) {
            $CheckProject = $this->ProjectFollowers->find()->select(['id'])
                            ->where(['follower_id' => $this->sUser['id'], $Task['project']['id'], 'is_updated' => 'YES'])->first();

            if (!$CheckProject) {
                $this->Flash->error(__('You are not athorized to access this task.'));
                return $this->redirect($this->referer());
            }
        }

        $ProjectFollowerIdz = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $Task['project']['id'], 'is_updated' => 'YES'])->toArray();

        $ProjectFollowers = [];

        if (count($ProjectFollowerIdz) > 0) {
            $ProjectFollowers = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['id in ' => $ProjectFollowerIdz])->toArray();
        }

        $this->set('ProjectFollowers', [$this->sUser['id'] => 'You'] + $ProjectFollowers);

        $tData = $this->Tasks->find()
                        ->group('Tasks.id')
                        ->where(['Tasks.id' => $id])->first();


        if ($this->request->is('post') || $this->request->is('put')) {
            $data = $this->request->data;
            $Task = $this->Tasks->patchEntity($Task, $data);
            $this->Tasks->save($Task);

            $edata['user_id'] = $this->sUser['id'];
            $edata['project_id'] = $tData->project_id;
            $edata['requirement_id'] = $tData->requirment_id;
            $edata['task_id'] = $tData->id;
            $edata['type'] = 'Task';
            $edata['status'] = 'ACTIVE';


            if ($tData['status'] != $Task['status']) {

                $edata['description'] = $edata['summary'] = 'Status changed from "' . $tData['status'] . '" to "' . $Task['status'] . '"';
                $this->AppEvents->create_event($edata);
            }

            if ($tData['priority'] != $Task['priority']) {

                $old_priority = 'none';

                if (isset($PriortyType[$tData['priority']])) {
                    $old_priority = $PriortyType[$tData['priority']];
                }

                $new_priority = 'none';

                if (isset($PriortyType[$Task['priority']])) {
                    $new_priority = $PriortyType[$Task['priority']];
                }

                $edata['description'] = $edata['summary'] = 'Priority changed from "' . $old_priority . '" to "' . $new_priority . '"';

                $this->AppEvents->create_event($edata);
            }

            if ($tData['due_date'] != $Task['due_date']) {

                $old_due_date = 'none';

                if ($tData['due_date'] != '' && $tData['due_date'] != '0000-00-00') {
                    $old_due_date = date("M d, Y", strtotime($tData['due_date']));
                }

                $new_due_date = 'none';

                if ($Task['due_date'] != '' && $Task['due_date'] != '0000-00-00') {
                    $new_due_date = date("M d, Y", strtotime($Task['due_date']));
                }

                $edata['description'] = $edata['summary'] = 'Due date changed from "' . $old_due_date . '" to "' . $new_due_date . '"';
                $this->AppEvents->create_event($edata);
            }

            if (!empty($this->request->data['file']['name'])) {

                $result = $this->Upload->upload($this->request->data['file'], $this->tasks_file_path, null, null,  array('jpg','jpeg','gif','png','pdf','doc','docx','zip'));

                if (count($this->Upload->errors) > 0) {
                    unset($this->request->data['file']);
                } else {
                    $data['file'] = $this->Upload->result;
                }
                $edata['description'] = $edata['summary'] = 'Upload a File <a href="' . $this->tasks_file_path . $this->Upload->result . '" download ">' . $this->Upload->result . '</a>';
                $this->AppEvents->create_event($edata);
            }
            if ($data['message'] != '' || isset($this->Upload->result)) {

                if ($data['message'] != '') {
                    $edata['comment_id'] = $result->id;
                    $edata['summary'] = 'Commented';
                    $edata['description'] = 'Commented';
                    
                }
                if (isset($this->Upload->result)) {
                    $data['file'] = $this->Upload->result;
                }
unset($data['id']);
                    $data['created_by'] = $this->sUser['id'];
                    $data['status'] = 'ACTIVE';
                $TaskComments = $this->TaskComments->newEntity();
                $TaskComments = $this->TaskComments->patchEntity($TaskComments, $data);
                $result = $this->TaskComments->save($TaskComments);
                $this->AppEvents->create_event($edata);
            }
            $this->Flash->success(__('Action Successfully Completed.'));
            return $this->redirect(['controller' => 'tasks', 'action' => 'kanban']);
        }


        $this->set('Task', $Task);



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
                        ->select(['Users.id', 'Users.email', 'Users.first_name', 'Users.last_name', 'Users.image'])
                        ->join($joins)
                        ->group('TaskComments.id')
                        ->where(['task_id' => $id])->all();
        $this->set('TaskComments', $TaskComments);

        $actJoins = [
            'users' => [
                'table' => 'users',
                'alias' => 'Users',
                'type' => 'LEFT',
                'conditions' => 'Users.id = AppEvents.user_id'
            ],
        ];


        $AppEvents = $this->AppEvents->find()
                        ->select($this->AppEvents)
                        ->select(['Users.id', 'Users.email', 'Users.first_name', 'Users.last_name', 'Users.image'])
                        ->join($actJoins)
                        ->group('AppEvents.id')
                        ->where(['task_id' => $id])->all();
        $this->set('AppEvents', $AppEvents);
    }

    public function ajaxDetail($id = null) {

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
                        ->select(['Users.id', 'Users.email', 'Users.first_name', 'Users.last_name'])
                        ->join($joins)
                        ->group('TaskComments.id')
                        ->where(['task_id' => $id])->all();
        $this->set('TaskComments', $TaskComments);


        /* 	$this->loadModel('Users');	
          $TeamMembers = $this->Users->find('list', ['keyField' => 'id', 'valueField' => 'email'])->where(['created_by' => $this->sUser['id']])->toArray();
          $this->set('TeamMembers', $TeamMembers);

          $this->loadModel('ProjectFollowers');

          $ProjectFollowers = $this->ProjectFollowers->find('list', ['keyField' => 'follower_id', 'valueField' => 'follower_id'])->where(['project_id' => $id, 'is_updated' => 'YES'])->toArray();
          $this->set('ProjectFollowers', $ProjectFollowers); */
    }

    function saveComment() {

        $this->set('is_ajax', true);
        $this->viewBuilder()->setLayout(false);
        $this->loadModel('TaskComments');
        $retrun = 'false';

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $data['created_by'] = $this->sUser['id'];

            $TaskComments = $this->TaskComments->newEntity();
            $TaskComments = $this->TaskComments->patchEntity($TaskComments, $data);

            if ($result = $this->TaskComments->save($TaskComments)) {

                $retrun = $result->id;

                $TaskComment = $this->TaskComments->find()->where(['id' => $result->id, 'status' => 'ACTIVE'])->first();
                $this->set('TaskComment', $TaskComment);

                $edata['user_id'] = $TaskComment['created_by'];
                $edata['project_id'] = $TaskComment['project_id'];
                $edata['requirement_id'] = $TaskComment['requirment_id'];
                $edata['task_id'] = $TaskComment['task_id'];
                $edata['comment_id'] = $TaskComment['id'];
                $edata['summary'] = 'Commented';
                $edata['description'] = 'Commented';

                $this->loadModel('AppEvents');
                $this->AppEvents->create_event($edata);
            } else {
                echo $retrun;
                exit;
            }
        } else {
            echo $retrun;
            exit;
        }
    }

    function updateStatus() {

        $this->set('is_ajax', true);
        $this->viewBuilder()->setLayout(false);

        $retrun = 'false';

        if ($this->request->is('post') || $this->request->is('put')) {

            $data = $this->request->data;
            $tData = $this->Tasks->find()
                            ->group('Tasks.id')
                            ->where(['Tasks.id' => $data['id']])->first();

            $Task = $this->Tasks->find()
                            ->group('Tasks.id')
                            ->where(['Tasks.id' => $data['id']])->first();

            $Task = $this->Tasks->patchEntity($Task, $data);
            $this->Tasks->save($Task);

            $edata['user_id'] = $this->sUser['id'];
            $edata['project_id'] = $tData->project_id;
            $edata['requirement_id'] = $tData->requirment_id;
            $edata['task_id'] = $tData->id;
            $edata['type'] = 'Task';


            if ($tData['status'] != $Task['status']) {

                $edata['description'] = $edata['summary'] = 'Status changed from "' . $tData['status'] . '" to "' . $Task['status'] . '"';
                $this->AppEvents->create_event($edata);
            }
        }

        exit;
    }

    function updateField() {

        $this->set('is_ajax', true);
        $this->viewBuilder()->setLayout(false);

        $retrun = 'false';



        if ($this->request->is('post') || $this->request->is('put')) {

            //$data = $this->request->data;


            $data['id'] = $this->request->data['md_field_id'];

            $data[$this->request->data['md_field_name']] = $this->request->data[$this->request->data['md_field_name']];

            $tData = $this->Tasks->find()
                            ->group('Tasks.id')
                            ->where(['Tasks.id' => $data['id']])->first();

            $Task = $this->Tasks->find()->where(['id' => $data['id']])->first();
            $Task = $this->Tasks->patchEntity($Task, $data);
            $this->Tasks->save($Task);

            $edata['user_id'] = $this->sUser['id'];
            $edata['project_id'] = $tData->project_id;
            $edata['requirement_id'] = $tData->requirment_id;
            $edata['task_id'] = $tData->id;
            $edata['type'] = 'Task';


            if ($tData['status'] != $Task['status']) {

                $edata['description'] = $edata['summary'] = 'Status changed from "' . $tData['status'] . '" to "' . $Task['status'] . '"';
                $this->AppEvents->create_event($edata);
            }

            if ($tData['priority'] != $Task['priority']) {

                $old_priority = 'none';

                if (isset($PriortyType[$tData['priority']])) {
                    $old_priority = $PriortyType[$tData['priority']];
                }

                $new_priority = 'none';

                if (isset($PriortyType[$Task['priority']])) {
                    $new_priority = $PriortyType[$Task['priority']];
                }

                $edata['description'] = $edata['summary'] = 'Priority changed from "' . $old_priority . '" to "' . $new_priority . '"';

                $this->AppEvents->create_event($edata);
            }

            if ($tData['due_date'] != $Task['due_date']) {

                $old_due_date = 'none';

                if ($tData['due_date'] != '' && $tData['due_date'] != '0000-00-00') {
                    $old_due_date = date("M d, Y", strtotime($tData['due_date']));
                }

                $new_due_date = 'none';

                if ($Task['due_date'] != '' && $Task['due_date'] != '0000-00-00') {
                    $new_due_date = date("M d, Y", strtotime($Task['due_date']));
                }

                $edata['description'] = $edata['summary'] = 'Due date changed from "' . $old_due_date . '" to "' . $new_due_date . '"';
                $this->AppEvents->create_event($edata);
            }



            if ($data['message'] != '') {

                unset($data['id']);
                $data['created_by'] = $this->sUser['id'];

                $this->loadModel('TaskComments');
                $TaskComments = $this->TaskComments->newEntity();
                $TaskComments = $this->TaskComments->patchEntity($TaskComments, $data);
                $result = $this->TaskComments->save($TaskComments);

                $edata['comment_id'] = $result->id;
                $edata['summary'] = 'Commented';
                $edata['description'] = 'Commented';

                $this->AppEvents->create_event($edata);
            }
        }



        exit;
    }
    
        public function fileList($req_id = null) {
        $this->loadModel('Projects');
        $this->loadModel('TaskComments');


            $query = $this->TaskComments->find('all')->contain(['Projects','Requirments'])
                    ->select($this->TaskComments)->select(['Projects.name'])
                    ->group('TaskComments.id');
            $this->paginate['limit'] = 100;
            $this->paginate['order'] = ['TaskComments.requirment_id' => 'DESC', 'TaskComments.created' => 'DESC',];
            $Tasks = $this->paginate($query, array('url' => '/Tasks/'));
          
            $this->set('Tasks', $Tasks);
            $this->set('requirement_id', $req_id);
    }
}
