<?php

$category = new Category();

if(isset($_POST['submit'])) {

$category->cat_title = $_POST['title'];
$category->save();
$session->message("The Category has been added");
header("refresh:1;url=categories.php");
    
}

?>



<form action="" method="post" >
    
<div class="form-group"> 
<label for="cat-title" >Add Category</label>
<input class="form-control" type="text" name="title">
</div>   
   
<div class="form-group"> 
<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
</div>    
    
    
</form>