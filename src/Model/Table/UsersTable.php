<?php

// src/Model/Table/UsersTable.php

namespace App\Model\Table;



use Cake\ORM\Table;

use Cake\Validation\Validator;

use Cake\Auth\DefaultPasswordHasher;

class UsersTable extends Table

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

	

	

		public function validationPassword(Validator $validator )

    {

        $validator

            ->add('old_password','custom',[

                'rule'=>  function($value, $context){

                    $user = $this->get($context['data']['id']);

                    if ($user) {

                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {

                            return true;

                        }

                    }

                    return false;

                },

                'message'=>'The old password does not match the current password!',

            ])

            ->notEmpty('old_password');

 

        $validator

            /*->add('new_password', [

                'length' => [

                    'rule' => ['minLength', 6],

                    'message' => 'The password have to be at least 6 characters!',

                ]

            ])*/

            ->add('new_password',[

                'match'=>[

                    'rule'=> ['compareWith','confirm_password'],

                    'message'=>'The passwords does not match!',

                ]

            ])

            ->notEmpty('new_password');

        $validator

            /*->add('confirm_password', [

                'length' => [

                    'rule' => ['minLength', 6],

                    'message' => 'The password have to be at least 6 characters!',

                ]

            ])*/

            ->add('confirm_password',[

                'match'=>[

                    'rule'=> ['compareWith','new_password'],

                    'message'=>'The passwords does not match!',

                ]

            ])

            ->notEmpty('confirm_password');



			/*$validator->add('phone_number', [

				'rule' => ['validateUnique'],

				'on' => function ($context) {

					return ($context['data']['group_id'] === 2);

				}

			]);

			*/

			/*$validator->notEmpty('creditcard_number', 'Credit Card is required', function ($context) {

				return $context['data']['payment_method'] === 'credit_card';

			});*/



			/*'emailUnique' => [

                'message' => 'The email you provided is already taken. Please provide another one.',

                'rule' => 'validateUnique', 

                'provider' => 'table'

            ]*/

        return $validator;

    }

	

   /* public function validationDefault(Validator $validator)

    {

        return $validator

            ->notEmpty('username', 'A username is required')

            ->notEmpty('password', 'A password is required')

            ->notEmpty('role', 'A role is required')

            ->add('role', 'inList', [

                'rule' => ['inList', ['admin', 'author']],

                'message' => 'Please enter a valid role'

            ]);

    }*/





public function findAuth(\Cake\ORM\Query $query, array $options)

	{

		$query

			->select(['id', 'first_name', 'last_name', 'email', 'password' ,'group_id']);

		

		return $query;

	}



public function validatePassword($data){

        

		 $error = '';	

		 

		  if (empty($data['password']))

			  $error .= 'Please enter a password<br />';

		   else if (empty($data['confirm_password']))

			  $error .= 'Please enter your password twice<br />';

		   else if ($data['password'] != $data['confirm_password'])

			  $error .= 'Your password must be entered the same in both password fields<br />';



           return $error ;		 

	}	





public function create_account($data = []){
		
		 $errors = '';
	
		if(isset($data['id']))
		  {
		    $udata = $this->get($data['id']);
		  }else{
	
			$udata = $this->newEntity();
			
			$check_email = $this->find()->where(['email' => $data['email']])->first();
			
			if($check_email){
				
				return $errors = 'This email already registered.';
				
				}
		  }

    	  $udata = $this->patchEntity($udata, $data);

    	  if($this->save($udata)){

		   return TRUE;

		  }
		 return $errors = 'The user could not be saved. Please, try again.';
	 }	
}