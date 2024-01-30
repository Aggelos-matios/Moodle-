<?php
  include_once 'database.php';

  if(isset($_GET)){

    $id = $_GET['id'];

    $sql = 'DELETE FROM homehorks WHERE id='.$id;
    
    if(mysqli_query($conn, $sql)){
      header("location: ../homework.php");
      exit();
    }

  }