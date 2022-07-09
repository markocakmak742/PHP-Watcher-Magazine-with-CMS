<?php require_once("includes/header.php"); ?>
<?php require_once("2)Validation/login_validation.php"); ?>
 
<!-- Page Content -->
<div style="padding-bottom:400px; maragin:left:0px; border:0px solid black;" class="container">
    
<section id="login">
<div class="container">
<div class="row">
<div style="margin:0px;" class="col-xs-12 col-xs-offset-3">
<div class="form-wrap">

<h1 style="margin-top:50px;" >Login</h1>

<br>

<form style="" role="form" action="login.php" method="post" id="login-form" autocomplete="off">

<div class="form-group-lg">
<label for="username" class="sr-only">username</label>
<input value="mcakmak" type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo isset($username) ? $username : '' ?>" autocomplete="on" required />
<p style="color:red;" ><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
</div>

<br>

<div class="form-group-lg">
<label for="password" class="sr-only">Password</label>
<input value="123" type="password" name="password" id="key" class="form-control" placeholder="Password" required />
<p style="color:red;" ><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
</div>

<br>

<input style="" type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
<br>
<p style="color:green; font-size:18px;" class="text-center" ><?php echo $message ?></p>

</form>
                 
</div>
</div> <!-- /.col-xs-12 -->
</div> <!-- /.row -->
</div> <!-- /.container -->
</section>


<hr>

</div>

<?php require_once("includes/footer.php"); ?>