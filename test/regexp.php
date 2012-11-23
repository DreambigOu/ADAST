<?php

	//if(preg_match('/\d[0]{1}?\d[9]{1}?\d[0-9]{8}/', 0919528525))
	//if(preg_match('/\d[0]{1}?\d[9]{1}?\d[0-9]{8}/', '0919528525'))
	//if(preg_match('/^[0-9]*$/', '0919528525'))
	//if(preg_match('/d[0]{1}?/d[0-9]{9}$/', '0919528525'))

	// The below regexp works for cell phone number in Taiwan
	// It first exame the first 2 digits matches "09". Then, count 8 digits for the rest of number.	

		// if(preg_match('/^([0]{1}[9]{1})([0-9]{8})$/', '0912528417'))
		// 	echo("You got the right number");
		// else
		// 	echo("Ooops");
	
	if(preg_match('/^([0]{1}[9]{1})([0-9]{2})([_]{1})([0-9]{6})$/', '0919-528525'))
		echo("You got the right number");
	else
		echo("Ooops");

?>