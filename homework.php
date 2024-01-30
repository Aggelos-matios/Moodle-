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
  <link rel="stylesheet" href="css/homework.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Πληροφορική | Εργασίες</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Εργασίες</h1>
  </div>

  <div class="container">
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer">Αρχική Σελίδα</a>
      <a href="announcement.php" class="computer">Ανακοινώσεις</a>
      <a href="communication.php" class="computer">Επικοινωνία</a>
      <a href="documents.php" class="computer">Έγραφα μαθήματος</a>
      <a href="homework.php" class="computer active">Εργασίες</a>
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
      <a href="documents.php" class="phone bi bi-book"></a>
      <a href="homework.php" class="phone pressed bi bi-pen-fill"></a>
      <?php
        if(isset($_SESSION["logedin"])){
          echo "<a href='includes/logout.inc.php' class='phone bi bi-box-arrow-left'></a>";
        }else{
          header("location: ./identify_page.php");
        }
      ?>
    </div>
    <div class="content">
      <div id="top" class="homework">
        <?php
          if($_SESSION['userRole'] == "Tutor"){
            echo "<a href='new.hom.php'><h3 style='text-align:start;'>Πρσθήκη νέας εργασίας</h3></a>";
          }
        ?>
        <!-- OPEN THE DATABASE TO EXTRACT THE DATA OF THE TABLE -->
        <?php
          $sql = "SELECT * FROM homehorks";
          $result = mysqli_query($conn, $sql);
      
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="title"><h2>Eργασία ' . $row["id"].'</h2><h4>'; 
              if($_SESSION['userRole'] == "Tutor"){
                echo "<a href='includes/delete.hom.php?id=$row[id]'>[Διαγραφή]</a>";
                echo "<a href='edit.hom.php?id=$row[id]'>[Επεξεργασία]</a>";
              }
              echo '</h4> </div><div class="text"><div class="subtitle">
                <p>Στόχοι: </p><ol> ' . $row["target"] . '</ol></div>';
              echo '<div class="subtitle">
              <p>Εκφώνηση: </p> 
              <p class="subtitle-1">Κατεβάστε την εκφώνηση της εργασίας από 
              <a href="/homeworks/test.doc" download target="_blank">ΕΔΩ.</a></p>
              </div>';
              echo '<div class="subtitle">
              <p>Παραδοτέα: </p> 
              <ol>
                '. $row["Deliverable"] .'
              </ol>
            </div>';
              echo '<div class="subtitle deadline">
              <span>Ημερομηνία παράδοσης:</span> <span>'. $row["date"] .'</span>
            </div><hr>
        </div>';
            }
          }else{
            echo '<h3>Δεν υπαρχουν ανακοινωσεις</h3>';
          }
        ?>

    </div>
    <!-- Top button -->
    <div class="top-btn">
      <a href="#top">↑</a>
    </div>
  </div>
</body>
</html>