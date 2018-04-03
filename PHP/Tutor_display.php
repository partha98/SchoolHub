<?php
 require '../Includes/common.php';
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
        <title>Tutors</title>
        <link href="../Images/assets/search.png" rel="icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .form-group
            {
                margin-bottom:10px;
            }
            #text
            {
                font-family:'Pacifico';
                color:#fff;
                text-shadow:1px 1px 2px #000;
            }
            .space_2
            {
                padding-top:180px;
            }
            .space
            {
                padding-top:125px;
            }
            .thumb-style
            {
                padding:70px;
                font-size: 45px;
            }
            #thumb
            {
                cursor:pointer;
            }
            .thumb-link
            {
                text-decoration: none;
                color:#000;
            }
            .thumb-link:hover
            {
                color:#000;
            }
            #thumb > a
            {
                text-decoration: none;
            }  
            .img-thumbnail
            {
                width:100%;
                height:35px;
            }
            #text2
            {
                font-family:'Pacifico';
                color:#fff;
                text-shadow:1px 1px 2px #000;
                font-size:25px;
            }
        </style>
        </head>
    <body class="body_schoolHub">
        <?php
           include '../Includes/header.php';
           if(!isset($_GET['city']))
           {
           $city = $_POST['city'];
           if(($city=="")||(!isset($_POST['subject'])))
           {
               header('location:../PHP/Search_tutor.php?error=1');
           }
           else
           {
               $subject = $_POST['subject'];
               $query = "select * from tutors where city = '$city' and sub1 = '$subject'";
               $result = mysqli_query($con, $query) or die(mysqli_error($con));
               $count = mysqli_num_rows($result);
               if($count!=0)
               {
        ?>
        <div class="container space content">
        <?php
                   while($row = mysqli_fetch_array($result))
                      {
                           $display = $row['display'];
         ?>
                            <div class="col-md-4">
                              <div class="thumbnail">
                                 <img class="img-thumbnail" src="../Images/school1/1.jpg">
                                 <div class="thumb-content">
                                 Name : <?php echo $row['tutor_name'];?><br>
                                 Contact : <?php echo $row[$display];?>
                                 <a href="../PHP/Tutor_profile_view.php?id=<?php echo $row['id'];?>&city=<?php echo $city;?>&subject=<?php echo $subject;?>"><button class="btn btn-primary btn-block">See profile</button></a>
                                 </div>
                              </div>
                            </div>
         <?php
                     }
                 }
                 else
                 {
                 ?>
                 <div id="text2" class="space container content">
                     No tutor matched your search criteria.
                 </div>
                 <?php    
                 }
           }
           }
           else
           {
            $city = $_GET['city'];
           if(($city=="")||(!isset($_GET['subject'])))
           {
               header('location:../PHP/Search_tutor.php?error=1');
           }
           else
           {
               $subject = $_GET['subject'];
               $query = "select * from tutors where city = '$city' and sub1 = '$subject'";
               $result = mysqli_query($con, $query) or die(mysqli_error($con));
               $count = mysqli_num_rows($result);
               if($count!=0)
               {
        ?>
        <div class="container space content">
        <?php
                   while($row = mysqli_fetch_array($result))
                      {
                           $display = $row['display'];
         ?>
                            <div class="col-md-4">
                              <div class="thumbnail">
                                 <img class="img-thumbnail" src="../Images/school1/1.jpg">
                                 <div class="thumb-content">
                                 Name : <?php echo $row['tutor_name'];?><br>
                                 Contact : <?php echo $row[$display];?>
                                 <a href="../PHP/Tutor_profile_view.php?id=<?php echo $row['id'];?>&city=<?php echo $city;?>&subject=<?php echo $subject;?>"><button class="btn btn-primary btn-block">See profile</button></a>
                                 </div>
                              </div>
                            </div>
         <?php
                     }
                 }
                 else
                 {
                 ?>
                 <div id="text2" class="space container content">
                     No tutor matched your search criteria.
                 </div>
                 <?php    
                 }
           }
           }
        ?>
        </div>
    </body>
</html>


