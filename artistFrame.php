<?php
echo'
 <div class="overview__song">

                                <div class="overview__users__head">

                                    <span class="section-title">Artist</span>

                                </div>';

   $count=1;
 while ($ar = mysqli_fetch_array($art))
		{
            echo'
                                <div class="user">
                               
                                        <a href="ArtistProfile.php?aname=', urlencode($ar['aname']), '" >
                                            <i class="ion-android-person"></i>
                                              <span class="title">'.$ar['aname'].'</span>
                                              </a>
                                              </div>';
                }
                echo'
               
';
     ?>
