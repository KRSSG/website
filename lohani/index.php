<?PHP
if(isset($_POST['btn-contact']))
{
$email = $_POST["emailaddress"];
$to = "lohani.1575@gmail.com";
$subject = $_POST["subject"];
$name = $_POST["name"];
$headers = "From: $email\n $name\n";
$message = $_POST["message"];
$user = "$email";
$usersubject = "Thank You";
$userheaders = "From: lohani.1575@gmail.com\n";
$usermessage = "We will get back to you soon.";
mail($to,$subject,$message,$headers);
mail($user,$usersubject,$usermessage,$userheaders);
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
        Theme Name: Medilab
        Theme URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
        Author: BootstrapMade.com
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  	<!--banner-->
	<section id="banner" class="banner">
		<div class="bg-color">
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			  	<div class="col-md-12">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#"></a>
				    </div>
				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="#initiative">Initiatives</a></li>
				        <li class=""><a href="#course">Course Details</a></li>
				        <li class=""><a href="#team">Instructor</a></li>
				        <li class=""><a href="#material">Course Material</a></li>
				        <li class=""><a href="#contact">Contact</a></li>
				      </ul>
				    </div>
				</div>
			  </div>
			</nav>
			<div class="container">
				<div class="row">
					<div class="banner-info">
						<div class="banner-logo text-center">
							<img src="img/logo.png" class="img-responsive">
						</div>
						<div class="banner-text text-center">
							<h1 class="white">Effective Communication Program</h1>
							<p>*Certified Course</p>
						</div>
						<div class="text-center">
							<h1 class="white">Communiqu&#xe9;</h1>
						</div>
						<div class="banner-text text-center">
							<p>Indian Institute of Technology Kharagpur</p>
							<a href="login.php" class="btn btn-appoint"><strong>Login/Sign Up</strong></a>
						</div>
						<div class="overlay-detail text-center">
			               <a href="#course"><i class="fa fa-angle-down"></i></a>
			             </div>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ banner-->
	<!--initiative-->
	<section id="initiative" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-5 col-sm-5 col-xs-12">
			        <div class="section-title">
			          <h2 class="head-title lg-line">Bridging the Skills Gap: <br>Importance of Soft Skills</h2>
			          <hr class="botm-line">
			          <p class="sec-para">“Graduates need strong communication and problem-solving skills if they want to interview well and succeed in the workplace, because effective writing, speaking, and critical thinking enables you to accomplish business goals and get ahead,” Dan Schawbel, research director at Future Workplace, said in a statement. “No working day will be complete without writing an email or tackling a new challenge, so the sooner you develop these skills, the more employable you will become,” Schawbel adds.</p>
			          <a href="https://www.fastcompany.com/3059940/these-are-the-biggest-skills-that-new-graduates-lack" style="color: #0cb8b6; padding-top:10px;">Know more..</a>
			        </div>
			    </div>
			    <div class="col-md-7 col-sm-7 col-xs-12">
			       <div style="visibility: visible;" class="col-sm-9 more-features-box">
			          <div class="more-features-box-text">
			            <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
			            <div class="more-features-box-text-description">
				            <h3>Something students at the best technical institutions lack</h3>
				            <p> If students are not good communicators they often lag behind and miss valuable opportunities. Their  failure to convey these attributes can land them to rejection. To solve such employability issues, some IITs, like IIT Kanpur, IIT Guwahati, IIT Hyderabad have come up with crash courses. This will help them hone their body language, communication and writing skills. We, at IIT Kharagpur, are aiming to target the freshers to help them and make them realize it\'s importance since the beginning.</p>
				        </div>
			          </div>
			          <div class="more-features-box-text">
			            <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
			            <div class="more-features-box-text-description">
				            <h3>Our short course at IIT Kharagpur</h3>
				            <p>Communiqu&#xe9; has been working for previous many years to provide the students in the campus a platform to improve their communication skills. For the past three years, we have been organising short courses on effective communication skills to help students build their career.</p>
				        </div>
                        </div>
			        </div>
			    </div>
			</div>
		</div>
	</section>
	<!--/ initiative-->
	<!--course-->
	<section id="course" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<h2 class="ser-title">Course Details</h2>
					<hr class="botm-line">
					<p><strong>Effective Communication Skills for Engineers, Scientists and Educators</strong>
<br> by Dr. Ranbir Sinha, Sinha Research, Switzerland <br> in collaboration with <br> The Institute for Employment-Oriented Skill Development (IEOSD)<br> Organized by IIT Communique and HSS Department.</p>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-book"></i>
						</div>
						<div class="icon-info">
							<h4>Reading & Listening Skills</h4>
							<p>- The easiest tricks to acquire an International English accent.
							<br>- 200 Technical words that are often mispronounced
							</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-code"></i>
						</div>
						<div class="icon-info">
							<h4>Self Paced Learning Software</h4>
							<p>- Practice with Software Spoken English for Engineers and Scientists
							<br>- Software licence distribution to students</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-comments"></i>
						</div>
						<div class="icon-info">
							<h4>Technical meetings and Group Discussions</h4>
							<p>- The Final Polish - Professional behavior, courtesy & gestures.
							<br>- Continuation of Self-study with the software SEES-2020 and online evaluation
							</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-star-o"></i>
						</div>
						<div class="icon-info">
							<h4>Continuous Evaluation and Certification</h4>
							<p>- Using the learning modules on this website for continuous evaluation
							<br>- Students completing the course will be awarded cetificates.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="schedule-tab">
    			<div class="col-md-4 col-sm-4 bor-left">
    				<div class="mt-boxy-color"></div>
	    			<div class="medi-info">
		    			<h3>Step 1</h3>
						<p>Register on this website and give the test. You will recieve and invitation for enrollment on the basis of this test.</p>
						<a href="login.php" class="medi-info-btn">READ MORE</a>		    	
					</div>
    			</div>
				<div class="col-md-4 col-sm-4">
					<div class="medi-info">
		    			<h3>Step 2</h3>
						<p>Follow our page - Communiqu&#xe9;, IIT Kharagpur to recieve updates of the shortlist and the course registration link. The recommended students will be notified via emails.</p>
						<a href="fb.me/communique.iitkgp" class="medi-info-btn">Follow</a>	
					</div>
				</div>
				<div class="col-md-4 col-sm-4 mt-boxy-3">
					<div class="mt-boxy-color"></div>
					<div class="time-info">
			    			<h3>Class Hours</h3>
							<table class="table" border="1">
								<tbody>
									<tr>
									<td>Monday - Friday</td>
									</tr>
									<tr>
									<td>7th - 11th August 2017</td>
									</tr>
									<tr>
									<td>6:00 PM - 8:00 PM</td>
									</tr>
									
								</tbody>
							</table>				    		
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
	<!--course-->
	<!--team-->
	<section id="team" class="section-padding">
		<div class="container">
			<div class="row">
			    <div class="col-md-12">
				<h2 class="ser-title">Course Instructor</h2>
				<hr class="botm-line">
			    </div>
			    <div class="col-md-3 col-sm-3 col-xs-6">
			      <div class="thumbnail"> 
			      	<img src="img/doctor4.jpg" alt="..." class="team-img">
			        <div class="caption">
			          <h3>Dr. Ranbir Sinha</h3>
			          <p>Engineering Consultant & Researcher</p>
			          <ul class="list-inline">

			            <li><a href="https://www.linkedin.com/in/ranbir-sinha-93592471/"><i class="fa fa-linkedin"></i></a></li>

			          </ul>
			        </div>
			      </div>
			    </div>
			    <div class="col-md-9 col-sm-9 col-xs-6">
				    <div class="section-title">

				          <p class="sec-para">
				          Dr. Ranbir Sinha is a rocket-scientist, an inventor, and an educator. He received his Bachelor of Technology degree in Aerospace Engineering from IIT-Kharagpur, India and achieved the top merit position in the graduating class. He received his M.S. in Aerospace Engineering and Ph.D. in Mechanical Engineering from University of Minnesota, USA. His Ph.D. thesis became one of the early foundations of Software Integration in the field of Computer-Aided Mechanical Engineering Design. </p>
				          <p class="sec-para">Dr. Sinha worked as a researcher in space industries in Europe and contributed to many European Space Agency projects: Rosetta Spacecraft, MeteoSat Second Generation, ATV-International Space Station transportation, European Ariane-5 rocket, American Atlas-V rocket, etc. Many of his inventions have become standard practices in space industries. His work on Atlas-V rocket has appeared in Guinness World Records 2013.</p>
				          <p class="sec-para">Dr. Sinha lives in Switzerland and heads a research firm. He has been voluntarily teaching and inspiring the students in India over past 10 years. He is one of the founders and past president of Society for Promoting Applied Science and Engineering.
</p>
				          <p class="sec-para">In addition to innovative engineering, he teaches practical communication skills for success. He focuses on the essential, pragmatic, and targeted teaching techniques for maximum efficacy, i.e. fix 80% of the problems in 20% time taken by traditional methods. Thousands of students and faculty members have benefitted from his courses at IITs, NITs, and Engineering colleges.
</p>
 <p class="sec-para">Dr. Sinha is fluent in 4 languages: Bengali, Hindi, English, and German. He is the co-author of Spoken English-2020 software (#1 Best Seller on Amazon.in), Spoken English for Engineers and Scientists (SEES-2020) software, and the textbook Modern Spoken English for Science Students with timed audio. </p>
 <p class="sec-para">His goal is to provide high quality and practical education to every student in India and
guide them to become innovators and entrepreneurs.</p>
 

				          
				        </div>
			    </div>
			</div>
		</div>
	</section>
	<!--/ team-->
	<!--material-->
	<section id="material" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Learning Software</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="testi-details">
						<!-- Paragraph -->
						<p>This is for fluency in technical English - specifically designed for Science and Engineering students, Whereas, Spoken English-2020 software on Amazon.in is suitable for all students who want to learn spoken English used in practical situations - travelling, meeting new people, work place, shopping-mall, restaurants.. and so on.</p>
					</div>
					<div class="testi-info">
						<!-- User Image -->
						<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
						<!-- User Name -->
						<h5>Is it suitable for everybody in every field who requires to learn English or only for engineers and scientists?</h5>
					</div>
				</div>
			    <div class="col-md-6 col-sm-6">
					<div class="testi-details">
						<!-- Paragraph -->
						<p>It teaches only Spoken English absolutely necessary for science and engineering. So, if that is what you need, it does not waste your time teaching useless things. It is software-based, i.e., you see the technical words, sentences, and paragraphs, the computer reads them in a natural American English and gives a pause for you; you simply listen carefully and repeat.</p>
					</div>
					<div class="testi-info">
						<!-- User Image -->
						<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
						<!-- User Name -->
						<h5>How is your product different from other spoken English courses? what are the system requirements? </h5>
					</div>
				</div>
			    </div>
		</div>
	</section>
	<!--/ material-->
	<!--cta 2-->
	<section id="cta-2" class="section-padding">
		<div class="container">
			<div class=" row">
				<div class="col-md-2"></div>
	            <div class="text-right-md col-md-4 col-sm-4">
	              <h2 class="section-title white lg-line">« Spoken English for Engineers <br> and Scientists Software »</h2>
	            </div>
	            <div class="col-md-4 col-sm-5">
	              The course focuses on Technical Spoken English of the International standard, covers general knowledge related to all major branches of Engineering and Science, and helps prepare for job interviews, group discussions, and technical presentations.
	              <p class="text-right text-primary"><a href="http://www.amazon.in/Spoken-English-Engineers-Scientists-Software/dp/9352359151/ref=sr_1_2?ie=UTF8&qid=1501395090&sr=8-2&keywords=ieosd"><i>— Buy on Amazon</i></a></p>
	            </div>
	            <div class="col-md-2"></div>
	        </div>
		</div>
	</section>
	<!--cta-->
	<!--contact-->
	<section id="contact" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Contact us</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-4 col-sm-4">
			      <h3>Communiqu&#xe9;</h3>
			      <div class="space"></div>
			      <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>IIT Kharagpur</p>
			      <div class="space"></div>
			      <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>tamanna.agrawal39@gmail.com</p>
			      <div class="space"></div>
			      <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+91-8447584730</p>
			    </div>
				<div class="col-md-8 col-sm-8 marb20">
					<div class="contact-info">
							<h3 class="cnt-ttl">For any query, please write to us - </h3>
							<div class="space"></div>
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>
							<form method="post" role="form" class="contactForm">
							    <div class="form-group">
                                    <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    
                                </div>
                                
								<div class="form-action">
									<button type="submit" class="btn btn-form" name="btn-contact">Send Message</button>
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ contact-->
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
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    
  </body>
</html>