<?php $featured_posts = Post::featured_posts();  ?>

<!--
<div class="side-widget margin-bottom-40">
<h3 class="heading-1"><span>Featured Posts</span></h3>
<div class="row">

<?php //foreach($featured_posts as $f_post) : ?>      
    
<div style="margin-top:10px; padding-bottom:0px; border:0px solid black;" class="col-md-6 col-sm-3">
<div style="margin-top:0px; padding-bottom:0px; " class="layout_2--item margin-bottom-5">
<div style="border:0px solid black;" class="thumb">
<div class="icon-24 gallery2"></div>
<a href="post.php?id= <?php echo $f_post->id; ?> "><img style="width:155; height:118;" src="<?php //echo "cms/images/" . $f_post->image ?>" class="img-responsive" alt=""></a>
</div>
<h6 class="margin-top-10"><a style="font-size:13px;" href="post.php?id= <?php //echo $f_post->id; ?> " ><?php //echo substr($f_post->title,0,60) . "..."  ?></a></h6>
</div>

<hr style="padding-bottom:0px; margin-top:10px;" >
</div>

<?php //endforeach; ?>    
    
</div>		
</div>
-->


<div class="side-widget margin-bottom-60">
 
<h3 class="heading-1"><span>Featured Posts</span></h3>
<ul class="popular-items">
   
<?php foreach($featured_posts as $f_post) : ?>    

<li>

<img style="width:100px;" src="<?php echo "cms/images/" . $f_post->image ?>" class="img-responsive" alt="">
                                                                            
<p><a style="font-size:13px;" href="post.php?id= <?php echo $f_post->id; ?> " ><?php echo $f_post->title ?></a></p>

</li>

<?php endforeach; ?>
    
</ul>
</div>

