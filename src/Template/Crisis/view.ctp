
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

    <?php if (!($crisi->infos==NULL)): ?>
    <h4>Informations à propos de cette crise :</h4>
    <?php endif;
    foreach($crisi->infos as $info): ?>
        <div class="panel">
                      <h4 class="hide-for-small"><?= $info->title ?><hr></h4>
                    <h5 class="subheader"><?= $info->body ?></h5>
                    <em>Tagged : <?= $info->type ?></em>
        </div>
    <?php endforeach; ?>



<h4>Chattez avec les autres utilisateurs :</h4>

<script src="//cdn.temasys.com.sg/skylink/skylinkjs/0.6.x/skylink.complete.min.js"></script>
<script type="text/javascript">
var skylink = new Skylink();

skylink.on('peerJoined', function(peerId, peerInfo, isSelf) {
  var user = 'You';
  if(!isSelf) {
    user = peerInfo.userData.name || peerId;
  }
  addMessage(user + ' joined the room', 'action');
});

skylink.on('peerUpdated', function(peerId, peerInfo, isSelf) {
  if(isSelf) {
    user = peerInfo.userData.name || peerId;
    addMessage('You\'re now known as ' + user, 'action');
  }
});

skylink.on('peerLeft', function(peerId, peerInfo, isSelf) {
  var user = 'You';
  if(!isSelf) {
    user = peerInfo.userData.name || peerId;
  }
  addMessage(user + ' left the room', 'action');
});

skylink.on('incomingMessage', function(message, peerId, peerInfo, isSelf) {
  var user = 'You',
      className = 'you';
  if(!isSelf) {
    user = peerInfo.userData.name || peerId;
    className = 'message';
  }
  addMessage(user + ': ' + message.content, className);
});

skylink.init('1eca2a9f-ad84-47a8-b9ac-ba5ac444b4eb');

function setName() {
  var input = document.getElementById('name');
  skylink.setUserData({
    name: input.value
  });
}

function joinRoom() {
  skylink.joinRoom();
  chatgroup.style.display="block";
  logingroup.style.display="none"; 
}

function leaveRoom() {
  skylink.leaveRoom();
}

function sendMessage() {
  var input = document.getElementById('message');
  skylink.sendP2PMessage(input.value);
  input.value = '';
  input.select();
}

function addMessage(message, className) {
  var chatbox = document.getElementById('chatbox'),
    div = document.createElement('div');
  div.className = className;
  div.textContent = message;
  chatbox.appendChild(div);
}
</script>
    

    <div id="logingroup">

        <input type="text" id="name" placeholder="Votre nom" autofocus>

        <a class="small button" onclick="setName()">Changer de nom</a>
        <a class="small button" onclick="joinRoom()">Rejoindre le Salon</a>
    </div>

    <div id="chatgroup">
        <input type="text" id="message" placeholder="Votre message" />
        <button class="small" onclick="sendMessage()">Envoyer un message</button>


        <div id="container">
           <div id="chatbox"></div>
       </div>

   </div>

    <br>


<style type="text/css">

#container {
  position: relative;
  border: 1px #ddd solid;
  height: 180px;
  overflow-y: auto;
}

#chatbox {
  position: absolute;
  bottom: 0px;
}

.action {
  font-style: italic;
  color: gray;
}

.you {
  font-weight: bold;
}

</style>



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