<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class GetInfoHelper extends Helper
{
	
	public function initialize(array $config)
    {
       
    }


  function getUserData($id , $fields =[])
   {
    
      if (!$id)
         return '';
		 
	  $ObjUsers = TableRegistry::get('Users');
	  return $user_data = $ObjUsers->find()->select($fields)->where(['id' => $id])->first();
	
   }
   
  function getCity($id, $fields =[]){

		$ObjCities = TableRegistry::get('Cities');
	    return  $ObjCities->find()->select($fields)->where(['id' => $id])->first();

	   } 

  function getLocation($id, $fields =[]){

		$ObjLocations = TableRegistry::get('Locations');
	    return  $ObjLocations->find()->select($fields)->where(['id' => $id])->first();

	   } 


 function getProductCount($conditions = []){

	 $Products = TableRegistry::get('Products');
     return  $Products->find()->where($conditions)->count();

	   } 
 function getLocationCount($conditions = []) {

        $Locations = TableRegistry::get('Locations');
        return $Locations->find()->where($conditions)->count();
    }

    function getProductCityCount($conditions = []){

	 $Products = TableRegistry::get('Products');

	 return  $Products->find('list', [
		'keyField' => 'city_id',
		'valueField' => 'count'
		])
		->select([
		'city_id',
		'count' => $Products->find()->func()->count('*')
		])
		->where($conditions)
		->group('city_id')
		->order(['count' => 'DESC'])
		->limit(150)
		->toArray();
         
		//  return  $Products->find()->where($conditions)->count();

	   } 
	   
function getProductLocationCount($conditions = []){

	 $Products = TableRegistry::get('Products');

	 return  $Products->find('list', [
		'keyField' => 'location_id',
		'valueField' => 'count'
		])
		->select([
		'location_id',
		'count' => $Products->find()->func()->count('*')
		])
		->where($conditions)
		->group('location_id')
		->order(['count' => 'DESC'])
		->limit(150)
		->toArray();
         
		//  return  $Products->find()->where($conditions)->count();

	   } 	   

   
}
