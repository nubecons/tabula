<?php
namespace App\Controller;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;

class PagesController extends AppController {

    public function initialize() {

        parent::initialize();
    }

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);

        $this->Auth->allow(['about', 'contact', 'privacy', 'home', 'display']);
    }

    function calendar() {

        $this->set('title', 'Calendar');
        $this->viewBuilder()->setLayout(false);
        $TasksArray = [];
        $this->loadModel('Tasks');
        $Tasks = $this->Tasks->find()->all();
        foreach ($Tasks as $tData) {
            $edata['id'] = $tData->id;
            $edata['title'] = $tData->title;
            $edata['due_date'] = $tData->due_date;
            $TasksArray[] = $edata;
        }
        $TasksJson = json_encode($TasksArray);
        $this->set('TasksJson', $TasksJson);
      
    }

    function about() {
        $this->set('title', 'About');
    }

    function contact() {
        $this->set('title', 'Contact Us');
    }

    function privacy() {
        $this->set('title', 'Privacy Policy');
    }

    function home() {

        if ($this->sUser) {

            return $this->redirect('/users/dashboard');
        }

        $this->viewBuilder()->setLayout(false);
    }

    public function display(...$path) {


        return $this->redirect('/');
        $count = count($path);

        if (!$count) {

            return $this->redirect('/');
        }

        if (in_array('..', $path, true) || in_array('.', $path, true)) {

            throw new ForbiddenException();
        }

        $page = $subpage = null;



        if (!empty($path[0])) {

            $page = $path[0];
        }

        if (!empty($path[1])) {

            $subpage = $path[1];
        }

        $this->set(compact('page', 'subpage'));



        try {

            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {

            if (Configure::read('debug')) {

                throw $exception;
            }

            throw new NotFoundException();
        }
    }

}
