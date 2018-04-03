<!DOCTYPE html>
<?php
    require '../includes/common.php';
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Login</title>
    <link rel="icon" href="../Images/assets/user.png">  
    <link rel="stylesheet" type="text/css" href="../CSS/index.css">   
    <meta name="viewport" content="width=device-width, initial-scale=1">                      
    <style>
        .accordion
        {
            display:none;
            transition:.4s;
            margin-top:3px;
        }
    </style>
  </head>
  <body>
         <?php
          // include '../includes/header.php';
          ?>
    <div class="container">
       <div class="row  space">
            <div class="col-md-6 col-md-offset-3">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                      <h1>LOGIN</h1> 
                  </div>
                  <div class="panel-body">
                      <div class="row row-style" id="row-style">
                         <i>Login to make purchase</i>
                      </div>
                      <?php
                        if(isset($_GET['error']))
                        {
                      ?>
                      <i>Either email or password entered is wrong</i>
                      <?php
                        echo "<br>";
                        }
                        ?>
                      <form action="../Includes/login_submit.php" method="post">
                      <div class="row form-group row-style">
                          
                            
                                 <input type="email" class="form-control" placeholder="Email" name="email">
                            
                          
                      </div>
                      <div class="row form-group row-style">
                         
                            
                                 <input type="password" class="form-control" placeholder="Password" name="pass">     
                             
                      </div>
                      <div class="row form-group row-style">
                         
                                 <Label>Login As</Label>
                                 <input type="radio"  name="status" value="Student" onclick="off()" id="std">Parent  
                                 <input type="radio"  name="status" value="Teacher" onclick="on()" id="teacher">Teacher
                                 <input type="radio"  name="status" value="tutor" onclick="off()">Tutor
                                 <div class="accordion" id="accordion">
                                     <input type="texts" class="form-control" placeholder="School-id" name="school_id" id="school_id">
                                 </div>
                      </div>
                      <div class="row form-group row-style">
                             
                          <button type="submit" class="btn btn-primary">Login</button>    
                            
                      </div>
                      </form>

                  </div>
                  <div class="panel-footer">
                     <div class="row row-style">
                        <p>Dont have an account?<a href="SignUp.php"> Resgister here</a></p>
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
        document.getElementById("accordion").style.display="block";
    }
    function off()
    {
        document.getElementById("accordion").style.display="none";
        document.getElementById("school_id").value=null;
    }
</script>
     <?php
    //      include '../includes/footer.php';
    ?>
  </body>
</html>