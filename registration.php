<?php require_once("includes/header.php"); ?>
<?php require_once("2)Validation/register_validation.php"); ?>
 


<!-- Page Content -->
<div style="padding-bottom:400px; maragin:left:0px; border:0px solid black;" class="container">
    
<section id="login">
<div class="container">
<div class="row">
<div style="margin:0px;" class="col-xs-12 col-xs-offset-3">
<div class="form-wrap">

<h1 style="margin-top:50px;" >Register</h1>

<br>

<form style="" role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

<div class="form-group-lg">
<label for="first_name" class="sr-only">firstname</label>
<input type="text" name="firstname" id="firstname" class="form-control form-control-lg" placeholder="Firstname"  value="<?php echo isset($firstname) ? $firstname : '' ?>" autocomplete="on" required />
<p style="color:red;" ><?php echo isset($error['firstname']) ? $error['firstname'] : '' ?></p>
</div>

<br>

<div class="form-group-lg">
<label for="last_name" class="sr-only">lastname</label>
<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>" autocomplete="on" required />
<p style="color:red;" ><?php echo isset($error['lastname']) ? $error['lastname'] : '' ?></p>
</div>

<br>

<div class="form-group-lg">
<select name="gender" style="color:gray;" class="form-control" id="exampleFormControlSelect1" required >
<option value="" disabled selected hidden>Gender</option>
<option <?php if( isset($_POST['gender']) && ($_POST['gender'] == "Female") ) { echo "selected"; } ?> >Female</option>
<option <?php if( isset($_POST['gender']) && ($_POST['gender'] == "Male") ) { echo "selected"; } ?> >Male</option>
</select>
<p style="color:red;" ><?php echo isset($error['gender']) ? $error['gender'] : '' ?></p>
</div>

<br>

<div class="form-group-lg">
<label for="username" class="sr-only">username</label>
<input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo isset($username) ? $username : '' ?>" autocomplete="on" required />
<p style="color:red;" ><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
</div>

<br>

<div class="form-group-lg">
<label for="email" class="sr-only">Email</label>
<input type="email" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo isset($email) ? $email : '' ?>" autocomplete="on" required />
<p style="color:red;" ><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
</div>

<br>

<div class="form-group-lg">
<label for="password" class="sr-only">Password</label>
<input type="password" name="password" id="key" class="form-control" placeholder="Password" required />
<p style="color:red;" ><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
</div>

<br>

<input style="" type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register" required />
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