<?php include("includes/init.php"); ?>


<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

if(empty($_GET['id'])) {

redirect("posts.php");

}

$comment = Comment::find_by_id($_GET['id']);

if($comment) {

$comment->delete();
$session->comment_message("Your comment has been successfully deleted!");

redirect($_SESSION['last_url']);

} else {

redirect("index.php");

}


?>