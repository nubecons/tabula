<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class TasksTable extends Table

{

public function initialize(array $config)
    {
		
	   $this->belongsTo('Projects');	
		//$this->hasOne('Addresses');
       $this->addBehavior('Timestamp', [

            'events' => [

                'Model.beforeSave' => [

				     'created' => 'new',
        			 'modified' => 'always',

			    ]

            ]

        ]);

    }
	
	
public $priorityOptions =	['1' => 'Low' , '2' => 'Meduim'  , '3' => 'High'];
	
}



