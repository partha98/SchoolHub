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
        <title>Exams</title>
        <link rel="icon" href="../Images/assets/book.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
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
        </style>     
    </head>
        <body class="body_schoolHub">
        <div class="overlay" id="overlay" onclick="OFF()">
            <div class="overlay_upload_content">
                <h2>Upload Excel</h2>
                <div class="form-group">
                <form method="post" action="../Includes/excel_upload.php" enctype="multipart/form-data">
                    <div class="form-group" style="position:relative">
                    <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group" style="font-size:20px;padding-top:5px;">
                    Exam Excel<br>
                    <input type="radio" name="exam" value="unit_test"> Unit Test<br>
                    <input type="radio" name="exam" value="half_yearly"> Half yearly<br>
                    <input type="radio" name="exam" value="annual"> Annual<br>
                    </div>
                    <button class="btn btn-primary btn-block form-space">Upload</button>
                </form>
                </div>
            </div>
        </div>
        <div class="container space">
        <?php
           include '../Includes/header.php';
           $school_id = $_COOKIE['school_id'];
           $table = "school".$school_id.".teachers";
           $id = $_COOKIE['cookie']; 
           $query = "select * from $table where id='$id'";
           $result = mysqli_query($con, $query) or die(mysqli_error($con));
           $row = mysqli_fetch_array($result);
           $class = $row['class'];
           $sec = $row['sec'];
           $table1 = "school".$school_id.".class_".$class."_unit_test";
           $table2 = "school".$school_id.".class_".$class."_half_yearly";
           $table3 = "school".$school_id.".class_".$class."_annual";
           $query1 = "Select * from $table1 where sec = '$sec'";
           $query2 = "Select * from $table2 where sec = '$sec'";
           $query3 = "Select * from $table3 where sec = '$sec'";
           $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
           $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
           $result3 = mysqli_query($con, $query3) or die(mysqli_error($con));
           $count1 = mysqli_num_rows($result1);
           $count2 = mysqli_num_rows($result2);
           $count3 = mysqli_num_rows($result3);
           $upload_flag = 0;
           //echo $count1."<br>".$count2."<br>".$count3;   
           if($count1!=0)
           {   
               $upload_flag++;
           ?>
           <div class="col-md-4" id="thumb">
           <a href="../PHP/records.php?exam=unit_test">
           <div class="thumbnail thumb-link">
               <center> <span class="glyphicon glyphicon-th-list thumb-style"></span></center>
               <div class="thumb-content">
                   Unit Test
               </div>
           </div>
           </a>
           </div>
           <?php
           }
           if($count2!=0)
           {
               $upload_flag++;
           ?>
           <div class="col-md-4" id="thumb">
           <a href="../PHP/records.php?exam=half_yearly">
           <div class="thumbnail thumb-link">
               <center> <span class="glyphicon glyphicon-th-list thumb-style"></span></center>
               <div class="thumb-content">
                   Half-Yearly
               </div>
           </div>
            </a>
           </div>
           <?php
           }
           if($count3!=0)
           {
               $upload_flag++;
           ?>
           <div class="col-md-4" id="thumb">
           <a href="../PHP/records.php?exam=annual">
           <div class="thumbnail thumb-link">
               <center> <span class="glyphicon glyphicon-th-list thumb-style"></span></center>
               <div class="thumb-content">
                   Annual
               </div>
           </div>
           </a>
           </div>
           <?php
           }
           if($upload_flag==0)
           {
               $message = "No records available.Upload results.";
           }
           else
           {
               $message = "Upload";
           }
        ?>
        <div class="col-md-4" id="thumb">
           <div class="thumbnail" onclick="ON()">
               <center> <span class="glyphicon glyphicon-plus thumb-style"></span></center>
               <div class="thumb-content">
                   <?php echo $message; ?>
               </div>
           </div>
         </div>
        <?php
        //include '../Includes/footer_schoolHub.php';
        ?>
      </div>
      <script>
            function ON() 
            {
                var overlay = document.getElementsByClassName("overlay");
                overlay[0].style.display="block";
            }
            function OFF() 
            {
                var overlay = document.getElementById("overlay");
                document.onclick = function(event)
              {
                if(event.target === overlay)
                {
                overlay.style.display = "none";
                }
              };
            }
     </script>
    </body>
</html>