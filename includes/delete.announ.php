<?php
  include_once 'database.php';

  if(isset($_GET)){

    $id = $_GET['id'];

    $sql = 'DELETE FROM announcement_board WHERE id='.$id;
    
    if(mysqli_query($conn, $sql)){
      header("location: ../announcement.php");
      exit();
    }

  }