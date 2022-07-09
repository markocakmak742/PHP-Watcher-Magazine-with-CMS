<?php include("includes/header.php"); ?>

<?php

$comments = Comment::unapproved_comments();

?>

<?php 

if(isset($_GET['delete'])) {

$comment = Comment::find_by_id($_GET['delete']);

$comment->delete();
$session->message("The Comment with {$comment->id} id has been deleted");
redirect("unapproved_comments.php");

}

?>

<?php 

if(isset($_GET['approve'])) {

$comment = Comment::find_by_id($_GET['approve']);

$comment->status = "Approved";
$comment->save();
$session->message("The Comment has been approved");
redirect("unapproved_comments.php");


}

if(isset($_GET['unapprove'])) {

$comment = Comment::find_by_id($_GET['unapprove']);

$comment->status = "Unapproved";
$comment->save();
$session->message("The Comment has been unapproved");
redirect("unapproved_comments.php");


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

<h1 class="page-header">Unapproved Comments</h1>

<p class="bg-success"><?php echo $message; ?></p>


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

<tr>

<?php $user = User::find_by_id($comment->user_id); ?>    
    
<td><?php echo $comment->id; ?></td>
<td><?php echo $user->username; ?>

</td>

<td> <?php echo $comment->body; ?> </td>
<td> <a href="../kategorija/post.php?id=<?php echo $comment->photo_id; ?>" >View</a> </td>
<td> <?php echo $comment->reports; ?> </td>
<td 
<?php 
    
if($comment->status == "Approved" ) { 
    
echo "style=color:green;>"; 

} else { 
    
echo "style=color:red;>"; 

}
    
?>

<?php echo $comment->status; ?> </td>
<td>01.09.2021</td>
<td><a href="unapproved_comments.php?approve=<?php echo $comment->id; ?>">Approve</a></td>
<td><a href="unapproved_comments.php?unapprove=<?php echo $comment->id; ?>">Unapprove</a></td>
<td><a href="unapproved_comments.php?delete=<?php echo $comment->id ?>" >Delete</a></td>

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