<?php 

	function debug($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}

	function dd($var)
	{
		debug($var);
		die();
	}


	$db_config = array(
		"db_host" => "localhost",
		"db_user" => "root",
		"db_pass" => "",
		"db_name" => "MyReview",
	);

 ?>
