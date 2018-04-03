<nav class="navbar navbar-inverse navbar-fixed-top" id="nav-school">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle navbar-toggle2" data-toggle="collapse" data-target="#links">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="../PHP/index.php" class="nav_links2"><div class="navbar-brand" id="logo2">School Hub</div></a>
                </div>
                <div class="collapse navbar-collapse" id="links">
                    <ul class="nav navbar-nav navbar-right" type="none">
                             <?php
                                  if(isset($_COOKIE['cookie']))
                                      {
                                            $user=$_COOKIE['name'];
                                            $type = $_COOKIE['type']
                              ?>
                              <?php
                                        if($type=="parent")
                                        {
                               ?>
                                     <li class="dropdown"><a href='#' class="dropdown-toggle nav_links2" data-toggle="dropdown"><span class='glyphicon glyphicon-user'></span><?php echo "Hello $user";?><span class="caret"></span></a>
                                     <ul type="none" class="dropdown-menu">
                                     <li><a href='../Includes/logout.php' class="nav_links2"><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>
                                     </ul>
                                     </li>
                                     <li><a href='../PHP/add_child.php' class="nav_links2"><span class='glyphicon glyphicon-plus'></span> Add Child</a></li>
                                     <li><a href='../PHP/Search_tutor.php'><span class='glyphicon glyphicon-education'></span> Tutors Near me</a></li>
                              <?php
                                        }
                                        else if($type=="teacher")
                                        {
                              ?>      
                                     <li class="dropdown"><a href='#' class="dropdown-toggle nav_links2" data-toggle="dropdown"><span class='glyphicon glyphicon-user'></span><?php echo "Hello $user";?><span class="caret"></span></a>
                                     <ul type="none" class="dropdown-menu">
                                     <li><a href='../PHP/Settings.php' class="nav_links2"><span class='glyphicon glyphicon-cog'></span> Settings</a></li>
                                     <li><a href='../Includes/logout.php' class="nav_links2"><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>
                                     </ul>
                                     </li>
                                     <li><a href='../PHP/My_Class.php' class="nav_links2"><span class='glyphicon glyphicon-stats'></span> My Class</a></li>
                              <?php
                                        }
                                        else
                                        {
                              ?>
                                     <li class="dropdown"><a href='#' class="dropdown-toggle nav_links2" data-toggle="dropdown"><span class='glyphicon glyphicon-user'></span><?php echo "Hello $user";?><span class="caret"></span></a>
                                     <ul type="none" class="dropdown-menu">
                                     <li><a href='../Includes/logout.php' class="nav_links2"><span class='glyphicon glyphicon-log-in'></span> Logout</a></li>
                                     </ul>
                                     </li>
                                     <li><a href='../PHP/Search_tutor.php'><span class='glyphicon glyphicon-education'></span> Tutors Near me</a></li>
                              <?php
                                        }
                                      }
                                      else 
                                     {
                                    ?>
                              <li><a href='../PHP/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
                              <li><a href='../PHP/SignUp.php'><span class='glyphicon glyphicon-user'></span> SignUp</a></li>
                              <li><a href='../PHP/SignUp_tutor.php'><span class='glyphicon glyphicon-pencil'></span> Sign Up as tutor</a></li>
                              <li><a href='../PHP/Search_tutor.php'><span class='glyphicon glyphicon-education'></span> Tutors Near me</a></li>
                              <?php
                                      
                                   }
                              ?>                               
                    </ul>
                </div>
            </div>
        </nav>