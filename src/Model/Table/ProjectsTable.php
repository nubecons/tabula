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
            'Close'=>'Close',
            'Resolve'=>'Resolve',
            'In Progress'=>'In Progress',
            'New' =>'New'
         );
          var $ProjectStatusClass =  array(
            'Close'=>'primary',
            'Resolve'=>'success',
            'In Progress'=>'warning',
            'New'=>'info',
         );
     
    var $PriortyType =  array(
            ''=>'No Priorty',
            '1' => 'Low' ,
            '2' => 'Meduim'  ,
            '3' => 'High'
         );
        var $PriortyTypeClass =  array(
            ''=>'info',
            '1'=>'success',
            '2'=>'warning',
            '3'=>'danger',
         );
	
}



