<html>
    <head>
        <title>SignUp</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<style>
body{
    background-color: #525252;
}
.centered-form{
  margin-top: 60px;
}

.centered-form .panel{
  background: rgba(255, 255, 255, 0.8);
  box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
}
</style>



    </head>
    <body>
        <h2>Registration Page</h2>




        <div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
              <form role="form" action = "register.php" method = "POST">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="username" id="username" class="form-control input-sm" placeholder="UserName">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="text" name="phoneno" id="phoneno" class="form-control input-sm" placeholder="Mobile Number">
                </div>

                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                    </div>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="city" id="city" class="form-control input-sm" placeholder="City">
                    </div>
                  </div>
                </div>
                
                <input type="submit" value="Register" class="btn btn-info btn-block">
              
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$servername = "localhost";
$dbusername = "id1248068_adityainternship";
$dbpassword = "mypassword";
$db = "id1248068_internship";

// Create connection
$con=mysqli_connect($servername, $dbusername, $dbpassword)or die("cannot connect"); 
mysqli_select_db($con, $db)or die("cannot select DB");

$username = mysqli_real_escape_string($con,$_POST['username']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$phoneno = mysqli_real_escape_string($con,$_POST['phoneno']);
$password = mysqli_real_escape_string($con,$_POST['password']);


if(($username=="")||($name=="")||($city=="")||($email=="")||($phoneno=="")||($password==""))
{

  Print '<script>alert("Username already exists");</script>';
   Print '<script>window.location.assign("register.php");</script>';

}
else
{




// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sqlcheck = "SELECT * FROM users WHERE username = '".$username."'";
    $result = mysqli_query($con,$sqlcheck);
    if(mysqli_num_rows($result)>=1)
       {
        Print '<script>alert("Username already exists");</script>';
   Print '<script>window.location.assign("register.php");</script>';
       }
       else
       {
       
      $sql = "INSERT INTO users(username,name,email,city,phoneno,password) VALUES('$username','$name','$email','$city','$phoneno','$password')";

if (mysqli_query($con, $sql)) {
    Print '<script>alert("Succesfully Registered");</script>';
   Print '<script>window.location.assign("index.html");</script>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

       }






}

mysqli_close($con);


  

}





?>