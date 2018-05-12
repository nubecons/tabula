<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class ProjectCommentsTable extends Table
{

public function initialize(array $config)
    {
	   
	 //  $this->belongsTo('Projects');
	   $this->belongsTo('Projects', [
			'className' => 'Projects',
			'foreignKey' => 'project_id',
		]);
	   
	   /*$this->belongsTo('Users', [
			'className' => 'Users',
			'foreignKey' => 'created_by',
		]);*/

       $this->addBehavior('Timestamp', [

            'events' => [

                'Model.beforeSave' => [

				     'created' => 'new',

					'modified' => 'always',

			    ]

            ]

        ]);

    }
	
}



