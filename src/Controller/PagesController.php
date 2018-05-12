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

/**

 * Static content controller

 *

 * This controller will render views from Template/Pages/

 *

 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html

 */
class PagesController extends AppController {

    public function initialize() {

        parent::initialize();

        /* $this->loadComponent('Sendgrid');

          $this->loadComponent('Upload');

          $this->profile_file_path = WWW_ROOT . 'img' .DS. 'profile_pics' . DS;

          $this->user_documents_file_path = WWW_ROOT . 'img' .DS. 'user_documents' . DS;

          $this->allowedImages = array('jpg','jpeg','png','gif','JPG','JPEG','PNG','GIF');

          $this->Session = $this->request->Session(); */
    }

    public function beforeFilter(Event $event) {

        parent::beforeFilter($event);



        $this->Auth->allow(['about','contact','privacy', 'home', 'display']);
    }

  function calendar() {
        $this->set('title', 'Calendar');
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
		
		if($this->sUser){
			
			return $this->redirect('/users/dashboard');
			} 
		
		$this->viewBuilder()->setLayout(false);

       
    }

    /**

     * Displays a view

     *

     * @param array ...$path Path segments.

     * @return \Cake\Http\Response|null

     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.

     * @throws \Cake\Network\Exception\NotFoundException When the view file could not

     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.

     */
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
