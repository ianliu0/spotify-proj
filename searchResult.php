<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
 $mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
$uid=$_SESSION['uid'];
 $get_id = mysqli_query($mysql,"select uname
                     from user
                     where uid='$uid'");
          $row = mysqli_fetch_array($get_id);
         $uname=$row['uname'];
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
                      <h1> Search Result</h1>
                    </div>
                </div>

                <!--content part-->
                <div class="artist__content">

                    <div class="tab-content">

                        <!-- Overview -->
                        <div role="tabpanel" class="tab-pane active" id="artist-overview">



                            <!--<div class="overview">-->

                            <!--search result of songs-->
                           <?php
                           if( $_POST && isset($_POST['searchword'])){
                           $temp = $_POST['searchword'];
                           $_SESSION['word']=$temp;
                           }
                           $word = $_SESSION['word'];
       $songs = mysqli_query($mysql,"
                      select tid,ttitle, duration,aname
                      from track
                      where ttitle like '%$word%'");
                     if ($songs && $songs->num_rows > 0) {
                         include 'trackFrame.php';
                         $_SESSION['playtype']=1;
                     }
                     $album = mysqli_query($mysql,"
                      select alid,atitle, issued_date 
                      from album
                      where atitle like '%$word%'");
                     if($album && $album->num_rows > 0){
                         include 'AlbumFrame.php';
                     }
                     
                        $playlist= mysqli_query($mysql," select pid,ptitle,user.uid,release_date
                                                   from playlist join user
                                where playlist.uid=user.uid and isprivate=0 and (ptitle like '%$word%'  or user.uid like '%$word%' or uname like '%$word%' ); ");
                      if($playlist && $playlist->num_rows > 0){
                         include 'playlistFrame.php';
                     }
                         $art = mysqli_query($mysql,"
                          select aid,aname 
                          from artist
                          where aname like '%$word%' or `desc` like '%$word%'");
                         if($art && $art->num_rows > 0){
                             include 'artistFrame.php'; 
                         }
                     $user = mysqli_query($mysql,"
                      select uid,uname 
                     from User
                     where uname like '%$word%'");
                     if($user && $user->num_rows > 0){
                         include 'userFrame.php';
                     }
                     ?>

                    </div>

                </div>

            </div>

         </div>
        </div>


<?php include 'followbar.php' ?>
        

</body>
</html>

