<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>        <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <title>Update</title>
    <link rel="icon" href="../Images/User.jpg">  
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">   
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    </head>
    <body class="body_schoolHub">
    <?php
      require 'common.php';
      //include 'header.php';
      if($_GET['status']=="tutor")
      {
      $name = mysqli_real_escape_string($con,$_POST['name']);
      $email = mysqli_real_escape_string($con,$_POST['email_id']);
      $city = mysqli_real_escape_string($con,$_POST['city']);
      $add = mysqli_real_escape_string($con,$_POST['address']);
      $contact = mysqli_real_escape_string($con,$_POST['contact']);
      $subject = mysqli_real_escape_string($con,$_POST['subject']);
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
      $id = $_COOKIE['cookie'];
      $query = "select * from tutors where id = '$id'";
      $result = mysqli_query($con, $query) or die(mysqli_error($con));
      $row = mysqli_fetch_array($result);
      if($name!=$row['tutor_name'])
      {
          $query = "update tutors set tutor_name = '$name' where id = '$id'";
          $result = mysqli_query($con, $query)  or die(mysqli_error($con));
      } 
      if($subject!=$row['subject'])
      {
          $query = "update tutors set sub1 = '$subject' where id = '$id'";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
      }
      if($subject!=$row['city'])
      {
          $query = "update tutors set city = '$city' where id = '$id'";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
      }
      if($subject!=$row['address'])
      {
          $query = "update tutors set address = '$add' where id = '$id'";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
      }
      if($subject!=$row['email'])
      {
          $query = "update tutors set email = '$email' where id = '$id'";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
      }
      if($subject!=$row['contact'])
      {
          $query = "update tutors set contact = '$contact' where id = '$id'";
          $result = mysqli_query($con, $query) or die(mysqli_error($con));
      }
      header('location:../PHP/tutor_profile.php');
    }
  }
      ?>
    </body>
 </html>