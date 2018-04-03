<?php
   $value = $_COOKIE['cookie'];
   setcookie('cookie', $value,time()-1,'/');
   $name = $_COOKIE['name'];
   setcookie('name',$name,time()-1,'/');
   setcookie('type',"0",time()-1,'/');
   header('location:../PHP/index.php');
?>