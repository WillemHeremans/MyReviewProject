<?php
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
		$output  = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
        $output .= '<br/>Name : ' . $userData['first_name'];
        $output .= '<br/>Gender : ' . $userData['gender'];
        $output .= '<br/>Logged in with : Facebook';
		$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>'; 
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
