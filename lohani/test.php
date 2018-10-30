<?php
require_once('session.php');
require_once('class.user.php');
$user = new USER();
$login = new USER();
if($user->is_loggedin()!="")
{
  $roll_number = $_SESSION['user_session'];
}
if(isset($_POST['btn-send']))
{
  $topic = strip_tags($_POST['topics']);
  $text = strip_tags($_POST['text']);
  $score = strip_tags($_POST['score']);

  if($topic == "None")
  {
    $error[] = "Topic not selected";
    echo '<script language="javascript">';
    echo 'alert("Select a topic and read it to your microphone");window.location.href=\'test.php\';';
    echo '</script>';
  }
  else
  {
    $flag = 0;
    $stmt = $user->runQuery("SELECT * FROM students_data WHERE roll_number=:proll_number");
    $stmt->execute(array(':proll_number'=>$roll_number));
    //$row=$stmt->fetch(PDO::FETCH_ASSOC);
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
      if($row['topic'] == $topic) {
          $flag = 1;
          break;
        }
        else{
          continue;
        }
      }
    }
    if($flag==1){
          $error[] = "This topic has already been evaluated.";
          echo '<script language="javascript">';
          echo 'alert("This topic has already been evaluated.");';
          echo '</script>';
        }
    else{
          if($user->storeEvaluation($roll_number , $topic , $text, $score)){  
            echo '<script language="javascript">';
            echo 'alert("Evaluation Saved");window.location.href=\'test.php\';';
            echo '</script>';
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
                            
      echo'   
      <a style="position: relative; center; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="dashboard.php" ><button class="btn" name="btn-dashboard">Dashboard</button></a>  
          	<a  style="position: relative; center; color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;" href="logout.php?logout=true" ><button class="btn">Sign-Out</button></a>           
          <div class="row div_text">
                      <div class="col-sm-7 div_text">
                        <form method="POST" id="form-eval" name="form-eval">
                            <p><strong> Choose a text to read - <strong></p>
                            <!-- ======================================== -->
                            <select id="chapters" name="topics">
                              <option value="None">None</option>';
                              $stmt = $user->runQuery("SELECT * FROM topics");
                              $stmt->execute(array());
                              while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<option value="'.$row['topic_no'].'"> Topic '.$row['topic_no']. '</option>';
                              }
                              echo '
                            </select>           
                            <textarea class="form-control" style="height: 250px; color:#000; font-weight:500" id="t1" placeholder="Welcome to IEOSD Skill Test (Spoken English)-Use this test only with Google Chrome browser - Product by IEOSD- Please select your text, and press the button "Click to Speak". Once done, Click to Stop. Then Click on Evaluate button to see your score is below. If your score is less than 60%, you should consider using our software Spoken English-2020 and Spoken English for Engineers and Scientists to become fluent in professional English." style="font-weight: bold; color: black;" disabled></textarea>
                            <br> 
                            <script type="text/javascript">
                              var mytextbox = document.getElementById("t1");
                              var mydropdown = document.getElementById("chapters");
                              mydropdown.onchange = function(){
                              if(this.value!="None"){
                                document.getElementById("vrec").disabled=false;
                              }';
                              $stmt = $user->runQuery("SELECT * FROM topics");
                              $stmt->execute(array());
                              while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo 'if (this.value=="'.$row['topic_no'].'") {mytextbox.value = "'.$row['topic_text'].'"}';
                              }
                              echo '
                            }
                            </script>
                            <button id="vrec" onclick="toggleStartStop()" type="button" class="btn btn-primary btn-lg" disabled>Click to Speak</button>
                            <input type="text" id="qwerty" name="text" value="" style="display: none">
                            <input type="text" id="score" name="score" value="" style="display: none">
                            <button id="sp" type="button" class="btn btn-primary btn-lg" disabled>Evaluate</button>
                            <button id="rst" type="button" class="btn btn-primary btn-lg">Clear Spoken Text</button><br><br>
                            <p><samp id="p2" name="generated_text"></samp></p>
                            </div>

                        <script>
                          function markAsWrong(sword, htmlText1, htmlText2) {
                            spat1=new RegExp(sword,"i")
                            rpat1="<u>"+sword+"</u>"
                            newWSize=rpat1.length
                            htmlP2=htmlText2.replace(spat1,rpat1);
                            $("#p2").html(htmlText1+htmlP2);
                            voiceHtml=htmlP1+htmlP2
                          }
                          
                          $(function(){
                                  /*
                            $("#t1").keypress(function(){
                              //$("#p2").html($("#t1").val());
                            }) */
                                  
                                  $("#rst").click(function(){
                                  $("#p2").text("");
                                  $("#vcount").text(0);
                                  $("#ncorrect").text(0);
                                  $("#nwrong").text(0);
                                  $("#tcount").text("-");
                                  $("#vpercent").text("-");
                                      });
                            
                            $("#sp").click(function(){
                              document.getElementById("sb").disabled=false;
                              thresoldWordCount=3;
                              correct=0; wrong=0;
                              currTPos=0;
                              currVPos=0;
                              voiceText=$("#p2").text();
                              $("#qwerty").val(voiceText);
                              $("#p2").html(voiceText);
                              
                              voiceHtml=$("#p2").html();
                              //pText=$("#p1").text();
                                      pText=$("#t1").val().toLowerCase()
                              voiceWords=voiceText.split(/[\s,.;]+/)
                              vl=voiceWords.length
                              textWords=pText.split(/[\s,.;:\-]+/)
                              tl=textWords.length
                              if(textWords[tl-1].trim()=="") tl=tl-1;
                              if(voiceWords[vl-1].trim()=="") vl=vl-1;
                              
                              for(i=0;i<vl;i++) {
                                currentWord=voiceWords[i].trim()
                                if(currentWord != "") {
                                  wordVLocation=voiceHtml.indexOf(currentWord,currVPos);
                                  htmlP1=voiceHtml.substring(0,wordVLocation);
                                  htmlP2=voiceHtml.substring(wordVLocation);
                                  wordTLocation=pText.indexOf(currentWord.toLowerCase(),currTPos);
                                  newWSize=currentWord.length
                                  if(wordTLocation != -1) {
                                    gapLength=wordTLocation-currTPos;
                                    gapText=pText.substring(currTPos,wordTLocation).trim();
                                    gapWords=gapText.split(/[\s,.;:\-]+/);
                                    if(gapWords.length <= thresoldWordCount) {
                                      currTPos=wordTLocation+newWSize
                                      if(pText.charAt(currTPos).search(/[^\s,.;\-]/)==0 || (wordTLocation>0 && pText.charAt(wordTLocation-1).search(/[^\s,.;\-]/)==0 )) {
                                        wrong++;
                                        markAsWrong(currentWord, htmlP1, htmlP2)
                                        console.log("pre/post:"+currentWord+":"+wordTLocation+":"+currTPos);
                                        thresoldWordCount++
                                      } else {
                                        currTPos++
                                        correct++;
                                        misscount=0;
                                        thresoldWordCount=3
                                      }
                                    } else {
                                      wrong++;
                                      markAsWrong(currentWord, htmlP1, htmlP2)
                                      console.log("Theshold:"+currentWord+":"+wordTLocation+":"+currTPos+":"+gapText);
                                      misscount++
                                      thresoldWordCount++
                                    }
                                  } else {
                                    wrong++
                                    markAsWrong(currentWord, htmlP1, htmlP2)
                                    console.log("word Not found:"+currentWord+":"+wordTLocation+":"+currTPos);
                                    thresoldWordCount++
                                  }
                                  currVPos=wordVLocation+newWSize+1
                                }
                              }
                              $("#vcount").text(vl);
                              $("#ncorrect").text(correct);
                              $("#nwrong").text(wrong);
                              $("#tcount").text(tl);
                              $("#vpercent").text(parseFloat((correct/tl)*100).toFixed(2));
                              $("#score").val(parseFloat((correct/tl)*100).toFixed(2));
                            });
                          });
                          currTPos=0;
                          currVPos=0;

                        </script>


                          <div class="col-sm-5">
                              <table class="table"> <p> Product by IEOSD </p>
                                  <thead>
                                  <tr>
                                    <th colspan="2"><p>Analysis</p></th>
                                  </tr>

                                  </thead>
                                <tbody>
                                    <tr>
                                        <th><p>Total Words Uttered:</p></th><td><p><span id="vcount">0</span></p></td>
                                    </tr><tr>
                                        <th><p>Total Words Correct:</p></th><td><p><span id="ncorrect">0</span></p></td>
                                    </tr><tr>
                                        <th><p>Total Words Wrong:</p></th><td><p><span id="nwrong">0</span></p></td>
                                    </tr><tr>
                                        <th><p>Total Text Words:</p></th><td><p><span id="tcount">0</span></p></td>
                                    </tr><tr>
                                        <th><p>Percent of Correctness:</p></th><td><p><span id="vpercent">-</span></p></td>
                                    </tr>
                                </tbody>
                              </table>
                              <a style="color:#A1A1A1; font-size: 14px; letter-spacing: 2px; font-weight: 700; text-transform: uppercase; text-decoration:none; height:52px; margin-top: -5px;"> <button id="sb" type="submit" class="btn" name="btn-send" disabled>Submit Score</button> </a>
                          </form>
                          
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
  <script type="text/javascript">
    var recognizing;
    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    reset();
    recognition.onend = reset;

    recognition.onresult = function (event) {
      var temp;
      console.log(event.results.length)
      console.log(event)
      for (var i = event.resultIndex; i < event.results.length; ++i) {
        if (event.results[i].isFinal) {
      temp=$("#p2").text();
      $("#p2").text(temp+" "+event.results[i][0].transcript);
      document.getElementById("sp").disabled=false;
            console.log(event.results[i][0].transcript)
          //textarea.value += event.results[i][0].transcript;
        }
      }
    }

    function reset() {
      recognizing = false;
    $("#vrec").html("Click to Speak");      
    }

    function toggleStartStop() {
    
      if (recognizing) {
        recognition.stop();
        reset();
      } else {
        recognition.start();
        recognizing = true;
        $("#vrec").html("Click to Stop");
      }
    }
  </script>
</html>