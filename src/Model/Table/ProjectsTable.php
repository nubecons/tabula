<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class ProjectsTable extends Table

{

public function initialize(array $config)

    {

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
    
         var $ProjectStatus =  array(
            'active'=>'Active',
            'closed'=>'Closed',
            'pending'=>'Pending',
         );
          var $ProjectStatusClass =  array(
            'active'=>'label-success',
            'closed'=>'label-default',
            'pending'=>'label-warning',
         );
     
    var $PriortyType =  array(
            ''=>'No Priorty',
            '1' => 'Low' ,
            '2' => 'Meduim'  ,
            '3' => 'Heigh'
         );
        var $PriortyTypeClass =  array(
            ''=>'label-danger',
            '1'=>'label-danger',
            '2'=>'label-success',
            '3'=>'label-warning',
         );
	
}



