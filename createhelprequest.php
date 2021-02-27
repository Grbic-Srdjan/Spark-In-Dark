<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel = "stylesheet" href = "createhelprequeststyle.css">
  </head>
  <body>
    <header class = "UpHead">
      <h1>Create new Help Request!</h1>
    </header>
    <main class = "From">
      <form method = "POST" action = "#">
        <h2>In general, what do you need help with? Title your help request, here: </h2> <br>
        <input name = "Title" type = "text" placeholder = "Write a title of your Help Request! ">
        <h3>Can you give us some more information about your help reguest? Like give people mroe details, here: </h3>
        <textarea name="Description" rows="12" cols="128" placeholder = "Write everything about your Help Request!"></textarea>
        <h4>At last, but not least, how much points will users recive, if they help you out? Write it here: </h4>
        <input name = "Points" type = "number" placeholder = "Enter here whatever your heart want ;) :) . ">
        <button class = "GoBack" name = "GoBackToDashboard"> Go Back </button>
        <button class = "Make" name = "MakeNewHelpRequest">Make It! </button>
        <?php
          if(isset($_POST['MakeNewHelpRequest'])){

            include "connection.php";

            $Title = $_POST['Title'];
            $Description = $_POST['Description'];
            $GetPoint = $_POST['Points'];
            $Creator = $_SESSION['userid'];

            $AddQuery = "INSERT INTO `helps` VALUES (NULL, '$Title', '$Creator', 0, '$Description', '$GetPoint', 0)";
            $AddQueryResult = mysqli_query($Link, $AddQuery) or die ("We are so so so sorry, because we are unable to create you a help request. Please try again later on ;) :) .");

            $CreatedRows = mysqli_affected_rows($Link);

            if($CreatedRows > 0) {
              echo "<h1 style = 'color: white'>Creating Help Request went Awesome. It is created! </h1>";
              header('Location: dashboard.php');
            }
            else{
              echo "<h1 style = 'color: white'>Help Request is not created. Something went wrong. Please be a lamb and try later on :D ;) . </h1>";
            }
          }
          else if(isset($_POST['GoBackToDashboard'])) {
            header('Location: dashboard.php');
          }
        ?>
      </from>
    </main>
    <footer>

    </footer>
  </body>
</html>
