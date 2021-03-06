<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class RequirmentCommentsTable extends Table
{

public function initialize(array $config)
    {
	   $this->belongsTo('Requirment');

       $this->addBehavior('Timestamp', [

            'events' => [

                'Model.beforeSave' => [

				     'created' => 'new',

                    'dateCreated' => 'new',

                    'last_updated' => 'always',

					'modified' => 'always',

			    ]

            ]

        ]);

    }
	
}



