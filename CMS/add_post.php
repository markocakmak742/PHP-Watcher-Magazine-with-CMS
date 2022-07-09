<?php include("includes/header.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script>
    
var loadFile = function(event) {
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
URL.revokeObjectURL(output.src) // free memory
    
}
};
    

function getScrollHeight(elm){

var savedValue = elm.value
elm.value = ''
elm._baseScrollHeight = elm.scrollHeight
elm.value = savedValue

}

function onExpandableTextareaInput({ target:elm }){

// make sure the input event originated from a textarea and it's desired to be auto-expandable
if( !elm.classList.contains('autoExpand') || !elm.nodeName == 'TEXTAREA' ) return
  
var minRows = elm.getAttribute('data-min-rows')|0, rows;
!elm._baseScrollHeight && getScrollHeight(elm)

elm.rows = minRows
rows = Math.ceil((elm.scrollHeight - elm._baseScrollHeight) / 16)
elm.rows = minRows + rows
    
}


//Global delegated event listener
document.addEventListener('input', onExpandableTextareaInput)
 


$(document).ready(function() {
$('.summernote').summernote();
});    

$(document).ready(function() {

var t = $('#summernote').summernote(
{
height: 1000,
//focus: true
}
);

$("#btn").click(function(){
$('div.note-editable').height(150);
});
    
});

    
//Resize Proba
$(function() {
    
//  changes mouse cursor when highlighting loawer right of box
$(document).on('mousemove', 'textarea', function(e) {
var a = $(this).offset().top + $(this).outerHeight() - 16,	//	top border of bottom-right-corner-box area
b = $(this).offset().left + $(this).outerWidth() - 16;	//	left border of bottom-right-corner-box area
$(this).css({
cursor: e.pageY > a && e.pageX > b ? 'nw-resize' : ''
});
})
//  the following simple make the textbox "Auto-Expand" as it is typed in
.on('keyup', 'textarea', function(e) {
//  the following will help the text expand as typing takes place
while($(this).outerHeight() < this.scrollHeight + parseFloat($(this).css("borderTopWidth")) + parseFloat($(this).css("borderBottomWidth"))) {
$(this).height($(this).height()+1);
};
});

});    
    
</script>



<style>

textarea{
    
display: block;
box-sizing: padding-box;
overflow: hidden;

padding: 10px;
width: 250px;
font-size: 14px;

border-radius: 6px;
box-shadow: 2px 2px 8px rgba(black, .3);
border: 0;
  
&:focus{
border: none;
outline: none;
    
}

}
    

#proba {  outline: none; text-align: justify; border: 1px solid black; resize:none; width: 100%;}

</style>


<?php

$post = new Post();


if(isset($_POST['create'])) {

if($post) {

$post->title = $_POST['title'];
$post->Introductory_text = $_POST['Introductory_text'];
$post->main_text = $_POST['main_text'];
$post->paragraph = $_POST['paragraph'];

$post->set_file($_FILES['post_image']);
$post->upload_photo();

$post->image = $_FILES['post_image']['name'];
    
$post->category_id = $_POST['category'];
$post->priority = $_POST['priority'];
$post->date = date("F j, Y");
    
$post->save();
$session->message("The Post has been added");
redirect("posts.php");

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
<!-- End Of Navigation -->
       
       
       
<div id="page-wrapper">
<div class="container-fluid">
<div class="row">
<div style="padding-bottom:50px;" class="col-lg-12">

<h1 class="page-header">Add Post</h1>

<form action="" method="post" enctype="multipart/form-data">

<!-- New Post -->
<div class="col-md-8">

<label for="title" >Title</label>

<div class="form-group" >
<textarea rows="1" style="resize:none; " type="text" name="title" class="form-control autoExpand" value="" placeholder=""></textarea>
</div>

<!-- <textarea id="proba" rows="5"></textarea> -->  
    
<div class="form-group" >
<label for="caption" >Introductory text</label>
<textarea rows="1" type="text" name="Introductory_text" class="form-control autoExpand" value="" placeholder="" style="resize:none;"></textarea>
</div>

<div class="form-group" >
<label>Image</label>
<a class="thumbnail" href="#"><img id="output" src="images/default.jpg" alt="" ></a>
<input type="file" accept="image/*" name="post_image" onchange="loadFile(event)">
</div>

<div class="form-group" >
<label for="alternatetext" >Paragraph</label>
<textarea rows="1" type="text" name="paragraph" class="form-control autoExpand" placeholder="" style="resize:none;" ></textarea>
</div>

<div class="form-group" >
<label for="summernote" >Main Text</label>
<textarea  id="summernote"  rows="1" type="text" name="main_text" class="form-control" value="" placeholder="" id="" cols="30" rows="10" ></textarea>
</div>
    


</div>
<!-- End of Post -->





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
<span class="glyphicon glyphicon-calendar"></span> Date: <?php echo date("F j, Y"); ?>
</p>

<p class="text">
Select Category 

<select name="category" class="form-control" >

<?php 

$categories = Category::find_all();
    
foreach($categories as $category) : ?> 

<option value="<?php echo $category->id; ?>" ><?php echo $category->cat_title; ?></option>

<?php endforeach; ?>

</select>

</p>
<p class="text">
Priority on Page
<select name="priority" class="form-control" >
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
<option>7</option>
<option>8</option>
<option>9</option>
<option>10</option>
<option>11</option>
<option>12</option>
<option>13</option>
<option>14</option>
<option>15</option>
<option>16</option>
<option>17</option>
<option>18</option>
</select>
</p>
</div>

<div class="info-box-footer clearfix">
<div class="info-box-delete pull-left">
<input type="submit" name="create" value="Save" class="btn btn-primary btn-lg">
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