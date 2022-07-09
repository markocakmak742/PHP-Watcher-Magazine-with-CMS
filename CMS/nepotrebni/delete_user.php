<?php

$user = User::find_by_id($_GET['delete']);

$session->message("The {$user->username} user has been deleted");

$user->delete_photo();
redirect("users.php");
    
?>