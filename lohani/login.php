<?php
require_once('session.php');
require_once('class.user.php');
$user = new USER();
$login = new USER();
if($user->is_loggedin()!="")
{
  $roll_number = $_SESSION['user_session'];
  header("Location:instructions.php");
}
if(isset($_POST['btn-login']))
{
  $iroll = strip_tags($_POST['form-rollnumber']);
  $pass = strip_tags($_POST['form-password']);

  if($login->doLogin($iroll,$pass))
  {
    echo '<script language="javascript">';
    echo 'alert("Logged in");window.location.href=\'instruction.php\';';
    echo '</script>';
    header("Location:instructions.php");
  }
  else
  {
    echo '<script language="javascript">';
    echo 'alert("Incorrect Roll Number or password. Please Try Again.");window.location.href=\'login.php\';';
    echo '</script>';
  } 
}
if(isset($_POST['btn-signup']))
{
  $name = strip_tags($_POST['form-name']);
  $rollnumber = strip_tags($_POST['form-rollnumber']);
  $email = strip_tags($_POST['form-email']);
  $contactnumber = strip_tags($_POST['form-contactnumber']);
  $pass = strip_tags($_POST['form-password']);
  $passconf = strip_tags($_POST['form-cnfpassword']);
  
  
  if($name=="") {
    $error[] = "Provide Name!";
    echo '<script language="javascript">';
    echo 'alert("Provide your name!");';
    echo '</script>'; 
  }
  else if($email=="")  {
    $error[] = "Provide email id!";
    echo '<script language="javascript">';
    echo 'alert("Provide Email-ID!");';
    echo '</script>';  
  }
  else if($rollnumber=="")  {
    $error[] = "Provide Institute's Roll Number!"; 
    echo '<script language="javascript">';
    echo 'alert("Provide Institute \'s Roll Number!");';
    echo '</script>'; 
  }
  else if($contactnumber=="") {
    $error[] = "Provide team leader's phone number!"; 
    echo '<script language="javascript">';
    echo 'alert("Provide Leader\'s Phone Number!");';
    echo '</script>'; 
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL))  {
      $error[] = 'Please enter a valid email address!';
      echo '<script language="javascript">';
      echo 'alert("Provide enter a valid email address!");';
      echo '</script>'; 
  }
  else if($pass=="")  {
    $error[] = "provide password !";
    echo '<script language="javascript">';
    echo 'alert("Provide password!");';
    echo '</script>'; 
  }
  else if(strlen($pass) < 6){
    $error[] = "Password must be atlesat 6 characters"; 
    echo '<script language="javascript">';
    echo 'alert("Password must be atleast 6 characters!");';
    echo '</script>'; 
  }
  else if($pass != $passconf){
    $error[] = "Passwords do not match!"; 
    echo '<script language="javascript">';
    echo 'alert("Passwords do not match!");';
    echo '</script>'; 
  }
  else
  {
    try
    {
      $stmt = $user->runQuery("SELECT * FROM students WHERE roll_number=:proll_number OR mail=:pmail");
      $stmt->execute(array(':proll_number'=>$roll_number, ':pmail'=>$email));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
        
      if($row['roll_number']==$rollnumber) {
        $error[] = "sorry you are already registered!";
        echo '<script language="javascript">';
        echo 'alert("This Roll no. is already registered!");';
        echo '</script>';
      }
      else if($row['mail']==$email) {
        $error[] = "sorry email id already in use!";
        echo '<script language="javascript">';
        echo 'alert("Email-ID is already taken!");';
        echo '</script>';
      }
      else
      {
        if($user->register($name, $rollnumber, $email , $contactnumber , $pass)){  
          echo '<script language="javascript">';
          echo 'alert("Signed Up!");window.location.href=\'login.php\';';
          echo '</script>';
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  } 
}
if(isset($_POST['btn-feedback']))
{
    $feedback = strip_tags($_POST['feedback']);
    $stmt = $user->runQuery("SELECT * FROM students WHERE roll_number=:proll_number");
    $stmt->execute(array(':proll_number'=>$roll_number));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($user->storeFeedback($roll_number , $row["mail"] , $feedback)){  
    echo '<script language="javascript">';
    echo 'alert("Feedback Sent");window.location.href=\'test.php\';';
    echo '</script>';   } 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Communiqu&#xe9;</title>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- =======================================================
    ======================================================= -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="dropdown/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="text-center">
            <h1 class="white">Testboard</h1>
          </div>
          <div class="banner-text text-center">
            <p>Module 1: Reading and Pronunciation Skills</p>
          </div>
          
<!--=========================================-->
<?php 
if($user->is_loggedin()!=""){
                   
     }
    else{
          echo'
                      <div class="row">
                        <div class="col-sm-5">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Login</h3>
                                        <p>Enter username and password to log on:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-lock"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="" method="post" class="login-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-rollnumber">RollNumber</label>
                                            <input type="text" name="form-rollnumber" placeholder="Institute Roll Number" class="form-rollnumber form-control" id="form-rollnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="form-password" placeholder="Password" class="form-password form-control" id="form-password">
                                        </div>
                                        <button type="submit" class="btn" name="btn-login">Sign in!</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                            
                        <div class="col-sm-5">
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Sign Up</h3>
                                        <p>Fill in the form below to get instant access:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="" method="post" class="registration-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-name">Name</label>
                                            <input type="text" name="form-name" placeholder="Name" class="form-name form-control" id="form-name">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-rollnumber">Institute Roll Number</label>
                                            <input type="text" name="form-rollnumber" placeholder="Institute Roll Number" class="form-rollnumber form-control" id="form-rollnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <input type="text" name="form-email" placeholder="Email ID" class="form-email form-control" id="form-email">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-contactnumber">Contact No.</label>
                                            <input type="text" name="form-contactnumber" placeholder="Contact No." class="form-contactnumber form-control" id="form-contactnumber">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Set Password</label>
                                            <input type="password" name="form-password" placeholder="Password" class="form-password form-control" id="form-password">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-cnfpassword">Confirm Password</label>
                                            <input type="password" name="form-cnfpassword" placeholder="Re-enter Password" class="form-cnfpassword form-control" id="form-cnfpassword">
                                        </div>
                                        <button type="submit" class="btn" name="btn-signup">Sign me up!</button>
                                    </form>
                                </div>
                            </div>    
                        </div>
                    </div>
';
    }
?> 
<!--=========================================-->
        </div>
      </div>
    </div>

  </section>
  
  <!--/ banner-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        
        <?php
        if($user->is_loggedin()!=""){
        }
        else{
        echo '
        <div class="row">
          <div class="col-md-4 col-sm-4 marb20">
              <div class="ftr-tle">
                <h4 class="white no-padding">Communiqu&#xe9;</h4>
              </div>
              <div class="info-sec">
                <p>We aim to act as an interface between professional communication experts and individual students and working with the students to ensure that there is a perceptible change in the level of communication skills in IIT Kharagpur.
</p>
              </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Quick Links</h4>
            </div>
            <div class="info-sec">
              <ul class="quick-info">
                <li><a href="index.php"><i class="fa fa-circle"></i>Initiatives</a></li>
                <li><a href="index.php"><i class="fa fa-circle"></i>Course Structure</a></li>
                <li><a href="index.php"><i class="fa fa-circle"></i>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Follow us</h4>
              <br>
                <a href="https://www.facebook.com/communique.iitkgp/"><i class="fa fa-facebook" class="bglight-blue"></i></a>

            </div>
          </div>
        </div>
        ';}
        ?>
      </div>
    </div>
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            Team Communiqu&#xe9;
                        <div class="credits">
                            Website maintained by <a href="https://www.linkedin.com/in/ankit-lohani-b5536172/">Ankit Lohani</a>
                        </div>
          </div>
        </div>
      </div>
    </div>
  </footer>  <!--/ footer-->
    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    
    <!--[if lt IE 10]>
        <script src="assets/js/placeholder.js"></script>
    <![endif]-->
  </body>
  
</html>