<?php
require_once('session.php');
require_once('class.user.php');
$user = new USER();
if($user->is_loggedin()!="")
{
  $roll_number = $_SESSION['user_session'];
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
    <style>
	.table-hover tbody tr:hover td
	{
	    background-color: #fff;
	    color: #888;
	}
	table
	{
	color: #fff;
	text-align: left;
	}
	.modal  {padding-right: 0px;background-color: rgba(4, 4, 4, 0.8);}
	.modal-dialog {top: 20%;width: 100%;position: absolute;}
	.modal-content {border-radius: 0px;border: none;top: 40%;}
	.modal-body {background-color: #0f8845;color: white;}
    </style>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="text-center">
            <h1 class="white">Dashboard</h1>
          </div>
          <div class="banner-text text-center">
            <p>Module 1: Reading and Pronunciation Skills</p>
          </div>
          
          
                                        

<!--=========================================-->
<?php
if($user->is_loggedin()!=""){
echo'
	<div class="container">
	    <div class="row">
	        <!-- Large modal -->
	        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modal">
	          <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	            
	              <div class="modal-body">
	             
	              
	              <h4>Your past scores reveal that your average score in below 60% <br> Please consider joining our course "Effective Communication Skill for Engineers and Scientists" <br> 6PM-8PM on 7th - 11th August at Vikramshila V3 </h4>
	             
	              </div>
	            </div>
	          </div>
	        </div>
	    </div>
	</div>';
} 
if($user->is_loggedin()!=""){
$stmt = $user->runQuery("SELECT * FROM students_data WHERE roll_number=:proll_number ORDER BY time DESC");
$stmt->execute(array(':proll_number'=>$roll_number));
$no = 1;
    echo'
	<div class="overlay-detail text-center">  
    	<a style="position: relative; center; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="test.php" ><button class="btn" name="btn-dashboard">Testboard</button></a>
    	<a  style="position: relative; center; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="logout.php?logout=true" ><button class="btn">Sign-Out</button></a>
       <div class="banner-text text-center">
		Your overall Score is <strong id= "result"><strong> percent.
          </div>

      <table class="table table-bordered table-hover">
        <thead class="thead-inverse">
          <tr>
            <th class="col-xs-1">S. No.</th>
            <th class="col-xs-2">Time Stamp</th>
            <th class="col-xs-4">Topic</th>
            <th class="col-xs-4">You spoke</th>
            <th class="col-xs-1">Score</th>
          </tr>
        </thead>
        <tbody> ';
        $tempscore = 0;
        $out= 0;
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
      $topic = $row["topic"];
      $stmt1 = $user->runQuery("SELECT * FROM topics WHERE topic_no=:ptopic_no");
      $stmt1->execute(array(':ptopic_no'=>$topic));
      $rowtopic=$stmt1->fetch(PDO::FETCH_ASSOC);
      if($no<6){	      
      	$tempscore = $tempscore + $row["score"];
      	$out = $tempscore/$no;
      	}
      echo '<tr>
            <td>'.$no.'</td>
            <td>'.$row["time"].'</td>
            <td>'.$rowtopic["topic_text"].'</td>
            <td>'.$row["text"].'</td>
            <td>'.$row["score"].'</td>
          </tr>';
        $no++;
        
            	echo '<script language="javascript">var temp; $("#result").text('.$out.');</script>';
    }
    if($out<60){
    	echo '<script language="javascript">$("#modal").modal("show");</script>';
    }
    echo '          
        </tbody>
      </table>  
    ';
}
else{
    echo'
            <a style="position: absolute; right: 2vw; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="login.php" ><button class="btn">Login</button></a>

    ';
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
  </footer>
  <!--/ footer-->
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