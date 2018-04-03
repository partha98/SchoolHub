<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <body class="body_schoolHub">
        <?php
         include '../Includes/header.php';    
         if(mysqli_connect_error($con))
         {
          echo 'Failed to connect';	
         }
         $id = $_COOKIE['cookie'];
         $query = "select * from parent where id = '$id'";
         $result = mysqli_query($con, $query) or die(mysqli_error($con));
         $row = mysqli_fetch_array($result);
         $address = $row['Address'];
         $child_id = $row['child_1_id'];
         $child_id2 = $row['child_2_id'];
         $school_id = $row['child_1_school'];
         $school_id_2 = $row['child_2_school'];
         $query2 = "select * from schools where id = '$school_id'";
         $result2 = mysqli_query($con, $query2) or die(mysqli_error($con));
         $row2 = mysqli_fetch_array($result2);
         $school_name = $row2['School_name'];
         $table = "school".$school_id.".students";
         $query1 = "select * from $table where id = '$child_id'";
         $result1 = mysqli_query($con, $query1) or die(mysqli_error($con));
         $row1 = mysqli_fetch_array($result1);
        ?>
       <div class="container space space_schoolHub">
       <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row1['name_student'];?>
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../Images/school1/1.jpg" class="img-circle img-responsive"> </div>
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Class:</td>
                        <td><?php echo $row1['class'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Sec:</td>
                        <td><?php echo $row1['sec'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Roll No:</td>
                        <td><?php echo $row1['current_sch_id'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>DOB:</td>
                        <td><?php echo date("d-m-Y", strtotime($row1['DOB']));?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>School Name:</td>
                        <td><?php echo $school_name;?>
                        </td>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><?php echo $address;?>
                        </td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $row1['email'];?>
                        </td>
                      </tr>
		      <tr>
                        <td>Phone Number:</td>
                        <td><?php echo $row['Contact'];?>
                        </td>
                      </tr>
                    </tbody>
                  </table>    
                  <a href="#" class="btn btn-primary">Edit Profile</a>
                  <a href="#" class="btn btn-primary">See Records</a>
                </div>
              </div>
            </div>
           </div>
       </div>
       </div>
       </div>
       <?php
          if($child_id2!=0)
          {
              $table = "school".$school_id_2.".students";
              $query1 = "select * from $table where id = '$child_id_2'";
              $result1 = mysqli_query($con, $query1);
              $row1 = mysqli_fetch_array($result1);
       ?>
           <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row1['name_student'];?>
              </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="../Images1/school1/1.jpg" class="img-circle img-responsive"> </div>
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tbody>
                      <tr>
                        <td>Class:</td>
                        <td><?php echo $row1['class'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Sec:</td>
                        <td><?php echo $row1['sec'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>Roll No:</td>
                        <td><?php echo $row1['current_sch_id'];?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>DOB:</td>
                        <td><?php echo date("d-m-Y", strtotime($row1['DOB']));?>
                        </td>
                        </td>   
                      </tr>
                      <tr>
                        <td>School Name:</td>
                        <td><?php echo $school_name;?>
                        </td>
                      </tr>
                      <tr>
                        <td>Address:</td>
                        <td><?php echo $address;?>
                        </td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $row1['email'];?>
                        </td>
                      </tr>
		      <tr>
                        <td>Phone Number:</td>
                        <td><?php echo $row['Contact'];?>
                        </td>
                      </tr>
                    </tbody>
                  </table>    
                  <a href="#" class="btn btn-primary">Edit Profile</a>
                  <a href="#" class="btn btn-primary">See Records</a>
                </div>
              </div>
            </div>
           </div>
       </div>
       </div>
        <?php
          }
        ?>
    </body>
</html>
