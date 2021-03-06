<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class RequirmentsTable extends Table
{

public function initialize(array $config)
    {
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



