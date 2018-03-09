<?php 

try {
    $bdd = new PDO(
    	"mysql:host=".$db_config['db_host'].";dbname=".$db_config['db_name'].";charset=utf8;",
    	$db_config['db_user'],
    	$db_config['db_pass']
    );
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

 ?>
