<?php 
   include("php_classes/writer_auth.php");

?>

<!DOCTYPE html>
<html lang="en" ng-app>
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
             @import url("data_table/css/jquery.dataTables.css");
    </style>
    
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
        
        <div class="main-wrapper">
            
            <section class="section summary-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Tasks</h2>
                <div class="summary">
                    <table id = "datatables" class ="display table table-striped table-advance table-hover table-bordered" cellspacing="0" width="100%">
                        <thread>
                            <tr>
                                <th>Job Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Posted On</th>
                                <th>Rate</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Approve By</th>
                            </tr>
                        </thread>
                        <tbody>
                              <?php
                                    include("php_classes/db.php");
                                    $count =0;
                                    $userid = $_SESSION['username'];
                                    $query = "SELECT job_approved.job_id as job_id, job_name, job_descrp, post_date, job_rate, expire_date, job_status, cname FROM job_posts, job_approved, company_user
                                            WHERE job_posts.job_id = job_approved.job_id AND company_user.phno = company_id AND job_approved.user_id = '$userid' LIMIT 0 , 30";

                                    $result = mysql_query($query) or die(mysql_error());
                                    
                                    while($row=mysql_fetch_assoc($result)){

                              ?>

                              <tr>
                                 <th><span class ="btn btn-danger"  ng-show="form.<?php echo $row['job_id']; ?>">{{<?php echo $row['job_id']; ?>}}</span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['job_name']; ?></span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['job_descrp']; ?></span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['post_date']; ?></span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['job_rate']; ?></span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['expire_date']; ?></span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['job_status']; ?></span></th>
                                 <th><span class ="btn btn-success"  ng-show="form.<?php echo $row['job_id']; ?>"><?php echo $row['cname']; ?></span></th>
                              </tr>
                              <?php $count++; }?>
                        </tbody>
                    </table>
                </div><!--//sum<!--//summary-->
            </section><!--//section-->
            
            <section class="section summary-section row">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Work</h2>
                <h2 >  Currently working on Job No. {{jobid}} <span id="result"></span></h2>
                <div class="summary">
                      <form role="form" id = "form1" name="form" class="col-md-12 " method="post" action="submit_job.php">
                       <div class="form-group">
                       <select class="form-control" name ="jobid"  id="jobid" ng-model="jobid">
                       <?php
                          $result = mysql_query($query) or die(mysql_error());
                          while($row=mysql_fetch_assoc($result)){

                              ?>

                              <option ng-model= "<?php echo $row['job_id']; ?>"><?php echo $row['job_id']; ?></option>
                               <?php $count++; }?>
                              </select>
                              </div>
                      <div class="form-group">
                       <textarea class ="ckeditor" name = "editor" ></textarea>
                       </div>
                       
                       <div class="form-group">
                        <button type="submit" id ="sub" name ="submit" class="btn btn-primary"  >Submit Work</button>
                        </div>
                   </form>
                     </div><!--//sum<!--//summary-->
            </section><!--//section-->

            
        </div><!--//main-body-->
    </div>
     
    <footer class="footer navbar-fixed-bottom text-center">
       <p>Copyright: &copy; <a href="http://networksofshon">Abhijit</a> | All rights reserved</p>
    </footer>
    <!-- Javascript -->
    <script src="js/angular.min.js"></script>          
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>  
    <script type="text/javascript" src="data_table/js/jquery.dataTables.min.js"></script>  
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/styles.js"></script>
     <script type="text/javascript" src="js/main.js"></script>
    <!-- custom js -->
    <script type="text/javascript" charset="utf-8">
        
        $(document).ready(function(){
            $('#datatables').dataTable();
        })
    </script>
    <!-- custom js -->
      
              
</body>
</html> 

