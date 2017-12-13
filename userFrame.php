<?php
echo'
  <div class="overview__users">

                                <div class="overview__users__head">

                                    <span class="section-title">User</span>

                                </div>';


   $count=1;
 while ($us = mysqli_fetch_array($user))
		{
            echo'
                               <div class="users">

                                        <a href="UserProfile.php?user=', urlencode($us['uid']), '" class="user">
                                            <i class="ion-android-person"></i>
                                              <span>'.$us['uname'].'</span>
                                              </a>

                                        

                            </div>';
                }
                echo'

                        </div>';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
