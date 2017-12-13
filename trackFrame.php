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
                                           

                                            <div class="tracks_rate">
                                                <i class="ion-ios-musical-notes"></i>
                                              </div>

                                            

                                            

                                        </div>';



   $count=1;
 while ($r = mysqli_fetch_array($songs))
		{
            
			echo '   
                                        <div class="track">
                                       
                                            <div class="track__number">'.$count.'</div>

                                          
                                            <div class="track__added">
                                               <i role="button" class="ion-thumbsup"  id="bcd" data-id='.$r['tid'].' data-toggle="modal" data-target="#modal-container-456"></i>

                                                <i role="button" class="ion-plus-round added"  id="abc" data-id='.$r['tid'].' data-toggle="modal" data-target="#modal-container-123"></i>
                                
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
                                            
                                           
                                            
                                            
                         ';
                        include 'rateFrame.php';
                        echo'
                            <div class="modal fade" id="modal-container-123" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
                                                     
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Choose a Playlist
							</h4>
						</div>
						<div class="modal-body">
                   <form action="AddToPL.php" method ="POST">
                   <input type="hidden" id="trackids" name="trackid" value="" > ';
                  
  
  
  $query = mysqli_query($mysql,"
        select pid,ptitle
from playlist
where uid='$uid';
        ");
    while ($row = mysqli_fetch_array($query))
		{
			echo '  <div class="form-group">
   <label >'.$row['ptitle'].'</label>
   <input type="radio"  name="pid" value='.$row['pid'].'>
  </div>';
			
		}       

		$input=$r['duration'];

        $seconds = $input % 60;
        $input = floor($input / 60);

        $minutes = $input % 60;
        $input = floor($input / 60);


    echo'   
 
<button type="submit" class="btn btn-primary" name="transfer">Add</button>        
  

   </form>

						</div>
						
					</div>
					
				</div>
				
			</div>

 
                                           
                                        
                                            <div class="track__length">'.$minutes.':'.$seconds.'</div>
                                           
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


