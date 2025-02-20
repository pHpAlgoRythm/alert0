<?php 

ob_start();

echo header( "location: app/view/auth/auth.html");
exit;

ob_end_flush();
?>