<?php
 require '../Includes/common.php';
 if(!isset($_COOKIE['cookie']))
 {
     header('location:../PHP/index.php');
 }
?>
<html>
    <head>
        <meta charset="UTF-8">
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
        <title>SchoolHub</title>
        <link rel="icon" href="../Images/assets/book.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body class="body_schoolHub">
       <?php
         include '../Includes/header.php';
         $id = $_COOKIE['cookie'];
         $school_id = $_COOKIE['school_id'];
         $table = "school".$school_id.".teachers";
         $status = $_GET['exam'];
         $query = "select * from $table where id = '$id'";
         $result = mysqli_query($con,$query) or die(mysqli_error($con));
         $row = mysqli_fetch_array($result) or die(mysqli_error($con));
         $class = $row['class'];
         $sec = $row['sec'];
         $exam = $status;
         $table = "school".$school_id.".class_".$class."_".$status;
         $query = "select * from $table where sec = '$sec'";
         $result = mysqli_query($con, $query) or die(mysqli_error($con));
       ?>
       <div class='container space'>
       <table class='table table-responsive table-striped table-hover'>
           <tbody>
               <tr>
                   <th>Roll No</th>
                   <th>Name</th>
                   <th>English</th>
                   <th>Hindi</th>
                   <th>Social Science</th>
                   <th>Science</th>
                   <th>Mathematics</th>
                   <th>Total</th>
                   <th>Percentage</th>
                   <th></th>
               <tr>
              <?php
                   while($row = mysqli_fetch_array($result))
                   { 
              ?>
               <tr>
                   <td><?php echo $row['roll'];?></td>
                   <td><?php echo $row['student_name']?></td>
                   <td><?php echo $row['eng']?></td>
                   <td><?php echo $row['hindi']?></td>
                   <td><?php echo $row['social']?></center></td>
                   <td><?php echo $row['science']?></td>
                   <td><?php echo $row['math']?></td>
                   <td><?php echo $row['total']?></td>
                   <td><?php echo $row['percentage']?></td>
                   <th><button class="btn btn-primary btn-block">Update</button></th>
               <tr>
             <?php
                   }
             ?>
           </tbody>
       </table>
       </div>
   </body>
</html>