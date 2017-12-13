<?php
session_start();
   if( $_POST && isset($_POST['delete']))
    {
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $plid = $_POST['delete'];
       
             mysqli_query($mysql,"DELETE FROM `playlist_included` WHERE `pid`='$plid';");
            mysqli_query($mysql,"DELETE FROM `playlist` WHERE `pid`='$plid';");
       
          header("Location:mainPage.php");
       
   }

