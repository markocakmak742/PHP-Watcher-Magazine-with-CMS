<?php include("includes/init.php"); ?>

<?php


$category = Category::find_by_id($_GET['id']);


if($category) {

$category->delete();
$session->message("The Category {$category->cat_title} has been deleted");
redirect("categories.php");

}


?>