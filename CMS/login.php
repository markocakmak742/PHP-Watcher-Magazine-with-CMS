<?php 

require_once("includes/header.php"); 
 

?>

<style>

#wrapper {
        
padding-left:0px;
    
}
    
</style>

<?php

$the_message = "";


if(isset($_POST['submit'])) {
    
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$password = md5($password);

$admin_found = User::verify_admin($username, $password);


if($admin_found) {


$session->login_admin($admin_found);


redirect("index.php");
    
} else {
    
$the_message = "Try again";    
    
}

    
} else {
    
$username = "";
$password = "";
$the_message = "";

}



?>


<!-- Page Content -->
<div style="padding-bottom:400px; border:0px solid black;" class="container">
    
<section style="margin-left:0px;" id="login">

<div class="container">

<div class="row">

<div style="margin:0px; " class="col-xs-12 col-xs-offset-3">

<div class="form-wrap" style="" >

<br>
<br>
<br>

<h1 style="color:white">Admin Login</h1>

<br>

<form style="" role="form" action="login.php" method="post" id="login-form" autocomplete="off">


<div class="form-group-lg">
<label for="username" class="sr-only">username</label>
<input readonly type="text" class="form-control" name="username" value="Admin" placeholder="Username" >
</div>



<br>

<div class="form-group-lg">
<label for="password" class="sr-only">Password</label>
<input readonly type="password" class="form-control" name="password" value="123" placeholder="Password">
</div>

<br>

<input style="" type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block btn-primary" value="Login">
<br>
<p style="color:red; font-size:18px;" class="text-center" ><?php echo $the_message ?></p>




</form>
                 
</div>
</div> <!-- /.col-xs-12 -->

</div> <!-- /.row -->

</div> <!-- /.container -->

</section>


<hr>

</div>

<!--
<div class="col-md-4 col-md-offset-3">

<h4 class="bg-danger"><?php echo $the_message; ?></h4>
	
<form id="login-id" action="" method="post">
	
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >
</div>

<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
</div>


<div class="form-group">
<input type="submit" name="submit" value="Submit" class="btn btn-primary">
</div>

</form>


</div>
-->