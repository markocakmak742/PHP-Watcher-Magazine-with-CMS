<?php

$category = Category::find_by_id($_GET['id']);

?>

<form method="post" action="" class="form-group"> 

<div class="form-group"> 
<label for="cat-title" >Update Category</label>
<input class="form-control" type="text" name="cat_title" value="<?php echo $category->cat_title; ?>" >    
</div> 
         
<div class='form-group'> 
<input class='btn btn-primary' type='submit' name='update_category' value='Update Category'>
</div>

</form>

<?php


if(isset($_POST['cat_title'])) {

if($category) {

$category->cat_title = $_POST['cat_title'];
$session->message("The Category has been updated");
$category->save();
header("refresh:1;url=categories.php");

}
}





?>






