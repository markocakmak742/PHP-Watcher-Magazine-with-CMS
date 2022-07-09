<script>
    
var loadFile = function(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
URL.revokeObjectURL(output.src) // free memory
    
}
};
  
</script>


<?php include("includes/header.php"); ?>


<?php

if(empty($_GET['id'])) {

redirect("photos.php");

}


$post = Post::find_by_id($_GET['id']);


if(isset($_POST['update'])) {

if($post) {

$post->title = $_POST['title'];
$post->caption = $_POST['caption'];
$post->alternate_text = $_POST['alternatetext'];
$post->description = $_POST['description'];

if(empty($_FILES['user_image'])) {

$post->save();
$session->message("The post has been updated");
redirect("photos.php");

} else {

$post->set_file($_FILES['user_image']);
$post->upload_photo();
$post->save();

$session->message("The post has been updated");
redirect("photos.php");
   
}
}
}


?>





<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
<?php
            
include("includes/top_nav.php");
include("includes/side_nav.php")
            
?>
            
</nav>

       
       
       
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">

<h1 class="page-header">Edit Post</h1>


<form action="" method="post" enctype="multipart/form-data">



<div class="col-md-8">



<label for="title" >Title</label>

<div class="form-group" >
<input type="text" name="title" class="form-control" value="<?php echo $post->title; ?>" placeholder="">
</div>

<div class="form-group" >

<label>Image</label>
<a class="thumbnail" href="#"><img id="output" src="<?php echo $post->picture_path(); ?>" alt="" ></a>
<input  type="file" accept="image/*" name="user_image" onchange="loadFile(event)">

</div>


<div class="form-group" >

<label for="caption" >Caption</label>
<input type="text" name="caption" class="form-control" value="<?php echo $post->caption; ?>" placeholder="">

</div>

<div class="form-group" >

<label for="alternatetext" >Alternate Text</label>
<input type="text" name="alternatetext" value="<?php echo $post->alternate_text ?>" class="form-control" placeholder="">

</div>

<div class="form-group" >

<label for="summernote" >Description</label>
<textarea id="summernote" class="form-control" name="description" id="" cols="30" rows="10" ><?php echo "$post->description "?></textarea>

</div>



</div>







<!-- Publish Option -->
<div class="col-md-4" >
<div  class="photo-info-box">

<div class="info-box-header">
<h4>Publish Option<span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span>
</h4>
</div>


<div class="inside">


<div class="box-inner">
<p class="text">
<span class="glyphicon glyphicon-calendar"></span> Date: April 22, 2030 @ 5:26
</p>
<p class="text">
Select Category <select class="form-control" ><option>Sport</option></select>
</p>
<p class="text">
Position on Page <select class="form-control" ><option>Popular</option></select>
</p>
</div>

<div class="info-box-footer clearfix">
<div class="info-box-delete pull-left">
<input type="submit" name="update" value="Update" class="btn btn-primary btn-lg">
</div> 

<div class="info-box-update pull-right ">
<a  href="posts.php" class="btn btn-danger btn-lg">Cancel</a>   
</div> 
</div>


</div> 

                  
</div>
</div>
<!-- End of Publish Option -->


</form>


</div>
</div>
</div>
</div>


<?php include("includes/footer.php"); ?>