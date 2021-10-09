<?php 

session_start();

session_destroy();
header("location:giris.php?durum=exit");


 

 ?>