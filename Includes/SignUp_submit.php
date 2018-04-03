<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>SignUp</title>
    <link rel="icon" href="../Images/User.jpg">  
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">   
    <meta name="viewport" content="width=device-width, initial-scale=1">      
  </head>
  <body class="body_schoolHub">
<?php
   require 'common.php';
   include 'header.php';
   $name = $_POST['Name'];
   $email = $_POST['email_id'];
   $pass=$_POST['password'];
   $city = $_POST['city'];
   $add = $_POST['address'];
   $contact = $_POST['contact'];
   $status = $_POST['status'];
   if($status == 'Parent')
   {
       
       $query_email ="select * from parent where email='$email'";
       $resultes = mysqli_query($con,$query_email) or die(mysqli_error($con));
       $count = mysqli_num_rows($resultes);
       $len=strlen($pass);
       $school_id = $_POST['school_id_parent'];
       $query_test = "select * from schools where id = '$school_id'";
       $result_test = mysqli_query($con,$query_test) or die(mysqli_error($con));
       $count_test = mysqli_num_rows($result_test);
       $table = "school".$school_id.".students";
       $class = $_POST['class_parent'];
       $sec = $_POST['sec_parent'];
       $child_id = $_POST['child_id'];
       $child_id =date("Y").$class.$sec.$child_id;
       $query_child = "select * from $table where id = '$child_id'";
       $result_child = mysqli_query($con, $query_child) or die(mysqli_error($con));
       $count_child = mysqli_num_rows($result_child);
   if(strcmp($name,"")==0)
   {
        ?>
         <div class="error">
             <i>Name field cannot be empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php    
   }
   else if($count_child!=0)
   {
       ?>
       
      <div class="error"><i>Invalid Child Id</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php 
   }
   else if($count_test==0)
   {
       ?>
       
      <div class="error"><i>Invalid School Id</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php 
   }
   else if(strcmp($city,"")==0)
   {
    ?>
         <div class="error">
             <i>City field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($pass,"")==0)
   {
    ?>
         <div class="error">
             <i>Password field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($email,"")==0)
   {
    ?>
         <div class="error">
             <i>Email field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($contact,"")==0)
   {
    ?>
         <div class="error">
             <i>Contact field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($add,"")==0)
   {
    ?>
         <div class="error">
             <i>Address field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if($count==1)
   {
   ?>
         <div class="error">
             <i>Email id already exists.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php    
   }
   
  else if($len<8)
   {
      ?>
         <div class="error">
             <i>Password too short.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php   
   }
   
   else if((strlen($contact)<10)||(strlen($contact)>10))
   {
       ?>
       
      <div class="error"><i>Invalid phone number</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php 
  }
   else
   {
   $child_id = $_POST['child_id'];
   $city = mysqli_real_escape_string($con,$_POST['city']);
   $add = mysqli_real_escape_string($con,$_POST['address']);
   $contact = mysqli_real_escape_string($con,$_POST['contact']);
   $name = mysqli_real_escape_string($con,$_POST['Name']);
   $email = mysqli_real_escape_string($con,$_POST['email_id']);
   $pass = md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
   $id_temp = date("jmY")."%";
   $query = "Select * from parent where id like '$id_temp'";
   $result = mysqli_query($con, $query) or die(mysqli_error($con));
   $count = mysqli_num_rows($result);
   if($count==0)
   {
       $id = date("jmY1");
   }
   else
   {
      $count++;
      $id = date("jmY").$count;
   }
   $query = "insert into parent(id,Parent_name,email,parent_password,Contact,City,Address,Child_1_id,Child_1_school,child_1_class,child_1_sec) values('$id','$name','$email','$pass','$contact','$city','$add','$child_id','$school_id','$class','$sec')";
   $result = mysqli_query($con,$query) or die(mysqli_error($con));
   $table = "school".$school_id.".students"; 
   $DOB = $_POST['DOB'];
   $name_student = $_POST['name_student'];
   $current_id = $_POST['child_id'];
   $query_student = "insert into $table(id,name_student,email,DOB,class,sec,current_sch_id) values('$child_id','$name_student','$email','$DOB','$class','$sec','$current_id')";
   $result_student = mysqli_query($con,$query_student) or die(mysqli_error($con)); 
   $name_cookie = 'cookie';
   $value = $id;
   $expire = time()+604800;
   setCookie($name_cookie,$value,$expire,'/');
   $name_cookie2 = 'name';
   $value = $name;
   setCookie($name_cookie2,$value,$expire,'/');
   setCookie("type","parent",$expire,'/');
   header('location:../PHP/index_parent.php');
   }
   
   }
   else if($status=='Teacher')
   {
       $school_id = $_POST['school_id'];
       $query_test = "select * from schools where id = '$school_id'";
       $result_test = mysqli_query($con,$query_test) or die(mysqli_error($con));
       $count_test = mysqli_num_rows($result_test);
       if($count_test!=0)
       {
       $table = "school".$school_id.".teachers";
       $query_email ="select * from $table where email='$email'";
       $resultes = mysqli_query($con,$query_email) or die(mysqli_error($con));
       $count = mysqli_num_rows($resultes);
       }
       else
       {
           $count = 0;
       }  
       $len=strlen($pass);
   if(strcmp($name,"")==0)
   {
        ?>
         <div class="error">
             <i>Name field cannot be empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php    
   }
   else if($count_test==0)
   {
       ?>
       
      <div class="error"><i>Invalid School Id</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php 
   }
   else if(strcmp($city,"")==0)
   {
    ?>
         <div class="error">
             <i>City field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($pass,"")==0)
   {
    ?>
         <div class="error">
             <i>Password field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($email,"")==0)
   {
    ?>
         <div class="error">
             <i>Email field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($contact,"")==0)
   {
    ?>
         <div class="error">
             <i>Conatct field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if(strcmp($add,"")==0)
   {
    ?>
         <div class="error">
             <i>Address field cannot be left empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php   
   }
   else if($count==1)
   {
   ?>
         <div class="error">
             <i>Email id already exists.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
   <?php    
   }
   
  else if($len<8)
   {
      ?>
         <div class="error">
             <i>Password too short.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php   
   }
   
   else if((strlen($contact)<10)||(strlen($contact)>10))
   {
       ?>
       
      <div class="error"><i>Invalid phone number</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a>
         </div>
   <?php 
  }
   else
   {
   $class = $_POST['class'];
   $sec = $_POST['sec'];
   $city = mysqli_real_escape_string($con,$_POST['city']);
   $add = mysqli_real_escape_string($con,$_POST['address']);
   $contact = mysqli_real_escape_string($con,$_POST['contact']);
   $name = mysqli_real_escape_string($con,$_POST['Name']);
   $email = mysqli_real_escape_string($con,$_POST['email_id']);
   $pass = md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
   $id_temp = date("jmY")."%";
   $query = "select * from $table where id like '$id_temp'";
   $result = mysqli_query($con,$query) or die(mysqli_error($con));
   $count = mysqli_num_rows($result);
   if($count==0)
   {
       $id = date("jmY1");
   }
   else
   {
       $count++;
       $id = date("jmY").$count;
   }
   $query = "insert into $table(id,teacher_name,email,teacher_password,contact,city,address,class,sec) values('$id','$name','$email','$pass','$contact','$city','$add','$class','$sec')";
   $result = mysqli_query($con,$query) or die(mysqli_error($con));
  if($result == TRUE)
   {
       $name_cookie = 'cookie';
       $value = $id;
       $expire = time()+604800;
       setCookie($name_cookie,$value,$expire,'/');
       $name_cookie_2 = 'name';
       $value = $name;
       setCookie($name_cookie_2,$value,$expire,'/');
       setCookie('school_id',$school_id,$expire,'/');
       setCookie("type","teacher",$expire,'/');
       header('location:../PHP/index_teacher.php');
   } 
   }
  
   }
    //include 'footer2.php';
?>
</body>
</html>