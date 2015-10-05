<?php

if (session_status() === PHP_SESSION_NONE) session_start();

$SEC = ''; // Your API Secret

if(isset($_GET['state'])) {
	session_id($_GET['state']);
	if(isset($_GET['APISecret'])) {
		if($_GET['APISecret'] == $SEC) {
			$_SESSION['mlg_login'] = $_GET['mlg_login'];
			$_SESSION['mlg_id'] = $_GET['mlg_id'];
			$_SESSION['mlg_follows'] = urldecode($_GET['mlg_follows']);
			$_SESSION['mlg_subscribes'] = urldecode($_GET['mlg_subscribes']);
		}
	}
}

if(isset($_SESSION['mlg_id'])){
	echo 'Username: '.$_SESSION['mlg_login'].'</br>';
	echo 'ID: '.$_SESSION['mlg_id'].'</br>';
	echo 'Follows: '.$_SESSION['mlg_follows'].'</br>';
	echo 'Subscribes: '.$_SESSION['mlg_subscribes'].'</br>';
	echo '<a href="?logout"><button>Logout</button></a><br/>';
	if(isset($_GET['logout'])) {
		unset($_SESSION['user']);
		unset($_SESSION['mlg_id']);
		unset($_SESSION['mlg_follows']);
		unset($_SESSION['mlg_subscribes']);
		header('Location: /test');
	}
} else {
	echo "<a onclick=\"window.open('https://mlg.timcole.me/?key=1&state=".session_id()."', '_blank', 'location=yes,width=620px,height=400px,scrollbars=yes,status=yes')\"><button>Login with MLG</button></a>";
}

?>