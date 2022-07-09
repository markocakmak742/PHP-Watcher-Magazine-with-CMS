<?php include("includes/header.php"); ?>

<?php $categories = Category::find_all(); ?>

<?php

if(isset($_GET['category'])) { 
    
$posts = Post::posts_in_category($_GET['category']);
        
} else {

$posts = Post::find_all();
    
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

<h1 class="page-header"> All Posts </h1>

<p class="bg-success"><?php echo $message; ?></p>


<div style="border:0px solid red;" class="col-md-12">

<table class="table table-bordered table-hover">

    <div style="padding:0px;" id="bulkOptionContainer" class="col-xs-2" >    
    <select onchange="changeurl(this.value)" id="kategorija" class="form-control" name="bulk_options" id="" >
    <option  selected="true" disabled="disabled" style="display:none;" value="" >All Posts</option>
    <option value="" >All Posts</option>

    <?php foreach($categories as $category) : ?> 
        
    <option 
    <?php
    if(isset($_GET['category']) && $_GET['category'] == $category->cat_title) { 
    echo "selected"; 
    }  

    ?>
    value="<?php echo $category->id; ?>" ><?php echo "Category:" . $category->cat_title; ?>
    </option>

    <?php endforeach; ?>

    </select>
    </div>

    <div class="col-xs-4" >
    <a class="btn btn-primary" href="add_post.php" >Add New</a>  
    </div>

<br>
<br>

<!-- Thead of Table -->
<thead>
    <tr>

    <th>Id</th>
    <th>Image</th>
    <th>Title</th>
    <th>Category</th>
    <th>Comments</th>
    <th>Priority on page</th>
    <th>Date</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>

    </tr>
</thead>

<!-- Body of Table -->
<tbody>
    <?php foreach($posts as $post) : ?> 

    
    
    <tr>
    <td><?php echo $post->id; ?></td>
    <td><img style="width:100px;" class="admin-photo-thumbnail" class='img-responsive'  src="<?php echo $post->picture_path(); ?>"></td>
    <td><?php echo $post->title; ?></td>
        
    <?php $category = Category::find_by_id($post->category_id); ?>    
        
    <td><?php echo $category->cat_title; ?></td>

    <td>
    <?php
    $comments = Comment::find_the_comments($post->id);
    echo count($comments);
    ?>
    </td>

    <td><?php echo $post->priority; ?></td>
    <td><?php echo $post->date ?></td>
    <td><a class="btn btn-primary" href="../post.php?id=<?php echo $post->id; ?>" >View Post</a></td>
    <td><a class="btn btn-info" href="edit_post.php?id=<?php echo $post->id ?>" >Edit</a></td>
    <td><a class="btn btn-danger delete_link" href="delete_post.php?id=<?php echo $post->id ?>" >Delete</a></td>
    </tr>

    <?php endforeach; ?>
</tbody>

</table>

</div>


</div>
</div>
</div>

</div>





<script>

function changeurl(string) {
 
if(string != "") {

window.location = "posts.php?category=" + string;
}else {

window.location = "posts.php";
}  
}

</script>





<?php include("includes/footer.php"); ?>