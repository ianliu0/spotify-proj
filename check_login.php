<?php
   session_start();
   if( $_POST && isset($_POST['signin']))
    {
       
       $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
       $uid= $_POST['suid'];
       $pw= $_POST['spw'];
      
       $get_id = mysqli_query($mysql,"select uid
                     from user
                     where uid='$uid' and password='$pw'");
          $row = mysqli_fetch_array($get_id);
          if($row){
              setcookie("uid",$uid,time()+60*5);
             header("Location:mainPage.php");
             $_SESSION['uid']= $uid;
          }
          else{
               $_SESSION['sign']=false;
               header("Location:login.php");
          }
          
       
   }

?>
