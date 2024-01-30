<?php
  include_once('includes/database.php');
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/documents.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Πληροφορική | Έγραφα μαθήματος</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Έγραφα μαθήματος</h1>
  </div>

  <div class="container">
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer">Αρχική Σελίδα</a>
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
      <a href="announcement.php" class="phone bi bi-megaphone"></a>
      <a href="communication.php" class="phone bi bi-envelope"></a>
      <a href="documents.php" class="phone pressed bi bi-book-fill"></a>
      <a href="homework.php" class="phone bi bi-pen"></a>
      <?php
        if(isset($_SESSION["logedin"])){
          echo "<a href='includes/logout.inc.php' class='phone bi bi-box-arrow-left'></a>";
        }else{
          header("location: ./identify_page.php");
        }
      ?>
    </div>

    
    <div class="content">
      <div class="document">
      <?php
          if($_SESSION['userRole'] == "Tutor"){
            echo "<a href='new.doc.php'><h3 style='text-align:start;'>Πρσθήκη νέου εγγράφου</h3></a>";
          }
        ?>
        <!-- OPEN THE DATABASE TO EXTRACT THE DATA OF THE TABLE -->
        <?php
          $sql = "SELECT * FROM document_files";
          $result = mysqli_query($conn, $sql);
      
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="title">
                    <h2>' . $row["title"] . '</h2>
                    <h4>'; 
              if($_SESSION['userRole'] == "Tutor"){
                echo "<a href='includes/delete.doc.php?id=$row[id]'>[Διαγραφή]</a>";
                echo "<a href='edit.doc.php?id=$row[id]'>[Επεξεργασία]</a>";
              }
              echo '</h4>
                </div>
                <div class="text">
                <b>Περιγραφή: </b> 
                <p>' . $row["description"] . '</p><br>';
              echo '<a href="/documents/test.doc" target="_blank">Download</a>
                <hr> </div> ';
            }
          }else{
            echo '<h3>Δεν υπαρχουν εγγραφα</h3>';
          }
        ?>


      <div class="top-btn">
        <a href="#top">↑</a>
      </div>
    </div>
  </div>
</body>
</html>