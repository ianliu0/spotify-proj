<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/9/17
 * Time: 4:16 PM
 */
session_start();
$mysql= mysqli_connect("localhost", "restaurant", "restaurant", "music");
$uid=$_SESSION['uid'];
$get_id = mysqli_query($mysql,"
                     select uname
                     from user
                     where uid='$uid'
                     ");
$row = mysqli_fetch_array($get_id);
$uname=$row['uname'];
if(isset($_SESSION['aname'])){
     $aname=$_SESSION['aname'];
     unset($_SESSION['aname']);
 }
 else{
$aname=$_GET['aname'];
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aritst</title>


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

        <div class="artist__header">

            <div class="artist__info">

                <div class="profile__img">

                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/g_eazy_propic.jpg" alt="G-Eazy" />

                </div>

                <div class="artist__info__meta">

                    <!--                    <div class="artist__info__type user_info_type" >Profile</div>-->

                    <div class="artist__info__name user_info_name">



                        <?php echo "$aname" ?>



                    </div>
                    
                      <div class="artist__info__actions">
                    <?php

                    $check = mysqli_query($mysql,"
                     select uid 
                     from `like` join `artist`
                     where artist.aid=`like`.aid and aname='$aname' and uid='$uid';");


                    if($check && $check->num_rows > 0){
                         $_SESSION['isL']=true;
                        echo' 
                                <form action="like.php" method="POST"> 
                                  <button type="submit" class="button-light" name="like" value="'.$aname.'">
                                    <span class="dislike"></span> 
                                  </button>
                            </form> 
                            ';
                    }
                    else {
                           $_SESSION['isL']=false;
                        echo'        
                               
                          <form action="like.php" method="POST">  
                            <button type="submit" class="button-light" name="like" value="'.$aname.'" >Like</button>
                          </form>
                                  
                          ';
                    }

                    ?>
                    </div>

                </div>


            </div>

            <div class="artist__listeners">

                <div class="artist__listeners__count">

                    <?php
                      $number = mysqli_query($mysql,"
                                     select count(*) as n 
                                     from `like` natural join artist
                                     where aname='$aname'");
                        $like = mysqli_fetch_array($number);
                        $result=$like['n'];

                    echo $result;

                    ?>

                </div>


                <div class="artist__listeners__label">Total Followers</div>

            </div>
        </div>




<!--        songs of artist-->
        <div class="container" style="margin-top:20px;">
      


<!--          1!!!!!!!!!!!!!!!!  no aname in  track-->

                    <?php
                   
                    $songs = mysqli_query($mysql,"
                     select tid,ttitle, duration, aname 
                     from track
                     where aname='$aname'");
                    if($songs && $songs-> num_rows>0){
                        $_SESSION['playtype']=4;
                        $_SESSION['playfrom']=$aname;
                        include 'trackFrame.php';
                    }
              
                    ?>


        </div>
     </div>
    </div>
</div>


<?php include 'followbar.php' ?>


</body>
</html>

