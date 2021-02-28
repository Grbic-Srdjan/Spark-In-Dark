<?php
  session_start();

  include "connection.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SparkInDark/Profile</title>
    <link rel = "stylesheet" href = "profilestyle.css">
    <style>
    .YouHelped{
      position: absolute;
      left: 4%;
      top: 12%;
      color: #05F2DB;
    }

    .HelpedYou{
      position: absolute;
      left: 4%;
      top: 76%;
      color: #05F2DB;
    }
    </style>
  </head>
  <body>
    <header class = "UpperPartOfProfile">
      <h1 class = "Title">Welcome <?php echo $_SESSION['firstname']?> <?php echo $_SESSION['lastname']?></h1>
    </header>
    <main>
      <h1 class = "YouHelped">People that you helped: </h1> <br>
      <h1 class = "HelpedYou">People that helped you: </h1>
    </main>
    <footer class = "SideMenu">
      <form method = "POST" action = "#">
        <h4 style = "color: #05F2DB">Change your email: </h4>
        <input name = "ChangeEmail" type = "text" placeholder = "Enter a new email here ;) :) . ">
        <h4 style = "color: #05F2DB">Change your password: </h4>
        <input name = "ChangePassword" type = "password" placeholder = "Enter a new password here ;) :) . ">
        <h5 style = "color: #05F2DB">Retype your new password: </h5>
        <input name = "ReChangePassword" type = "password" placeholder = "Reenter a new password here ;) :) . "> <br>
        <h5 style = "color: #05F2DB">Change your Name: </h5>
        <input name = "ChangeName" type = "text" placeholder = "Enter a new name here ;) :) . ">
        <h5 style = "color: #05F2DB">Change your Lastname: </h5>
        <input name = "ChangeLastName" type = "text" placeholder = "Enter a new lastname here ;) :) . "> <br>
        <button class = "ChangeButton" name = "Change">Change</button>
        <button class = "ChangeButton" name = "GoBack">Go to Dashboard</button>
        <?php
          if(isset($_POST['Change'])){
            // Pokupi nove informacije:
            $NewEmail = $_POST['ChangeEmail'];
            $NewPassword = $_POST['ChangePassword'];
            $NewName = $_POST['ChangeName'];
            $NewLastName = $_POST['ChangeLastName'];
            // Koji korisnik
            $WhichUser = $_SESSION['userid'];
            // Vidi sta se menja:
            if($NewEmail != ""){
              // Menjamo email
              $NewEmailQuery = "UPDATE `users` SET `email`= '$NewEmail' WHERE `userid` = $WhichUser";
              $NewEmailQueryResult = mysqli_query($Link, $NewEmailQuery) or die ("We are so so sorry, because error happened, plese try again :) . ");
            }
            if($NewPassword != ""){
              $RepeatedPassword = $_POST['ReChangePassword'];
              if($NewPassword == $RepeatedPassword){
                $NewPasswordQuery = "UPDATE `users` SET `password`= '$NewPassword' WHERE `userid` = $WhichUser";
                $NewPasswordQueryResult = mysqli_query($Link, $NewPassword) or die ("We are so so sorry, because error happened, plese try again :) . ");
              }
              else {
                echo "<h1 style = 'color: #FFFFFF'>Reentered password do not match with new password. </h1>";
              }
            }
            if($NewName != ""){
              $NewNameQuery = "UPDATE `users` SET `password`= $NewPassword WHERE `userid` = $WhichUser";
              $NewNameQueryResult = mysqli_query($Link, $NewNameQuery) or die ("We are so so sorry, because error happened, plese try again :) . ");
            }
            if($NewLastName != ""){
              $NewLastNameQuery = "UPDATE `users` SET `password`= $NewPassword WHERE `userid` = $WhichUser";
              $NewLastNameQuery = mysqli_query($Link, $NewLastName) or die ("We are so so sorry, because error happened, plese try again :) . ");
            }
          }
          else if(isset($_POST['GoBack'])){
            header('Location: dashboard.php');
          }
        ?>
      </form>
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
