<?php
session_start();
   if( $_POST && isset($_POST['rate']))
    {
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $tid=$_POST['trid'];
      $uid=$_SESSION['uid'];
      $score=$_POST['rate'];
      $time= date("Y-m-d H:i:s");
      
              mysqli_query($mysql,"INSERT INTO `rate` (`uid`,`tid`,`rtime`,`score`) VALUES ('$uid','$tid','$time',$score);"); 
      
        if($_SESSION['playtype']==1){
       header("Location: searchResult.php");
}
else if($_SESSION['playtype']==2){
     $_SESSION['plid']=$_SESSION['playfrom'];
     header("Location: playlist.php");
}
  else if ($_SESSION['playtype']==3){
          $_SESSION['alid']=$_SESSION['playfrom'];
           header("Location:album.php");

       }
       else if($_SESSION['playtype']==4){
           $_SESSION['aname']=$_SESSION['playfrom'];
           header("Location:artistProfile.php");
       }
       else{
          
           header("Location:mainPage.php");
       }
       
   }
