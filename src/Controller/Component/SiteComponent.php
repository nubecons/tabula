<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class SiteComponent extends Component	
{

    public  $authMsg = 'Sorry, you do not have permission to access that page.  Please log in again.';



    function checkemail($email = null) {

//        $regexCheck = php_email_regex; //defined in bootstrap.php

//

//        if (preg_match($regexCheck, $email)) {

//            return true;

//        } else {

//            return false;

//        }



        $regexCheck = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel|realtor)$/i';



          if (preg_match($regexCheck, $email)) {

          return true;

          } else {

          return false;

          } 

    }



    function check_emails($emails = null) {

        $nLstEmlAd = array();

        $emlList = explode(',', $emails);



        foreach ($emlList as $emlAd) {

            $vlRs = $this->checkemail($emlAd);



            if ($vlRs !== false) {

                if (!in_array($emlAd, $nLstEmlAd)) {

                    $nLstEmlAd[] = $emlAd;

                }

            } else {

                return false;

            }

        }



        return true;

    }



    function db_date_Format($date) {

        $newdate = explode('-', $date);

        return $newdate[2] . '-' . $newdate[0] . '-' . $newdate[1];

    }



}
?>