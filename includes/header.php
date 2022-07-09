<?php 

require_once("includes/init.php");


$categories = Category::find_all();

$url = array_slice(explode('/', $url = $_SERVER['REQUEST_URI']), -1)[0];



?>

<!doctype html>

<html lang="zxx">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Watcher Magazine</title>

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Custom Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,400i,500,700,700i,900" rel="stylesheet">

<!-- Icon CSS -->
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- Theme CSS -->
<link href="css/ts.css" rel="stylesheet">
<link href="js/slick/slick.css" rel="stylesheet">
<link href="js/lity/lity.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">



</head>

<body>





<?php $breaking_posts = Post::posts_in_category(1); ?>

<div class="wrapper">


<!-- HEADER / MENU -->
<header class="header1 header-megamenu">

<div class="topbar">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-8 hidden-xs">
<div class="newsfeed">
<span>Breaking:</span>
<div class="news-carousel">


    
<?php 

$i = 0;
    
foreach($breaking_posts as $post) : 
   
if($i<5) {
  
?>

<div class="item"><a href="./post_page_01.html"><?php echo $post->title; ?></a></div>

<?php 

}

$i++; 
endforeach; 

    
?>

</div>
</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="pull-right account-options">



<?php

if($session->is_signed_in()) {

echo "<a href=''>{$_SESSION['username']}</a>";

    
} else {

echo "<a href='registration.php'>Sign Up</a>";

}

?>

<span>|</span>

<?php

if($session->is_signed_in()) {

echo "<a style='border:0px solid white; padding:0px;' href='logout.php'>Logout</a>";

    
} else {

echo "<a href='login.php' class='login'>Sign In</a>";

}

?>

</div>

</div>
</div>
</div>
</div>

<div class="clearfix"></div>

<div class="navbar-header padding-vertical-10">
<div class="container">

<a href="index.php" class="navbar-brand"><img src="images/logo.png" class="img-responsive" alt=""/></a>
<div style="padding-bottom:0px;" class="ad-banner pull-right hidden-xs">
<a href="index.php"><img src="images/ads/728x90.jpg" class="img-responsive" alt=""/></a>
    
</div>

</div>
</div>

<div class="clearfix"></div>

<div class="container">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span>Navigation</span>
<span class="fa fa-navicon"></span>
</button>

<div class="search-wrap2">
<form>
<input type="text" placeholder="Search by typing">
<div class="sw2-close"><span class="fa fa-close"></span></div>
</form>
</div>



<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">

<li <?php 

$url = array_slice(explode('/', $url = $_SERVER['REQUEST_URI']), -1)[0];
    
if($url == "index.php") { 
    
echo "style='background-color:#ededed;'"; 

} 
    
    
?> class="dropdown dropdown-v2">
<a href="index.php">Home</a>
</li>

<?php foreach($categories as $category) : ?> 

<li <?php if(isset($_GET['category']) && $category->cat_title == $_GET['category']) { echo "style='background-color:#ededed;'"; } ?> >
<a  href="category.php?c=<?php echo $category->id . "/" . $category->cat_title ; ?>"><?php echo $category->cat_title; ?></a>
</li>

<?php endforeach; ?>

</ul>
</div>

</div>
</header>
<!-- // HEADER / MENU -->