<?php
  include_once('includes/database.php');
  session_start();

  if(isset($_POST['add_doc'])){
    
    $title_input = $_POST["title"]; 
    $description_input = $_POST["description"]; 
    $file_input = $_POST["file"]["name"]; 

    $sql = 'INSERT INTO document_files (title, description, file) VALUES ("'.$title_input.'", "'.$description_input.'", "'.$file_input.'")';
    if(mysqli_query($conn, $sql)){
      header("location: ./documents.php");
      exit();
    }else{
      header("location: ../documents.php?error=noupload");
      exit();
    }
    
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/documents.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/communication.css">
  <title>Πληροφορική | Έγραφα μαθήματος</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Έγραφα μαθήματος</h1>
  </div>
  <!-- einai olo to periexomeno meta ton titlo -->
  <div class="container">
    <!-- Einai to menu tis selidas -->
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer ">Αρχική Σελίδα</a>
      <a href="announcement.php" class="computer">Ανακοινώσεις</a>
      <a href="communication.php" class="computer">Επικοινωνία</a>
      <a href="documents.php" class="computer active">Έγραφα μαθήματος</a>
      <a href="homework.php" class="computer">Εργασίες</a>
      <?php
        if(isset($_SESSION["logedin"])){
          echo "<a href='includes/logout.inc.php' class='computer'>Έξοδος</a>";
        }else{
          header("location: ./identify_page.php");
        }
      ?>
      <!-- Icon menu -->
      <a href="index.php" class="phone bi bi-house"></a>
      <a href="announcement.php" class="phone bi bi-megaphone-fill"></a>
      <a href="communication.php" class="phone bi bi-envelope"></a>
      <a href="documents.php" class="phone pressed bi bi-book"></a>
      <a href="homework.php" class="phone bi bi-pen"></a>
      <?php
        if(isset($_SESSION["logedin"])){
          echo "<a href='includes/logout.inc.php' class='phone bi bi-box-arrow-left'></a>";
        }else{
          header("location: ./identify_page.php");
        }
      ?>
    </div>


    <!-- Olo to pedio me ta periexomena -->
    <div class="content">
      <!-- Mia anakoinwsi -->
      <div id="top" class="edit-form">
        <form action="new.doc.php" method="POST">
          <label for="title">Τίτλος: </label>
          <input type="text" name="title" required>
          <label for="description">Περιεχόμενο: </label>
          <textarea type="text" name="description" rows="10" required></textarea>
          <input type="file" style="border:none;margin-top:20px;" name="file">
          <button type="submit" name="add_doc">Προσθήκη</button>
        </form>
      </div>
    </div>
  </body>
</html>