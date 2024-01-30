<?php
  include_once('includes/database.php');
  session_start();

  if(isset($_POST['add'])){
    
    $subject_input = $_POST["sub"]; 
    $date_input = $_POST["date"]; 
    $content_input = $_POST["content"]; 

    $sql = 'INSERT INTO announcement_board (date, main_content, subject) VALUES ("'.$date_input.'", "'.$content_input.'", "'.$subject_input.'")';
    mysqli_query($conn, $sql);
    header("location: ./announcement.php");
    exit();
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/announcement.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/communication.css">
  <title>Πληροφορική | Ανακοινώσεις</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Ανακοινώσεις</h1>
  </div>
  <!-- einai olo to periexomeno meta ton titlo -->
  <div class="container">
    <!-- Einai to menu tis selidas -->
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer ">Αρχική Σελίδα</a>
      <a href="announcement.php" class="computer active">Ανακοινώσεις</a>
      <a href="communication.php" class="computer">Επικοινωνία</a>
      <a href="documents.php" class="computer">Έγραφα μαθήματος</a>
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
      <a href="announcement.php" class="phone pressed bi bi-megaphone-fill"></a>
      <a href="communication.php" class="phone bi bi-envelope"></a>
      <a href="documents.php" class="phone bi bi-book"></a>
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
        <form action="new.announ.php" method="POST">
          <label for="date">Ημερομηνία: </label>
          <input type="date" name="date">
          <label for="sub">Θέμα: </label>
          <input type="text" name="sub">
          <label for="content">Περιεχόμενο: </label>
          <textarea type="text" name="content" rows="10"></textarea>
          <button type="submit" name="add">Προσθήκη</button>
        </form>
      </div>
    </div>
  </body>
</html>