<!DOCTYPE html>
<html lang="en" ng-app>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Freelance</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <!-- ====================================================
  header section -->
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
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="register.php">Register</a></li>
                                    <li><a href="login.php">Log In</a></li>
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

    <!-- banner area starts here -->
    <br>
    <!-- about section -->
    <section class="about text-center" id="sec2">
    
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 about-heading">
                    <h2>Register As Company</h2>
                    <img src="img/daag.png" alt="">
        <?php
              require('php_classes\db.php');
              
    if(isset($_POST['cname'])){
        $cname = $_POST['cname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address=$_POST['address'];
        $country=$_POST['country'];
        $phno=$_POST['phno'];
        $web=$_POST['web'];
        $email = stripslashes($email);
        $email = mysql_real_escape_string($email);
        $password = stripslashes($password);
        $password = mysql_real_escape_string($password);
        $trn_date = date("Y-m-d H:i:s");

        $query = "INSERT into `company_user` (cname, email, password, address, location, cdate, phno, web) VALUES ('$cname', '$email', '".md5($password)."', '$address', '$country', '$trn_date','$phno', '$web')";
         $result = mysql_query($query);

        if($result){
            
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a><br><br><br><br><br><br><br><br><br><br><br></div>";
        }
    } else { ?>
                  <form role="form" name="form" class="col-md-8 col-md-offset-2" method="post" action="">
                <fieldset class="scheduler-border">
            <legend class="scheduler-border"><h3>Register</h3></legend>
                        <div class="form-group">
                  <h3><label for="name"  class="label label-primary col-md-4" >Company Name</label><span class="label label-success col-md-8">{{cname}}</span></h3>
                             <input type="text" class="form-control" name="cname" id="cname" ng-model="cname" placeholder="Enter Company Name" required>  
                             <span style="color:red" ng-show="form.cname.$dirty && form.cname.$invalid">
                             
                        </div>
            <div class="form-group">
                 <h3><label for="email"  class="label label-primary col-md-4" >Email</label><span class="label label-success col-md-8">{{email}}</span><span class="label label-danger col-md-8" style="color:red" ng-show="form.email.$dirty && form.email.$invalid && form.email.$error.email">NOT AN EMAIL!</span></h3>
                             <input type="email" class="form-control" name="email" id="email" ng-model ="email" placeholder="Enter Company email" required>
                             
                        </div>
            <div class="form-group">
                  <h3><label for="password"  class="label label-primary col-md-4" >Password</label>
                             <span class="label label-danger col-md-8" style="color:red" ng-show="form.password.$error.minlength">Too Short</span>
                             <span class="label label-danger col-md-8" style="color:red" ng-show="form.password.$error.maxlength">Too Long</span>
                             <span class="label label-danger col-md-8" style="color:red" ng-show="form.password.$error.pattern">Mismatch Password</span>
                             </h3>
                             <input type="password" class="form-control" name="password" id="password" ng-model="password" ng-pattern="password1" ng-minlength="5" ng-maxlength="10" placeholder="Enter password" required>
                                                     </div>
                        <div class="form-group">
                             <h3><input type="password" name ="password1" class="form-control" id="password1" placeholder="Re-Type password" ng-model="password1" required>
                             <span style="color:red" ng-show="form.password1.$dirty && form.password1.$invalid">
                        </div>
            
             <div class="form-group">
                                <h3><label for="address"  class="label label-primary col-md-12" >Company Address {{address}}</label></h3>
                                <textarea class="form-control" name="address"  id="address" ng-model="address" rows="3" required></textarea>
                                <span style="color:red" ng-show="form.address.$dirty && form.address.$invalid">
                       </div>
             <div class="form-group">
                             <h3><label for="country"  class="label label-primary col-md-12" >Location {{country}}</label></h3>
                              <select class="form-control" name ="country" ng-model="country" id="country" required>
                              <option>India</option>
                             <option>Nepal</option>
                             <option>Bhutan</option>
                             <option>Singapore</option>
                             <option>UAE</option>
                              </select>
                              <span style="color:red" ng-show="form.country.$dirty && form.country.$invalid">
                      </div>
                      <br><br>
                      <div class="form-group">
                          <h3><label for="phno"  class="label label-primary col-md-12" >Phone No. {{phno}}</label></h3>
                         <input type="text" name ="phno" class="form-control" id="phno" placeholder="Phone No." ng-model="phno" required>
                         <span style="color:red" ng-show="form.phno.$dirty && form.phno.$invalid">
                      </div>
                      <div class="form-group">
                          <h3><label for="phno"  class="label label-primary col-md-12" >Website {{web}}</label></h3>
                         <input type="text" name ="web" class="form-control" id="web" placeholder="Website" ng-model="web" required>
                         <span style="color:red" ng-show="form.web.$dirty && form.web.$invalid">
                      </div>
            
                      <br><br>
                                <div class="form-group col-md-12">
                                   <button type="submit" class="btn btn-primary" ng-disabled="form.$invalid" >Submit</button>
                              </div>
                              </fieldset>
                         </form>
        
                <?php  } ?>

               
              
               
                </div>
            </div>
        </div>
        

    </section>
    <!-- end of about section -->

    

   
    <!-- footer starts here -->
    <footer class="footer  text-center ">
        <p>Copyright: &copy; <a href="http://networksofshon">Abhijit</a> | All rights reserved</p>
    </footer>

    <!-- script tags
  ============================================================= -->
    <script src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
