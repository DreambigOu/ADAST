<?php
	/* PrintText is a fucntion that send the http GET request with message to ADAST.php to print the message on the output text area
	// Currently the space in the message need to be replaced by %20.
	// We will use urlencide to encode the message in the next version
	*/
	function PrintText($message)
	{
		$URLtoGet = "http://140.109.22.187/ADAST_rule_engine/ADAST.php?boody=".$message;	
		
		// Note: Remove comment before send message!
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $URLtoGet);

		$result = curl_exec($ch);

		//print_r($result);
		curl_close($ch);
	}
	
	//PrintText("Old%20Yu%20Rocks!");
?>