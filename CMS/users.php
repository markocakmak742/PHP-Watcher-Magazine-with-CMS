<?php include("includes/header.php"); ?>

<?php

$users = User::find_all();

?>

<?php 

if(isset($_GET['delete'])) {

$user = User::find_by_id($_GET['delete']);

$session->message("The {$user->username} user has been deleted");
$user->delete();
redirect("users.php");    
    
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

<h1 class="page-header">All Users</h1>

<p class="bg-success"><?php echo $message ?></p>


<div class="col-md-12">
  
<table class="table table-bordered table-hover" >

<thead>
<tr>
  
<th>Id</th>
<th>Icon</th>
<th>Username</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Email</th>
<th>Role</th>
<th>Edit</th>
<th>Delete</th>


</tr>
</thead>

<tbody>

<?php foreach($users as $user) : ?> 

<tr>

<td><?php echo $user->id; ?></td>
<td><img class="admin-user-thumbnail" src="<?php echo "images/" . $user->gender .  ".png"; ?>"></td>
<td><?php echo $user->username; ?></td>
<td><?php echo $user->first_name; ?></td>
<td><?php echo $user->last_name; ?></td>
<td><?php echo $user->email; ?></td>
<td><?php echo $user->role; ?></td>
<td><a href="edit_user.php?id=<?php echo $user->id ?>" >Edit</a></td>
<td><a href="users.php?delete=<?php echo $user->id ?>" >Delete</a></td>


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