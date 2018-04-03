<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
   require 'common.php';
   $email = mysqli_real_escape_string($con,$_POST['email']);
   $pass = md5(md5($_POST['pass']));
   $status = mysqli_real_escape_string($con,$_POST['status']);
   if($status=='Student')
   {
   $query = "select * from parent where email='$email' and parent_password='$pass'";
   $result = mysqli_query($con,$query) or die(mysqli_error($con));
   $count = mysqli_num_rows($result);
   if($count==1)
   {
       $row= mysqli_fetch_array($result);
       $name = "cookie";
       $value = $row['id'];
       $expire = time()+604800;
       setcookie($name, $value,$expire,'/');
       $name2 = "name";
       $value2 = $row['Parent_name'];
       $expire = time()+604800;
       setcookie($name2, $value2,$expire,'/');
       setCookie("type","parent",$expire,'/');
       header("location:../PHP/index_parent.php");
   }
   else 
   {
       header('location:../PHP/Login.php?error=1');       
   }
   }
   else if($status=='Teacher')
   {
       $school_id = $_POST['school_id'];
       $table = "school".$school_id.".teachers";
       $table = mysqli_real_escape_string($con,$table);
       $query = "Select * from $table where email='$email' and teacher_password='$pass'";
       $result = mysqli_query($con,$query) or die(mysqli_error($con));
       $count = mysqli_num_rows($result);
       if($count!=0)
       {
            if($count==1)
            {
               $row= mysqli_fetch_array($result);
               $name = "cookie";
               $value = $row['id'];
               $expire = time()+604800;
               setcookie($name, $value,$expire,'/');
               $name2 = "name";
               $value2 = $row['teacher_name'];
               $expire = time()+604800;
               setcookie($name2, $value2,$expire,'/');
               setcookie('school_id',$school_id,$expire,'/');
               setCookie("type","teacher",$expire,'/');
               header("location:../PHP/index_teacher.php?id=$value");
            }
            else 
            {
                  header('location:../PHP/Login.php?error=1');       
            }

       }
   }
   else
   {
      $query = "select * from tutors where email = '$email'";
      $result = mysqli_query($con,$query) or die(mysqli_error($con));
      $count = mysqli_num_rows($result);
      if($count!=0)
      {
          $row = mysqli_fetch_array($result);
          $id = $row['id'];
          $name = $row['tutor_name'];
          setcookie("cookie",$id,time()+604800,'/');
          setcookie("name",$name,time()+604800,'/');
          setcookie("type","tutor",time()+604800,'/');
          header('location:../PHP/tutor_profile.php');
      }
   }
 
?>