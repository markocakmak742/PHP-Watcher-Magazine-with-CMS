<!-- Header -->  
<?php

include("includes/header.php");

?>

<!-- Checiking Login --> 
<?php

if(!isset($_SESSION['admin_user_id'])) {
redirect("login.php");    
    
}

unset($_SESSION["message"]);

?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

           
                                 
<?php
    
include("includes/top_nav.php");                                               
include("includes/side_nav.php");
          
?>
               
</nav>


       

<!-- Main Content -->   
<div id="page-wrapper">

<?php 
    
include("includes/admin_content.php"); 
    
?>

</div>






<!-- Footer --> 
<?php 

include("includes/footer.php"); 

?>