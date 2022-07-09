<?php

$category = Category::find_by_id($_GET['id']);

if(isset($_POST['submit'])) {

$category->cat_title = $_POST['cat_title'];
$category->save();
redirect("categories.php");
    
}

?>



<form action="" method="post" >
    
<div class="form-group"> 
<label for="cat-title" >Add Category</label>
<input class="form-control" type="text" name="cat_title">
</div>   
   
<div class="form-group"> 
<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
</div>    
    
    
</form>