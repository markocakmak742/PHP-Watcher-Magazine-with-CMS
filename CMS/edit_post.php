<script>
    
var loadFile = function(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
URL.revokeObjectURL(output.src) // free memory
    
}
};
    
$("textarea").keyup(function(e) {
while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
$(this).height($(this).height()+1);
};
});
    
$(document).ready(function() {
$('.summernote').summernote();
});    

$(document).ready(function() {

var t = $('#summernote').summernote(
{
height: 1000,
focus: true
}
);

$("#btn").click(function(){
$('div.note-editable').height(150);
});
    
});
  
    

</script>

<script src="js/jquery.js"></script>
<!-- include summernote css/js-->
<link href="summernote.css">
<script src="summernote.js"></script> 


<?php include("includes/header.php"); ?>


<?php

if(empty($_GET['id'])) {

redirect("posts.php");

}


$post = Post::find_by_id($_GET['id']);


if(isset($_POST['update'])) {

if($post) {

$post->title = $_POST['title'];
$post->Introductory_text = $_POST['Introductory_text'];
$post->main_text = $_POST['main_text'];
$post->paragraph = $_POST['paragraph'];
    
    
$post->category = $_POST['category'];
$post->priority = $_POST['priority'];
$post->date = date("F j, Y");


if(empty($_FILES['user_image'])) {

$post->save();
$session->message("The post has been updated");
redirect("posts.php");

} else {

$post->set_file($_FILES['user_image']);
$post->upload_photo();
$post->save();

$session->message("The post has been updated");
redirect("posts.php");
   
}
}
}

$categories = Category::find_all();




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

<label for="caption" >Introduction text</label>
<textarea style="font-size:16px;" id="textarea" type="text" name="Introductory_text" class="form-control"  placeholder=""><?php echo $post->Introductory_text; ?></textarea>

</div>

<div class="form-group" >

<label>Image</label>
<a class="thumbnail" href="#"><img id="output" src="<?php echo $post->picture_path(); ?>" alt="" ></a>
<input  type="file" accept="image/*" name="user_image" onchange="loadFile(event)">

</div>




<div class="form-group" >

<label for="alternatetext" >Paragraph</label>
<input type="text" name="paragraph" value="<?php echo $post->paragraph ?>" class="form-control" placeholder="">

</div>

<div class="form-group" >
<label for="summernote" >Main Text</label>
<textarea id="summernote" class="form-control" name="main_text" id="" cols="30" rows="10" ><?php echo "$post->main_text "?></textarea>
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
Select Category
<select name="category" class="form-control" >

<?php foreach($categories as $category) : ?> 

<option <?php if($category->id == $post->category_id) { echo "selected"; } ?> ><?php echo $category->cat_title; ?></option>

<?php endforeach; ?>

</select>
</p>
<p class="text">
Priority on Page
<select name="priority" class="form-control" >
<option <?php if($post->priority == 1)  { echo "selected"; } ?> >1</option>
<option <?php if($post->priority == 2)  { echo "selected"; } ?> >2</option>
<option <?php if($post->priority == 3)  { echo "selected"; } ?> >3</option>
<option <?php if($post->priority == 4)  { echo "selected"; } ?> >4</option>
<option <?php if($post->priority == 5)  { echo "selected"; } ?> >5</option>
<option <?php if($post->priority == 6)  { echo "selected"; } ?> >6</option>
<option <?php if($post->priority == 7)  { echo "selected"; } ?> >7</option>
<option <?php if($post->priority == 8)  { echo "selected"; } ?> >8</option>
<option <?php if($post->priority == 9)  { echo "selected"; } ?> >9</option>
<option <?php if($post->priority == 10) { echo "selected"; } ?> >10</option>
<option <?php if($post->priority == 11) { echo "selected"; } ?> >11</option>
<option <?php if($post->priority == 12) { echo "selected"; } ?> >12</option>
<option <?php if($post->priority == 13) { echo "selected"; } ?> >13</option>
<option <?php if($post->priority == 14) { echo "selected"; } ?> >14</option>
<option <?php if($post->priority == 15) { echo "selected"; } ?> >15</option>
<option <?php if($post->priority == 16) { echo "selected"; } ?> >16</option>
<option <?php if($post->priority == 17) { echo "selected"; } ?> >17</option>
<option <?php if($post->priority == 18) { echo "selected"; } ?> >18</option>

</select>
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