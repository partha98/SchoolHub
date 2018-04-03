<html>
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel='stylesheet' type='text/css' href='../CSS/bootstrap.min.css'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel='stylesheet' href='../CSS/index.css'>
        <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <link rel="icon" href="../Images/assets/home.png">  
        <meta name="viewport" content="width=device-width, initial-scale=1">  
    </head>
    <body class="body_schoolHub">
        <div class="container space">
<?php
   require '../Includes/common.php';
   $email = $_POST['email'];
   $name = $_POST['name'];
   $message = $_POST['message'];
   if($email=="")
   {
   ?>
            <div class="error">
               Email field cannot remain empty
            </div>
   <?php    
   }
   else if($name=="")
   {
   ?>
            <div class="error">
                Name field cannot remain empty
            </div>
   <?php
   }
   else if($message=="")
   {
   ?>
            <div class="error">
                Message field cannot remain empty
            </div>
   <?php
   }
   else
   {
       $email = mysqli_real_escape_string($con,$email);
       $name = mysqli_real_escape_string($con,$name);
       $message = mysqli_real_escape_string($con,$message);
       $temp_id = date("jmY")."%";
       $query = "select * from feedback where id like '$temp_id'";
       $result = mysqli_query($con,$query) or die(mysqli_error($con));
       $count = mysqli_num_rows($result);
       if($count==0)
       {
           $id = date("jmY")."1";
       }
       else
       {
           $count++;
           $id = date("jmY").$count;
       }
       $query = "insert into feedback(id,name_user,email,message) values('$id','$name','$email','$message')";
       $result = mysqli_query($con,$query) or die(mysqli_error($con));
       header('location:../PHP/index.php');
   } 
    ?>
        </div>
    </body>
</html>

   