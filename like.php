<?php
session_start();
   if( $_POST && isset($_POST['like']))
    {
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $aname= $_POST['like'];
       $result=mysqli_query($mysql,"select aid from artist where aname='$aname';");
       $row = mysqli_fetch_array($result);
       $aid = $row['aid'];
      $uid= $_SESSION['uid'];
      $time= date("Y-m-d H:i:s");
       
       if (!$_SESSION['isL']) {
              mysqli_query($mysql,"INSERT INTO `Like` (`aid`,`uid`,`ltime`) VALUES ('$aid','$uid','$time');"); 
       }
       else{
            mysqli_query($mysql,"DELETE FROM `like` WHERE `uid`='$uid' AND `aid`='$aid';");
       }
          header("Location:ArtistProfile.php?aname=$aname");
       
   }
