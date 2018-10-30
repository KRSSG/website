<?php

require_once('dbconfig.php');

class USER
{ 

  private $conn;
  
  public function __construct()
  {
    $database = new Database();
    $db = $database->dbConnection();
    $this->conn = $db;
    }
  
  public function runQuery($sql)
  {
    $stmt = $this->conn->prepare($sql);
    return $stmt;
  }
  public function register($name, $rollnumber, $email , $contactnumber , $pass)
  {
            //     echo $name . $rollnumber . $email . $contactnumber . $pass; 
    try
    {
                      //  echo "start"; 
      $new_password = sha1($pass);
//echo "statement made";
      $stmt = $this->conn->prepare("INSERT INTO students (name, roll_number , mail , phone_number , pass) 
                                                   VALUES (:pname, :proll_number, :pmail, :pphone_number, :ppass)");
        //echo "statement made";          
      $stmt->bindparam(":pname", $name);
      $stmt->bindparam(":proll_number", $rollnumber);
      $stmt->bindparam(":pmail", $email);
      $stmt->bindparam(":pphone_number", $contactnumber);
      $stmt->bindparam(":ppass", $pass);
                       // echo "statement made";
      $stmt->execute();
                        // echo "done";
      return $stmt; 
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }       
  }
  public function storeEvaluation($roll_number , $topic , $text, $score)
  {
    try
    {
      $stmt = $this->conn->prepare("INSERT INTO students_data (roll_number , topic, text, score) 
                                                   VALUES(:proll_number, :ptopic, :ptext, :pscore)");
                          
      $stmt->bindparam(":proll_number", $roll_number);
      $stmt->bindparam(":ptopic", $topic);
      $stmt->bindparam(":ptext", $text);
      $stmt->bindparam(":pscore", $score);
      $stmt->execute();
      return $stmt; 
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }       
  }
  public function doLogin($iroll,$pass)
  {
    try
    {
      $stmt = $this->conn->prepare("SELECT * FROM students WHERE roll_number=:proll_number");
      $stmt->execute(array(':proll_number'=>$iroll));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() == 1)
      { 
        $new_pass = sha1($pass);
        if($pass== $userRow['pass'])
        {
          $_SESSION['user_session'] = $userRow['roll_number'];
          return true;
        }
        else
        {
          return false;
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  
 

  public function is_loggedin()
  {
    if(isset($_SESSION['user_session']))
    {
      return true;
    }
  }
  public function adminis_loggedin()
  {
    if(isset($_SESSION['user_session']))
    {
      return true;
    }
  }
  public function redirect($url)
  {
    header("Location: $url");
  }
  public function doLogout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }
}
?>