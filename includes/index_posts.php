<div style="padding-bottom:50px;" class="container margin-top-30">
<div class="row">
<div class="col-md-8 col-sm-8">


<!-- 1. Row with 3 Posts -->
<div class="layout_1 margin-bottom-20">

<div class="row">

<?php 

$pozicija_vesti = 0;
$start_cat_2 = 0;

foreach(array_slice($posts_cat_2, $start_cat_2) as $post) :

$category = Category::find_by_id($post->category_id);    
    
if($pozicija_vesti < 1) {

?> 

<div style="border-bottom:0px solid white;" class="col-md-8">
<div class="layout_1--item">
<a href="post.php?id=<?php echo $post->id; ?>">
<span class="badge text-uppercase badge-overlay badge-tech"><?php echo $category->cat_title; ?></span>
<div class="overlay"></div>
<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>
<div class="layout-detail padding-0">
<h4 style="font-weight:600 !important; background: rgba(0, 0, 0, 0.12); width:100%; padding-bottom:5px; padding-left:5px; margin:0px;"  ><?php echo $post->title; ?>
<br>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</h4>
</div>
</a>
</div>
</div>

<?php 

$start_cat_2++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>


<div class="col-md-4">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_2, $start_cat_2) as $post) :

$category = Category::find_by_id($post->category_id);     
    
if($pozicija_vesti < 2) {

?> 

<!-- 2. & 3 Post -->
<div style="border:0px solid black; " class="layout_1--item">
<a href="post.php?id=<?php echo $post->id; ?>">
<span class="badge text-uppercase badge-overlay badge-tech"><?php echo $category->cat_title; ?></span>
<div style="border:0px solid white;" class="overlay"></div>
<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>
<div style="border:0px solid white;" class="layout-detail padding-0">
<h5 style="font-weight:600 !important; background: rgba(0, 0, 0, 0.12); width:100%; padding-bottom:5px; padding-left:5px; margin:0px;"  ><?php echo $post->title; ?>
<br>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</h5>
</div>
</a>
</div>


<?php 

$start_cat_2++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>


</div>
</div>
<!-- End of 1. Row with 3 Posts -->


 
<div style="border:0px solid red; padding-bottom:0px; margin-bottom:0px;" class="layout_2 margin-bottom-0">

<!-- 2. Row with 6 Posts -->
<div style="border:0px solid red; padding-bottom:0px; margin-bottom:0px; " class="row">

<?php 

$pozicija_vesti = 0;
$start_cat_1 = 0;

foreach(array_slice($posts_cat_1, $start_cat_1) as $post) :

$category = Category::find_by_id($post->category_id);      
    
if($pozicija_vesti < 3) {

?> 

<div class="col-md-4 col-sm-4" style="border:0px solid red; padding-bottom:0px; margin-bottom:0px;"  >
<div style="border:0px solid black; margin-bottom:20px;" class="layout_1--item">
<a href="post.php?id=<?php echo $post->id; ?>">
<span class="badge text-uppercase badge-overlay badge-tech"><?php echo $category->cat_title; ?></span>
<div style="border:0px solid white;" class="overlay"></div>
<img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/>
<div style="border:0px solid white;" class="layout-detail padding-0">
<h5 style="font-weight:600 !important; background: rgba(0, 0, 0, 0.12); width:100%; padding-bottom:5px; padding-left:5px; margin:0px;"  ><?php echo $post->title; ?>
<br>
<div class="meta"><span class="date"><?php echo $post->date; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</h5>
</div>
</a>
</div>
</div>
    

<?php 

$start_cat_1++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>
<!-- End of 2. Row with 6 Posts --> 



<!-- 3. Row with 4 Posts --> 
<div style="" class="row">

<?php 

$pozicija_vesti = 0;
$start_cat_3 = 0;

foreach(array_slice($posts_cat_3, $start_cat_3) as $post) :

$category = Category::find_by_id($post->category_id);     
    
if($pozicija_vesti < 4) {

?> 

<div class="col-md-3 col-sm-3">
<div class="layout_2--item">
<div  class="thumb">
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<span class="cat"><?php echo $category->cat_title; ?></span>
<h4><a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start_cat_3++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>
<!-- End of 3. Row with 4 Posts --> 

</div>



 
<div class="layout_3">

<!-- 5. Row with 2 Posts -->    
<div class="row">

<div class="col-md-6 col-sm-6">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_1, $start_cat_1) as $post) :

$category = Category::find_by_id($post->category_id);     
    
if($pozicija_vesti < 1) {

?> 

<h3 class="heading-1"><span><?php echo $category->cat_title; ?></span></h3>
<div class="layout_3--item">
<div class="thumb">
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<span class="cat"><?php echo $category->cat_title; ?></span>
<h4><a href="#"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>


<?php 

$start_cat_1++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>


<div class="col-md-6 col-sm-6">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_3, $start_cat_3) as $post) :

$category = Category::find_by_id($post->category_id);     
    
if($pozicija_vesti < 1) {

?> 

<h3 class="heading-1"><span><?php echo $category->cat_title; ?></span></h3>
<div class="layout_3--item">
<div class="thumb">
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<span class="cat"><?php echo $category->cat_title; ?></span>
<h4><a href="#"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>


<?php 

$start_cat_3++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>


</div>
<!-- End of 5. Row with 2 Posts --> 

</div>



<!-- 6. Row with 4 Posts --> 
<div class="layout_2 margin-bottom-15">
<div class="row">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_1, $start_cat_1) as $post) :

$category = Category::find_by_id($post->category_id);     
    
if($pozicija_vesti < 2) {

?> 

<!-- 2 Posts -->
<div class="col-md-3 col-sm-6">
<div class="layout_2--item">
<div class="thumb margin-bottom-10">
<div class="icon-24 gallery2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<h4><a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start_cat_1++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>



<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_3, $start_cat_3) as $post) :

$category = Category::find_by_id($post->category_id);      
    
if($pozicija_vesti < 2) {

?> 

<!-- 2 Posts -->
<div class="col-md-3 col-sm-6">
<div class="layout_2--item">
<div class="thumb margin-bottom-10">
<div class="icon-24 gallery2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<h4><a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start_cat_3++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>


</div>
</div>
<!-- End of 6. Row with 4 Posts --> 
    
    
    
    

<!-- 7. Row with 2 Posts -->
<div class="layout_3">
<div class="row">

<div class="col-md-6 col-sm-6">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_2, $start_cat_2) as $post) :

$category = Category::find_by_id($post->category_id);       
    
if($pozicija_vesti < 1) {

?> 

<h3 class="heading-1"><span><?php echo $category->cat_title; ?></span></h3>
<div class="layout_3--item">
<div class="thumb">
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<span class="cat"><?php echo $category->cat_title; ?></span>
<h4><a href="#"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>


<?php 

$start_cat_2++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>


<div class="col-md-6 col-sm-6">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_2, $start_cat_2) as $post) :

$category = Category::find_by_id($post->category_id);       
    
if($pozicija_vesti < 1) {

?> 

<h3 class="heading-1"><span><?php echo $category->cat_title; ?></span></h3>
<div class="layout_3--item">
<div class="thumb">
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<span class="cat"><?php echo $category->cat_title; ?></span>
<h4><a href="#"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>


<?php 

$start_cat_2++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>

</div>


</div>
</div>
<!-- End of 7. Row with 2 Posts --> 
    
    
    
<!-- 8. Row with 4 Posts -->
<div class="layout_2 margin-bottom-15">
<div class="row">

<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_2, $start_cat_2) as $post) :

$category = Category::find_by_id($post->category_id);       
    
if($pozicija_vesti < 2) {

?> 

<!-- 2 Posts -->
<div class="col-md-3 col-sm-6">
<div class="layout_2--item">
<div class="thumb margin-bottom-10">
<div class="icon-24 gallery2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<h4><a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start_cat_2++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>





<?php 

$pozicija_vesti = 0;

foreach(array_slice($posts_cat_2, $start_cat_2) as $post) :

$category = Category::find_by_id($post->category_id);       
    
if($pozicija_vesti < 2) {

?> 

<!-- 2 Posts -->
<div class="col-md-3 col-sm-6">
<div class="layout_2--item">
<div class="thumb margin-bottom-10">
<div class="icon-24 gallery2"></div>
<a href="post.php?id=<?php echo $post->id; ?>"><img src="<?php echo "cms/" . $post->picture_path(); ?>" class="img-responsive" alt=""/></a>
</div>
<h4><a href="post.php?id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h4>
<div class="meta"><span class="date"><?php echo $category->cat_title; ?></span><span class="comments"><?php echo count(Comment::find_the_comments($post->id)) ?></span></div>
</div>
</div>

<?php 

$start_cat_2++;                         
                         
} 

$pozicija_vesti++; 
endforeach;
$pozicija_vesti = 0; 
    
?>


</div>
</div>
<!-- End of 8. Row with 4 Posts -->



</div>

    
    

<!-- SIDEBAR -->
<?php require_once("includes/aside_post.php") ?>
<!-- // SIDEBAR -->

</div>
</div>