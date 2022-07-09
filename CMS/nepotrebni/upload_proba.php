<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) { redirect("login.php"); } ?>

<?php


$message = "";
if(isset($_FILES['file'])) {

$photo = new Photo();
$photo->title = $_POST['title'];
$photo->set_file($_FILES['file']);


if($photo->save()) {

$message = "Photo uploaded Succesufully";

} else {

$message = join("<br>", $photo->errors);

}


}

?>




       
       
       






<form action="upload.php" method="post" enctype="multipart/form-data" >
  



</form>


<div class="row">
  
<div class="col-lg-12">
  
<form action="upload.php" class="dropzone" >
  


</form>

</div>

</div>






<!-- /.row -->


<!-- /.container-fluid -->






  <?php include("includes/footer.php"); ?>