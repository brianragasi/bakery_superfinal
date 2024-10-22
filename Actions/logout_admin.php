<?php
session_start(); 

// 1. Unset all session variables
$_SESSION = array();

// 2. Destroy the session
session_destroy();

// 3. Delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Redirect to the admin login page 
header("Location: ../views/admin_login.php"); 
exit;
?>