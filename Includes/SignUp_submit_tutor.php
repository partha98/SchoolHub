
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>        <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <title>SignUp</title>
    <link rel="icon" href="../Images/User.jpg">  
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">   
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    </head>
    <body class="body_schoolHub">
    <?php
      require 'common.php';
      //include 'header.php';
      $name = mysqli_real_escape_string($con,$_POST['Name']);
      $email = mysqli_real_escape_string($con,$_POST['email_id']);
      $pass= md5(md5($_POST['password']));
      $city = mysqli_real_escape_string($con,$_POST['city']);
      $add = mysqli_real_escape_string($con,$_POST['address']);
      $contact = mysqli_real_escape_string($con,$_POST['contact']);
      $subject = mysqli_real_escape_string($con,$_POST['subject']);
      $len = strlen($_POST['password']);
      $display = $_POST['display'];
      $query = "select * from tutors where email = '$email'";
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
      $count = mysqli_num_fields($result);
      if(strcmp($name,"")==0)
          {
    ?>
         <div class="error">
             <i>Name field cannot be empty.</i><br><br>
         <a href="../PHP/Signup.php"><button type="button" class="btn btn-primary">Refill form</button></a></div>
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
   else if(strcmp($subject,"")==0)
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
       
       $temp_id = date("dmY")."%";
       $query1 = "select * from tutors where id like '$temp_id'";
       //echo $query1;
       $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
       $count = mysqli_num_rows($result1);
       if($count==0)
       {
           $id = date("dmY")."1";
       }
       else
       {
          $count++;
          $id = date("dmY").$count;
       }
       $query2 = "insert into tutors(id,tutor_name,sub1,city,address,contact,email,tutor_password,display) values('$id','$name','$subject','$city','$add','$contact','$email','$pass','$display')";
       $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));  
       setcookie("cookie",$id,time()+604800,'/');
       setcookie("name",$name,time()+604800,'/');
       setcookie("type","tutor",time()+604800,'/');
       header("location:../PHP/tutor_profile.php");
    }
    ?>
    </body>
</html>