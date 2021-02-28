<?php
  session_start();

  include "connection.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel = "stylesheet" href = "othersprofilestyle.css">
    <title>SparkInDark/<?php echo $_SESSION['otherusername'] ?> <?php echo $_SESSION['otheruserlastname'] ?></title>
  </head>
  <body>
    <header class = "Header">
      <h1 class = "Title"><?php echo $_SESSION['otherusername'] ?> <?php echo $_SESSION['otheruserlastname'] ?></h1>
    </header>
    <main>
      <div class = "Contact">
        <form method = "POST" action = "#">
          <button name = "TextChat">Text Chat!</button>
          <button>Voice Chat!</button>
          <button>Video Chat!</button>
          <?php
            if(isset($_POST["TextChat"])){
              header('Location: textchat.php');
            }
          ?>
        </from>
      </div>
    </main>
    <footer>
      <form method = "POST" action = "#">
        <button name = "GoBack" class = "GoBack">Go Back!</button>
        <?php
          if(isset($_POST['GoBack'])){
            header('Location: search.php'); 
          }
        ?>
      </from>
    </footer>
  </body>
</html>
