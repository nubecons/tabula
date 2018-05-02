<?php
$name_pad = 25;
 $message = '';
  if (isset($data)){
	  
	    foreach ($data as $name => $value)
   {
      if ($value === '') continue;

      if (strlen($name) + strlen($value) > 70)
         $message .= str_pad(strtoupper(str_replace('_', ' ', $name . ':')), $name_pad)
                  . "\r\n" . $value . "\r\n\r\n" ."<br>";
      else
         $message .= str_pad(strtoupper(str_replace('_', ' ', $name . ':')), $name_pad)
                  . $value . "\r\n" ."<br>";
   }
	  
}

if (isset($header) && $header != ''){
	echo $header. "<br><br>";	
}

if ($message != ''){
	echo $message. "<br><br>";	
}

if (isset($footer) && $footer != ''){
	echo $footer. "<br><br>";	
}

?>