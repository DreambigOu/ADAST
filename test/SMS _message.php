<?php

// NOTE: urlencode cannot work
// NOTE: ErrorCode=0 LCount=9 MsgID000=12403131
//       http://api.message.net.tw/send.php?id=openisdm404&password=SMS404API&tel=0919528525&msg=%E5%9C%9F%E7%9F%B3%E6%B5%81%20%E9%A0%90%E8%AD%A6%E6%B8%AC%E8%A9%A6

function SendSMS($phone_array, $message){
  
  $URL= "";
  $SMS_Sender_URL = "http://api.message.net.tw/send.php";
  $GetData_URL = "";
 
  $username = "openisdm404";           // user name  to send SMS
  $password = "SMS404API";        // password of user name SMS404 for login, SMS404API for API use
  
  print_r($phone_array);
  print_r($message);
  echo(count($phone_array));

  $mobile_to_be_sent = "";    // The phone list to be sent
  //for ($i=0 ; $i < count($phone_array) ; $i++ ) 
  foreach ($phone_array as $value)
  { 
      if($mobile_to_be_sent == "")
      {
        $mobile_to_be_sent = substr($value, 1);
      }
      else
      {
        $mobile_to_be_sent = $mobile_to_be_sent.";".substr($value, 1);
      }
  }
  

  $message_to_be_sent = $message;    // Message to be sent

  $mType = G;
  $encoding = "";

  // Combined the data
  $GetData_URL = "id=".$username."&password=".$password."&tel=".$mobile_to_be_sent."&msg=".$message_to_be_sent."&mtype=".$mType;

  $URL = $SMS_Sender_URL."?".$GetData_URL;
  print_r($URL);
  print("<br>");

  // Note: Remove comment before send message!
  // $ch = curl_init();

  // curl_setopt($ch, CURLOPT_HEADER, 0);
  // curl_setopt($ch, CURLOPT_URL, $URL);

  // $result = curl_exec($ch);

  // print_r($result);
  // curl_close($ch);

  // Handle SMS sending result

}


// Ex: Call API
//SendSMS("0919528525", "Debries Flow Alert");
?>
