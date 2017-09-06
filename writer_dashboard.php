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
                      include_once("php_classes/db.php");
                      $phno=$_SESSION["username"];
                      $query="Select wname, email, address, country, phno from `writer_user` where phno = '$phno'";
                      $result = mysql_query($query) or die(mysql_error());
                      $row = mysql_fetch_assoc($result);



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
                <img class="profile" src="img/profile.png" alt="" />
                <h1 class="name"><?php echo $row['wname']; ?></h1>
                <h3 class="tagline">Full Stack Developer</h3>
            </div><!--//profile-container-->
            
            <div class="contact-container container-block">
                <ul class="list-unstyled contact-list">
                    <li class="email"><i class="fa fa-envelope"></i><a href="mailto: "><?php echo $row["email"]; ?></a></li>
                    <li class="phone"><i class="fa fa-phone"></i><a href="tel:0123 456 789"><?php echo $row["phno"]; ?></a></li>
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
        
        <div class="main-wrapper container">
           
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-user"></i>Update Summary</h2>
                <div class="summary">
                   
                    
                    <form role="form" id = "form1" name="form1" class="col-md-8 " method="post" action="php_classes/update.php">
                             
                       <div class="form-group">
                                
                                <textarea class="form-control" name="bio"  id="bio"  rows="3" ></textarea>
                       </div>
                     <div class="form-group col-md-12">
                           <button id ="sub" type="submit" class="btn btn-success"  >Update</button>
                           
                     </div>
                     <div class="form-group col-md-12">
                     <span id="result"></span>
                     </div>
                 </form>
                        </div><!--//summary-->
            </section>
           
            <section class="section summary-section row">
                 <h2 class="section-title"><i class="fa fa-briefcase"></i>Update Experiences</h2>
                <div class="summary">
                   
                    
                    <form role="form" id = "form2" name="form2" class="col-md-8 " method="post" action="php_classes/insert.php">
                             
                       <div class="form-group">
                      
                             <input type="text" class="form-control" name="title" id="title" placeholder="Designation">
                        </div>
                        <div class="form-group">
                      
                             <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter Company Name">
                        </div>
                        <div class="form-group">
                                
                                <textarea class="form-control" name="des"  id="des"  rows="3" placeholder="Description in details (200 words)"></textarea>
                       </div>
                         <div class="form-group">
                      
                             <input type="text" class="form-control" name="duration" id="duration" placeholder="Duration of work">
                        </div>
                        
                     <div class="form-group col-md-12">
                           <button type="submit" id ="sub1" class="btn btn-success"  >Insert</button>
                     </div>
                     <div class="form-group col-md-12">
                     <span id="result1"></span>
                     </div>
                 </form>

                        </div><!--//summary-->
            </section>
             

             <section class="section summary-section row">
                 <h2 class="section-title"><i class="fa fa-briefcase"></i>Update Skills in percentage</h2>
                <div class="summary">
                      <form role="form" id = "form3" name="form3" class="col-md-5 " method="post" action="php_classes/update.php">

                        <div class="form-group">
                      
                             <input type="text" class="form-control" name="pskills" id="pskills" placeholder="Programming Skills">
                        </div>
                        <div class="form-group">
                      
                             <input type="text" class="form-control" name="lskills" id="lskills" placeholder="Leadership Skills">
                        </div>
                        <div class="form-group">
                      
                             <input type="text" class="form-control" name="sskills" id="sskills" placeholder="Scripting Skills">
                        </div>
                        <div class="form-group">
                      
                             <input type="text" class="form-control" name="cskills" id="cskills" placeholder="Communication Skills">
                        </div>
                         <div class="form-group">
                      
                             <input type="text" class="form-control" name="cfskills" id="cfskills" placeholder="Customer Feedback">
                        </div>
                        <div class="form-group">
                      
                             <input type="text" class="form-control" name="spskills" id="spskills" placeholder="Sketch &amp; Photoshop">
                        </div>
                        <div class="form-group col-md-12">
                           <button type="submit" id ="sub3" class="btn btn-success"  >Insert</button>
                         </div>
                         <div class="form-group col-md-12">
                     <span id="result3"></span>
                     </div>
                      </form>
   
                </div><!--//summary-->
            </section>
            
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
    <script type="text/javascript" src="js/update.js"></script>  
    <script type="text/javascript" src="js/update2.js"></script> 
    <script type="text/javascript" src="js/insert.js"></script>  
               
</body>
</html>

