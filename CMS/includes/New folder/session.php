<?php

class Session {

private $signed_in       = false;
private $signed_in_admin = false;

public  $user_id;
public  $username;
public  $email;
    
public  $admin_user_id;
public  $admin_username;
public  $admin_email;
    
public $message;
public $comment_message;



function __construct() {

session_start();

$this->check_login();
$this->check_message();

}


  
public function message($msg="") {
    
if(!empty($msg)) {

$_SESSION['message'] = $msg;   

} else {

return $this->message;    

}
}
    
public function comment_message($comment_message="") {
    
if(!empty($comment_message)) {

$_SESSION['comment_message'] = $comment_message;

} else {

return $this->comment_message;    

}
}



public function check_message() {
    
if(isset($_SESSION['comment_message'])) {

$this->comment_message = $_SESSION['comment_message'];
unset($_SESSION['comment_message']);

}   
}



public function is_signed_in() {

return $this->signed_in;

}
    
public function is_signed_in_admin() {

return $this->signed_in_admin;

}



public function login($user) {
    
if($user) {
    
$this->user_id  = $_SESSION['user_id'] = $user->id;
$this->username = $_SESSION['username'] = $user->username;
$this->email    = $_SESSION['email'] = $user->email;

$this->signed_in = true;

}  
}
    

public function login_admin($user) {
    
$this->admin_user_id  = $_SESSION['admin_user_id'] = $user->id;
$this->admin_username = $_SESSION['admin_username'] = $user->username;


$this->signed_in = true;
    
}


  
public function logout() {

unset($_SESSION['user_id']);   
unset($this->user_id);
unset($this->username);
$this->signed_in = false;

}
    
public function logout_admin() {



}



private function check_login() {

if(isset($_SESSION['user_id'])) {

$this->user_id = $_SESSION['user_id'];
$this->signed_in = true;

} else {

unset($this->user_id);
$this->signed_in = false;

}
}
    
private function check_login_admin() {


}
    
    
    
    
    

}


$session = new Session;
$message = $session->message;









?>