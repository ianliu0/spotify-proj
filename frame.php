
<section class="header">

        <!--
        <div class="window__actions">
          <i class="ion-record red"></i>
          <i class="ion-record yellow"></i>
          <i class="ion-record green"></i>
        </div>
        -->

        <a href='mainPage.php'>
            <i class='ion-headphone' id='big'></i>
            </a>
        <div class="search">
            <form action="searchResult.php" class="navbar-form navbar-left" role="search" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="searchword"/>
                </div>
                    <button type="submit" class="btn btn-primary"  name="search">Search</button>
            </form>
        </div>

        <div class="user">

         

            <div class="user__info">

          <span class="user__info__img">

            <img src="data:image/png;base64,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" alt="Profile Picture" class="img-responsive" />

          </span>

                <span class="user__info__name">

<?php
        echo '    <span class="first"><a href="mainPage.php">'.$uid.'</a></span>';
?>

                 </span>

            </div>

            <div class="user__actions">

                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="ion-chevron-down"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <li><a href="UserProfile.php?user=<?php echo $uid ?>" >Account</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>

            </div>

        </div>

    </section>

<section class="content">

        <div class="content__left">

            <section class="navigation">

               
               

                <!-- Playlists -->
                <div class="navigation__list">

                    <div class="navigation__list__header"
                         role="button"
                         data-toggle="collapse"
                         href="#playlists"
                         aria-expanded="true"
                         aria-controls="playlists">
                        Playlists
                    </div>

                    <div class="collapse in" id="playlists">
                 <?php
                    $playlist = mysqli_query($mysql,"select pid,ptitle
                             from playlist
                             where uid='$uid'");
                     while ($row = mysqli_fetch_array($playlist))
                {
                    echo '  <a href="playlist.php?plid=', urlencode($row['pid']), '" class="navigation__list__item">
                                    <i class="ion-ios-musical-notes" ></i>
                                    <span>'.$row['ptitle'].'</span>
                                </a>';

                }


                     ?>

                            </div>

                        </div>
                        <!-- / -->

                    </section>
        <section class="playlist">

                        <a  id="modal-575078" href="#modal-container-575078" role="button" class="btn" data-toggle="modal">

                            <i class="ion-ios-plus-outline"></i>

                            New Playlist

                        </a>
                        <div class="modal fade" id="modal-container-575078" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        Create a new playlist
                                    </h4>
                                </div>
                                <div class="modal-body">
                                   <form action="createPL.php" method ='POST'>
                                  <div class="form-group">
                                    <label >Title</label>
                                    <input type="text" class="form-control" name="ptitle" placeholder="Enter the title">
                                  </div>

                                    <div class="form-group">
                                   <label >Shared playlist</label>
                                   <input type="radio"  name="share" value="0">
                                  </div>

                                        <div class="form-group">
                                   <label >Private playlist</label>
                                   <input type="radio"  name="share" value="1">
                                  </div>

                                  <button type="submit" class="btn btn-primary" name="create" >Create</button>


                                   </form>

                                </div>

                            </div>

                        </div>

                    </div>

        </section>





<!--         <section class="playing">-->
<!---->
<!--                        <div class="playing__art">-->
<!---->
<!--                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/7022/cputh.jpg" alt="Album Art" />-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="playing__song">-->
<!---->
<!--                            <a class="playing__song__name">Some Type of Love</a>-->
<!---->
<!--                            <a class="playing__song__artist">Charlie Puth</a>-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <div class="playing__add">-->
<!---->
<!--                            <i class="ion-checkmark"></i>-->
<!---->
<!--                        </div>-->
<!---->
<!--        </section>-->
        </div>


