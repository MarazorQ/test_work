<?php 
	
	session_start();

	$login = 'shuratov2001';
	$password = $_POST['password'];

	$xml = simplexml_load_file('output.xml');

	foreach ($xml->name as $User) {

		if($User->name == 'feer'){

			echo "ss";
		}else{
			echo "e";
		}
		
	}


?>