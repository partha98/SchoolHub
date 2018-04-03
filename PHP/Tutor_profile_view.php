<?php
 require '../Includes/common.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
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
        <link rel="icon" href="../Images/assets/user.png">  
        <meta name="viewport" content="width=device-width, initial-scale=1">  
    </head>
    <style>
        .overlay_upload_content
        {
            width:50%;
            border-radius:3px;
        }
    </style>
    <body class="body_schoolHub">
        <?php
             include '../Includes/header.php'; 
             $id = $_GET["id"];
             $query = "Select * from tutors where id = '$id'";
             $result = mysqli_query($con,$query) or die(mysqli_error($con));
             $row = mysqli_fetch_array($result);
             $display = $row['display'];
             $city = $_GET['city'];
             $subject = $_GET['subject'];
        ?>         
       <div class="container space space_schoolHub">
       <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row['tutor_name'];?>
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../Images/school1/1.jpg" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Subject:</td>
                        <td><?php echo $row['sub1'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>City</td>
                        <td><?php echo $row['city'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><?php echo $row['address'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Contact:</td>
                        <td><?php echo $row[$row['display']];?>
                        </td>
                        </td>   
                      </tr>
                    </tbody>
                  </table>    
                    <a href="../PHP/Tutor_display.php?city=<?php echo $city;?>&subject=<?php echo $subject;?>"><button class="btn btn-primary btn-block">Go Back</button></a>
                </div>
              </div>
            </div>
           </div>
       </div>
       </div>
       </div>
    </body>
  </html>

            



