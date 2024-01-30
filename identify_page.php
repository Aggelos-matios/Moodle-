<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <title>Σύνδεση</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
  <!-- Για να μην δημιουργιθει ολοκληρο αρχειο για μια σειρα css -->
  <style>
    p{margin-top: 40px;}
  </style>
</head>
<body>
  <!-- Τιτλος ιστοσελίδας -->
  <div class="nav">
    <h1>Συνδεση στην υπηρεσία</h1>
  </div>
  <!-- φορμα συνδεσης χρηστη -->
  <div class="content">
    <form action="includes/login.inc.php" method="POST">
      <label for="login">login</label>
      <input type="email" name="email" placeholder="someone@example.com" >
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="***********" >
      <button type="submit" name="submit">Enter</button>
    </form>
    <a href="index.php" class="bi bi-house-fill"></a>

    <!-- Εδω εμφανιζονται τα errors που μπορει να υπαρχουν -->
    <?php
    if (isset($_GET["error"])){
      if($_GET["error"] == "emptyinput"){
        echo "<p>You have to write something first!</p>";
      }elseif($_GET["error"] == "usernotfound"){
        echo "<p>This user doesnt exists</p>";
      }elseif($_GET["error"] == "wrongpass"){
        echo "<p>Wrong password. Try again!</p>";
      }
    }
    ?>
  </div>
</body>
</html>