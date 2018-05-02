<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class AdvertisementsTable extends Table

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
	
	
	public $AdvertisementPaidStatus = ["YES" => "YES" , "NO" => "NO"];
        public $AdvertisementStatus = ["ACTIVE" => "ACTIVE" , "INACTIVE" => "INACTIVE"];

}



