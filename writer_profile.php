<?php 
   include("php_classes/writer_auth.php");

?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Responsive Resume/CV Template for Developers</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="favicon.ico">  
    
    <!-- Global CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">   
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style.css">
     <?php
                      include("php_classes/db.php");
                      $name=$_SESSION["username"];
                      $query="Select wname, email, address, country, bio, phno, image from `writer_user` where phno = '$name'";
                      $result = mysql_query($query) or die(mysql_error());
                      $row = mysql_fetch_assoc($result);
                      $mail = $row["email"];
                      $bio = $row['bio'];
                      $phno= $row['phno'];
                      $name= $row['wname'];

                      
                    ?>
</head> 

<body>
 <header class="top-header">
        <div class="container">
            <div class="row header-row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <a href="index.html"><img src="img/logo.png" alt="" class="logo"></a>
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="writer_dashboard.php">Dashboard</a></li>
                                    <li><a href="writer_profile.php">Profile</a></li>
                                    <li><a href="jobs.php">Jobs</a></li>
                                    <li><a href="writer_workspace.php">Workspace</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                    
                                    
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="img/<?php echo $row["image"];?>" alt="" />
                <h1 class="name"><?php echo $name; ?></h1>
                <h3 class="tagline">Full Stack Developer</h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: "><?php echo $mail; ?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:0123 456 789"><?php echo $phno; ?></a></li>
                    <li class="website"><i class="fa fa-globe"></i><a href="http://themes.3rdwavemedia.com/website-templates/free-responsive-website-template-for-developers/" target="_blank">portfoliosite.com</a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com/in/alandoe</a></li>
                    <li class="github"><i class="fa fa-github"></i><a href="#" target="_blank">github.com/username</a></li>
                    <li class="twitter"><i class="fa fa-twitter"></i><a href="https://twitter.com/3rdwave_themes" target="_blank">@twittername</a></li>
                </ul>
            </div><!--//contact-container-->
            <div class="education-container container-block">
                <h2 class="container-block-title">Education</h2>
                <div class="item">
                    <h4 class="degree">MSc in Computer Science</h4>
                    <h5 class="meta">University of London</h5>
                    <div class="time">2011 - 2012</div>
                </div><!--//item-->
                <div class="item">
                    <h4 class="degree">BSc in Applied Mathematics</h4>
                    <h5 class="meta">Bristol University</h5>
                    <div class="time">2007 - 2011</div>
                </div><!--//item-->
            </div><!--//education-container-->
            
            <div class="languages-container container-block">
                <h2 class="container-block-title">Languages</h2>
                <ul class="list-unstyled interests-list">
                    <li>English <span class="lang-desc">(Native)</span></li>
                    <li>French <span class="lang-desc">(Professional)</span></li>
                    <li>Spanish <span class="lang-desc">(Professional)</span></li>
                </ul>
            </div><!--//interests-->
            
            <div class="interests-container container-block">
                <h2 class="container-block-title">Interests</h2>
                <ul class="list-unstyled interests-list">
                    <li>Climbing</li>
                    <li>Snowboarding</li>
                    <li>Cooking</li>
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-user"></i>Career Profile</h2>
                <div class="summary">
                    <p><?php echo $bio; ?></p>
                </div><!--//summary-->
            </section><!--//section-->
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-user"></i>Upload Profile Pic</h2>
                <div class="summary">
                   
                     
                    <form role="form" id = "form"   method="post" action="writer_photo.php" enctype="multipart/form-data" >
                             
                       <div class="form-group">
                                
                                Dimension = (100 x 100 )* or less<input type = "file" name = "image" id = "file" class="btn btn-sm btn-primary" />
                       </div>
                     <div class="form-group ">
                           <button name = "submit" type="submit" class="btn btn-info upload"  >Upload</button>
                           <button type="button" class="btn btn-danger cancel"  >Cancel</button>
                           
                     </div>
                     <div class="form-group ">
                        <div class="progress progress-striped active" >
                          <div class="progress-bar" style="width: 0%"></div>
                        </div>

                     </div>
                     
                 </form>

                        </div><!--//summary-->
            </section>
            

            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Experiences</h2>

                <?php 
                     
                     $query = "Select * from `w_exp` where wid='$phno'";
                     $result = mysql_query($query) or die(mysql_error());
                     $count=1;
                     while($row = mysql_fetch_assoc($result))
                     { ?>
                                 <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title"> <?php echo $row["title"]; ?></h3>
                            <div class="time"><?php echo $row["duration"]; ?></div>
                        </div><!--//upper-row-->
                        <div class="company"><?php echo $row["company_name"]; ?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $row["des"]; ?></p>  
                        
                    </div><!--//details-->
                </div><!--//item-->
               

                 <?php $count++; } ?>
                
                
                
            </section><!--//section-->
            
            <?php 

                    $query = "Select * from `w_skills` where wid='$phno'";
                     $result = mysql_query($query) or die(mysql_error());
                      $row = mysql_fetch_assoc($result);

            ?>
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-rocket"></i>Skills &amp; Proficiency</h2>
                <div class="skillset">        
                    <div class="item">
                        <h3 class="level-title">Programming Skills</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo $row['p_skills']; ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    
                    <div class="item">
                        <h3 class="level-title">Leadership Skills</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo $row['l_skills']; ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    
                    <div class="item">
                        <h3 class="level-title">Scripting Skills</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo $row['s_skills']; ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    
                    <div class="item">
                        <h3 class="level-title">Communication Skills</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo $row['c_skills']; ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    
                    <div class="item">
                        <h3 class="level-title">Customer Feedback</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo $row['cf_skills']; ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    
                    <div class="item">
                        <h3 class="level-title">Sketch &amp; Photoshop</h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" data-level="<?php echo $row['sp_skills']; ?>%">
                            </div>                                      
                        </div><!--//level-bar-->                                 
                    </div><!--//item-->
                    
                </div>  
            </section><!--//skills-section-->
            
        </div><!--//main-body-->
    </div>
     
    <footer class="footer navbar-fixed-bottom text-center">
       <p>Copyright: &copy; <a href="http://networksofshon">Abhijit</a> | All rights reserved</p>
    </footer>
    <!-- Javascript -->          
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>    
    <!-- custom js -->
    <script type="text/javascript" src="js/main.js"></script> 
    <script type="text/javascript" src="writer_photo.js"></script> 
</body>
</html> 

