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
    <title>MainPage</title>


    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

                <div class="artist__header" id="user_header">

                    <div class="artist__info">


                        <div class="artist__info__meta">

                            <div class="artist__info__name" id="user_header_name">

                                <div class="search_result">
                                   <?php
                                   echo ' <h1> Hello '.$uid.'</h1>';
                                   ?>
                                </div>

                            </div>

                        </div>


                    </div>



                    <div class="artist__navigation">

                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#artist-overview" aria-controls="artist-overview" role="tab" data-toggle="tab">Song</a>
                            </li>

                            <li role="presentation">
                                <a href="#related-artists" aria-controls="related-artists" role="tab" data-toggle="tab">Related Artists</a>
                            </li>

                            <li role="presentation">
                              <a href="#artist-about" aria-controls="artist-about" role="tab" data-toggle="tab">Album</a>
                            </li>

                        </ul>

                    </div>

                </div>


                <!--content part-->
                <div class="artist__content">

                    <div class="tab-content">

                        <!-- Overview -->
                        <div role="tabpanel" class="tab-pane active" id="artist-overview">

                        <?php
                        $songs = mysqli_query($mysql,"
                              select DISTINCT play_history.tid, ttitle, duration,aname,score
                                from play_history join track join rate
                                where play_history.uid='$uid' and track.tid=Play_History.tid and play_history.uid=rate.uid and rate.tid=track.tid
                              ");
                        if ($songs && $songs->num_rows > 0) {
                            
                            $_SESSION['playtype']=5;
                            include 'trackFrame.php';
                        }
                        ?>
                                          
                        </div>


                        <div role="tabpanel" class="tab-pane" id="artist-about">
                            <?php
                            $album = mysqli_query($mysql,"
                          select DISTINCT Play_History.alid,atitle, issued_date
                          from play_history JOIN  album
                          where uid='$uid'and Play_History.alid=album.alid;
                          ");
                            if($album && $album->num_rows > 0){
                              
                                include 'AlbumFrame.php';
                            }
                            ?>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="related-artists">

                                <?php
                                $art = mysqli_query($mysql,"
                              select DISTINCT `like`.aid,aname
                                from `like` join artist
                                where uid='$uid' and `like`.aid=artist.aid
                                order by ltime;
                              ");
                                if($art && $art->num_rows > 0){
                                    include 'artistFrame.php';
                                }
                                ?>

                        </div>


                </div>



            </div>

         </div>
        </div>
        </div>

 <?php include 'followbar.php' ?>

</body>
</html>


