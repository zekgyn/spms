<?php
session_start();
if(!isset($_SESSION['email']) || $_SESSION['email'] !=true) {
$_SESSION['err'] = "You are not Logged In";
echo $_SESSION['err'];
header("location:../index.php?action=login&message=You are not Logged In");

exit();
}
unset($_SESSION['email']);
session_destroy();
header("location:../index.php?action=login&message=You are not Logged In");




/*
session_start();

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();*/
?>
