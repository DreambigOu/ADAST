<?php
	// echo (utf8_encode('花蓮'));
	// echo file_get_contents('QueryScript/QueryResult/TouristAttraction.txt', true);
	exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_Village.rb");
	exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_TouristAttraction.rb");
	exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_TouristGroupID.rb");
	exec("C:\\Ruby193\\bin\\ruby.exe QueryScript/query_Contact.rb");

?>