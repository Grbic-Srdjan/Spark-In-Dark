<?php
  session_start();

  include "connection.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SparkInDark/Search</title>
    <link rel = "stylesheet" href = "searchstyle.css">
  </head>
  <body>
    <header class = "UpperPart">
      <h1 class = "TitleOfThePage">You searched for: "<?php echo $_SESSION['searchtext'] ?>"</h1>
    </header>
    <main class = "SearchResults">
      <h1 style = "color: #FFFFFF; position: absolute; left: 4%;">Results: </h1>
      <?php
        $SearchQuery = "SELECT * FROM `helps`";
        $SearchQueryResult = mysqli_query($Link, $SearchQuery) or die ("Failed to search, sorry sorry, please try again later on. ");

        $SearchResults = $SearchQueryResult->num_rows;

        if($SearchResults > 0){
          while(($Result = mysqli_fetch_row($SearchQueryResult)) != NULL){
            // Podeliti naslov na reci

            // Naci korisnika koji je napravio Help Request
            $FindUserNameQuery = "SELECT `name` FROM `users` WHERE `userid` = $Result[2]";
            $FindUserNameQueryResult = mysqli_query($Link, $FindUserNameQuery) or die ("An error happened while trying to find name behind user who created this Help Request. You can not imagine how we are sorry for that. It will be really appriciatable, if you try again later on. ");
            $FindUserLastNameQuery = "SELECT `lastname` FROM `users` WHERE `userid` = $Result[2]";
            $FindUserLastNameQueryResult = mysqli_query($Link, $FindUserLastNameQuery) or die ("Ou oU OU OU OU, error happened while trying to pick a last name from user that created this help request. Aaaaaaaaaa. Can you forgive us and try again later on, please? ;) :) . ");

            // ispisati rezultat
            echo "<h3 class = 'Result'>$Result[1] - Created by $FindUserNameQueryResult $FindUserNameQueryResult<button class = 'Help'>I will help you with this. </button></h3>";
          }
        }
        else{
          echo "<h2 style = 'color: white'>There are no results. Sorry :) . Try something else. <br> It is possible that since this is a new application, that there are not that much help requests, but then your requests wil be more visible ;) :) . </h2>";
        }
      ?>
    </main>
    <footer>
      <form method = "POST" action = "#">
      <button name = "GoToDashboard" class = "GoToDashboard">Go Back To Dashboard. </button>
      <?php
        if(isset($_POST['GoToDashboard'])){
          header('Location: dashboard.php');
        }
      ?>
    </form>
    </footer>
  </body>
</html>
