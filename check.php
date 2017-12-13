<?php
   session_start();
   if( $_POST && isset($_POST['submit']))
    {
       
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $uid= $_POST['uid'];
       $uname= $_POST['uname'];
       $email= $_POST['email'];
       $city= $_POST['city'];
       $pw= $_POST['pw'];
      
       $get_id = mysqli_query($mysql,"select uid
                     from user
                     where uid='$uid'");
          $row = mysqli_fetch_array($get_id);
          if(!$row){
              mysqli_query($mysql,"INSERT INTO `user` (`uid`,`uname`,`email`,`city`,`password`) VALUES ('$uid','$uname', '$email', '$city','$pw');"); 
               $_SESSION['success']=true;
              
          }
          else{
               $_SESSION['success']=false;
          }
          header("Location:login.php");
       
   }

?>

