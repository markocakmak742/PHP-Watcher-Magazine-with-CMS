<?php include("includes/header.php"); ?>

<?php

$categories = Category::find_all();

if(isset($_SESSION['message'])) { unset($_SESSION['message']); }


if(isset($_POST['submit'])) {

$category = new Category();    
    
$category->cat_title = $_POST['title'];
$category->save();
$session->message("The Category has been added");
header("refresh:1;url=categories.php");
    
}

if(isset($_GET['delete'])) {

$category = Category::find_by_id($_GET['delete']);

$session->message("The Category has been deleted");
$category->delete();
header("refresh:1;url=categories.php");
    
}


?>









<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
<?php include("includes/top_nav.php"); ?>
<?php include("includes/side_nav.php"); ?>        
       
</nav>





<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">

<h1 class="page-header">Categories</h1>
<p class="bg-success"><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; } ?></p>


<div style="border:0px solid red;" class="col-xs-6" >

    <!-- Add Category -->
    <form action="" method="post" >

    <div class="form-group"> 
    <label for="cat-title" >Add Category</label>
    <input class="form-control" type="text" name="title">
    </div>   

    <div class="form-group"> 
    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
    </div>  

    </form>    

    <!-- Update Category -->
    <?php if(isset($_GET['id'])) { include ("includes/update_category.php"); } ?>

</div>




<div class="col-xs-6" >
<table class="table table-bordered table-hover" >
   
    <thead>
    <tr>
    <th>Id</th>
    <th>Category Title</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    </thead>
    
    <tbody>
    <?php foreach($categories as $category) : ?> 

    <tr>
    <td><?php echo $category->id; ?></td>
    <td><?php echo $category->cat_title; ?></td>
    <td><a href="categories.php?id=<?php echo $category->id; ?>">Edit</a></td>
    <td><a href="categories.php?delete=<?php echo $category->id; ?>">Delete</a></td>
    </tr>

    <?php endforeach; ?>
    </tbody>
        
</table>   
</div>


</div>
</div>
</div>
</div>


<?php include("includes/footer.php"); ?>