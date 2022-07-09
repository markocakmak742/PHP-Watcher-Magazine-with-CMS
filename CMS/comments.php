<?php include("includes/header.php"); ?>

<?php

$comments = Comment::find_all();
$_SESSION['last_url'] = "comments.php";

?>



<?php 

if(isset($_GET['approve'])) {

$comment = Comment::find_by_id($_GET['approve']);

$comment->status = "Approved";
$comment->save();
$session->message("The Comment has been approved");
redirect("comments.php");


}

if(isset($_GET['unapprove'])) {

$comment = Comment::find_by_id($_GET['unapprove']);

$comment->status = "Unapproved";
$comment->save();
$session->message("The Comment has been unapproved");
redirect("comments.php");


}




?>









<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

<?php include("includes/top_nav.php"); ?>
<?php include("includes/side_nav.php"); ?>
   
</nav>

       
       

  
<div id="page-wrapper">

<div class="container-fluid">
<div class="row">
<div class="col-lg-12">

<h1 class="page-header">All Comments</h1>

<p class="bg-success"><?php echo $session->message; ?></p>


<div class="col-md-12">
  
<table class="table table-bordered table-hover" >

<thead>
<tr>
  
<th>Id</th>
<th>Author</th>
<th>Comment</th>
<th>Post</th>
<th>Reports</th>
<th>Status</th>
<th>Date</th>
<th>Approve</th>
<th>Unapprove</th>
<th>Delete</th>

</tr>
</thead>

<tbody>

<?php foreach($comments as $comment) : ?> 

<?php $user = User::find_by_id($comment->user_id); ?>   
<?php $reportCounts = reportedComment::count_of_reports($comment->id); ?>
    
<tr>

<td><?php echo $comment->id; ?></td>
<td><?php  if(isset($user->username)) { echo $user->username; } ?>

</td>

<td style="word-wrap: break-word;min-width: 160px;max-width: 160px;" > <?php echo $comment->body; ?> </td>
<td> <a target="_blank" href="../post.php?id=<?php echo $comment->post_id; ?>" >View</a> </td>
<td><?php echo count($reportCounts); ?> </td>
<td <?php if($comment->status == "Approved" ) { echo "style=color:green;>"; } else { echo "style=color:red;>"; } ?>
<?php echo $comment->status; ?> </td>
<td><?php echo $comment->date; ?></td>
<td><a href="comments.php?approve=<?php echo $comment->id; ?>">Approve</a></td>
<td><a href="comments.php?unapprove=<?php echo $comment->id; ?>">Unapprove</a></td>
<td><a href="delete_comment.php?delete=<?php echo $comment->id ?>" >Delete</a></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>


</div>
</div>
</div>

</div>


<?php include("includes/footer.php"); ?>