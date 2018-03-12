<?php
#include_once '../core/config.php';

#include_once '../core/connexion.php';

#include_once '../core/request.php';
// Include FB config file && User class
require_once 'fbConfig.php';
require_once 'User.php';

if(isset($accessToken)){
	if(isset($_SESSION['facebook_access_token'])){
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}else{
		// Put short-lived access token in session
		$_SESSION['facebook_access_token'] = (string) $accessToken;
		
	  	// OAuth 2.0 client handler helps to manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();
		
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
		$_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
		
		// Set default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
	}
	
	// Redirect the user back to the same page if url has "code" parameter in query string
	if(isset($_GET['code'])){
		header('Location: ./');
	}
	
	// Getting user facebook profile info
	try {
		$profileRequest = $fb->get('/me?fields=name,first_name,last_name, gender, picture');
		$fbUserProfile = $profileRequest->getGraphNode()->asArray();
	} catch(FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// Redirect user back to app login page
		header("Location: ./");
		exit;
	} catch(FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// Initialize User class
	$user = new User();
	
	// Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'pseudo' 	=> $fbUserProfile['first_name'],
		'gender' 		=> $fbUserProfile['gender'],
		'picture' 		=> $fbUserProfile['picture']['url']
	);
	$userData = $user->checkUser($fbUserData);
	
	// Put user data into session
	$_SESSION['userData'] = $userData;
	
	// Get logout url
	$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
	
	// Render facebook profile data
	if(!empty($userData)){

$db_config = array(
		"db_host" => "localhost",
		"db_user" => "root",
		"db_pass" => "",
		"db_name" => "MyReview",
	);

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

if (!empty($_POST)&&isset($_POST['addData'])) {

	$phrase_sql = "UPDATE profils SET age = :age, pref_1 = :pref_1, pref_2 = :pref_2, pref_3 = :pref_3, pref_4 = :pref_4, pref_5 = :pref_5, lieu_1 = :lieu_1, lieu_2 = :lieu_2, lieu_3 = :lieu_3, lieu_4 = :lieu_4, lieu_5 = :lieu_5
    WHERE pseudo = '".$userData['pseudo']."'";
	$preparation = $bdd->prepare($phrase_sql);

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
       


	if ($preparation->execute()) {
		header('Location: index.php');
	} else {
		echo "OOOPS!";
	}
}



		$output  = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['avatar'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['pseudo'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Logged in with : Facebook';
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>'; 

	echo 
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
</html>';
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
	
}else{
	// Get login url
	$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
	
	// Render facebook login button
	$output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/fblogin-btn.png"></a>';
}
?>

<html>
<head>
<title>Login with Facebook using PHP by CodexWorld</title>
<style type="text/css">
	h1{font-family:Arial, Helvetica, sans-serif;color:#999999;}
</style>
</head>
<body>
	<!-- Display login button / Facebook profile information -->
	<div><?php echo $output; ?></div>
</body>
</html>
