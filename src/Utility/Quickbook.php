<?php
 namespace App\Utility;
 
 require_once '../webroot/quickbooks/quickbooks_hook.php';
/**
  * Central Signing Website
  *
  * Copyright (c) 2006 Cybersense
  *
  * Quickbook.php
  *
  * Contains lists that are commonly used to construct
  * drop down widgets in the interface.
  *
  */



/**
  * Availability List
  *
  */



class Quickbook
{
    
    
    public function Connect(){
  
    }
    
    
    public function Call_quickbooks_hook($action, $id, $add_if_missing){
        quickbooks_hook($action, $id, $add_if_missing);
    }
    
    
    public function Call_testQuickBookInvoiceAdd(){
        testQuickBookInvoiceAdd();
    }
	
}
?>
