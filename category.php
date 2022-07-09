<?php
    
require_once("includes/header.php");


if(isset($_GET['c'])) {

$posts = Post::posts_in_category($_GET['c']);

} else {
    
redirect("index.php");    
    
}

//Taked $url from header
$_SESSION['last_url'] = $url;
    
?>









<!-- Main Content -->
<div class="container margin-top-30">



<!-- First 5 Posts -->
<div style="border:0px solid red;" class="layout_1 home4-masonry margin-bottom-50">

<!-- 1.Row (2 Posts) -->
<div class="row">

<?php

$position = 0;
$start = 0;

foreach(array_slice($posts, $start) as $post) :

if($position < 2) {

?> 

<div class="col-md-6">
<div class="layout_1--item">
<a href="post.php?id=<?php echo $post->id; ?>">
<div class="overlay"></div>
<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>
<div class="layout-detail padding-25">
<h4><?php echo $post->title; ?></h4>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</a>
</div>
</div>

<?php 

$start++;                         
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>

</div>





<!-- 2.Row (3 Posts) -->
<div class="row">

<?php 

foreach(array_slice($posts, $start) as $post) :

if($position < 3) {

?> 

<div class="col-md-4">
<div class="layout_1--item">
<a href="post.php?id=<?php echo $post->id; ?>">
<div class="overlay"></div>
<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>
<div class="layout-detail padding-20">
<h5><?php echo $post->title; ?></h4>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</a>
</div>
</div>

<?php 

$start++;                           
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>

</div>
<!-- 2.Row (3 Posts) -->

</div>







<div class="row">
    
<div class="col-md-8 padding-bottom-30 col-sm-8">

<!-- 3.Row (2 Posts) -->	
<div style="border:0px solid red;" class="layout_1 home4-masonry2 margin-bottom-10">
<div class="row">

<?php 

foreach(array_slice($posts, $start) as $post) :

if($position < 2) {

?> 

<div class="col-md-6">
<div class="layout_1--item">
<a href="post.php?id=<?php echo $post->id; ?>">
<div class="overlay"></div>
<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>
<div class="layout-detail padding-20">
<h5><?php echo $post->title; ?></h5>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</a>
</div>
</div>


<?php 

$start++;                          
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>

</div>
</div>
<!--/ 3.Row (2 Posts) -->	








<!-- 4.Row (4 Posts) -->
<div class="row">

<div style="border:0px solid red;" class="col-md-6 col-sm-6 margin-bottom-30">

<?php 

foreach(array_slice($posts, $start) as $post) :

$category = Category::find_by_id($post->category_id);      
    
if($position < 2) {

?>

<div class="layout_2--item row dual-item2  margin-top-20">
<div class="col-md-5 col-sm-5 padding-right-10">
<div class="thumb">
<div class="icon-24 video2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
</div>
<div class="col-md-7 col-sm-7 padding-left-5">
<span class="cat"><?php echo $category->cat_title; ?></span>
<a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start++;                          
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>

</div>

<div style="border:0px solid red;" class="col-md-6 col-sm-6 margin-bottom-30">

<?php 

foreach(array_slice($posts, $start) as $post) :

$category = Category::find_by_id($post->category_id);      
    
if($position < 2) {

?>

<div class="layout_2--item row dual-item2  margin-top-20">
<div class="col-md-5 col-sm-5 padding-right-10">
<div class="thumb">
<div class="icon-24 video2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
</div>
<div class="col-md-7 col-sm-7 padding-left-5">
<span class="cat"><?php echo $category->cat_title; ?></span>
<a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start++;                          
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>

</div>

</div>
<!--/ 4.Row (4 Posts) -->



<!-- 5.Row (3 Posts) -->	
<div style="border:0px solid red;" class="layout_1 home4-masonry2 margin-bottom-30">
<div class="row">

<?php 

foreach(array_slice($posts, $start) as $post) :

$category = Category::find_by_id($post->category_id);        
    
if($position < 3) {

?>


<div class="col-md-4 col-sm-4">
<div class="layout_2--item margin-bottom-5">
<div class="thumb">
<div class="icon-24 gallery2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<span class="cat"><?php echo $category->cat_title; ?></span>
<a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start++;                          
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>


</div>
</div>
<!-- 5.Row (3 Posts) -->	         







<!-- Last 4 Posts -->  
<?php 

foreach(array_slice($posts, $start) as $post) :

$category = Category::find_by_id($post->category_id);   
        
if($position < 4) {

?>         
                           
<div style="border:0px solid red;" class="layout_3--item row">

<div class="col-md-4 col-sm-5">
<div class="thumb">
<div class="icon-24 video2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
</div>
<div class="col-md-8 col-sm-7">
<span class="cat"><?php echo $category->cat_title; ?></span>
<a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a>
<p><?php echo $post->Introductory_text; ?></p>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>

</div>

<?php 

$start++;                          
                         
} 

$position++; 
endforeach;
$position = 0; 
    
?>
<!-- Last 4 Posts --> 




</div>

<?php require_once("includes/aside.php") ?>

</div>
<!-- Posts & Aside & Footer -->



</div>
<!-- Main Content -->











<?php require_once("includes/footer.php"); ?>