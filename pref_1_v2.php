<?php
session_start();

include_once './core/config.php';

include_once './core/connexion.php';

if (isset($_COOKIE['pref']))

{

$query=$bdd->prepare('SELECT * FROM profils WHERE pref_1 = :pref_1 AND pseudo != :pseudo');
$query->bindValue(':pref_1',$_COOKIE['pref'], PDO::PARAM_STR);
$query->bindValue(':pseudo',$_COOKIE['pseudo'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetchAll( PDO::FETCH_ASSOC );

}
?>
<?php include 'head.php';?>

<?php

echo '<header>

    <a href="?100"><button style="width:25%;">Match à 100%</button></a><a href="?75"><button style="width:25%;">Match à 75%</button></a><a href="?50"><button style="width:25%;">Match à 50%</button></a><a href="?all"><button style="width:25%;">Tous</button></a>
</header>';


?>

<?php foreach($data as $data): ?>
<?php
 
if($data['age'] == $_COOKIE['age'] && $data['lieu_1'] == $_COOKIE['lieu'] && $data['gender'] == $_COOKIE['gender']) 

{
$rate = "100%";
$gold = "border: 5px solid gold;";
$classButton = "cent";
}

else if (($data['age'] == $_COOKIE['age'] && $data['lieu_1'] == $_COOKIE['lieu']) || ($data['age'] == $_COOKIE['age'] && $data['gender'] == $_COOKIE['gender']) || ($data['gender'] == $_COOKIE['gender'] && $data['lieu_1'] == $_COOKIE['lieu']))

{
$rate = "75%";
$gold = "border: none;";
$classButton = "septante";
}

else if ($data['age'] == $_COOKIE['age'] || $data['lieu_1'] == $_COOKIE['lieu'] ||  $data['gender'] == $_COOKIE['gender'])

{
$rate = "50%";
$gold = "border: none;";
$classButton = "cinquante";
}


else {
$rate = "25%";
$gold = "border: none;";
$classButton = "vingt";
}

?>

<?php

if (isset($_GET['100']) && ($classButton == "septante" || $classButton == "cinquante" || $classButton == "vingt")) {
 
$display = "none";

}

else if (isset($_GET['75']) && ($classButton == "cent" || $classButton == "cinquante" || $classButton == "vingt")) {
 
$display = "none";

}

else if (isset($_GET['50']) && ($classButton == "cent" || $classButton == "septante" || $classButton == "vingt")) {
 
$display = "none";

}

else if (isset($_GET['all'])) {
 
$display = "inline-block";

}

else {
$display = "inline-block";
}

?>

<?php

if ($data['gender'] == "female")
{
$gender = "fa fa-venus";
}

else {
$gender = "fa fa-mars";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Matching pour <?php echo $_COOKIE['pseudo'] ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8"/>
<style>


.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
 
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<div id="<?php echo $classButton ?>" style="display: <?php echo $display ?>; max-width:300px; min-width:300px;">

<h2 style="text-align:center">Match avec <?php echo $data['pseudo'] ?></h2>

<div class="card" style="<?php echo $gold ?>">
  <img src="<?php echo $data['avatar'] ?>" alt="avatar" style="width:100%;height:300px;">
  <h1><?php echo $data['pseudo'] ?></h1>
  <p class="title"><a href="./old/age.php"><?php echo $data['age'] ?></a> / <a href="#"><i class="<?php echo $gender ?>"></i></a></p>
  <p>Ma préférence: <a href="./old/pref_1.php" style="color:red"><b><?php echo $data['pref_1'] ?></b></a></p> 
  <p>Mon lieu: <b><a href="./old/lieu_1.php"><?php echo $data['lieu_1'] ?></a></b></p>
  <div style="margin: 24px 0;">
    <a href="../omdb/manipJSON.php"><i class="fa fa-search"></i></a> 
    
 </div>
 <p><button>Matching rate = <?php echo $rate ?></button></p>
</div>
</div>


</body>
</html>

<?php endforeach ?>


