<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once './core/config.php';

include_once './core/connexion.php';



if (!empty($_POST) && isset($_POST['pseudo'])) {

$query=$bdd->prepare('SELECT * FROM profils WHERE pseudo = :pseudo');

        $query->bindValue(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);

        $query->execute();

        $data=$query->fetch();

    if ($data['pseudo'] == $_POST['pseudo'])

    {

	$_SESSION['pseudo'] = $data['pseudo'];
	$_SESSION['age'] = $data['age'];
	$_SESSION['pref'] = $data['pref_1'];
	$_SESSION['lieu'] = $data['lieu_1'];
        header("Location: profil.php");

    }

#else if ($data['pseudo'] != $_POST['pseudo']) {
#$nonnon = '<span style="color:red;">Ce pseudo n\'existe pas ! </span>';
#}
	
}

var_dump($_SESSION['pseudo']);
var_dump($_SESSION['age']);
var_dump($_SESSION['pref']);
var_dump($_SESSION['lieu']);




echo '<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LOGIN</title>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>MyReview app ;-)</h2>

<button onclick="document.getElementById(`id01`).style.display=`block`" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById(`id01`).style.display=`none`" class="close" title="Close Modal">&times;</span>
      <img src="./image/logo.png" alt="Avatar" class="avatar" height="50%" width="50%">
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="pseudo" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="souvenir"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById(`id01`).style.display=`none`" class="cancelbtn">Cancel</button>
      <span class="psw"><a href="account.php">Create a account</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById(`id01`);

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>';


#if (isset($_POST['souvenir']))

#{

#$expire = time() + 365*24*3600;

#setcookie('pseudo', $_SESSION['pseudo'], $expire);
#setcookie('age', $data['age'], $expire);
#setcookie('sexe', $data['sexe'], $expire); 
#setcookie('pref', $data['pref_1'], $expire);
#setcookie('lieu', $data['lieu_1'], $expire);


#}

?>

