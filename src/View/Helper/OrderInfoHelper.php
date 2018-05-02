<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\TableRegistry;

class OrderInfoHelper extends Helper
{
	
	public function initialize(array $config)
    {
       
    }
	
  function computePaymentDueDate($orderID='',$appointment_date_time = '', $isAppointmentDateTBD = FALSE , $dateFormate = 'm/d/y h:i a')
   {
	     if ($isAppointmentDateTBD)
      {
		  $ObjOrderLog = TableRegistry::get('OrderLog');
		  $OrderLog = $ObjOrderLog->find()->select(['id' , 'dateCreated'])->where(['orderID' => $orderID , 'status_changed_to' => ORDER_STATUS_COMPLETION_PENDING ])->first();
	
	      if(!$OrderLog){
			  return false;
			  }
	
         $due_date = $OrderLog->dateCreated;
      } else {
         $due_date = $appointment_date_time;
	  }

      // add 15 days
      //$due_date += (60 * 60 * 24 * 15);
     
	  return date( $dateFormate , strtotime($due_date. ' + 15 days'));
     
    
   }
   
   function isStatus($status , $check_status){
	   
			/*if($check_status == ORDER_STATUS_ON_HOLD){
			array_walk(debug_backtrace(),create_function('$a,$b','error_log( "Called isStatus instead of isonhold() {$a[\'function\']}()(".basename($a[\'file\']).":{$a[\'line\']}); ");'));
			return (boolean)($status & ORDER_STATUS_ON_HOLD);
			}
			
			if($check_status == ORDER_STATUS_CANCELLED){
			array_walk(debug_backtrace(),create_function('$a,$b','error_log( "Called isStatus instead of iscancelled() {$a[\'function\']}()(".basename($a[\'file\']).":{$a[\'line\']}); ");'));
			return (boolean)($status & ORDER_STATUS_CANCELLED);
			}
		*/	
			return (boolean)($status & $check_status);
	   
	 
	   
	   }
   
   /**
     * Indicates if this order has been Received by the notary yet.
     * (corresponds to system status of received OR GREATER)
     *
     * @return boolean TRUE if this order has been received, FALSE otherwise.
     *
     * @access public
     *
     */
	 //hasBeenReceived
   function orderStatus($orderID , $status)
   {

    	  $ObjOrderLog = TableRegistry::get('OrderLog');
		  $log_item = $ObjOrderLog->find()->select()->
		  where(['orderID' => $orderID , '(status_changed_to & ' .$status . ') > 0 ' ])->first();
	     
		 
		
		 return (boolean)($log_item);
		 
		

   }
   
   
   /**
     * Get Displayable Status
     *
     * @param boolean $show_former_status When TRUE and the order
     *                                    is on hold or cancelled,
     *                                    the status of the order 
     *                                    before cancellation or 
     *                                    being put on hold is also 
     *                                    shown (OPTIONAL: default=TRUE).
     *
     * @return string The status of this order in displayable (string) format.
     *
     * @access public
     *
     */
   function getDisplayableOrderStatus($status , $show_former_status=FALSE)
   {

      global $Displayable_Order_Statuses;
      $prepend = array();
      $return_value = array();

      $i = 1;
      $j = 0;
      while ($j < sizeof($Displayable_Order_Statuses))
      {

         if ($i == ORDER_STATUS_ON_HOLD)
         {
            if ($status == ORDER_STATUS_ON_HOLD)
               $prepend[] = $Displayable_Order_Statuses[$i];
            $i *= 2;
            $j++;
            continue;
         }elseif ($i == ORDER_STATUS_CANCELLED){
            if ($status == ORDER_STATUS_CANCELLED)
               $prepend[] = $Displayable_Order_Statuses[$i];
            $i *= 2;
            $j++;
            continue;
         }

         if ($status == $i)
            $return_value[] = $Displayable_Order_Statuses[$i];

         $i *= 2;
         $j++;

      }

      if (!empty($prepend))
      {
         $prepend = implode(', ', $prepend);
         if (!empty($return_value) && $show_former_status)
            $prepend .= ' (Was: ' . implode(', ', $return_value) . ')';
         return $prepend;
      }

      return implode(', ', $return_value);

   }


   
   /**
     * Get Displayable Client Status
     *
     * @param boolean $show_former_status When TRUE and the order
     *                                    is on hold or cancelled,
     *                                    the status of the order
     *                                    before cancellation or
     *                                    being put on hold is also
     *                                    shown (OPTIONAL: default=TRUE).
     *
     * @return string The status of this order in displayable (string) format.
     *
     * @access public
     *
     */
   function getDisplayableClientOrderStatus($status , $show_former_status=TRUE)
   {

      global $Displayable_Client_Order_Statuses, $Displayable_Order_Statuses;
	
     $prepend = array();
      $return_value = array();

      $i = 1;
      $j = 0;
      while ($j < sizeof($Displayable_Order_Statuses))
      {

         if ($i == ORDER_STATUS_ON_HOLD)
         {
            if ($status == ORDER_STATUS_ON_HOLD)
               $prepend[] = $Displayable_Order_Statuses[$i];
            $i *= 2;
            $j++;
            continue;
         }elseif ($i == ORDER_STATUS_CANCELLED){
            
			if ($status == ORDER_STATUS_CANCELLED)
			   $prepend[] = $Displayable_Order_Statuses[$i];
            $i *= 2;
            $j++;
            continue;
         }

         if ($status == $i)
         {
            // found a status, need to remap to client status
            //
            foreach ($Displayable_Client_Order_Statuses as $client_status => $display)
               if (($client_status & $i) > 0)
               {
                  $return_value[] = $display;
                  break;  // only one mapped status is possible
               }
         }

         $i *= 2;
         $j++;

      }

      if (!empty($prepend))
      {
         $prepend = implode(', ', $prepend);
         if (!empty($return_value) && $show_former_status)
            $prepend .= ' (Was: ' . implode(', ', $return_value) . ')';
         return $prepend;
      }

      return implode(', ', $return_value);

   }	
   
   /**
     * Get Displayable Notary Status
     *
     * @param boolean $show_former_status When TRUE and the order
     *                                    is on hold or cancelled,
     *                                    the status of the order 
     *                                    before cancellation or 
     *                                    being put on hold is also 
     *                                    shown (OPTIONAL: default=TRUE).
     *
     * @return string The status of this order in displayable (string) format.
     *
     * @access public
     *
     */
   function getDisplayableNotaryOrderStatus($status, $notary_payment_status , $show_former_status=TRUE)
   {

      global $Displayable_Notary_Order_Statuses, $Displayable_Order_Statuses;
      $prepend = array();
      $return_value = array();

      if ($status == ORDER_STATUS_CANCELLED)
         $prepend[] = $Displayable_Order_Statuses[ORDER_STATUS_CANCELLED];
      if ($status == ORDER_STATUS_ON_HOLD)
         $prepend[] = $Displayable_Order_Statuses[ORDER_STATUS_ON_HOLD];

      $i = 1;
      $j = 0;
      while ($j < sizeof($Displayable_Notary_Order_Statuses))
      {
		 
         //if ($this->isNotaryStatus($i))
		   if ($notary_payment_status == $i)
            $return_value[] = $Displayable_Notary_Order_Statuses[$i];

         $i *= 2;
         $j++;

      }

      if (!empty($prepend))
      {
         $prepend = implode(', ', $prepend);
         if (!empty($return_value) && $show_former_status)
            $prepend .= ' (Was: ' . implode(', ', $return_value) . ')';
         return $prepend;
      }

      return implode(', ', $return_value);

   }

  
	
	  /**
     * Get Appointment Date Time
     *
     * @param string  $format Optional format string, wherein
     *                        a formatted date string is returned
     *                        instead of a timestamp (default; not used)
     *                        All valid PHP date() format strings are
     *                        supported.
     * @param boolean $raw    When TRUE, only a timestamp will be
     *                        returned, even if the date is TBD,
     *                        and even if a $format string is given
     *                        (OPTIONAL; default = FALSE).
     *
     * @return mixed The target appointment date and time for this order;
     *               if the Date is still TBD, "TBD" is returned.
     *
     * @access public
     *
     */
   function getAppointmentDateTime($appointment_date_time ,$appointment_date_TBD ,$appointment_time_TBD , $format='', $raw=FALSE)
   {
      if ($raw)
         return $appointment_date_time;

     if ($appointment_date_TBD == 'YES') return 'TBD';

      $return_value = strtotime($appointment_date_time);


      // for time TBD, just subtract the time of day off
      // so it looks like midnight (0:00:00)
      //
      if ($appointment_time_TBD == 'YES') 
      {
         list($mon, $day, $year) = explode('-', date('m-d-Y', $return_value));
         $return_value = csMkTime(0, 0, 0, $mon, $day, $year);
      }


      if (empty($format))
         return $return_value;
      else
      {
		   if($format == 'yes'){
		   $r_date = $return_value;
  		   $return_value = date('F j, Y', $return_value);
		   $return_value .= "\nTime: ".date('g:i A', $r_date);
		   }else{
		   $return_value = date($format, $return_value);
		   }

         // for time TBD, if we can find the time figure in the formatted
         // output, replace it with "TDB", otherwise, give it back as midnight
         //
         if ($appointment_time_TBD == 'YES'){
             
			 $return_value = preg_replace('/\d{1,2}:\d{1,2}(\s*[AaPpMm]{2}|)/', 'TBD', $return_value);
		 }
		 
         return $return_value;
      }

   }
   
   
    /**
     * Determine total current client payment due for this order.
     * INCLUDES any payments made by client; net payment due at current time.
     *
     * @return float Total order payment outstanding.
     *
     * @access public
     *
     */
   function calculateTotalOrderClientPaymentOutstanding($order)
   {

      

      $payment_due = $this->calculateTotalOrderClientFee($order)
                   - $order->total_client_invoice_payment;

      return $payment_due;

   }



   /**
     * Formats output of calculateTotalOrderClientPaymentOutstanding()
     *
     */
   function getTotalOrderClientPaymentOutstanding($order)
   {
      return '$' . sprintf('%.2f', $this->calculateTotalOrderClientPaymentOutstanding($order));
   }



   /**
     * Determine total client payment fee for this order.
     * DOES NOT INCLUDE any payments made by client; just
     * raw order cost.
     *
     * @return float Total order fee to client.
     *
     * @access public
     *
     */
   function calculateTotalOrderClientFee($order)
   {

      

      $total_fee = $order->client_fee_base
                 + (castToBoolean($order->client_double_pkg_fee_used) ? $order->client_double_pkg_fee : 0)
                 + (castToBoolean($order->client_email_fax_fee_used) ? $order->client_email_fax_fee : 0)
                 + (castToBoolean($order->client_cancellation_trip_fee_used) ? $order->client_cancellation_trip_fee : 0)
                 + (castToBoolean($order->client_other_fee_used) ? $order->client_other_fee : 0);

      return $total_fee;

   }
   
   
    /**
     * Get Client Contact Name
     *
     * @return string The first and last names of the clsent 
     *                who submitted this signing request, or
     *                empty string if missing client ID.
     *
     * @access public
     *
     */
   function getClientContactName($clientID)
   {
    
      if (!$clientID)
         return '';
		 
	  $ObjUsers = TableRegistry::get('Users');
	  $client = $ObjUsers->find()->select(['id' , 'first_name' , 'last_name'])->where(['id' => $clientID])->first();
	
	  return $client->first_name . ' ' . $client->last_name;
   }
   
   function getUserData($id , $fields =[])
   {
    
      if (!$id)
         return '';
		 
	  $ObjUsers = TableRegistry::get('Users');
	
	  return $user_data = $ObjUsers->find()->select($fields)->where(['id' => $id])->first();
	
   }
   
/**
     * Returns All (Signing Location) States Found In Entire Database Of Orders
     *
     * NOTE that this is a STATIC method, and does not reference any
     * class variable values in an instantiated object.
     *
     * @return array An array of states 
     *
     * @access public
     *
     */
   function SigningLocationStates()
   {
     $ObjOrders = TableRegistry::get('Orders');
	 return $States = $ObjOrders->find('list', ['keyField' => 'signing_location_state',
											'valueField' => 'signing_location_state'
										   ])
							 			   
						     ->where()
							 ->group('signing_location_state')
							 ->order('signing_location_state')
							 ->toArray();
  
   }
   
   
   /**
     * Returns All (Signing Location) Cities In The Given State 
     * Found In Entire Database Of Orders (or all Cities if no
     * State given)
     *
     * NOTE that this is a STATIC method, and does not reference any
     * class variable values in an instantiated object.
     *
     * @param string $state The state within which to search for cities
     *                      if given as empty string, gathers all cities
     *                      for all states (OPTIONAL; default empty).
     *
     * @return array An array of cities 
     *
     * @access public
     *
     */
   function SigningLocationCitiesByState($state='')
   {
	    $where = '';
		
		if($state != ''){
		  $where = 'signing_location_state = "' . $state . '"';
		}
		
	    $ObjOrders = TableRegistry::get('Orders');
	    return $cities = $ObjOrders->find('list', ['keyField' => 'signing_location_city',
											'valueField' => 'location_city_state'
										   ])
							 			   
						     ->where($where)
							 ->group('signing_location_city')
							 ->order(['signing_location_state' , 'signing_location_city' ])
							 ->toArray();
	   
   }
   
   function getBranchOffice($id , $more_fields = null){
	    
		$ObjBranchOffices = TableRegistry::get('BranchOffices');
		$fields = ['id' , 'companyID' ,'name','address','city','state','zip_code','business_number'];
	/*	if(count($more_fields) > 0)
		  {
			  $fields = $fields  + $more_fields ;
		   }*/
		
	  return	$BranchOffices = $ObjBranchOffices->find()
	  							->select($fields)
								->where(['id' => $id])
								->first();
	
	   
	   }
	   
	 function getCompany($id){
	    
		$ObjCompany = TableRegistry::get('Companies');
	    return $ObjCompany = $ObjCompany->find()
	  						  ->where(['id' => $id])
							  ->first();
	
	   
	   } 
   
     function DisplayPhoneNumber($PhoneNum){
	
					if(!$PhoneNum || $PhoneNum == '' ){
					    return "";
						}
						
					$PhoneNum=  str_replace('(', '', $PhoneNum);
					$PhoneNum=  str_replace(')', '', $PhoneNum);
					$PhoneNum=  str_replace('-', '', $PhoneNum);
					$PhoneNum=  str_replace(' ', '', $PhoneNum);

					if(strlen($PhoneNum)==10){
						return "($PhoneNum[0]"."$PhoneNum[1]"."$PhoneNum[2]) "."$PhoneNum[3]"."$PhoneNum[4]"."$PhoneNum[5]-"."$PhoneNum[6]"."$PhoneNum[7]"."$PhoneNum[8]"."$PhoneNum[9]";
					}else{
						return $PhoneNum;
					}
					
					
				}
}
