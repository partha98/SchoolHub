<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <title>Sign Up</title>
        <link href="../Images/assets/users.png" rel="icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .form-group
            {
                margin-bottom:10px;
            }
            .accordion-parent
            {
            display:none;
            transition:.4s;
            margin-top:3px;
            }
            .accordion-teacher
            {
            display:none;
            transition:.4s;
            margin-top:3px;
            }
            #text
            {
                font-family:'Pacifico';
                color:#fff;
            }
            #text2
            {
                /*font-family:'Pacifico';*/
                color:#fff;
                text-shadow:1px 1px 2px #000;
            }
        </style>
    </head>
    <body class="body_schoolHub">
        <?php
           include '../Includes/header.php';
        ?>
        <div class="container space content">
                <div class="col-sm-6 col-sm-offset-3">
                <h1 class="header_1" id="text2">Sign Up</h1>
                <form action="../Includes/SignUp_submit.php" method="post">
                <div class="form-group">
                <input type="text" name="Name" placeholder="Name" class="form-control form-space">
                </div>
                <div class="form-group">
                <input type="email" name="email_id" placeholder="Email" class="form-control form-space">
                </div>
                <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control form-space">
                </div>
                <div class="form-group">
                <input type="text" name="contact" placeholder="Contact" class="form-control form-space">
                </div>
                <div class="form-group">
                <input type="text" name="city" placeholder="City" class="form-control form-space">
                </div>
                <div class="form-group">
                <input type="text" name="address" placeholder="Address" class="form-control form-space">
                </div>
                <div class="form-group" id="text">
                    Register as 
                    <input type="radio" name="status" value="Parent" class="form-space" onclick="accordion_parent_on()"> Parent
                    <input type="radio" name="status" value="Teacher" class="form-space" onclick="accordion_teacher_on()"> Teacher
                </div>
                    <div class="accordion-parent" id="accordion-parent">
                       <div class="form-group">
                       <input type="text" name="name_student" id="name_student" placeholder="Child Name" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="date" name="DOB" id="DOB" placeholder="Sec" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="text" name="child_id" id="child_id" placeholder="Child id" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="text" name="school_id_parent" id="school_id_parent"placeholder="School id" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="text" name="class_parent" id="class_parent" placeholder="Class" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="text" name="sec_parent" id="sec_parent" placeholder="Sec" class="form-control form-space" style="font-family:default;">
                       </div>
                    </div>
                    <div class="accordion-teacher" id="accordion-teacher">
                       <div class="form-group">
                       <input type="text" name="school_id" id="school_id" placeholder="School id" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="text" name="class" id="class" placeholder="Class" class="form-control form-space" style="font-family:default;">
                       </div>
                       <div class="form-group">
                       <input type="text" name="sec" id="sec" placeholder="Class" class="form-control form-space" style="font-family:default;">
                       </div>
                    </div>
                    <button class="btn btn-primary btn-block">Sign Up</button>
                </form>
                </div>
        </div>
        <script>
            document.getElementById("DOB").placeholder=null;
            function accordion_parent_on()
            {
                document.getElementById("accordion-parent").style.display="block";
                document.getElementById("accordion-teacher").style.display="none";
                document.getElementById("school_id").value=null;
                document.getElementById("class").value=null;
                document.getElementById("sec").value=null;
                document.getElementById("name_student").value=null;
                document.getElementById("DOB").value=null;
            }
            function accordion_teacher_on()
            {
                document.getElementById("accordion-parent").style.display="none";
                document.getElementById("accordion-teacher").style.display="block";
                document.getElementById("child_id").value=null;
                document.getElementById("school_id_parent").value=null;
                document.getElementById("class_parent").value=null;
                document.getElementById("sec_parent").value=null;
            }
        </script>
        <?php
        //include '../Includes/footer_schoolHub.php';
        ?>
    </body>
</html>

