<div class="content__right">


    <div class="social">

        <div class="following__head">

            <span class="section-title">Following</span>

        </div>

        <div class="friends">


    <?php

    $following = mysqli_query($mysql,"
                     select uid1 
                     from follow
                     where uid2='$uid'");

    if($following && $following-> num_rows>0){
        while ($r = mysqli_fetch_array($following))
        {

            echo '
   
                <a href="UserProfile.php?user=', urlencode($r['uid1']), '" class="friend" >
                <i class="ion-android-person"></i>
                '.$r['uid1'].'
                </a>
             ';


        }

    }

    ?>

        </div>

    </div>

</div>

</section>




<!--player section!!!-->

<section class="current-track">

    <div class="current-track__progress">

        <?php
            if(isset($_SESSION['tid'])){
            $tid=$_SESSION['tid'];
            }
            else{
                $tid="0021ajfstgNduRZ9N2ak7P";

            }
//            echo $tid;
        echo '

            <iframe src="https://open.spotify.com/embed?uri=spotify%3Atrack%3A'.$tid.'"
                width="80%" height="80" frameborder="0" allowtransparency="true"></iframe>
        
        ';

        ?>



    </div>


    <div class="current-track__options">

        <a href="#" class="lyrics">Lyrics</a>

        <span class="controls">

      <a href="#" class="control">
        <i class="ion-navicon"></i>
      </a>

      <a href="#" class="control">
        <i class="ion-shuffle"></i>
      </a>

      <a href="#" class="control">
        <i class="fa fa-refresh"></i>
      </a>

      <a href="#" class="control devices">
        <i class="ion-iphone"></i>
        <span>Devices Available</span>
      </a>

      <a href="#" class="control volume">

        <i class="ion-volume-high"></i>

        <div id="song-volume"></div>

      </a>

    </span>

    </div>

</section>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/8.3.0/nouislider.min.js'></script>
<script src="js/index.js"></script>
<script>
    $('#abc').click(function(){

        $('#trackids').val($(this).attr('data-id'));

    });

    $('#bcd').click(function(){

        $('#trids').val($(this).attr('data-id'));

    });
</script>