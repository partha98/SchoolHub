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
        <title>Search Tutor</title>
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
        </style>
        </head>
    <body class="body_schoolHub">
        <?php
           include '../Includes/header.php';
        ?>
        <div class="container space_2 content">
                <div class="col-sm-6 col-sm-offset-3">
                <?php
                  if(isset($_GET['error']))
                  {
                      if($_GET['error']==1)
                      {
                          echo "Field cannot reamin empty";
                      }
                  }
                ?>
                <h1 class="header_1" id="text">Search Tutor</h1>
                <form action="../PHP/Tutor_display.php" method="post">
                <div class="form-group">
                <input type="text" name="city" placeholder="City" class="form-control form-space">
                </div>
                <div class="form-group">
                    <select class="form-control form-space" name="subject">
                        <option disabled selected>Subjects</option>
                        <option value = "Physics">Physics</option>
                        <option value = "Chemistry" >Chemistry</option>
                        <option value = "Maths">Maths</option>
                        <option value = "English">English</option>
                        <option value = "Hindi">Hindi</option>
                        <option value = "Science">Science</option>
                        <option value = "Social">Social</option>
                        <option value = "Computer">Computer-Science</option>
                        <option value = "Economics">Economics</option>
                    </select>
                </div>
                <button class="btn btn-primary btn-block">Search</button>
                </form>
            </div>
    </body>
</html>
