$(document).bind('ready', function() {
  $("#geolocate").show();
  $("#address").parent().hide();
	});


function geolocate(){
  if (navigator.geolocation)
    {
      navigator.geolocation.getCurrentPosition(function(position) {
       $("input[name=longitude]").val(position.coords.longitude);
       $("input[name=latitude]").val(position.coords.latitude);
       var geocoder = new google.maps.Geocoder;
       geocoder.geocode({'location': {lat: position.coords.latitude, lng: position.coords.longitude} }, function(results, status) {
       if (status === google.maps.GeocoderStatus.OK) {
         if (results[1]) {
           $("#address").val(results[1].formatted_address);
         } else {
         }
       } else {
         alert('Geocode was not successful for the following reason: ' + status);
       }
     });
      });
    }
  else alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");
}

function addrToCoord(){
  var geocoder = new google.maps.Geocoder;
  var address = document.getElementById('address').value;
  geocoder.geocode({'address': address}, function(results, status) {
     if (status === google.maps.GeocoderStatus.OK) {
          $("input[name=longitude]").val(results[0].geometry.location.lng);
          $("input[name=latitude]").val(results[0].geometry.location.lat);
          console.log(results[0].geometry.location.lng);
          console.log(results[0].geometry.location.lat);
     } else {
       console.log('Geocode was not successful for the following reason: ' + status);
     }
   });
}


$("#geolocate").click( function(){
  geolocate();
} );

$('#reset').click(function(){
   $(':input')
  .not(':button, :submit, :reset, #abstract, #hashtags')
  .val('')
  .removeAttr('checked')
  .removeAttr('selected');
});

$('#address').change(function(){
  addrToCoord();
});

$( "input" ).on( "click", function() {
  console.log( $('form input[type=radio]:checked').val());
  if( $('form input[type=radio]:checked').val() == "auto"){
    $("#geolocate").show();
    $("#address").parent().hide();
  }else if ( $('form input[type=radio]:checked').val() == "manual"){
    $("#geolocate").hide();
    $("#address").parent().show();
  }
});
