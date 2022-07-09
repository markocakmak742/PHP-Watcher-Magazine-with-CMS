<?php require_once("includes/header.php"); ?>

<?php 

$posts_cat_1 = Post::posts_in_category("1");
$posts_cat_2 = Post::posts_in_category("2");
$posts_cat_3 = Post::posts_in_category("3");

$_SESSION['last_url'] = "index.php";

?>



<?php require_once("includes/index_posts.php");  ?>



<?php require_once("includes/footer.php"); ?>