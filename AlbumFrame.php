<?php
echo'

<div class="overview__albums">

                                <div class="overview__albums__head">

                                    <span class="section-title">Albums</span>

                                </div>';
 
   $count=1;
 while ($al = mysqli_fetch_array($album))
		{
            
			echo '      
                                <div class="album">

                                    <div class="album__info">


                                        <div class="album__info__meta">

                                            <div class="album__year">'.$al['issued_date'].'</div>

                                            <div class="album__name">
                                             <a href="album.php?alid=', urlencode($al['alid']), '">
                                              <span>'.$al['atitle'].'</span>
                                              </a>
                                            </div>

                                       

                                        </div>

                                    </div>

                                </div>

                          ';
                }
                                
       echo' </div>';
