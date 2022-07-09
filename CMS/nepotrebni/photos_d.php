<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php

$photos = Photo::find_all();

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
<?php
            
include("includes/top_nav.php");
            
?>

           
                      
                                            
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                       
<?php
            
include("includes/side_nav.php")
            
?>
           
<!-- /.navbar-collapse -->
            
            
</nav>

       
       
       
<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
<div class="col-lg-12">
<h1 class="page-header">
Photos
<small></small>
</h1>

<p class="bg-success"><?php echo $message; ?></p>

<div style="border:0px solid red;" class="col-md-12">

<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Id</th>
<th>Image</th>
<th>Users</th>
<th>Title</th>
<th>Category</th>
<th>Status</th>
<th>Tags</th>
<th>Comments</th>
<th>Date</th>
<th>View</th>
<th>Edit</th>
<th>Delete</th>
</tr>
</thead>

<tbody>

<?php foreach($photos as $photo) : ?> 

<tr>
<td><?php echo $photo->id; ?></td>
<td><img class="admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>"></td>
<td>Users</td>
<td>Title</td>
<td>Category</td>
<td>Status</td>

<td>

<?php 

$comments = Comment::find_the_comments($photo->id);

echo count($comments);

?>

</td>

<td>Comments</td>
<td>Date</td>

<td><a class="btn btn-primary" href="../photo.php?id=<?php echo $photo->id; ?>" >View Post</a></td>
<td><a class="btn btn-info" href="edit_photo.php?id=<?php echo $photo->id ?>" >Edit</a></td>
<td><a class="btn btn-danger delete_link" href="delete_photo.php?id=<?php echo $photo->id ?>" >Delete</a></td>



</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>


</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->






</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>