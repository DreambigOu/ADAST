<?php
	function Submit($topic, $alert_type, $rule_name)
	{
		// Subscribe topic
		Subscribe($topic);

		// TODO: Add alert_type and rule_name to rule engine

	}
	
	function Subscribe($topic)
	{
		$URLofTopic = $topic;
		$URLtoGet = "http://hub.ccg.tw/?callback=http://140.109.22.187/ADAST_rule_engine/ADAST.php&topic=".$URLofTopic;

		// Note: Remove comment before send message!
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $URLtoGet);

		$result = curl_exec($ch);

		//print_r($result);
		curl_close($ch);
	}

	$topic 		= $_REQUEST['topic'];
	$alert_type = $_REQUEST['alert_type'];
	$rule_name 	= $_REQUEST['rule_name'];

	Submit($topic, $alert_type, $rule_name);

	print($topic);
	print($alert_type);
	print($rule_name);


	// For log
	file_put_contents('log/JIM_data.txt', $topic.PHP_EOL, FILE_APPEND);	
	file_put_contents('log/JIM_data.txt', $alert_type.PHP_EOL, FILE_APPEND);
	file_put_contents('log/JIM_data.txt', $rule_name.PHP_EOL, FILE_APPEND);
?>