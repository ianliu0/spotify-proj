<?php

session_start();
   if( $_POST && isset($_POST['transfer']))
   {

       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
      $tid=$_POST['trackid'];
      $pid=$_POST['pid'];
      $total = mysqli_query($mysql,"select count(*) as total
            from playlist_included
                  where pid='$pid'");
      $row = mysqli_fetch_array($total);
      $num = $row['total']+1; 
//       var_dump( $_SESSION['isF']);
  
       mysqli_query($mysql,"INSERT INTO `Playlist_included` (`pid`,`tid`,`psequence_n`) VALUES ($pid,'$tid',$num);");
       
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
?>
