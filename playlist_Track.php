<?php 

echo '
<div class="overview_song">

                                <div class="overview__songs__head">

                                    <span class="section-title">Song</span>

                                </div>

                                <div class="album__tracks">

                                    <div class="tracks">

                                        <div class="tracks__heading">

                                            <div class="tracks__heading__number">#</div>

                                            <div class="tracks__heading__title">Title</div>
                                           

                                            <div class="tracks__heading__length">

                                                <i class="ion-ios-stopwatch-outline"></i>

                                            </div>

                                            

                                        </div>';



   $count=1;
 while ($r = mysqli_fetch_array($songs))
		{
            
			echo '   
                                        <div class="track">
                                       
                                            <div class="track__number">'.$r['psequence_n'].'</div>

                                            <div class="track__added">
                                                
                                                <form action="deleteTrack.php" method="POST">
                                                 <input type="hidden" name="pid" value='.$plid.'>
                                                     
                                               
                                                <button type="submit" role="button" class="ion-minus-round" name="sequence" value='.$r['psequence_n'].'></button>
                                                
                                             </form>

                                            </div>  

                                            <div class="track__title featured">
                                            
                                                <span class="title">'.$r['ttitle'].'</span>
                                                 <a href="ArtistProfile.php?aname=', urlencode($r['aname']), '" class="feature">
                                              <span>'.$r['aname'].'</span>
                                              </a>
                                        </div>
                                                
                                            

                                            <div class="track_explicit">
                                            <form action="play.php" method="POST">
                                             
                                           <button type="submit" class="btn btn-success btn-xs"  name="play" value='.$r['tid'].' >Play</button>
                                               </form>
                                            </div>

                           

 

                                            <div class="track__length">'.$r['duration'].'</div>

                                           
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


