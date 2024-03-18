<?php
 setcookie("loggedin", "", time() - 3600);
 setcookie("id", "", time() - 3600);
 setcookie("registered", "", time() - 3600);
 setcookie("avatar", "", time() - 3600);
 header("location: index.php");
 exit;
?>