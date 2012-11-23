<?php
	function PrintText($topic)
	{
		$URLofTopic = $topic;
		//$URLtoGet = "http://cwyubsd.no-ip.org/hub/broker/callback.php?boody=".$URLofTopic;
		$URLtoGet = "http://140.109.22.187/ADAST_rule_engine/ADAST.php?boody=".$URLofTopic;

		//echo $URLtoGet;

		// Note: Remove comment before send message!
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $URLtoGet);

		$result = curl_exec($ch);

		//print_r($result);
		curl_close($ch);
	}

	// $count = 5;

	// print("Count down: ");

	
	// for($i=0; $i<$count; $i++)
	// {
	// 	print($count-$i);
	// 	sleep(1);
	// }

	
	//PrintText("Old%20Yu%20Rocks!");
?>