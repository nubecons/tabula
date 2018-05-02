<?php
//Use: App::import('Lib','Utils');

class Utils {
    //private $getLastQuery_dbo;
    //private $oldStateFullDebug;
    
    //***The next two must be used on after the other, with a single DB query between: **************
    //$model is the model that will be doing the query:
  /*  public function getLastQuery_setup($model) {
        $this->getLastQuery_dbo = $model->getDatasource();
        $this->oldStateFullDebug = $this->getLastQuery_dbo->fullDebug;
        $this->getLastQuery_dbo->fullDebug = true;    
    }
    
    //returns: string containing the last query:
    public function getLastQuery_result() {
        if(!$this->getLastQuery_dbo)
            return FALSE;
        
        $logs = $this->getLastQuery_dbo->getLog();
        $lastLog = end($logs['log']);
        $retVal = $lastLog['query'];
        $this->getLastQuery_dbo->fullDebug = $this->oldStateFullDebug;
        return $retVal; 
    }
   */
    public function getLastQueries($model) {
        $log = $model->getDataSource()->getLog(false, false);
        return $log;
    }
   
    //***********************************************************************************************
    //Cast all values in an associative array to be ints.
    public static function castValsToInt(&$inArray) {
        foreach($inArray as $idx => $value) {
            $inArray[$idx] = (int)$value;
        }
        
        return $inArray;
    }
    
    //Clean string input to a common standard:
    public static function trim_n_clean($str) {
        //replace any ascii extended chars with spaces; these chars were, for one thing, causing contact import to choke:    
        $str = preg_replace('/[\x80-\xFF]/', ' ', $str);
        $str = trim($str);  
        return $str;
    } 

    /*****************
    * string_to_ascii()
    * 
    * Useful to debug parse sources, etc.  Dump result using var_dump().
    *****************/ 
    public static function string_to_ascii($in)
    {
        $output = array();
        foreach(str_split($in) as $idx=>$chr)
            $output[$idx] = "{'" . $chr . "'," . ord($chr) . '}';
        
        return $output;
    }
        
    public static function varToStr($var) {
        ob_start();
        var_dump($var);
        $myResult = ob_get_clean(); 
        ob_end_flush();
        
        return $myResult;
    }
        
    //$uploadType must be one of: GIF, PNG or JPG
    public static function imageCreate($uploadType, $file)
    {
        try {
            //increase memory limit on this request only.
            //Note: this seems to need to include php and cake objects as well as the image, so it
            //need to be big enough for all of it.  '-1' would allow unlimited memory (of that available on 
            //server) but this seems dangerous.         
            ini_set('memory_limit', '128M');
            
            switch ($uploadType) {
                case 1: $srcImg = imagecreatefromgif($file['tmp_name']); break;
                case 2: $srcImg = imagecreatefromjpeg($file['tmp_name']); break;
                case 3: $srcImg = imagecreatefrompng($file['tmp_name']); break;
                default: throw new Exception("Image upload error: File type must be GIF, PNG, or JPG to resize.");
            }
        }
        catch( Exception $e ) {
            throw $e;    
        }
        
        return $srcImg;
    }
    
    public static function cal_to_mysql_date_format($date) {
		$expC ='-';
		if(strpos($date , '/') == true){
			$expC ='/';
			}
        $newdate = explode($expC, $date);
        return $newdate[2] . '-' . $newdate[0] . '-' . $newdate[1];
    }

    //Checks if system process with given function name is running on the server
    //*in addition to the current running process* which is assumed to be a process with the same name:
    public static function already_running($fName) {
        //check the system to look for common processes:    
        exec("ps aux | grep -E '/" . $fName . "$'", $output);
        
        //we will get a row for every matching process. The currently running process
        //is "1", so if we have more than 1...than we can say another one is already running: 
        if(count($output) <= 1)
            return FALSE;
        else            
            return TRUE;
    }
	
	 //Checks if system process with given function name is running on the server and how much instance is running
    //*in addition to the current running process* which is assumed to be a process with the same name:
    public static function total_already_running($fName) {
        //check the system to look for common processes:    
        exec("ps aux | grep -E '/" . $fName . "$'", $output);
        
        //we will get a row for every matching process. The currently running process
        //is "1", so if we have more than 1...than we can say another one is already running: 
		
		return count($output);
		
		 }
    
    //Encodes a string, at the time of writing used only for email addresses to be passed by URL:
    public static function curaytorEncode($strIn = '') {
        if(empty($strIn) || Brand_Code != 100) //!Curaytor:
            return $strIn;
        
        $retStr = mcrypt_encrypt(MCRYPT_3DES, 'testKey', $strIn, MCRYPT_MODE_ECB);
        $retStr = base64_encode($retStr);
        $retStr = urlencode($retStr);
        
        return $retStr;
    }
    
    //mainly for testing only:
    public static function curaytorDecode($strIn = '') {
        if(empty($strIn) || Brand_Code != 100) //!Curaytor:
            return $strIn;
        
        $retStr = urldecode($strIn);
        $retStr = base64_decode($retStr);
        $retStr = mcrypt_decrypt(MCRYPT_3DES, 'testKey', $retStr, MCRYPT_MODE_ECB);
        
        return $retStr;
    }    
    
    //scans the input for any links, encodes the incoming email and tacks it on the end of all URLs: 
    public static function curaytorAddCodeToUrls($strIn = '', $emailIn = '', $taggableDomains = array()) {
        if(!(defined('Brand_Encode_To_Addr_Active')))
            return $strIn;
        
        if(empty($strIn) || empty($emailIn) || Brand_Code != 100 /*!Curaytor:*/ || !Brand_Encode_To_Addr_Active)
            return $strIn;
    
        //URL pattern:    
        //$pattern = php_url_regex; //C wants just within hrefs:
        $pattern = "/href\s*=\s*['\"](.*?)['\"]/im";
        //grab all URL matches:
        if(!preg_match_all($pattern, $strIn, $results)) {
            return $strIn;
        }
        
        //results come back in two dimensional array, element 0 is whole match, element 1 is just the urls:
        $results = $results[1];

        // #1826
        $domainArray = array();
        // This is needed to transform the query results to a flat array for searching
        // Could not figure out how to disable Cake returning the model with the results (makes it an array of objects)
        foreach ($taggableDomains as $r) {
            $domainArray[ $r['TaggableDomain']['domain'] ] = 1; // going to do a fast_in_array() lookup
        }

        //build a replacement array for each URL in the $results array:
        foreach($results as $idx => $result) {
            
            $domain = parse_url($result, PHP_URL_HOST);
            
            if($domain && self::fast_in_array($domain, $domainArray)) {
                $replaces[$idx] = self::curaytorAddCodeToUrlField($result, $emailIn);
            } else {
                $replaces[$idx] = $result;
            }
        }
        // !#1826

        //Now grab everything around the URLs and save it in an array:
        $splices =  preg_split($pattern, $strIn);
        
        //Now put the content back together using the three arrays; first stick the first splice back on the return value:
        $retVal = $splices[0];
        
        foreach($replaces as $idx => $replace) {
            //if the URL had any of these conditions, we want to use the original URL again instead of the replacement:
            if(
                //strstr($replace, "@") ||             //no emails
                strstr($replace, "crm") //none of our addresses
//this was for straight URL matches. We might want to keep this around for awhile before deleting comment:
//               || preg_match("~^(?:\s*<\/a>)|(?:\s*<\/span>)~i", $splices[$idx + 1]) == 1 //do not encode if next none whitespace substring
//                                                                                        //is case insensitive '</a>' or '</span>' (URL is displayed text)
            ) {
                //re: the href part: split process verses URL arrays results in pulling out href part that needs to go back in.
                //We know we matched an href originally...so just put them back in:    
                $retVal .= "href='" . $results[$idx] . "'" . $splices[$idx + 1];
            }
            else {                
                $retVal .= "href='" . $replace . "'" . $splices[$idx + 1];
            }
        }

        return $retVal;
    }
    
    //Adds the code to a single URL field: 
    public static function curaytorAddCodeToUrlField($urlIn = '', $emailIn = '') {
        if(!(defined('Brand_Encode_To_Addr_Active')))
            return $urlIn;
        
        if(empty($urlIn) || empty($emailIn) || Brand_Code != 100 || !Brand_Encode_To_Addr_Active) //!Curaytor:
            return $urlIn;
        
        $retVal = $urlIn . (strstr($urlIn, "?") ? "&" : "?") . "token=" . self::curaytorEncode($emailIn);
        return $retVal;
    }

    /**
     * Iterative binary search for exact string in array
     *
     * @param int $str The target to search
     * @param array $array The sorted array
     * @param array $left First index of the array to be searched
     * @param array $right Last index of the array to be searched
     * @return int The index of the search key if found, otherwise FALSE 
     */
    public static function binary_search_exact_string($str, $array) {
        $left = 0;
        $right = count($array) - 1;
    
        while ($left <= $right) {
            $mid = floor(($left + $right)/2);
            $comp = strcmp($array[$mid], $str);   
            
            if($comp === 0) {
                return $mid;
            } elseif ($comp > 0) {
                $right = $mid - 1;
            } elseif ($comp < 0) {
                $left = $mid + 1;
            }
        }
    
        return FALSE;
    }
    
    /**
     * @param int $web Cause output to be formatted for html if TRUE.
     * @return Nothing; exit.
     */
    public static function clear_cache($web = 0) {
        $key = "cache_test_key";
        $value = "set";
        
        $out_end = $web ? "<br>\n" : "\n";
         
        //We want to explicitely set clearing a known cache item, but this guy seems to end up calling Lib/billing::initialize
        //somehow and blowing up on line 39, using a ChargeBee constant that won't be defined for Curaytor (on Curaytor). Need
        //to research why it would call initialize in billing:
        Cache::write($key, $value);
        echo $key . " = \"" . Cache::read($key) . "\"" . $out_end;
            
        Cache::clear();
        clearCache();

        $files = array();
        $files = array_merge($files, glob(CACHE . '*')); // remove cached css
        $files = array_merge($files, glob(CACHE . 'css' . DS . '*')); // remove cached css
        $files = array_merge($files, glob(CACHE . 'js' . DS . '*'));  // remove cached js           
        $files = array_merge($files, glob(CACHE . 'models' . DS . '*'));  // remove cached models           
        $files = array_merge($files, glob(CACHE . 'persistent' . DS . '*'));  // remove cached persistent           

        foreach ($files as $f) {
            if (is_file($f)) {
                unlink($f);
            }
        }

        if(function_exists('apc_clear_cache')):      
        apc_clear_cache();
        apc_clear_cache('user');
        endif;

        // Explicitly clear cake core and model caches
        Cache::clear(false, '_cake_core_');
        Cache::clear(false, '_cake_model_');

        echo "Cache Cleared." . $out_end;
        echo $key . " = \"" . Cache::read($key) . "\"" . $out_end;
        echo "clear_cache Done." . $out_end;
        exit;
    } //function clear_cache()
	
	// Calculate Percentage 
	// This function has been moved here from SiteHelper
	public static function calculatePercentage($total, $subset) {
        if ($total == 0) {
            return FALSE;
        }

        return round(($subset / $total) * 100, 2);
    }
    
    public static function unixToMySQLTime($timestamp) {
        return date('Y-m-d H:i:s', $timestamp);
    }
    
     // checking the phone number length is 10 and all are digits
   
   public function check_phone($phone) {
    $phone = trim($phone);
    if($phone == '')
     {
           return true;
     }
      
     if(is_numeric($phone) && strlen($phone) == 10) {
          return true;
        }
       return false ; 
     }
    
    // Phone format   
   
  public  static function format_phone($phone) {
      
      $phone = trim($phone);
      
      // note: making sure we have something
      
     if(is_numeric($phone) && strlen($phone) == 10) {
        
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
        
        }else{
        
         return $phone ; 
        
        }
    
     /* if(!isset($phone{3})) { return ''; }
      // note: strip out everything but numbers 
      $phone = preg_replace("/[^0-9]/", "", $phone);
      $length = strlen($phone);
      switch($length) {
      case 7:
        return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
      break;
      case 10:
       return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
      break;
      case 11:
      return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
      break;
      default:
        return $phone;
      break;
      }*/
    }
  
    public static function xmlToArray($xmlIn) {
        $xml = simplexml_load_string($xmlIn);
        $json = json_encode($xml);
        return json_decode($json, TRUE); 
    }

    /**
     * Faster array lookup than in_array() where the needle is a key of the haystack.
     * Haystack should be in the form of [ 'key' =>  1 ].
     * The value of the haystack is arbitrary since it's just a placeholder. The key is used for the lookup.
     *
     * @param $needle
     * @param $haystack
     *
     * @return bool
     */
    public function fast_in_array($needle, $haystack) {
        return isset($haystack[$needle]);
    }

    public static function  endsWith($haystack, $needle){
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
    
    
    function checkemail($email = null) {
        $regexCheck = php_email_regex; //defined in bootstrap.php

        if (preg_match($regexCheck, $email)) {
            return true;
        } else {
            return false;
        }

        /* $regexCheck = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel|realtor)$/i';

          if (preg_match($regexCheck, $email)) {
          return true;
          } else {
          return false;
          } */
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

    function merge_signature_data($content, $signature) {
        $search_str = array(
            '!full_name!', '!email!', '!business_name!', '!tag_line!', '!phone!',
            '!phone2!', '!website!', '!website_2!', '!address!', '!city!',
            '!state!', '!zip!', '!facebook_profile!', '!facebook_page!',
            '!google_plus!', '!twitter!', '!linked_in!', '!pinterest!',
            '!youtube!', '!headshot!', '!logo!', '!email_header!', '!signed!',
            '!blog!', '!search!', '!market_snapshot!', '!unbounce!', '!area!');

        $replace_str = array(
            $signature['name'], $signature['email'], $signature['business_name'], $signature['tag_line'], Utils::format_phone($signature['phone']),
            Utils::format_phone($signature['phone2']), $signature['website'], $signature['website_2'], $signature['address'], $signature['city'],
            $signature['state'], $signature['zip'], $signature['facebook_profile'], $signature['facebook_page'],
            $signature['google_plus'], $signature['twitter'], $signature['linked_in'], $signature['pinterest'],
            $signature['youtube'], $signature['headshot'], $signature['logo'], $signature['email_header'], $signature['signed'],
            $signature['blog'], $signature['search'], $signature['market_snapshot'], $signature['unbounce'], $signature['area']);

        return str_replace($search_str, $replace_str, $content);
    }

   public function merge_contact_data($content, $contact) {
        $search_str = array('!first_name!', '!last_name!', '!email_address!', '!phone_number!');
        $replace_str = array($contact['first_name'], $contact['last_name'], $contact['email'], Utils::format_phone($contact['phone']));
        $content = str_replace($search_str, $replace_str, $content);
        return $content;
    }

   public function get_greeting($greeting, $signature = '', $contact = '') {
        if (!empty($contact))
            $greeting = $this->merge_contact_data($greeting, $contact['Contact']);

        if (!empty($signature))
            $greeting = $this->merge_signature_data($greeting, $signature['Signature']);


        return $greeting;
    }

    /* start ticket #2804 */

    public function merge_code_check($content) {

        $search_str = array(
            '!first_name!', '!day_of_week!', '!tag!','!email_address!', '!phone_number!','!phone_2!','!tags!',
            '!full_name!', '!email!', '!business_name!', '!tag_line!', '!phone!',
            '!phone2!', '!website!', '!website_2!', '!address!', '!city!',
            '!state!', '!zip!', '!facebook_profile!', '!facebook_page!',
            '!google_plus!', '!twitter!', '!linked_in!', '!pinterest!',
            '!youtube!', '!headshot!', '!logo!', '!email_header!', '!signed!',
            '!blog!', '!search!', '!market_snapshot!', '!unbounce!', '!area!');

        $replace_str = array(
            '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

        $new_content = str_replace($search_str, $replace_str, $content);
        return $return_result = $this->check_merge_code_regx($new_content);
    }

    public function check_merge_code_regx($content, $return = array()) {
        $regEx = '!([^! ]+?)!';
        preg_match('/' . $regEx . '/', $content, $result);
        if (isset($result[1])) {
         $pos = strpos($result[1], ' ');
        if ($pos === false) {
            $return[] = $result[0];
            $content = str_replace($result[0], '', $content);
            }
        }

        $result1 = array();
        
        preg_match('/' . $regEx . '/', $content, $result1);

        if (isset($result1[1]) && $result1[1] != '') {
           $pos = strpos($result1[1], ' ');
        if ($pos === false) {
            $return = $this->check_merge_code_regx($content, $return);
        }
        } 

        return $return;
    }
    public function access($role_id){
    $roles_access = array(
     '1' => array('1','2','3' ,'4'),
	 '2' => array('3' ,'4'),
	 '3' => array('4'),
	 '4' => array(),
	 );
    }
   
   
   	
 public static function timezoneslist( $timezone_id = null){
	 
	 	  $timezoneslist = array(
						'-12.0' => 'Kwajalein',
						'-11.0' => 'Pacific/Midway',
						'-10.0' => 'Pacific/Honolulu',
						'-9.0' => 'America/Anchorage',
						'-8.0' => 'America/Los_Angeles',
						'-7.0' => 'America/Denver',
						'-6.0' => 'America/Chicago',
						'-5.0' => 'America/New_York',
						'-4.0' => 'Canada/Atlantic', //America/Halifax
						'-3.5' => 'America/St_Johns',
						'-3.0' => 'America/Argentina/Buenos_Aires',
						'-2.0' => 'Atlantic/South_Georgia',
						'-1.0' => 'Atlantic/Azores',
						'0.0'  => 'UTC',
						'0'    => 'UTC',
						'+1.0' => 'Europe/Belgrade',
						'+2.0' => 'Europe/Minsk',
						'+3.0' => 'Asia/Kuwait',
						'+3.5' => 'Asia/Tehran',
						'+4.0' => 'Asia/Muscat',
						'+4.5' => 'Asia/Kabul',
						'+5.0' => 'Asia/Karachi',
						'+5.5' => 'Asia/Kolkata',
						'+6.0' => 'Asia/Dhaka',
						'+7.0' => 'Asia/Krasnoyarsk',
						'+8.0' => 'Asia/Brunei',
						'+9.0' => 'Asia/Seoul',
						'+9.5' => 'Australia/Darwin',
						'+10.0' => 'Australia/Canberra',
						'+11.0' => 'Asia/Magadan',
						'+12.0' => 'Pacific/Fiji' 
					);
					
					if(isset($timezone_id)){
						
						if( isset($timezoneslist[$timezone_id])) 
						  return $timezoneslist[$timezone_id];
						  else
						  return '';
						
						}
					return $timezoneslist ;
	 
	 }	
    
    // Convert date time into different time zone
  public static function convert_datetime_timezone($date_time = "", $to_zone = "" , $from_zone = 0  )
	{ 
      
         if($date_time == "" || $to_zone === "" || $from_zone === "" )
              return $date_time;
         
         
	
		
        date_default_timezone_set(static::timezoneslist($from_zone));
        
        $datetime = new DateTime($date_time);
        $datetime->format('Y-m-d H:i:s') . "\n";
       
        $new_time = new DateTimeZone(static::timezoneslist($to_zone));
        $datetime->setTimezone($new_time);
		$rtDate = $datetime->format('Y-m-d H:i:s');
		date_default_timezone_set('UTC');
        return $rtDate;
      
      }
} //class Utils
