<?php
  session_start();

  include "connection.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SparkInDark/Profile</title>
    <link rel = "stylesheet" href = "profilestyle.css">
  </head>
  <body>
    <header class = "UpperPartOfProfile">
      <h1 class = "Title">Welcome <?php echo $_SESSION['firstname']?> <?php echo $_SESSION['lastname']?></h1>
    </header>
    <main>

    </main>
    <footer>
      <form method = "POST" action = "#">
      <button name = "LogOut" class = "LogOut">Log Out. </button>
      <?php
        if(isset($_POST['LogOut'])) {
          include "logout.php"; 
        }
      ?>
    </form>
    </footer>
  </body>
</html>
