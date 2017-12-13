<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  session_start();
   if( $_POST && isset($_POST['update']))
    {
       
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $uid= $_SESSION['uid'];
       $uname= $_POST['uname'];
       $email= $_POST['uemail'];
       $city= $_POST['ucity'];

      
   
 
       mysqli_query($mysql,"update user
set uname='$uname' ,email='$email',city='$city'
where uid='$uid';"); 
             
          header("Location:UserProfile.php?user=$uid");
       
   }

?>


