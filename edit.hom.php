<?php
  include_once('includes/database.php');
  session_start();

  if(isset($_POST['save_hom'])){
    
    $target_input = $_POST["target"]; 
    $deliverable_input = $_POST["deliverable"]; 
    $date_input = $_POST["date"]; 
    $id = $_POST['id_holder'];

    $sql = 'UPDATE homehorks SET target="'.$target_input.'", date="'.$date_input.'", Deliverable="'.$deliverable_input.'" WHERE id='.$id;
    mysqli_query($conn, $sql);
    header("location: ./homework.php");
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
        <form action="edit.hom.php" method="POST">
          <?php

            if(isset($_GET)){

              $id = $_GET['id'];

              $sql = 'SELECT * FROM homehorks WHERE id='.$id;
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<input style="display:none;" type="text" name="id_holder" value="'.$id.'">'; //Gia na mporw na parw to ID
              echo '<label for="targ">stoxoi: </label>';
              echo '<textarea type="text" name="content" rows="6">' . $row["target"] .'</textarea>';
              echo '<label for="date">Ημερομηνία: </label>';
              echo '<input type="date" name="date" value="'. $row["date"] .'"placeholder="YYYY-MM-DD">';
              echo '<label for="content">Παραδοτεα: </label>';
              echo '<textarea type="text" name="content" rows="6">' . $row["Deliverable"] . '</textarea>';

            }
          ?>
          <button type="submit" name="save_hom">Αποθήκευση αλλαγών</button>
        </form>
      </div>
    </div>
  </body>
</html>