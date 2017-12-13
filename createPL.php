<?php

session_start();
if($_POST && isset($_POST['create'])){
    

    
    $ptitle = $_POST['ptitle'];
    $share = $_POST['share'];
    $uid = $_SESSION['uid'];
    $mysql = mysqli_connect("localhost", "restaurant", "restaurant", "music");
    $create_time = date("Y-m-d H:i:s");
    
   
    $insert = mysqli_query($mysql,"INSERT INTO `Playlist` (`ptitle`,`uid`,`isprivate`,`release_date`) VALUES ('$ptitle','$uid',$share,'$create_time');"); 
  header('Location:mainPage.php');
  
  
}

?>   

