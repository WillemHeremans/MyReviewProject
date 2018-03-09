<?php
session_start();

include_once './core/config.php';

include_once './core/connexion.php';

if (isset($_SESSION['pseudo']))

{

$query=$bdd->prepare('SELECT * FROM profils WHERE pseudo = :pseudo');
$query->bindValue(':pseudo',$_SESSION['pseudo'], PDO::PARAM_STR);
$query->execute();
$data=$query->fetch();

if ($data['sexe'] == "F")
{
$sexe = "fa fa-venus";
}

else {
$sexe = "fa fa-mars";
}

if ($data['lieu_1'] == "Cuisine du monde") 
{
$pub = "asian.png";
}
else if ($data['lieu_1'] == "Fast food") 
{
$pub = "bking.jpeg";
}
else if ($data['lieu_1'] == "BIO") 
{
$pub = "exki.png";
}
else if ($data['lieu_1'] == "Brasserie") 
{
$pub = "stella.jpeg";
}
else if ($data['lieu_1'] == "Gastronomique") 
{
$pub = "gastronomique.jpg";
}

echo '
<!DOCTYPE html>
<html>
<head>
<title>MyReview: Profil de ' .$data['pseudo']. '</title>
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

.container
{
text-align:center;
}
.center
{
margin-left:auto;
margin-right:auto;
padding-top:10px;
width:770px;
background-color:#ffffff;
text-align:left;
padding-bottom:10px;
}

.image_container3
{
float:left;
margin-left:auto;
margin-right:auto;
width:728px;
margin-bottom:10px;
padding:10px;
padding-top:0px;
text-align:center;
}

@keyframes blink {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
img.pub {
    animation: blink 10s;
    animation-iteration-count: infinite;
}
</style>
</head>
<body>

<h2 style="text-align:center">Profil de ' .$data['pseudo']. '</h2>

<div class="card">
  <img src="./image/' .$data['avatar'].'" alt="avatar" style="width:100%">
  <h1>' .$data['pseudo'].'</h1>
  <p class="title"><a href="age2.php">' .$data['age'].'</a> / <a href="sexe.php"><i class="' .$sexe.'"></i></a></p>
  <p>Ma préférence: <a href="pref_1_v2.php"><b>' .$data['pref_1']. '</b></a></p> 
  <p>Mon lieu: <b><a href="lieu_1_v2.php">'.$data['lieu_1'].'</a></b></p>
  <div style="margin: 24px 0;">
    <a href="../omdb/manipJSON.php"><i class="fa fa-search"></i></a> 
     
 </div>
 <p><a href="SessDestroy.php"><button>Log out</button></a></p>
</div>

<br><br>
<div class="container">
<div class="center">
<div class="image_container3">

<img class="pub" src="./image/'.$pub.'" width="100%" height="200" alt="publicité" />
<br><br>
</div>
</div>
</div>

</body>
</html>
';

}

else {
echo '<!DOCTYPE html>
<html>
<head>
<title>Connectez-vous !</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8"/>
<style>

</style>
</head>
<body>
<br />
<br />
<h1 style="text-align:center;">Pour voir votre profil, <a href="login.php">connectez-vous!</a></h1>
</body>
</html>
';
}
?>
