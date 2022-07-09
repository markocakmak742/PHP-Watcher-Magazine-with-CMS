<?php

$message = "";

if(isset($_POST['submit'])) {
    
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$password = md5($password);

$user_found = User::verify_user($username, $password);

if($user_found) {
    
$session->login($user_found);
redirect($_SESSION['last_url']);
    
} else {
    
$message = "Your password or username are incorrect";    
    
}

} else {
    
$username = "";
$password = "";
$message = "";

}



?>