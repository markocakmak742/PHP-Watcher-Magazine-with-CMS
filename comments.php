<?php
    
require_once("includes/header.php");
$_SESSION['last_url'] = $url;

if(isset($_GET['id'])) {

$post = Post::find_by_id($_GET['id']);
$_SESSION['post_id'] = $post->id;
$comments = Comment::find_the_comments($_GET['id']);
$category = Category::find_by_id($post->category_id);
    
    
} else {
    
redirect("index.php");    
    
}


    
?>


<?php 

if(isset($_POST['submit'])) {

$user_id = $_SESSION['user_id'];
$body   = trim($_POST['body']);

$Comment = new Comment();

$Comment->post_id = $post->id;
$Comment->user_id = $user_id;
$Comment->body    = $body;
$Comment->status  = 'Unapproved';
$Comment->date    = date("Y/m/d");
    
$Comment->save();

$session->comment_message("Your comment has been successfully submitted and is awaiting approval!");
redirect("comments.php?id={$post->id}");

}

?>





<script type="text/javascript">

te = document.querySelector('textarea');
te.addEventListener('keypress', resizeTextarea);
te.addEventListener('keyup', resizeTextarea);
    
function resizeTextarea(ev) {

this.style.height = '24px';
this.style.height = this.scrollHeight + 15 + 'px';

}
    
</script>





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
<!-- class="blog-excerpt" ispod -->
<div  style="border:0px solid black; padding-bottom:5px;" >

<div class="blog-single-head">
<h2><?php echo $post->title; ?></h2>
<div class="meta"><span class="date">Sep. 27, 2016</span><span class="comments">23</span></div>
</div>

<div style="border:0px solid black;" class="post-share margin-bottom-30">

<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i> Share</a>
<a href="https://twitter.com/"><i class="fa fa-twitter"></i> Tweet</a>
<a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i> Pin it</a>
<a href="#"><i class="fa fa-envelope"></i></a>

</div>

<p style="font-size:18px; border:0px solid black; "><?php echo $post->Introductory_text; ?> </p>

<div class="clearfix"></div>

</div>	

<hr class="l4">
<div class="clearfix"></div>



<!-- Comments -->
<h3 class="heading-1"><span><?php echo count($comments) . " " . "Comments"; ?></span></h3>

<div class="comments-list margin-bottom-20">

<?php foreach($comments as $comment) : ?> 

<?php $user = User::find_by_id($comment->user_id); ?>
 
<?php  
    
if($user->gender == "Male") { $comment_image = "male.png"; } else { $comment_image = "female.png"; } 
    
?>

<div class="comment-content first">
<img src="images/comments/<?php echo $comment_image; ?>" alt=""/>



<h5><b><?php echo $user->username; ?></b> <span class="pull-right"><?php echo $comment->date; ?></span></h5>
<p><?php echo $comment->body; ?></p>


<?php if(isset($_SESSION['user_id'])) {


//If logged user commented -> Delete Link
if($comment->user_id == $_SESSION['user_id']) { ?>

<a style="color:#ed0043; float:right;" href="delete_comment.php?id=<?php echo $comment->id; ?>" >Delete</a>

<?php } ?>


<?php 
    
if($comment->user_id !== $_SESSION['user_id']) {

$reported_comment = reportedComment::find_if_user_report($_SESSION['user_id'], $comment->id);       
        
//If logged user reported -> Reported   
if(($reported_comment) && count($reported_comment) > 0 ) { ?>    
    
<a  style="color:gray; float:right; text-decoration:none;">Reported</a>

<?php } else { ?>

<a style="color:#ed0043; float:right;" href="report_comment.php?id=<?php echo $comment->id; ?>" >Report</a> 

<?php    
    
}
}


}

?>

</div>

<?php endforeach; ?>

</div>

    

<?php if(isset($session->comment_message)) { ?>

<div class="alert alert-success" >
<button type="button" class="close" data-dismiss="alert" >X</button>
<?php echo $session->comment_message; ?>
</div>   
    
<?php 
 
//<p class="bg-success"><?php echo //$session->comment_message; </p>                                      
                                      
}

?>
    
    
<?php if($session->is_signed_in()) { ?>

<br>

<h3 class="heading-1"><span>Write a Comment</span></h3>

    
    
<form method="post" class="post-comment-form">
<label>Your Comment</label>
<textarea  maxlength="498"   name="body" style="resize: none;" ></textarea>



<div class="row">
<div class="col-md-6">
<label>Username</label>
<input readonly name="author" value="<?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } ?>" type="text">
</div>

<div class="col-md-6">
<label>Your Email</label>
<input readonly name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>" type="text">
</div>
</div>

<button name="submit" type="submit">Submit Comment</button>
</form>

<?php 
    
} else {
    
?>

<br>

<?php  ?>
    
<a href="login.php" class="btn btn-primary btn-lg" style="background-color: blanchedalmond; color:black; width:100%; font-size:18;" >You must be logged in to post a comment!</a>

<br>    

<?php  

}
    
?>



</div>

<!-- SIDEBAR -->
<?php require_once("includes/aside_post.php") ?>
<!-- // SIDEBAR -->

</div>
</div>
<!-- // CONTENT -->

<?php require_once("includes/footer.php"); ?>

