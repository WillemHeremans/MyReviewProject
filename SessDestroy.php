<?php

if (isset ($_COOKIE['pseudo']))

{

setcookie('pseudo', '', -1);
setcookie('age', '', -1);
setcookie('pref', '', -1);
setcookie('lieu', '', -1);
setcookie('gender', '', -1);
}
session_destroy();
header('Location: login.php');
?>
