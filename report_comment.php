<?php require_once("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

if(empty($_GET['id'])) {

redirect("posts.php");

}


$reportedComments = new reportedComment();

$reportedComments->comment_id   = $_GET['id'];
$reportedComments->post_id      = $_SESSION['post_id'];
$reportedComments->user_id      = $_SESSION['user_id'];

$reportedComments->save();

$session->comment_message("The comment has been reported, your report will be processed!");

redirect($_SESSION['last_url']);

?>