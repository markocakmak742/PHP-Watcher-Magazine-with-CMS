<?php include("includes/header.php"); ?>

<?php

require_once("../admin/includes/init.php");

require_once("../admin/includes/post.php");
require_once("../admin/includes/functions.php");
require_once("../admin/includes/comment.php");

if(empty($_GET['id'])) {

redirect("index.php");

}

$post = Post::find_by_id($_GET['id']);




if(isset($_POST['submit'])) {

$author = trim($_POST['author']);
$body = trim($_POST['body']);

$new_comment = Comment::create_comment($post->id, $author, $body, $reports);

if($new_comment) {

$new_comment->save();
redirect("photo.php?id={$post->id}");

} else {

$message = "There was some problem saving";

}

} else {

$author = "";
$body = "";


}


$comments = Comment::find_the_comments($post->id);






?>


<div class="row">

<!-- Blog Post Content Column -->
<div class="col-lg-12">

<!-- Blog Post -->

<!-- Title -->
<h1><?php echo $post->title; ?></h1>

<!-- Author -->
<p class="lead">
by <a href="#">Marko Cakmak</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" style="width:100%;" src="admin/<?php echo $post->picture_path(); ?>" alt="">

<hr>

<!-- Post Content -->
<p class="lead"><?php echo $post->caption; ?></p>

<p><?php echo $post->description; ?></p>

<hr>

<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
<h4>Leave a Comment:</h4>

<form role="form" method="post">

<div class="form-group">
<label for="author" >Author</label>
<input type="text" name="author" class="form-control">
</div>


<div class="form-group">
<textarea class="form-control" rows="3" name="body" ></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<hr>

<!-- Posted Comments -->
                

<?php foreach ($comments as $comment): ?>

<!-- Comment -->
<div class="media">
<a class="pull-left" href="#">
<img class="media-object" src="http://placehold.it/64x64" alt="">
</a>
<div class="media-body">
<h4 class="media-heading"><?php echo $comment->author; ?>
<small>August 25, 2014 at 9:30 PM</small>
</h4>
<?php echo $comment->body; ?>

</div>
</div>

<?php endforeach; ?>


</div>
<!-- End of Blog Post Content Column -->



<!-- Blog Sidebar Widgets Column -->
<!-- <div class="col-md-4"> -->

            
<?php //include("includes/sidebar.php"); ?>

</div>

<!-- </div> -->
<!-- /.row -->

<?php include("includes/footer.php"); ?>


