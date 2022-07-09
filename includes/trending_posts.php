<?php $trending_posts = Post::trending_posts();  ?>
    
<div class="side-widget margin-bottom-30">
<h3 class="heading-1"><span>Trending Stories</span></h3>
<ul class="trending-text trending-text2">

<?php $i = 1; ?>    
<?php foreach($trending_posts as $t_post) : ?>  

<li>
<em><?php echo $i; ?></em>
<p><a href="#"><?php echo $t_post->title; ?></a></p>
</li>
<?php $i++; ?>
<?php endforeach; ?>     

</ul>
</div>

