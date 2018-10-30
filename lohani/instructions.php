<?php
require_once('session.php');
require_once('class.user.php');
$user = new USER();
$login = new USER();
if($user->is_loggedin()!="")
{
  $roll_number = $_SESSION['user_session'];
  echo '<script language="javascript">';
    echo 'alert("The test will work with Google Chrome only.");';
    echo '</script>';
}
if(isset($_POST['btn-agree']))
{
  header("Location:test.php");
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
            <h1 class="white">Instructions</h1>
          </div>
          
          
<!--=========================================-->
<?php 
if($user->is_loggedin()!=""){
                            
      echo'   
          
      <a style="position: relative; center; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="test.php" ><button class="btn" name="btn-agree">I have read the instructions</button></a>  
          	<a  style="position: relative; center; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="logout.php?logout=true" ><button class="btn">Sign-Out</button></a>           
          <div class="form-box">
              <div class="form-bottom">
                     <div class="banner-text ">
                            <p><strong> Note: </strong> </p>
		        <ol>
         		    <li><strong>1. &nbsp;  </strong>The test is supported only on <strong> GOOGLE CHROME </strong> browser.</li>    
         		    <li><strong>2. &nbsp;  </strong>The test requires good internet connection. If your connection is slow, please read few sentences at once and wait for the output before you start again.</li>    
         		    <li><strong>3. &nbsp;  </strong>Please go to Website settings and select the "Allow Microphone" option before starting the test. Chrome will pop-up a message if you forget to!</li>
         		    <li><strong>4. &nbsp;  </strong>If you are using the Chrome browser in phone, please switch you phone from "Power Saving Mode" to "Full Performance Mode".</li>
		            <li><strong>5. &nbsp;  </strong>You can submit the score of any topic only once.</li>
		            <li><strong>6. &nbsp;  </strong>You must attempt at least 3 topics for perfect evaluation.</li>
		            <li><strong>7. &nbsp;  </strong>You may attempt more topics to increase your overall score. We consider the average score of last few tests for evaluation.</li>
		            <li><strong>8. &nbsp;  </strong>Please fill the Feedback form if you face any issues on the portal. We will get back to you as soon as possible.</li>				
		            <li><strong>9. &nbsp;  </strong>If the browser says "This connection is not secure", go to the browser settings and add an Exception.</li>
                        </ol>
                        <ol>
		            <li><strong>Step 1: &nbsp;  </strong>Tap the button "I have read the instructions". Thereafter, you will land on the test page.</li>
		            <li><strong>Step 2: &nbsp;  </strong>You are provided with a list of topics for the test. Choose one of them and it will appear on the text-box below.</li>
		            <li><strong>Step 3: &nbsp; </strong>Tap the "Click to speak" button and read the paragraph. Once you have read the paragraph, tap the "click to Stop" button.</li>
		            <li><strong>Step 4: &nbsp; </strong>The engine converts the voice into text and prints it below the "Submit" button. Once it is printed, the "Evaluate" button is activated.</li>
		            <li><strong>Step 5: &nbsp; </strong>Tap the "Evaluate" button to see your score. You can use "Clear Text" button, if you want to attempt it again. </li>
		            <li><strong>Step 6: &nbsp; </strong> After evaluation, tap the "Submit" button to store the result.</li>
		            
		     </div>          
              </div>            
          </div>
                      ';}
    else{
          
    }
?> 
<!--=========================================-->
        </div>
      </div>
    </div>

</section>



  <!--/ banner-->
  <!--footer-->
  <footer id="footer">
    <div class="top-footer">
      <div class="container">
        
        <?php
        if($user->is_loggedin()!=""){
        echo '
        <div class="row">
          <div class="col-md-6 col-sm-6 marb20">
              <div class="ftr-tle">
                <h4 class="white no-padding">Feedback</h4>
              </div>
              <div class="info-sec">
                <form method="POST">
                    <textarea class="form-control" style="height: 100px" placeholder="If you are facing any issues on the test portal, please send a feedback and we will get back to you soon. Please provide your feedback too. " style="font-weight: bold; color: black;" name="feedback"></textarea>
                    <a style="color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;"> <button type="submit" class="btn" name="btn-feedback">Send</button> </a>
                </form>
              </div>
          </div>
          <div class="col-md-6 col-sm-6 marb20">
            <div class="ftr-tle">
              <h4 class="white no-padding">Contact</h4>
            </div>
            <div class="info-sec">
              <p> Ankit Lohani </p>
             <p>+91-9932471627</p>
            </div>
          </div>
          
        </div> 
        ';}
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