<?php
session_start();
   if( $_POST && isset($_POST['play']))
    {
       
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $tid= $_POST['play'];
      $uid= $_SESSION['uid'];
      $time= date("Y-m-d H:i:s");
      $addition= $_SESSION['playfrom'];
       if($_SESSION['playtype']==1){
              mysqli_query($mysql,"INSERT INTO `Play_History` (`uid`,`tid`,`ptime`) VALUES ('$uid','$tid','$time');"); 
               header("Location:searchResult.php");
       }
       else if($_SESSION['playtype']==2){
           mysqli_query($mysql,"INSERT INTO `Play_History` (`uid`,`tid`,`pid`,`ptime`) VALUES ('$uid','$tid','$addition','$time');");
           $_SESSION['plid']=$_SESSION['playfrom'];
            header("Location:playlist.php");
       }
       else if ($_SESSION['playtype']==3){
          mysqli_query($mysql,"INSERT INTO `Play_History` (`uid`,`tid`,`alid`,`ptime`) VALUES ('$uid','$tid','$addition','$time');");
          $_SESSION['alid']=$_SESSION['playfrom'];
           header("Location:album.php");

       }
       else if($_SESSION['playtype']==4){
           mysqli_query($mysql,"INSERT INTO `Play_History` (`uid`,`tid`,`ptime`) VALUES ('$uid','$tid','$time');"); 
           $_SESSION['aname']=$_SESSION['playfrom'];
           header("Location:artistProfile.php");
       }
       else{
           mysqli_query($mysql,"INSERT INTO `Play_History` (`uid`,`tid`,`ptime`) VALUES ('$uid','$tid','$time');"); 
          
           header("Location:mainPage.php");
       }
               $_SESSION['tid']=$tid;   
         
       
   }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>