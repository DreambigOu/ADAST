<?php

require_once('boody.php');

// Every8D version: http://tw.every8d.com
//

function CellPhoneRegexp($phone_number)
{

  // The below regexp works for cell phone number in Taiwan
  // It first exame the first 2 digits matches "09". Then, count 8 digits for the rest of number. 
  // Valid sample: 0919527456
  // Invalid: 091241256 (9 digits), 024578946 (not start with 09)
  $regexp1 = '/^([0]{1}[9]{1})([0-9]{8})$/';

  if(preg_match($regexp1, $phone_number))
    return true;
  else
    return false;
}  

function SendSMS($phone_array, $message){
  
  $URL= "";
  $SMS_Sender_URL = "http://api.every8d.com/API21/HTTP/sendSMS.ashx";
  $GetData_URL = "";
 
  $username = "0919507876";           // user name  to send SMS
  $password = "znxp";                 // password of user name SMS404 for login, SMS404API for API use
  $subject = "";
  $sending_time = "";

  $mobile_to_be_sent = "";    // The phone list to be sent
  

  file_put_contents('log/received-data-SMS.txt', $phone_array.PHP_EOL, FILE_APPEND);



  //for ($i=0 ; $i < count($phone_array) ; $i++ ) 
  foreach ($phone_array as $value)
  { 
      if($mobile_to_be_sent == "" && CellPhoneRegexp(substr($value, 0)))
      {
        $mobile_to_be_sent = substr($value, 0);
      } 
      elseif (CellPhoneRegexp(substr($value, 0))) 
      {
        $mobile_to_be_sent = $mobile_to_be_sent.",".substr($value, 0);
      }
  }

  $message_to_be_sent = urlencode($message);    // Message to be sent

  // Combined the data
  $GetData_URL = "UID=".$username."&PWD=".$password."&SB=".$sb."&MSG=".$message_to_be_sent."&DEST=".$mobile_to_be_sent."&ST=".$sending_time;

  $URL = $SMS_Sender_URL."?".$GetData_URL;
  print_r($URL);

  file_put_contents('log/received-data-SMS.txt', $mobile_to_be_sent.PHP_EOL, FILE_APPEND);
  file_put_contents('log/received-data-SMS.txt', $URL.PHP_EOL, FILE_APPEND);

  PrintText("Send%20alert%20to%20targets%20by%20SMS%20messages.");
  PrintText("Sending%20messages......");

  // // Note: Remove comment before send message!
  // $ch = curl_init();

  // curl_setopt($ch, CURLOPT_HEADER, 0);
  // curl_setopt($ch, CURLOPT_URL, $URL);

  // $result = curl_exec($ch);

  // print_r($result);
  // curl_close($ch);

  // Handle SMS sending result

}


// Ex: Call API
//$phone_list = array("0919528525,091246808,0221222567");
$phone_list = array("0912020410", "0919507876", "091246808","0221222567");
SendSMS($phone_list, "［土石流警戒：太魯閣國家公園］快逃！o(〒﹏〒)");
?>
