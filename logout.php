<?php 
include "inc/session.php";
     session::init();
     session::destroy();
     header("Location:index.php");

?>