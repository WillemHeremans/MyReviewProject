<?php

include_once './core/config.php';

include_once './core/connexion.php';

include_once './core/request.php';

$query=$bdd->prepare('SELECT pseudo FROM profils');
$query->execute();
$data=$query->fetch( PDO::FETCH_ASSOC );

if (isset($_POST['pseudo'])) {

echo "Le pseudo existe déjà";

}

else echo 

'<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>Créer un compte sur MyReview!</title>
<style>

</style>

</head>
<body>


  <form class="formulaire" action="" method="post" name="addData" id="Pref">

    <h1>Créer un compte</h1>

    <div class="pseudo">
      <label for="">Pseudo :</label><br>
      <input type="text" placeholder="Choisissez votre pseudo..." name="pseudo" value="" id="pseudo">
    </div>

<br />

<label>Quelle est votre tranche d\'âge ?</label>

    <select name="age" form="Pref">
  <option value="-18 ans">-18 ans</option>
  <option value="18-25 ans">18-25 ans</option>
  <option value="26-35 ans">26-35 ans</option>
  <option value="+35 ans">+35 ans</option>
</select>
<br />
<br />
<label>Votre sexe :</label>
<br />
<br />
<label>Féminin</label>
<input type="radio" name="sexe" value="F">
<br />
<label>Masculin</label>
<input type="radio" name="sexe" value="M">
<br />
<br />

<label>Choisissez un avatar :</label>
<br />
<br />
<label><img src="./image/default.png" height="50px" width="50px" /></label>
<input type="radio" name="avatar" value="default.png">
<br />
<label><img src="./image/woman.png" height="50px" width="50px" /></label>
<input type="radio" name="avatar" value="woman.png">
<br />
<label><img src="./image/garcon.png" height="50px" width="50px" /></label>
<input type="radio" name="avatar" value="garcon.png">
<br />
<label><img src="./image/woman-pro.png" height="50px" width="50px" /></label>
<input type="radio" name="avatar" value="woman-pro.png">
 
<br />
<br />

<div id="pref">
<label>Choisissez votre préférence N°1!</label>

<select name="pref_1" form="Pref" id="Pref_1">
<option disabled selected value> -- Select an option -- </option>
  <option value="L\'ambiance">L\'ambiance</option>
  <option value="Le service">Le service</option>
  <option value="Éco-responsable">Éco-responsable (bio, proximité, etc)</option>
  <option value="La rapidité">La rapidité</option>
  <option value="Type de cuisine">Type de cuisine</option>
</select>
<br />

<label>Choisissez votre préférence N°2</label>

<select name="pref_2" form="Pref" id="Pref_2">
<option disabled selected value> -- Select an option -- </option>
  <option value="L\'ambiance">L\'ambiance</option>
  <option value="Le service">Le service</option>
  <option value="Éco-responsable">Éco-responsable (bio, proximité, etc)</option>
  <option value="La rapidité">La rapidité</option>
  <option value="Type de cuisine">Type de cuisine</option>
</select>
<br />

<label>Choisissez votre préférence N°3</label>

<select name="pref_3" form="Pref" id="Pref_3">
<option disabled selected value> -- Select an option -- </option>
  <option value="L\'ambiance">L\'ambiance</option>
  <option value="Le service">Le service</option>
  <option value="Éco-responsable">Éco-responsable (bio, proximité, etc)</option>
  <option value="La rapidité">La rapidité</option>
  <option value="Type de cuisine">Type de cuisine</option>
</select>
<br />

<label>Choisissez votre préférence N°4!</label>

<select name="pref_4" form="Pref" id="Pref_4">
<option disabled selected value> -- Select an option -- </option>
  <option value="L\'ambiance">L\'ambiance</option>
  <option value="Le service">Le service</option>
  <option value="Éco-responsable">Éco-responsable (bio, proximité, etc)</option>
  <option value="La rapidité">La rapidité</option>
  <option value="Type de cuisine">Type de cuisine</option>
</select>
<br />

<label>Choisissez votre préférence N°5!</label>

<select name="pref_5" form="Pref" id="Pref_5">
<option disabled selected value> -- Select an option -- </option>
  <option value="L\'ambiance">L\'ambiance</option>
  <option value="Le service">Le service</option>
  <option value="Éco-responsable">Éco-responsable (bio, proximité, etc)</option>
  <option value="La rapidité">La rapidité</option>
  <option value="Type de cuisine">Type de cuisine</option>
</select>
<br />
<br />
</id>

<div id="lieu" style="display:none;">

<label>Choisissez votre lieu N°1!</label>

<select name="lieu_1" form="Pref" id="Lieu_1">
<option disabled selected value> -- Select an option -- </option>
  <option value="Cuisine du monde">Cuisine du monde (asiatique,...)</option>
  <option value="Brasserie">Brasserie</option>
  <option value="BIO">BIO (exki...)</option>
  <option value="Fast food">Fast food (quick...)</option>
  <option value="Gastronomique">Gastronomique</option>
</select>
<br />

<label>Choisissez votre lieu N°2</label>

<select name="lieu_2" form="Pref" id="Lieu_2">
<option disabled selected value> -- Select an option -- </option>
  <option value="Cuisine du monde">Cuisine du monde (asiatique,...)</option>
  <option value="Brasserie">Brasserie</option>
  <option value="BIO">BIO (exki...)</option>
  <option value="Fast food">Fast food (quick...)</option>
  <option value="Gastronomique">Gastronomique</option>
</select>
<br />

<label>Choisissez votre lieu N°3</label>

<select name="lieu_3" form="Pref" id="Lieu_3">
<option disabled selected value> -- Select an option -- </option>
  <option value="Cuisine du monde">Cuisine du monde (asiatique,...)</option>
  <option value="Brasserie">Brasserie</option>
  <option value="BIO">BIO (exki...)</option>
  <option value="Fast food">Fast food (quick...)</option>
  <option value="Gastronomique">Gastronomique</option>
</select>
<br />

<label>Choisissez votre lieu N°4!</label>

<select name="lieu_4" form="Pref" id="Lieu_4">
<option disabled selected value> -- Select an option -- </option>
  <option value="Cuisine du monde">Cuisine du monde (asiatique,...)</option>
  <option value="Brasserie">Brasserie</option>
  <option value="BIO">BIO (exki...)</option>
  <option value="Fast food">Fast food (quick...)</option>
  <option value="Gastronomique">Gastronomique</option>
</select>
<br />

<label>Choisissez votre lieu N°5!</label>

<select name="lieu_5" form="Pref" id="Lieu_5">
<option disabled selected value> -- Select an option -- </option>
  <option value="Cuisine du monde">Cuisine du monde (asiatique,...)</option>
  <option value="Brasserie">Brasserie</option>
  <option value="BIO">BIO (exki...)</option>
  <option value="Fast food">Fast food (quick...)</option>
  <option value="Gastronomique">Gastronomique</option>
</select>
<br />
<br />
<br />
</div>

    <input type="hidden" value="Submit" name="addData" id="submit">

  </form>
<br />
<p><a href="login.php">Go to login...</a></p>
'
?>
<script type="text/javascript">
var prefUn = document.getElementById("Pref_1");
var prefDeux = document.getElementById("Pref_2");
var prefTrois = document.getElementById("Pref_3");
var prefQuatre = document.getElementById("Pref_4");
var prefCinq = document.getElementById("Pref_5");



prefCinq.onchange = function prefSimOrNot () {

if (prefUn.value == prefDeux.value | prefUn.value == prefTrois.value | prefUn.value == prefQuatre.value | prefUn.value == prefCinq.value) {

alert("Attention!\nUn choix différent par ligne!");
}

else if (prefDeux.value == prefTrois.value | prefDeux.value == prefQuatre.value | prefDeux.value == prefCinq.value | prefUn.value == prefCinq.value) {
alert("Attention!\nUn choix différent par ligne!");
}

else if (prefTrois.value == prefQuatre.value | prefTrois.value == prefCinq.value) {
alert("Attention!\nUn choix différent par ligne!");
}

else if (prefQuatre.value == prefCinq.value) {
alert("Attention!\nUn choix différent par ligne!");
}

else {

document.getElementById("lieu").style = "display:block;";
}

}

var lieuUn = document.getElementById("Lieu_1");
var lieuDeux = document.getElementById("Lieu_2");
var lieuTrois = document.getElementById("Lieu_3");
var lieuQuatre = document.getElementById("Lieu_4");
var lieuCinq = document.getElementById("Lieu_5");
var submit = document.getElementById("submit");



lieuCinq.onchange = function lieuSimOrNot () {

if (lieuUn.value == lieuDeux.value | lieuUn.value == lieuTrois.value | lieuUn.value == lieuQuatre.value | lieuUn.value == lieuCinq.value) {

alert("Attention!\nUn choix différent par ligne!");
}

else if (lieuDeux.value == lieuTrois.value | lieuDeux.value == lieuQuatre.value | lieuDeux.value == lieuCinq.value | lieuUn.value == lieuCinq.value) {
alert("Attention!\nUn choix différent par ligne!");
}

else if (lieuTrois.value == lieuQuatre.value | lieuTrois.value == lieuCinq.value) {
alert("Attention!\nUn choix différent par ligne!");
}

else if (lieuQuatre.value == lieuCinq.value) {
alert("Attention!\nUn choix différent par ligne!");
}

else {
document.getElementById("submit").type = "submit";
}


}
</script>

</body>
</html>
