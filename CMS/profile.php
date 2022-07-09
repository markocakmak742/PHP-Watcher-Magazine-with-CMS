<script type="text/javascript"></script>

<?php 

include("includes/header.php"); 
//include("includes/photo_libary_modal.php"); 

?>


<?php




$user = User::find_by_id($_SESSION['admin_user_id']);
//unset($_SESSION['admin_user_id']);



$message = "";



if(isset($_POST['update'])) {

if($user) {

$user->username   = $_POST['username'];
$user->first_name = $_POST['first_name'];
$user->last_name  = $_POST['last_name'];
$user->gender     = $_POST['gender'];
$user->password   = md5($_POST['password']);

if(empty($_FILES['user_image'])) {

$user->save();
$session->message("Changes successfully saved");
    
header('Refresh:2; URL=index.php');



} else {

$user->set_file($_FILES['user_image']);
$user->upload_photo();
$user->save();

$session->message("Uspesno sacuvano");


//redirect("edit_user.php?id={$user->id}");
redirect("profile.php");


}


}
}


?>


<?php

$users = User::find_all();

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
<?php
            
include("includes/top_nav.php");
include("includes/side_nav.php")
            
?>

</nav>





<div id="page-wrapper">


<div class="container-fluid">
<div class="row">
<div class="col-lg-12">

<h1 class="page-header">My Profile</h1>


<!-- Postavi if da li je musko ili zensko -->
<a href=""><img class="img-responsive" src="images/female2.png" alt=""></a>


<form action="" method="post" enctype="multipart/form-data">

<div style="padding-bottom:50px;" class="col-md-6">

<label for="username" >Username</label>
<div class="form-group">
<input type="text" name="username" value="<?php echo $user->username; ?>" class="form-control"  placeholder="">
</div>

<div class="form-group" >
<label for="first_name" >First Name</label>
<input type="text" name="first_name" value="<?php echo $user->first_name; ?>" class="form-control"  placeholder="">
</div>

<div class="form-group" >
<label for="last_name" >Last Name</label>
<input type="text" name="last_name" value="<?php echo $user->last_name; ?>" class="form-control"  placeholder="">
</div>

<div class="form-group" >
<label for="last_name" >Gender</label>
<select name="gender" class="form-control" ><option>Female</option><option <?php if($user->gender == "Male") { echo "selected"; } ?> >Male</option></select>
</div>

<div class="form-group" >
<label for="password" >Email</label>
<input name="Email" value="<?php echo $user->email; ?>" class="form-control"  placeholder="">
</div>
    
<div class="form-group" >
<label for="password" >Password</label>
<input type="password" name="password" value="<?php echo $user->password; ?>" class="form-control"  placeholder="">
</div>

<div class="form-group" >

<div class="info-box-update pull-right ">
<a id="user-id" class="btn btn-danger" href="index.php">Cancel</a>
</div>
<div class="info-box-update pull-left ">
<input type="submit" name="update" class="btn btn-primary" value="Save"  placeholder="">
</div> 

</div>

<br>
<br>
<br>
<p class="bg-success" ><?php if(isset($_SESSION['message'])) { echo $_SESSION['message']; } ?></p>
    
</div>
    

</form>


</div>
</div>
</div>


</div>
<!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>