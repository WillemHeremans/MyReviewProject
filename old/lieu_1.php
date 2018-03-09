<!DOCTYPE html>
<html lang="fr">
<body>
	<head>
		<meta charset="UTF-8"/>
		<title>MyReview</title>
	</head>

	<?php
	echo "<body><table style='border: solid 1px black;'>";


	class TableRows extends RecursiveIteratorIterator {
	    function __construct($it) {
	        parent::__construct($it, self::LEAVES_ONLY);
	    }

	    function current() {
	        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
	    }

	    function beginChildren() {
	        echo "<tr>";
	    }

	    function endChildren() {
	        echo "</tr>" . "\n";
	    }
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "MyReview";


	try {
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stmt = $conn->prepare("SELECT * FROM profils WHERE lieu_1 = :lieu_1");
            $stmt->bindValue(':lieu_1',$_COOKIE['lieu'], PDO::PARAM_STR);
	    $stmt->execute();


	    // set the resulting array to associative
	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
	        echo $v;
	    }
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMesslieu_1();
	}
	$conn = null;
	echo "</table></body>";
	?>


</body>
</html>
