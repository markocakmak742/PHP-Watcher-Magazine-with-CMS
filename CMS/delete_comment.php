<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>


<?php





$comment = Comment::find_by_id($_GET['delete']);


if($comment) {

$comment->delete();
$session->message("The Comment with {$comment->id} id has been deleted");
redirect("comments.php");

} else {

redirect("comments.php");

}


?>