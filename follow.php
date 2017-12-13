<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/10/17
 * Time: 3:49 PM
 */
session_start();
   if( $_POST && isset($_POST['follow']))
   {

       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $user= $_POST['follow'];
       $uid= $_SESSION['uid'];
       $time= date("Y-m-d H:i:s");


//       var_dump( $_SESSION['isF']);
       if (!$_SESSION['isF']) {
           mysqli_query($mysql,"INSERT INTO `Follow` (`uid1`,`uid2`,`ftime`) VALUES ('$user','$uid','$time');");
       } else {
           mysqli_query($mysql,"DELETE FROM `Follow` WHERE `uid1`='$user' AND `uid2`='$uid';");
       }

       header("Location: UserProfile.php?user=$user");
   }
?>