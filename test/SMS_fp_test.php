<?php
$username = "openisdm404";		// 
$password = "SMS404API";		// 
$mobile = "0919528525";	// 
$message = "土石流 預警";	// 
$MSGData = "";

//$msg = "username=".$username."&password=".$password."&tel=".$mobile."&msg=".urlencode($message)."&encoding="."urlencode";
$msg = "username=".$username."&password=".$password."&tel=".$mobile."&msg=".urlencode($message);
$num = strlen($msg);		

// 
$fp = fsockopen ("api.message.net.tw", 80);
if ($fp) {
	//$MSGData .= "POST /send.php HTTP/1.1\r\n";
	$MSGData .= "POST /send.php HTTP/1.1\r\n";
	$MSGData .= "Host: api.message.net.tw\r\n\r\n";
	$MSGData .= "Content-Length: ".$num."\r\n";
	//$MSGData .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$MSGData .= "Content-Type: text/html\r\n";
	$MSGData .= "Connection: Close\r\n\r\n";
	$MSGData .= $msg."\r\n";
	fputs ($fp, $MSGData);

	// 
	while (!feof($fp)) $Tmp.=fgets ($fp,128); 

	// 
	fclose ($fp);

	echo "Result:".$Tmp;
} else {
	echo "您無法連接 API Server";
		}

?>
