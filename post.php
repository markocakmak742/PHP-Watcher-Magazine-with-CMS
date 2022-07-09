<?php
    
require_once("includes/header.php");


if(isset($_GET['id'])) {

$post = Post::find_by_id($_GET['id']);
$comments = Comment::find_the_comments_limit($_GET['id']);
$category = Category::find_by_id($post->category_id);
    
} else {
    
redirect("index.php");    
    
}

$_SESSION['last_url'] = $url;
    
?>


<!-- PAGE HEADER -->
<div class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="bcrumbs">
<li><a href="index.php">Home</a></li> 
<li><a href="category.php?c=<?php echo $post->category_id . "/" . $category->cat_title ?>"><?php echo $category->cat_title; ?></a></li>
<li><a href="post.php?id=<?php echo $post->id ?>"><?php echo $post->title ?></a></li>
</ul>
</div>
</div>
</div>
</div>
<!-- // PAGE HEADER -->



<div class="container single-post padding-bottom-30">
<div class="row">

<div class="clearfix"></div>

<div class="col-md-8 col-sm-7 padding-bottom-30">
<div class="blog-excerpt">
<div class="blog-single-head">
<h2><?php echo $post->title ?></h2>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>

<div class="post-share margin-bottom-30">
<a href="#"><i class="fa fa-facebook"></i> Share</a>
<a href="#"><i class="fa fa-twitter"></i> Tweet</a>
<a href="#"><i class="fa fa-pinterest"></i> Pin it</a>
<a href="#"><i class="fa fa-envelope"></i></a>
</div>

<p style="font-size:18px;"> <?php echo $post->Introductory_text; ?> </p>

<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>

<div class="clearfix"></div>

<div class="margin-top-30">

<p> <?php echo $post->paragraph; ?> </p>

<p> <?php echo $post->main_text; ?> </p>

</div>

</div>	



<div class="clearfix"></div>
<div class="margin-bottom-10"></div>
<div class="clearfix"></div>

<div class="single-share">
<span>Share:</span> 
<div class="post-share">
<a href="#"><i class="fa fa-facebook"></i> Share</a>
<a href="#"><i class="fa fa-twitter"></i> Tweet</a>
<a href="#"><i class="fa fa-pinterest"></i> Pin it</a>
<a href="#"><i class="fa fa-envelope"></i></a>
</div>
</div>

<div class="margin-bottom-30"></div>
<hr class="l4">

<div class="clearfix"></div>

<h3 class="heading-1"><span><?php echo count($comments) . " " . "Comments"; ?></span></span></h3>

<div class="comments-list margin-bottom-20">

<?php foreach($comments as $comment) : ?> 

<?php $user = User::find_by_id($comment->user_id); ?>    
    
<div class="comment-content first">
<img src="images/comments/male.png" alt=""/>

<h5><b><?php echo $user->username; ?></b> <span class="pull-right"><?php echo $comment->date; ?></span></h5>
<p><?php echo $comment->body; ?></p>

</div>

<?php endforeach; ?>

</div>

<h3 class="heading-1"><a href="comments.php?id=<?php echo $post->id; ?>" >View all Comments</a></h3>




</div>

<!-- SIDEBAR -->
<?php require_once("includes/aside_post.php") ?>
<!-- // SIDEBAR -->

</div>
</div>
<!-- // CONTENT -->








<?php require_once("includes/footer.php"); ?>