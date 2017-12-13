<?php 

echo '
<div class="overview_song">

                                <div class="overview__songs__head">

                                    <span class="section-title">Playlist</span>

                                </div>

                                <div class="album__tracks">

                                    <div class="tracks">

                                        <div class="tracks__heading">

                                            <div class="tracks__heading__number">#</div>

                                            <div class="tracks__heading__title">Name</div>
                                           

                                            <div class="tracks__heading__length">

                                                <i class="ion-ios-calender"></i>

                                            </div>

                                            

                                        </div>';



   $count=1;
 while ($r = mysqli_fetch_array($playlist))
		{
            
			echo '   
                                        <div class="track">
                                       
                                            <div class="track__number">'.$count.'</div>

                                           

                                            <div class="track__title featured">
                                               <a href="playlist.php?plid=', urlencode($r['pid']), '" class="feature">
                                                <span class="title">'.$r['ptitle'].'</span>
                                                    </a>
                                                 <a href="UserProfile.php?user=', urlencode($r['uid']), '" class="feature">
                                              <span>'.$r['uid'].'</span>
                                              </a>
                                        </div>
                                                
                                            

                                            <div class="track__length">'.$r['release_date'].'</div>

                                           
                                        </div>
                                     ';
                        $count++;
			
		}       
                                      

                                        

               echo'                           
                                </div>

                            </div>
                                 </div>
';
               ?>


