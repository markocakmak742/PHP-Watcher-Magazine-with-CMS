<div  class="container-fluid">
<div class="row">
<div class="col-lg-12">

<h1 class="page-header">
Admin
<small>Dashboard</small>
</h1>


<!-- First Row -->
<div class="row">


<!-- Posts -->
<div class="col-lg-3 col-md-6">

<div class="panel panel-green">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-photo fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo Photo::count_all(); ?></div>
<div>Posts</div>
</div>
</div>
</div>
<a href="photos.php">
<div class="panel-footer">
<span class="pull-left">Published Posts</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>

</div>

<!-- Users -->
<div class="col-lg-3 col-md-6">

<div class="panel panel-primary">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-users fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo User::count_all(); ?></div>
<div>Users</div>
</div>
</div>
</div>
<a href="users.php">
<div class="panel-footer">
<span class="pull-left">Registred Users</span> 
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
<div class="clearfix"></div>
</div>
</a>
</div>

</div>

<!-- Comments -->
<div class="col-lg-3 col-md-6">

<div class="panel panel-yellow">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-comments fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo Comment::count_all(); ?></div>
<div>Comments</div>
</div>
</div>
</div>
<a href="comments.php">
<div class="panel-footer">
<span class="pull-left">Total Comments</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>

</div>

<!-- Reported Comments -->
<div class="col-lg-3 col-md-6">

<div class="panel panel-red">
<div class="panel-heading">
<div class="row">
<div class="col-xs-3">
<i class="fa fa-warning fa-5x"></i>
</div>
<div class="col-xs-9 text-right">
<div class="huge"><?php echo count(reportedComment::all_reported_comment()); ?></div>
<div>Comments</div>
</div>
</div>
</div>
<a href="#">
<div class="panel-footer">
<span class="pull-left">Reported Comments</span>
<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
<div class="clearfix"></div>
</div>
</a>
</div>

</div>


</div> 
<!--First Row-->



<!-- Google CHarts -->
<div class="row">

<div id="piechart" style="width:auto; height: 500px; border:0px solid black;"></div>

</div>






</div>
</div>
</div>
<!-- /.container-fluid -->