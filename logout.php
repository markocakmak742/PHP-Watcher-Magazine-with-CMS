<?php require_once("includes/header.php"); ?>


<?php

$session->logout();
redirect($_SESSION['last_url']);

?>