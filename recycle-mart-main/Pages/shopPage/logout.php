<?php

session_start();
session_destroy();

header('Location:/recycle-mart-main/Pages/homePage/homePage.php');
exit;
  

?>