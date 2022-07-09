<?php include("includes/init.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>


<?php


if(empty($_GET['id'])) {

redirect("posts.php");

}


$post = Post::find_by_id($_GET['id']);


if($post) {

$post->delete_post();
$session->message("The Post with {$post->id} id has been deleted!");
redirect("posts.php");

} else {

redirect("posts.php");

}


?>