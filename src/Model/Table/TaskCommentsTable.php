<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class TaskCommentsTable extends Table
{

public function initialize(array $config)
    {
	   $this->belongsTo('Requirments');  
           $this->belongsTo('Projects');

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



