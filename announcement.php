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
  <link rel="stylesheet" href="css/announcement.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
      <div id="top" class="announcement">
        <?php
          if($_SESSION['userRole'] == "Tutor"){
            echo "<a href='new.announ.php'><h3>Πρσθήκη νέας ανακοίνωσης</h3></a>";
          }
        ?>
        <!-- OPEN THE DATABASE TO EXTRACT THE DATA OF THE TABLE -->
        <?php
          $sql = "SELECT * FROM announcement_board";
          $result = mysqli_query($conn, $sql);
      
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo '<div class="title">
                    <h2> Ανακοίνωση ' . $row["id"] . '</h2>
                    <h4>'; 
              if($_SESSION['userRole'] == "Tutor"){
                echo "<a href='includes/delete.announ.php?id=$row[id]'>[Διαγραφή]</a>";
                echo "<a href='edit.announ.php?id=$row[id]'>[Επεξεργασία]</a>";
              }
              echo '</h4>
              </div>
              <div class="text">
                <div class="date">
                  <b>Ημερομηνία: </b><p>' . $row["date"] . '</p>
                </div>
                <div class="subject">
                  <b>Θέμα: </b> <p>' . $row["subject"] . '</p>
                </div>
                <p>' . $row["main_content"] . '</p>
              </div><hr>';
            }
          }else{
            echo '<h3>Δεν υπαρχουν ανακοινώσεις</h3>';
          }
        ?>

      <!-- Top button -->
     <div class="top-btn">
       <a href="#top">↑</a>
     </div>
    </div>
  </div>
</body>
</html>