<?php
  session_start();

  include "connection.php";

  $HelpTitle = "";
  $HelpDescription = "";
  $PointsGet = 0;

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
    </style>
    <link rel = "stylesheet" href = "dashstyle.css">
    <title>Spark In Dark - Dashboard</title>
    <style>
      .SeeNewest{
        float: left;
        position: absolute;
        left: 38%;
        top: 12%;
        width: 150px;
        height: 55px;
      }
    </style>
  </head>
  <body>
    <header class = "Head">
      <h1 class = "MainTitle">Dashboard</h1>
      <form method = "POST" action = "#">
      <button name = "GoToYourProfile" class = "Profile" style = "  color: #00181f; border-color: #00181f; "><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?> </button>
      <?php
        if(isset($_POST['GoToYourProfile'])) {
          header("Location: profile.php");
        }
      ?>
    </form>
    <form method = "POST" action = "#">
    <input class = "Search" name = "SearchInput" type = "text" placeholder = "Search for your area of expertise... Here! :) ;)">
    <button style = "color: #00181f; border-color: #00181f; " class = "SearchButton" name = "Searchbutton">Search! </button>
    <?php
      if(isset($_POST['Searchbutton'])){
        $SearchText = $_POST['SearchInput'];
        $_SESSION['searchtext'] = $SearchText;
        header('Location: search.php');
      }
    ?>
    </from>
    <form method = "POST" action = "#">
      <button name = "SeeNewest" class = "SeeNewest">See Newest Help Requests. </button>
      <?php
        if(isset($_POST['SeeNewest'])) {
          header('Location: newsthelprequests.php');
        }
      ?>
    </form>
    </header>
    <main>
      <div class = "SideMenu">
        <h2 style = "text-align: center; color: #05F2DB; ">My Helps</h2>
        <div class = "MyHelps">
        </div>
        <div class = "MyTasks">
          <h2 style = "text-align: center; color: #05F2DB; ">My Tasks</h2>
          <?php
            $ThisUser = $_SESSION['userid'];
            $TasksQuery = "SELECT * FROM `helps`";
            $TasksQueryResult = mysqli_query($Link, $TasksQuery) or die ("Ahaaaaaaaaa! There is a error! **** **** We will be glad if you will try again later on. ");
            $FoundedTasks = $TasksQueryResult->num_rows;

            if($FoundedTasks > 0){
              while(($FoundedTask = mysqli_fetch_row($TasksQueryResult)) != NULL){
                if($FoundedTask[2] == $_SESSION['userid']){
                  echo "<form method = 'POST' action = '#'>";
                  echo "<button name = 'Button'>$FoundedTask[1]</button>";
                  if(isset($_POST['Button'])){
                      $_SESSION['currentlyopen'] = $FoundedTask[0];
                      $HelpTitle = $FoundedTask[1];
                      $HelpDescription = $FoundedTask[4];
                      $PointsGet = $FoundedTask[5];
                  }
                  echo "</form>";
                }
              }
            }
          ?>
        </div>
      </div>
      <a href = "createhelprequest.php" ><img class = "AddButton" src = "AddButton.png" alt = "PictureCanNotBeLoaded" width = "98px" height = "98px"></a>
      <div class = "MainSector">
        <?php
        $TaskToLoad = $_SESSION['currentlyopen'];
          if($TaskToLoad > -1){
            echo "<h2 style = 'color: #05F2DB'>$HelpTitle</h2>";
            echo "<br>  <br>";
            echo "<h4 style = 'color: #3498db'>$HelpDescription</h4>";
            echo "<br> <br>";
            echo "<form method = 'POST' action = '#'>";
            echo "<button name = 'MarkAsDone'>Mark As Done!</button>";
            if(isset($_POST['MarkAsDone'])){
              // Uzeti korisnika koji ce da dobije poene:
              $WhichUserQuery = "SELECT `userpickerid` FROM `helps` WHERE `id` = $TaskToLoad";
              $WhichUserQueryResult = mysqli_query($Link, $WhichUserQuery) or die ("Error happened");
              // Uzeti koliko on trenutno ima poena:
              $HowMuchPointsQuery = "SELECT `points` FROM `users` WHERE `userid` = $WhichUserQueryResult";
              $HowMuchPointsQueryResult = mysqli_query($Link, $HowMuchPointsQuery) or die ("Well, one error happened. Sorry. Try again, later on. ");
              // Povecaju mu ponene:
              $CurrentyTotalPoints = $PointsGet + $HowMuchPointsQueryResult;
              $RecivePointsQuery = "UPDATE `users` SET `points` = $CurrentyTotalPoints WHERE `userid` = $WhichUserQueryResult";
              // Obrisati taj help request:
              $HelpCompletedQuery = " DELETE FROM `helps` WHERE `helps`.`id` = $TaskToLoad";
              $HelpCompletedQueryResult = mysqli_query($Link, $HelpCompletedQuery) or die ("Sadly error happened :( . Meeeeeeeeeeeee . Try again next time ok? We will be glad if you do ;) :) . ");
              // Ispisati poruku o uspesno zavrsenom help request-u:
              echo "<h2 style = 'color: #05F2DB'>Awesome! That help request is done! We are so happy, that our site make your life a little bit better and we will appriciate if you shere it with your friends! </h2>";
            }
            echo "</from>";
            echo "<form method = 'POST' action = '#'>";
            echo "<button name = 'Clear'>Clear</button>";
            if(isset($_POST['Clear'])){
              $TaskToLoad = -1;
              header('Location: dashboard.php');
            }
            echo "</from>";
          }
        ?>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>
