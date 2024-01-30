<?php

if(isset($_POST['submit'])){
  require_once 'database.php';
  require_once 'functions.php';

  $mailinput = $_POST["email"]; //email einai to onama apo ti forma
  $passinput = $_POST["password"]; //password einai to onoma apo ti forma
  
  if(emptyInput($mailinput, $passinput) !== false){
    header("location: ../identify_page.php?error=emptyinput");
    exit();
  }

  $query = "SELECT * FROM user WHERE  email = '$mailinput' limit 1";
  $result = mysqli_query($conn, $query);

  if($result){
    if(mysqli_num_rows($result) > 0){
      $user_data = mysqli_fetch_assoc($result);
      if($user_data["userPassword"] == $passinput){
        header("location: ../index.php");
        session_start();
        $_SESSION['logedin']= true;
        $_SESSION['userName']= $user_data["lastname"];
        $_SESSION['userEmail']= $user_data["email"];
        $_SESSION['userRole']= $user_data["role"];
        exit();
      }
      header("location: ../identify_page.php?error=wrongpass");
      exit();
    }
    header("location: ../identify_page.php?error=usernotfound");
    exit();
  }
}

header("location: ../identify_page.php");
exit();