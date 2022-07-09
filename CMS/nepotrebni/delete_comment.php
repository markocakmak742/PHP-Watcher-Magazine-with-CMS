<?php include("includes/init.php"); ?>

<?php


if(empty($_GET['id'])) {

redirect("comments.php");

}


$comment = Comment::find_by_id($_GET['id']);


if($comment) {


$comment->delete();
$session->message("The Comment with {$comment->id} id has been deleted");
redirect("comments.php");

} else {

redirect("comments.php");

}


?>