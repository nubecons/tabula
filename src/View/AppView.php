<?php

/**

 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)

 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 *

 * Licensed under The MIT License

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 * @link      https://cakephp.org CakePHP(tm) Project

 * @since     3.0.0

 * @license   https://opensource.org/licenses/mit-license.php MIT License

 */

namespace App\View;



use Cake\View\View;



/**

 * Application View

 *

 * Your application’s default view class

 *

 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view

 */

class AppView extends View

{



    /**

     * Initialization hook method.

     *

     * Use this method to add common initialization code like loading helpers.

     *

     * e.g. `$this->loadHelper('Html');`

     *

     * @return void

     */

    public function initialize()

    {

		$this->Form->templates(

									  ['dateWidget' => '{{month}}{{day}}{{year}}{{hour}}{{minute}}{{second}}{{meridian}}']

									);

									

        $this->Paginator->templates([

				'nextActive' => '<li class="page-item"><a class="page-link"" rel="next" href="{{url}}">{{text}}</a> </li>',

				'nextDisabled' => '<li class="page-item"><a  class="page-link">{{text}} </a></li>',

				'prevActive' => '<li class="page-item"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',

				'prevDisabled' => '<li class="page-item"><a  class="page-link">{{text}}</a></li>',

				'counterRange' => '{{start}} - {{end}} of {{count}}',

				'counterPages' => '{{page}} of {{pages}}',

				'first' => ' <li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a>  </li>',

				'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a> </li>',

				'number' => '<li class="page-item"><a  class="page-link" href="{{url}}">{{text}}</a> </li>',

				'current' => '<li class="page-item active"><a  class="page-link"> {{text}}</a></li>',

				'ellipsis' => '<li class="page-item"><a  class="page-link">...</a></li>',
			]);									

    }

}

