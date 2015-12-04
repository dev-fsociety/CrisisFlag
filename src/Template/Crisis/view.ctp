
<div class="main_degrade" height="400px;">

    <h2 class="main_degrade_title text-center"><?= h($crisi->type) ?> à <?= h($crisi->address) ?>


        <?php if($crisi->state == 'spotted'): ?>
            <i title="Spotted by User" class="fi-sound spotted_icon"></i>
        <?php endif; ?>
        <?php if($crisi->state == 'verified'): ?>
            <i title="Verified by Staff" class="fi-checkbox verified_icon"></i>
        <?php endif; ?>
        <?php if($crisi->state == 'over'): ?>
            <i title="Crisis Ended" class="fi-x-circle"></i>

        <?php endif; ?>

    </h2>

</div>

<div class="row">
  <div class="large-8 columns">
      <div class="row">
        <div class="medium-6 column">
            <p><strong>Créé le : </strong><?= h($crisi->created) ?></br></br>
                <strong>Description : </strong><?= h($crisi->abstract) ?>
            </p>
        </div>
        <div class="medium-6 column">

        <?php if($crisi->state === 'spotted' || ($this->request->session()->read('Auth.User.id') && $crisi->state) === 'verified'): ?>

          <?= $this->Html->link(__('Editer la crise'), ['controller' => 'Crisis', 'action' => 'edit', $crisi->id], array('class' => 'small expanded button alert', 'style' => 'width: 100%;')) ?><br>

        <?php endif; ?>

          <div class="small button-group">
            <?= $this->Form->postLink(__('Yes'), ['controller' => 'Crisis','action' => 'severityIncrement', $crisi->id], ['class' => ' fi-arrow-up medium  Success ']) ?>
            <?= $this->Form->postLink(__('No') , ['controller' => 'Crisis','action' => 'severityDecrement', $crisi->id], ['class' => ' fi-arrow-down medium  Alert ']) ?>

            <?= $crisi->severity ?> ont upvote cette crise.
          </div>
        </div>

      </div>

    <br>

    <h4>Informations à propos de cette crise :</h4>
    <?php
    foreach($infos as $info): ?>
        <div class="panel information_panel">
                      <h5 class="hide-for-small"><?= $info->title ?>
                      <span class="label label_right"><?= $info->type ?></span>
                      <hr class="small_hr"></h5>
                    <p class="subheader"><?= $info->body ?></p>
                    
        </div>
    <?php endforeach; ?>



<h4>Parlez-en :</h4>

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
        <a class="small button" onclick="setName(); joinRoom();">Rejoindre le Salon</a>
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
    <?php if($crisi->state == 'spotted' && $this->request->session()->read('Auth.User.id')): ?>
    <?= $this->Html->link(__('Valider cette crise'), ['controller' => 'Crisis', 'action' => 'validate', $crisi->id], array('class' => 'small expanded button alert', 'style' => 'width: 100%;'))?>
    <?php endif; ?>

    <?php if($crisi->state == 'verified' && $this->request->session()->read('Auth.User.id')): ?>
    <?= $this->Html->link(__('Terminer cette crise'), ['controller' => 'Crisis', 'action' => 'terminate', $crisi->id], array('class' => 'small expanded button alert', 'style' => 'width: 100%;'))?>
    <?php endif; ?>

    <?php if($crisi->state != 'over' && $this->request->session()->read('Auth.User.id')): ?>
    <?= $this->Html->link(__('Ajouter des informations à cette crise'), ['controller' => 'Infos', 'action' => 'add', $crisi->id], array('class' => 'small expanded button alert', 'style' => 'width: 100%;', 'target' => '_blank'))

    ?>

  <br>
  <?php endif; ?>



  <h4>Ils en parlent...</h4>

  <iframe src="http://twubs.com/embed/<?= h($crisi->hashtags) ?>/?messagesPerPage=5&headerBgColor=%231c6485&headerTextColor=%23ffffff" width="100%" scrolling="no" seamless="seamless" height="600" frameborder="0"><a href="http://twubs.com/test">#<?= h($crisi->hashtags) ?></a></iframe>

</div>
</div>


<!--  GEOLOCALISATION / URL GOOGLE MAP == http://google.com/maps/bylatlng?lat=' + lat + '&lng=' + lng -->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?librairies=places&sensor=false"></script><div style="overflow:hidden;height:500px;width:100%;"><div id="gmap_canvas" style="height:500px;width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">themecircle.net</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(<?= $this->Number->format($crisi->latitude) ?>,<?= $this->Number->format($crisi->longitude) ?>),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(<?= $this->Number->format($crisi->latitude) ?>, <?= $this->Number->format($crisi->longitude) ?>)});infowindow = new google.maps.InfoWindow({content:"Géolocalisation du signalement (approximation)" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
