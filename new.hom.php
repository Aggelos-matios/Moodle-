<?php
  include_once('includes/database.php');
  session_start();

  if(isset($_POST['add_hom'])){
    
    $target_input = $_POST["target"]; 
    $deliverable_input = $_POST["deliverable"]; 
    $date_input = $_POST["date"]; 
    $current_date = $_POST["crr_date"]; //για να δειξει τι ωρα εγινε η αναρτηση
    $content = "Eχει ανακοινωθει μια εργασία";

    $sql = 'INSERT INTO homehorks (target, deliverable, date) VALUES ("'.$target_input.'", "'.$deliverable_input.'", "'.$date_input.'")';
    if(mysqli_query($conn, $sql)){
      $sql = 'INSERT INTO announcement_board (subject, date, main_content) VALUES ("Ανακοινωθηκε εργασια", "'.$current_date.'", "'.$content.'")';
      mysqli_query($conn, $sql);
      header("location: ./homework.php");
      exit();
    }else{
      header("location: ../homework.php?error=noupload");
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
  <title>Πληροφορική | Εργασίες</title>
  <link rel="icon" type="image/x-icon" href="photos/icon.ico">
</head>
<body>
  <div class="nav">
    <h1>Εργασίες</h1>
  </div>
  <!-- einai olo to periexomeno meta ton titlo -->
  <div class="container">
    <!-- Einai to menu tis selidas -->
    <div class="menu">
      <!-- Button menu -->
      <a href="index.php" class="computer ">Αρχική Σελίδα</a>
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


    <!-- Olo to pedio me ta periexomena -->
    <div class="content">
      <!-- Mia anakoinwsi -->
      <div class="edit-form">
        <form action="new.hom.php" method="POST">
          <!-- Η παρακατω εισοδος παιρνει την τωρινη ημερ/νια για να την στειλει στις ανακοινωσεις -->
          <input type="crr_date" name="crr_date" style="display: none;" value="<?php echo date('y-m-d')?>">
          <label for="target">Στόχοι: </label>
          <textarea type="text" name="target" rows="6" required></textarea>
          <label for="deliverable">Παραδοτέα</label>
          <textarea name="deliverable" rows="6"></textarea>
          <label for="date">Ημερομηνία προθεσμίας: </label>
          <input type="date" style="border:none;margin-top:20px;" name="date">
          <label for="file">Εκφώνηση: </label>
          <input type="file" name="file" style="border:none;">
          <button type="submit" name="add_hom">Προσθήκη εργασίας</button>
        </form>
      </div>
    </div>
  </body>
</html>