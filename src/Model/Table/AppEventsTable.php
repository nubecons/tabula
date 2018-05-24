<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;

class AppEventsTable extends Table

{

public function initialize(array $config)

    {

       $this->addBehavior('Timestamp', [
            'events' => [
                'Model.beforeSave' => [
				     'created' => 'new',
 					 'modified' => 'always',
			    ]
            ]
        ]);
    }

	

	


public function create_event($data = []){
		
		
          $return = [];
		  $edata = $this->newEntity();
    	  $edata = $this->patchEntity($edata, $data);

    	  if($result = $this->save($edata)){
				$return['status'] = 'success';
				$return['id'] = $result->id;
				$return['message'] = 'Event created.';
		  }else{
			 $return['status'] = 'fail';
			 $return['message'] = 'Event could not created';  
			  }
		
		return $return;	  
		
	 }	
}