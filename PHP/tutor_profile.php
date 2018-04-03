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
             $id = $_COOKIE["cookie"];
             $query = "Select * from tutors where id = '$id'";
             $result = mysqli_query($con,$query) or die(mysqli_error($con));
             $row = mysqli_fetch_array($result);
             $display = $row['display'];
        ?>
       <div class="overlay" onclick = "off()" id="overlay">
           <div class="overlay_upload_content update">
               <form action = "../Includes/profile_update?status=tutor" method="POST">
                <div class="form-group">
                    Name : <input type="text" name="name" placeholder="Name" class="form-control form-space" value="<?php echo $row['tutor_name']?>">
                </div>
                <div class="form-group">
                    Subject : <select class="form-control form-space" name="subject">
                                 <?php
                                   if($row['sub1']=="Physics")
                                   {
                                 ?>
                                 <option value = "Physics" selected>Physics</option>
                                  <?php
                                   }
                                   else
                                   {
                                  ?>
                                 <option value = "Physics">Physics</option>
                                 <?php
                                   }
                                 if($row['sub1']=="Chemistry")
                                   {
                                 ?>
                                 <option value = "Chemistry" selected>Chemistry</option>
                                 <?php
                                   }
                                  else
                                  {
                                 ?>
                                 <option value = "Chemistry" >Chemistry</option>
                                 <?php
                                  }
                                  if($row['sub1']=="Maths")
                                  {
                                 ?>
                                 <option value = "Maths" selected>Chemistry</option>
                                 <?php
                                  }
                                  else
                                  {
                                 ?>
                                 <option value = "Maths">Maths</option>
                                 <?php
                                  }
                                  if($row['sub1']=="English")
                                  {
                                 ?>
                                 <option value = "English" selected>English</option>
                                 <?php
                                  }
                                  else
                                  {
                                 ?>
                                 <option value = "English">English</option>
                                 <?php   
                                  }
                                  if($row['sub1']=="Hindi")
                                  {
                                  ?>
                                 <option value = "Hindi" selected>Hindi</option>
                                 <?php
                                  }
                                  else 
                                  {
                                  ?>
                                 <option value = "Hindi">Hindi</option>
                                 <?php
                                  }
                                  if($row['sub1']=="Science")
                                  {
                                 ?>
                                 <option value = "Science" selected>Science</option>
                                 <?php
                                  }
                                  else
                                  {
                                  ?>
                                 <option value = "Science">Science</option>
                                 <?php
                                  }
                                  if($row['sub1']=="Social")
                                  {
                                 ?>
                                 <option value = "Social" selected>Social</option>
                                 <?php
                                  }
                                  else
                                  {
                                  ?>
                                 <option value = "Social">Social</option>
                                 <?php
                                  }
                                  if($row['sub1']=="Computer")
                                  {
                                 ?>
                                 <option value = "Computer" selected>Computer-Science</option>
                                 <?php
                                  }
                                  else
                                  {
                                 ?>
                                 <option value = "Computer">Computer-Science</option>
                                 <?php
                                  }
                                  if($row['sub1']=="Economics")
                                  {
                                 ?>
                                 <option value = "Economics" selected>Economics</option>
                                 <?php
                                  }
                                  else
                                  {
                                  ?>
                                 <option value = "Economics">Economics</option>
                                 <?php
                                  }
                                  ?>
                               </select>
                </div>
                <div class="form-group">
                    City : <input type="text" name="city" class="form-control form-space" value="<?php echo $row['city']?>">
                </div>
                <div class="form-group">
                    Address : <input type="text" name="address" class="form-control form-space" value="<?php echo $row['address']?>">
                </div>
                <div class="form-group">
                    Email : <input type="email" name="email_id" class="form-control form-space" value="<?php echo $row['email']?>">
                </div>
                <div class="form-group">
                    Contact : <input type="text" name="contact" class="form-control form-space" value="<?php echo $row['contact']?>">
                </div>
                <button class = "btn btn-primary btn-block">Change</button>
               </form>
           </div>
       </div>         
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
                        <td>Email:</td>
                        <td><?php echo $row['email'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Contact:</td>
                        <td><?php echo $row['contact'];?>
                        </td>
                        </td>   
                      </tr>
                    </tbody>
                  </table>    
                    <button class="btn btn-primary btn-block" onclick="on()">Edit Profile</button>
                </div>
              </div>
            </div>
           </div>
       </div>
       </div>
       </div>
       <script>
           function on()
           {
               document.getElementById("overlay").style.display= "block";
           }
           function off()
           {
               var overlay = document.getElementById("overlay");
               document.onclick = function(event)
               {
                   if(event.target === overlay)
                   {
                       overlay.style.display="none";
                   }
               };
           }
       </script>
    </body>
  </html>

            

