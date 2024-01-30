<?php
  include_once 'database.php';

  if(isset($_GET)){

    $id = $_GET['id'];

    $sql = 'DELETE FROM document_file WHERE id='.$id;
    
    if(mysqli_query($conn, $sql)){
      header("location: ../documets.php");
      exit();
    }

  }