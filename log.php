<?php
	date_default_timezone_set('UTC');

	function WriteLog($message)
	{	
		$log_file_name = 'log/ADAST_log.txt';
		$message_to_write = date("Y-m-d_H:i:s").' '.$message.PHP_EOL;
		file_put_contents($log_file_name, $message_to_write, FILE_APPEND);
	}

	function NotifyADASTConsole($message)
	{
		$URLofADASTMain = "http://vrtestbed.iis.sinica.edu.tw:3000/?notification=true&msg=";

		$URLtoGet = $URLofADASTMain.$message;
		echo $URLtoGet;

		// Note: Remove comment before send message!
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_URL, $URLtoGet);

		$result = curl_exec($ch);

		print_r($result);
		curl_close($ch);
	}

	WriteLog("test write log!");


?>