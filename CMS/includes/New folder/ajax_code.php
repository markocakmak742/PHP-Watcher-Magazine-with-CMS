<?php 

require_once("functions.php");
require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");


$user  = new User();



if(isset($_POST['image_name'])) {

$user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);


}


if(isset($_POST['photo_id'])) {

Photo::display_sidebar_data($_POST['photo_id']);


}







?>