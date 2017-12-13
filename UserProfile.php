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
//@param uid
$user=$_GET['user'];


$get_id = mysqli_query($mysql,"
        select *
        from user join (
            select count(*) as followernum
            from follow
            where uid1='$user'
        ) as temp
        where uid='$user';
        ");
$row = mysqli_fetch_array($get_id);
$uname=$row['uname'];
$uemail=$row['email'];
$ucity=$row['city'];

//Is necessary to save password??????
$pw=$row['password'];
$followernum=$row['followernum'];



?>


<!DOCTYPE html>
<html lang="en" >


<head>
    <meta charset="UTF-8">
    <title>UserProfile</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>

    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
    <link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.css'>


    <link rel="stylesheet" href="css/style.css">


</head>



<body>



<?php include 'frame.php'; ?>

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

                        <?php echo "$user" ?>

                    </div>

                    <div class="artist__info__actions">
                    <?php

                    $check = mysqli_query($mysql,"
                     select uid1 
                     from `follow`
                     where uid1='$user' and uid2='$uid'");


                    if($check && $check->num_rows > 0){
                         $_SESSION['isF']=true;
                        echo'     
                                <form action="follow.php" method="POST"> 
                                  <button type="submit" class="button-light" name="follow" value='.$user.'>
                                    <span class="unfollow"></span> 
                                  </button>
                            </form> 
                            ';
                    }
                    else if($user != $uid){
                           $_SESSION['isF']=false;
                        echo'        
                               
                          <form action="follow.php" method="POST">  
                            <button type="submit" class="button-light" name="follow" value='.$user.' >Follow</button>
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

                    echo "$followernum";

                    ?>


                </div>

                <div class="artist__listeners__label">Total Followers</div>

            </div>


        </div>



        <div class="container" id="card_profile">
            <h3 class="text-primary">Profile</h3>
            <form role="form">
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <p class="form-control-static" id="card-profile-username">

                        <?php echo "$uname"; ?>

                    </p>
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <p class="form-control-static" id="card-profile-email">

                        <?php echo "$uemail"; ?>

                    </p>
                </div>
                <div class="form-group">
                    <label class="control-label">Date of birth</label>
                    <p class="form-control-static" id="card-profile-dob">

                        <?php  echo "$ucity"; ?>

                    </p>
                </div>

            </form>


            <?php

            if ($uid == $user) {
                echo '
                   <div style="text-align: center">
                   <button type="submit" class="button-light" data-toggle="modal" data-target="#modal-container-456" name="follow" value='.$user.' style"text-align: center">Edit</button>
                   </div>
                   
                        <div class="modal fade" id="modal-container-456" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Edit your profile
                                    </h4>
                                </div>
                                <div class="modal-body">
                                   <form action="updateProfile.php" method ="POST">
                                  <div class="form-group">
                                    <label >User Name</label>
                                    <input type="text" class="form-control" name="uname" placeholder='.$uname.' value='.$uname.'>
                                  </div>

                                    <div class="form-group">
                                    <label >Email</label>
                                    <input type="email" class="form-control" name="uemail" placeholder='.$uemail.' value='.$uemail.'>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label >City</label>
                                    <input type="text" class="form-control" name="ucity" placeholder='.$ucity.' value='.$ucity.'>
                                  </div>
                                  
                                  <button type="submit" class="btn btn-primary" name="update" >Update</button>


                                   </form>

                                </div>

                            </div>

                        </div>

                    </div>

                ';
            }

            ?>

        </div>
    </div>
</div>

<?php include 'followbar.php'; ?>


</body>
</html>
