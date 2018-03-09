<?php


if (!empty($_POST)&&isset($_POST['addData'])) {
	addData();
}

function addData(){
	global $bdd;

	$phrase_sql = "INSERT INTO profils (pseudo, age, pref_1, pref_2, pref_3, pref_4, pref_5, lieu_1, lieu_2, lieu_3, lieu_4, lieu_5, avatar, sexe)
    VALUES (:pseudo, :age, :pref_1, :pref_2, :pref_3, :pref_4, :pref_5, :lieu_1, :lieu_2, :lieu_3, :lieu_4, :lieu_5, :avatar, :sexe)";
	$preparation = $bdd->prepare($phrase_sql);

	$preparation->bindParam(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
	$preparation->bindParam(':age',$_POST['age'],PDO::PARAM_STR);
	$preparation->bindParam(':pref_1',$_POST['pref_1'],PDO::PARAM_STR);	
	$preparation->bindParam(':pref_2',$_POST['pref_2'],PDO::PARAM_STR);
	$preparation->bindParam(':pref_3',$_POST['pref_3'],PDO::PARAM_STR);
        $preparation->bindParam(':pref_4',$_POST['pref_4'],PDO::PARAM_STR);
	$preparation->bindParam(':pref_5',$_POST['pref_5'],PDO::PARAM_STR);
        $preparation->bindParam(':lieu_1',$_POST['lieu_1'],PDO::PARAM_STR);
        $preparation->bindParam(':lieu_2',$_POST['lieu_2'],PDO::PARAM_STR);
        $preparation->bindParam(':lieu_3',$_POST['lieu_3'],PDO::PARAM_STR);
        $preparation->bindParam(':lieu_4',$_POST['lieu_4'],PDO::PARAM_STR);
        $preparation->bindParam(':lieu_5',$_POST['lieu_5'],PDO::PARAM_STR);
        $preparation->bindParam(':avatar',$_POST['avatar'],PDO::PARAM_STR);
        $preparation->bindParam(':sexe',$_POST['sexe'],PDO::PARAM_STR);


	if ($preparation->execute()) {
		header('Location: account.php');
	} else {
		echo "OOOPS!";
	}

}
 ?>
