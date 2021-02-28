<?php
  session_start();

  include "connection.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel = "stylesheet" href = "textchatstyle.css">
    <title>SparkInDark/<?php echo $_SESSION['otherusername'] ?> <?php echo $_SESSION['otheruserlastname'] ?>/TextChat</title>
    <style>
    .TextMessages{
      position: absolute;
      left: 5%;
      top: 9%;
      right: 5%;
      bottom: 9%;
    }
    </style>
  </head>
  <body>
    <header class = "ChatTitle">
      <h1 class = "MainTitle">You are Text-Chatting with <?php echo $_SESSION['otherusername'] ?> <?php echo $_SESSION['otheruserlastname'] ?></h1>
    </header>
    <main class = "TextMessages">
      <?php

        $MessagesFoundQuery = "SELECT * FROM `messengers`";
        $MessagesFoundQueryResult = mysqli_query($Link, $MessagesFoundQuery) or die ("Unable to try to detect some messengers. Programmers are really tired to make some funny messege right now and we could use this site to find help ;) . ");
        $FoundedMessages = $MessagesFoundQueryResult->num_rows;

        $CurrnetUser = $_SESSION['userid'];
        $CurrentUserName = $_SESSION['firstname'];
        $CurrentUserLastName = $_SESSION['lastname'];
        $RecievedUserName = $_SESSION['otherusername'];
        $RecievedUserLastName = $_SESSION['otheruserlastname'];

        if($FoundedMessages > 0){
          while(($FoundedMessage = mysqli_fetch_row($MessagesFoundQueryResult)) != NULL) {
            if($FoundedMessage[3] == $CurrnetUser){
              echo "<h5 class = 'RecievedMessadge' style = 'color: #c9c9c9;'>$RecievedUserName $RecievedUserLastName</h5>";
              echo "<h3 class = 'RecievedMessadge' style = 'color: #05F2DB'>$FoundedMessage[1]</h3>";
            }
            if($FoundedMessage[2] == $CurrnetUser){
              echo "<h5 class = 'SentMessadge' style = 'color: #c9c9c9;'>$CurrentUserName $CurrentUserLastName : </h5>";
              echo "<h3 class = 'SentMessadge' style = 'color: #05F2DB'>$FoundedMessage[1] </h3>";
            }
          }
        }
        else{
          echo "<h1 style = 'color: #c9c9c9'>There are currenty no messagers here, but you can type one and by that connect to this Spark ;) :) . </h1>";
        }
      ?>
    </main>
    <footer class = "TextChat">
      <form method = "POST" action = "#">
        <input name = "MessageInput" class = "MessageInputField" type = "text" placeholder = "Enter your thoughts here and connect with <?php echo $_SESSION['otherusername'] ?> <?php echo $_SESSION['otheruserlastname'] ?>">
        <button name = "MessageSend" class = "SendIt">Send!</button>
        <button name = "GoBack" class = "GoBackToProfile">Go Back.</button>
        <?php
        if(isset($_POST['MessageSend'])){

          $MessageText = $_POST['MessageInput'];
          $UserSent = $_SESSION['userid'];
          $UserReceived = $_SESSION['otheruserid'];

          $SendQuery = "INSERT INTO `messengers`(`messengeid`, `messengetext`, `usercreated`, `userreceived`) VALUES (NULL, '$MessageText', '$UserSent', '$UserReceived')";
          $SendQueryResult = mysqli_query($Link, $SendQuery) or die ("Unable to sent that. We are so so so so sorry that this happened. Please be awesome spark and try again now or later on ;) :) . ");
          $Successfull = mysqli_affected_rows($Link);
          if($Successfull > 0){
            header('Location: textchat.php');
          }
          else{
            echo "<h3 style = 'color: #c9c9c9'>Somethign went wrong and to your message was NOT sent. We are so so so so sorry that this happened. Please be awesome spark and try again now or later on ;) :) . </h3>";
          }
        }
          if(isset($_POST['GoBack'])){
            header('Location: otheraccount.php');
          }
        ?>
      </form>
    </footer>
  </body>
</html>
