<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Πληροφορική | Αρχική</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Πληροφορική</h1>
  </div>
  <div class="container">
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer active">Αρχική Σελίδα</a>
      <a href="announcement.php" class="computer">Ανακοινώσεις</a>
      <a href="communication.php" class="computer">Επικοινωνία</a>
      <a href="documents.php" class="computer">Έγραφα μαθήματος</a>
      <a href="homework.php" class="computer">Εργασίες</a>
      <?php
        if(isset($_SESSION["logedin"])){
          echo "<a href='includes/logout.inc.php' class='computer'>Έξοδος</a>";
        }else{
          echo "<a href='identify_page.php' class='computer'>Σύνδεση</a>";
        }
      ?>
      <!-- Icon menu -->
      <a href="index.php" class="phone pressed bi bi-house-fill"></a>
      <a href="announcement.php" class="phone bi bi-megaphone"></a>
      <a href="communication.php" class="phone bi bi-envelope"></a>
      <a href="documents.php" class="phone bi bi-book"></a>
      <a href="homework.php" class="phone bi bi-pen"></a>
      <?php
        if(isset($_SESSION["logedin"])){
          echo "<a href='includes/logout.inc.php' class='phone bi bi-box-arrow-left'></a>";
        }else{
          echo "<a href='identify_page.php' class='phone log-icon bi bi-person-square'></a>";
        }
      ?>
    </div>
    <div class="content">
      <p>Καλως ηρθατε στη διαδικτυακή ιστοσελίδα του μαθηματος της πληροφορικής. Εδώ θα βρείτε τις σημειώσεις του μαθήματος μαζι με τις εργασίες σας. Μπορετε να βρειτε οργανωμενες τις σημειωσεις του μαθηματος στον αντιστοιχο πινακα ανακοινωσεων. Για να εχετε προσβαση στα περιεχομενα της ιστοσελίδας πρεπει πρωτα να συνδεθειτε με τον λογαριασμο σας. </p><br>
      <div class="photo">
        <img src="photos/back-to-school.jpg" alt="school-photo">
      </div>
    </div>
  </div>
</body>
</html>