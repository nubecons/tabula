<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;



class ProductsTable extends Table

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
	
	
	public $UnitOptoins = ["Square Feet" => "Square Feet" , "Square Yards" => "Square Yards", "Square Meters" =>" Square Meters" , "Marla" => "Marla", "Kanal" => "Kanal"];
	public $BedRooms    = ["-1" => "Studio" , "1" => "1", "2" =>"2" , "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "10+"];
	public $BathRooms   = [ "1" => "1", "2" =>"2" , "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"];
	public $ExpiryDays  = [ "30" => "1 Month", "90" =>"3 Months" , "180" => "6 Months"];
    public $ElectricityBackup = [ "None" => "None", "Generator" =>"Generator" , "Ups" => "Ups" , "Solar" => "Solar" , "Other" => "Other"];
	public $Flooring = [ "Tiles" => "Tiles", "Marble" =>"Marble" , "Wooden" => "Wooden" , "Chip" => "Chip" , "Cement"=>"Cement" , "Other" => "Other"];

}



