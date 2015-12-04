
<div class="main_degrade" height="400px;">

    <h2 class="main_degrade_title text-center"><?= h($crisi->type) ?> à <?= h($crisi->address) ?> 

        <?php if($crisi->state=='verified'): ?> 
            <i title="Verified by Staff" class="fi-checkbox verified_icon"></i> 
        <?php endif; ?>
        <?php if($crisi->state=='over'): ?> 
            <i title="Crisis Ended" class="fi-x-circle"></i> 
        <?php endif; ?>
        <?php if($crisi->state=='spotted'): ?> 
            <i title="Spotted by User" class="fi-sound spotted_icon"></i>
        <?php endif; ?>

    </h2>

</div>

<div class="row">
  <div class="large-8 columns">   

    <p><strong>Créé le : </strong><?= h($crisi->created) ?></br></br>

        <strong>Description : </strong><?= h($crisi->abstract) ?>
    </p>


    <br>

    <h4>Informations à propos de cette crise :</h4>
        <div class="panel">
                      <h4 class="hide-for-small">Police municipale<hr></h4>
                    <h5 class="subheader">Fusce ullamcorper mauris in eros dignissim molestie posuere felis blandit. Aliquam erat volutpat. Mauris ultricies posuere vehicula. Sed sit amet posuere erat. Quisque in ipsum non augue euismod dapibus non et eros. Pellentesque consectetur tempus mi iaculis bibendum. Ut vel dolor sed eros tincidunt volutpat ac eget leo.</h5>
        </div>


        <div class="panel">
                      <h4 class="hide-for-small">Ministère de la Défense<hr></h4>
                    <h5 class="subheader">Fuscel ullamcorper mauris in eros dignissim molestie posuere felis blandit. Aliquam erat volutpat. Mauris ultricies posuere vehicula. Sed sit amet posuere erat. Quisque in ipsum non augue euismod dapibus non et eros. Pellentesque consectetur tempus mi iaculis bibendum. Ut vel dolor sed eros tincidunt volutpat ac eget leo.</h5>
        </div>




<h4>Chat WebRTC ? </h4>



</div>
<div class="large-4 columns">

  <h4>Ils en parlent...</h4>
  <a class="twitter-timeline" href="https://twitter.com/hashtag/potus" data-widget-id="672517242656043008" data-screen-name="potus">Tweets sur #crise</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


  <p>Hashtags : <?= h($crisi->hashtags) ?></p>

</div>
</div>


<!--  GEOLOCALISATION / URL GOOGLE MAP == http://google.com/maps/bylatlng?lat=' + lat + '&lng=' + lng -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas" style="height:500px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">themecircle.net</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(<?= $this->Number->format($crisi->longitude) ?>,<?= $this->Number->format($crisi->latitude) ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?= $this->Number->format($crisi->longitude) ?>, <?= $this->Number->format($crisi->latitude) ?>)});infowindow = new google.maps.InfoWindow({content:"Géolocalisation du signalement (approximation)" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>