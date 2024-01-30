<?php
 
  session_start();
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/communication.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Πληροφορική | Επικοινωνία</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Επικοινωνία</h1>
  </div>

  <div class="container">
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer ">Αρχική Σελίδα</a>
      <a href="announcement.php" class="computer">Ανακοινώσεις</a>
      <a href="communication.php" class="computer active">Επικοινωνία</a>
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
      <a href="announcement.php" class="phone bi bi-megaphone"></a>
      <a href="communication.php" class="phone pressed bi bi-envelope-fill"></a>
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

    <div class="content">
      <div class="title">
        <h2>Αποστολή e-mail μέσω web φόρμας</h2>
      </div>
      <div class="text">
        <form action="email" method="post">
          <label for="email">Αποστολέας:</label>
          <input type="email" id="email" required>
          <label for="subject">Θέμα:</label>
          <input type="text" id="subject" required>
          <label for="text">Κείμενο:</label>
          <textarea type="text" id="text" rows="10" placeholder="Γράψε εδώ το κειμενο σου..."></textarea>
          <button>Αποστολή</button>
        </form>
      </div>
      <hr>
      <div class="title">
        <h2>Αποστολή e-mail ε χρήση e-mail διεύθυνσης</h2>
      </div>
      <div class="text">
        <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου <a class="outlook-open" href="mailto:tutor@csd.auth.test.gr">tutor@csd.auth.test.gr</a>.</p>
      </div>
      
      
    </div>
  </div>
</body>
</html>