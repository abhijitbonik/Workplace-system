<?php 
   include("php_classes/seeker_auth.php");

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
    <style type="text/css">
             @import url("data_table/css/jquery.dataTables.min.css");
             
    </style>
    

     <?php
                      include_once("php_classes/db.php");
                      $phno=$_SESSION["cname"];
                      $query="Select cname, email, address, location, phno, descrp, image from `company_user` where phno = '$phno'";
                      $result = mysql_query($query) or die(mysql_error());
                      $row = mysql_fetch_assoc($result);
                      $mail = $row["email"];
                      $desc= $row['descrp'];
                      $name= $row['cname'];
                      
                      
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
                                    <li><a href="seeker_dashboard.php">Dashboard</a></li>
                                    <li><a href="seeker_profile.php">Profile</a></li>
                                    <li><a href="seeker_jobs.php">Post Jobs</a></li>
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
                    <li class="website"><i class="fa fa-globe"></i><a href="" target="_blank">portfoliosite.com</a></li>
                    <li class="linkedin"><i class="fa fa-linkedin"></i><a href="#" target="_blank">linkedin.com/</a></li>
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
            
            
            
        </div><!--//sidebar-wrapper-->
        
        <div class="main-wrapper">
            
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-user"></i>Company Profile</h2>
                <div class="summary">
                    <p><?php echo $desc; ?></p>
                </div><!--//summary-->
            </section><!--//section-->   
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-user"></i>Upload Profile Pic</h2>
                <div class="summary">
                   
                     
                    <form role="form" id = "form"   method="post" action="photo.php" enctype="multipart/form-data" >
                             
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
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Approved and Completed Jobs</h2>
                <div class="summary">
                    <table id = "datatables" class ="display table table-striped table-advance table-hover table-bordered" cellspacing="0" width="100%">
                        <thread>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Post Date</th>
                                <th>Rate</th>
                                <th>Expire Date</th>
                                <th>Status</th>
                                <th>Approve To</th>
                            </tr>
                        </thread>
                        <tbody>
                              <?php
                                    $count =0;
                                    $query = "SELECT job_name , job_descrp, post_date, job_rate, expire_date, job_status, wname  from job_posts, job_approved, writer_user where job_posts.job_id = job_approved.job_id  and writer_user.phno = job_approved.user_id and job_posts.company_id = '$phno'";

                                    $result = mysql_query($query) or die(mysql_error());
                                    
                                    while($row=mysql_fetch_assoc($result)){

                              ?>
                              <tr>
                                 <th><?php echo $row['job_name']; ?></th>
                                 <th><?php echo $row['job_descrp']; ?></th>
                                 <th><?php echo $row['post_date']; ?></th>
                                 <th><?php echo $row['job_rate']; ?></th>
                                 <th><?php echo $row['expire_date']; ?></th>
                                 <th><?php echo $row['job_status']; ?></th>
                                 <th><?php echo $row['wname']; ?></th>
                              </tr>
                              <?php $count++; }?>
                        </tbody>
                    </table>
                </div><!--//summary-->
            </section><!--//section-->
            
        </div><!--//main-body-->
    </div>
     
    <footer class="footer navbar-fixed-bottom text-center">
       <p>Copyright: &copy; <a href="http://networksofshon">Abhijit</a> | All rights reserved</p>
    </footer>
    <!-- Javascript -->          
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="data_table/js/jquery.dataTables.min.js"></script>  
    

    <!-- custom js -->
    <script type="text/javascript">
    $(document).ready(function(){
            $('#datatables').DataTable();
        });
    </script>
    <script type="text/javascript" src="photo.js"></script>
    <script type="text/javascript" src="js/main.js"></script>            
</body>
</html> 

