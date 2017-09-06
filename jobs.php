
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
                                    <?php session_start(); if(!isset($_SESSION["username"])){ echo '"<li><a href="index.html">Home</a></li>"'; } ?>
                                  <li><a href="jobs.php">Jobs</a></li>
                                  <?php if(isset($_SESSION["username"])){ echo '"<li><a href="writer_profile.php">Profile</a></li>"'; } ?>
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
            
            
            

            <section class="section experiences-section row">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Browse Jobs</h2>

                <?php 
                     include("php_classes/db.php");
                     $query = $query = "SELECT job_id, cname, job_name, job_descrp, post_date, job_rate, expire_date, job_status FROM job_posts, company_user WHERE company_id = phno and job_status != 'Approved' order by job_id desc LIMIT 0 , 30";
                     $result = mysql_query($query) or die(mysql_error());
                     $count=1;
                     $date = date("Y-m-d");
                     while($row = mysql_fetch_assoc($result))
                     { ?>
                                 <div class="item ">
                    <div class="meta">
                        <div class="upper-row">
                            <form role="form"  id="form<?php echo $count; ?>"  method="post" action="job_apply.php">
                            <h3 class="job-title"> <?php echo $row["job_name"]; ?></h3>
                            <div class="time">Valid till: <?php echo $row["expire_date"]; ?></div>
                        </div><!--//upper-row-->
                        <div class="company">Rate: <?php echo $row["job_rate"]; ?> Posted by: <?php echo $row["cname"];?></div>
                    </div><!--//meta-->
                    <div class="details">
                        <p><?php echo $row["job_descrp"]; ?></p>  
                        <input  name ="jobid" id="job<?php echo $count; ?>" type = "hidden" value = <?php echo $row["job_id"] ?> />
                        <?php if($row["expire_date"]>$date){ echo '<button type="submit" id="sub<?php echo $count; ?>" class="btn btn-primary"  >Apply</button>'; } else { echo '<label class="label label-danger col-md-4" >This job has expired.</label>';}?>
                        <span  id="result<?php echo $count; ?>"></span>
                        </form>
                    </div><!--//details-->
                </div><!--//item-->
                  <script>  

                            
                        $("#sub<?php echo $count; ?>").click( function(){
     
                           $.post($("#form<?php echo $count; ?>").attr("action"), $("#form<?php echo $count; ?> :input").serializeArray(), function(info){ $("#result<?php echo $count; ?>").html(info); });

                        
                        });

                      $("#form<?php echo $count; ?>").submit( function(){

                         return false;
                         });

                          
                </script>
                <br/>
                 <?php $count++; } ?>
                
                
                
            </section><!--//section-->
                
            
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
    
              
</body>
</html> 

