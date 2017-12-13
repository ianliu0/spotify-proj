<?php

session_start();
   if( $_POST && isset($_POST['sequence']))
   {

       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
      $sequence_n=$_POST['sequence'];
      $pid=$_POST['pid'];
      
     
      mysqli_query($mysql,"delete 
             from playlist_included
            where pid='$pid' and psequence_n='$sequence_n';");
      $result = mysqli_query($mysql,"update playlist_included
                    set psequence_n=psequence_n-1
                    where pid='$pid' and psequence_n>'$sequence_n'");
       
       $_SESSION['plid']=$pid;
       header("Location: playlist.php");
   }
?>
