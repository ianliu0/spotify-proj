<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
 $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
 if(isset($_SESSION['plid'])){
     $plid=$_SESSION['plid'];
     unset($_SESSION['plid']);
 }
 else{
 $plid = $_GET['plid'];
 }
$uid=$_SESSION['uid'];
 $get_id = mysqli_query($mysql,"select uname
                     from user
                     where uid='$uid'");
          $row = mysqli_fetch_array($get_id);
         $uname=$row['uname'];
         
  $p = mysqli_query($mysql,"select ptitle,  release_date
                     from playlist
                     where pid='$plid'");
  $r=mysqli_fetch_array($p);
  $ptitle = $r['ptitle'];
  $date = $r['release_date']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SearchResult</title>


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.css'>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
include 'frame.php';
?>

        <div class="content__middle">

            <div class="artist is-verified">


                <!--search header-->
                <div class="search_header">
                    <div class="search_result">
                       <?php
                       echo '<h1> '.$ptitle.' </h1>';
                       echo '<h5> '.$date.' </h5>
                       
                    </div>
                     <form action="deletePL.php" method="POST"> 
                         <button type="submit" class="button-light" name="delete" value='.$plid.'>
                                  Delete
                                  </button>
                            </form> ';
                       ?>
                </div>

                <!--content part-->
                <div class="artist__content">

                    <div class="tab-content">

                        <!-- Overview -->
                        <div role="tabpanel" class="tab-pane active" id="artist-overview">



                            <!--<div class="overview">-->

                       

<?php
$songs = mysqli_query($mysql,"select tid,ttitle, duration,aname,psequence_n
                     from playlist_included natural join track
                     where pid='$plid'
                     order by psequence_n");
if($songs && $songs->num_rows>0){
   
    include 'playlist_Track.php';
    $_SESSION['playtype']=2;    
    $_SESSION['playfrom']=$plid;
}

 ?>
                        <!-- About // Coming Soon-->
                        <!--<div role="tabpanel" class="tab-pane" id="artist-about">About</div>-->
                        <!-- / -->

                    </div>

                </div>

            </div>

         </div>
        </div>


        <?php include 'followbar.php' ?>


</body>
</html>