<?php
session_start();
//clear any session variables related to this user
//close any connections for this user
//redirect back to the site home page
session_unset();
session_destroy();

//header should be the only output on the page
header("location: login.php");

?>