<!-- FOOTER -->
<footer class="bg-dark footer1 padding-top-60">
<div class="container">

<div class="row margin-bottom-30">
<div class="col-md-4 col-sm-4 margin-bottom-30 footer-info">
<a href="./index.html"><img src="images/flogo.png" class="img-responsive" alt=""/></a>
<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
<span><i class="fa fa-map-marker"></i> 1610 Connecticut Avenue, NW, Suite 500</span>
<span><i class="fa fa-envelope"></i> <a href="mailto:info@watcher.com">info@watcher.com</a></span>
<span><i class="fa fa-phone"></i> +1-202-555-0113</span>
</div>

<div class="col-md-4 col-sm-4 margin-bottom-30 footer-trending">
<h5>Trending</h5>

<div class="side-widget margin-bottom-30">
<ul class="trending-text trending-text2">

<?php $i = 1; ?>    
<?php foreach($trending_posts as $t_post) : ?>  

<li>
<em><?php echo $i; ?></em>
<p><a href="post.php?id=<?php echo $t_post->id; ?>" style="color:#a5a7ac;" href="#"><?php echo $t_post->title; ?></a></p>
</li>
<?php $i++; ?>
<?php endforeach; ?>     

</ul>
</div>

</div>

<div class="col-md-4 col-sm-4 margin-bottom-30 footer-follow">
<h5>Follow</h5>
<div class="footer-newsletter">

<form action="php/subscribe.php" method="POST">
<i class="fa fa-envelope"></i>
<input type="email" placeholder="Email address" class="e-mail" name="email" data-validate="validate(required, email)">
<button type="submit">Subscribe</button>
</form>
<span>Don't worry we hate spam as much as you do</span>
</div>

<div class="footer-social">
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-linkedin"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-youtube-play"></i></a>
</div>
</div>

</div>

<!-- FOOTER COPYRIGHT -->
<div class="footer-bottom">
<div class="row">

<div class="col-md-4 col-sm-12">
<p>&copy; Copyright 2016 Watcher.com. All rights reserved.</p>
</div>

<div class="col-md-8 col-sm-12">
<ul class="footer-links">
<li><a href="#">About Us</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#">Terms of Use</a></li>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Advertising</a></li>
<li><a href="#">Subscribe</a></li>
</ul>
</div>

</div>
</div>

</div>
</footer>
<!-- // FOOTER -->

</div>
<!-- // Wrapper -->



<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/slick/slick.min.js"></script>
<script src="js/socialShare.min.js"></script>
<script src="js/jquery.simpleWeather.min.js"></script>
<script src="js/lity/lity.min.js"></script>

<!-- Theme JavaScript -->
<script src="js/main.js"></script>

<!-- Mailchimp Js -->
<script src="js/mc/jquery.ketchup.all.min.js"></script>
<script src="js/mc/main.js"></script>

<!-- Twitterfeed -->
<script src="js/tweecool.min.js"></script>

<script>
$(document).ready(function() {
$('#tweecool').tweecool({
//Change tweecool with touhr twitter username
username : 'tweecool', 
profile_image: false,
limit : 3	
});
});
</script>

</body>
</html>