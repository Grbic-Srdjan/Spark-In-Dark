<?php
  session_start();

  include "connection.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
    </style>
    <link rel = "stylesheet" href = "dashstyle.css">
  </head>
  <body>
    <header class = "Head">
      <h1 class = "MainTitle">Dashboard</h1>
      <form method = "POST" action = "#">
      <button name = "GoToYourProfile" class = "Profile"><?php echo $_SESSION['firstname'] ?> <?php echo $_SESSION['lastname'] ?> </button>
      <?php
        if(isset($_POST['GoToYourProfile'])) {
          header("Location: profile.php");
        }
      ?>
    </form>
    <form method = "POST" action = "#">
    <input class = "Search" name = "SearchInput" type = "text" placeholder = "Search for your area of expertise... Here! :) ;)">
    <button class = "SearchButton" name = "Searchbutton">Search! </button>
    <?php
      if(isset($_POST['Searchbutton'])){
        header('Location: search.php'); 
      }
    ?>
    </from>
    </header>
    <main>
      <div class = "SideMenu">
        <h2 style = "text-align: center; color: #05F2DB; ">My Helps</h2>
        <div class = "MyHelps">
          <button>Help 1</button>
          <button>Help 2</button>
          <button>Help 3</button>
          <button>Help 4</button>
        </div>
        <div class = "MyTasks">
          <h2 style = "text-align: center; color: #05F2DB; ">My Tasks</h2>
          <?php
            $ThisUser = $_SESSION['userid'];
            $TasksQuery = "SELECT * FROM `helps` WHERE 'usercreatorid' = '$ThisUser'-1";
            $TasksQueryResult = mysqli_query($Link, $TasksQuery) or die ("Ahaaaaaaaaa! There is a error! **** **** We will be glad if you will try again later on. ");
            $FoundedTasks = $TasksQueryResult->num_rows;

            $ButtonName = "";

            if($FoundedTasks > 0){
              while(($FoundedTask = mysqli_fetch_row($TasksQueryResult)) != NULL){
                echo "<form method = 'POST' action = '#'>";
                $ButtonName = (string)$FoundedTask[1];
                echo "<button name = '$ButtonName'>$FoundedTask[1]</button>";
                if(isset($_POST[(string)$ButtonName])){
                    $_SESSION['currentlyopen'] = $FoundedTask[0];
                    header('Location: dashboard.php');
                }
                echo "</form>";
              }
            }
          ?>
        </div>
      </div>
      <a href = "createhelprequest.php" ><button id = "AddButton"><img class = "AddButton" src = "AddButton.png" alt = "PictureCanNotBeLoaded" width = "98px" height = "98px"></button></a>
      <div class = "MainSector">
        <?php
        $TaskToLoad = $_SESSION['currentlyopen'];
        echo "<h2 style = 'color: #05F2DB'>Test And $TaskToLoad</h2>";
        echo "<br><br>";
          if($TaskToLoad > -1){
            echo "<h2 style = 'color: #05F2DB'>Test</h2>";
          }
        ?>
      </div>
    </main>
    <footer>

    </footer>
  </body>
</html>
