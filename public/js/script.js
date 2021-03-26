/*********NAV BAR LATERAL REPONSIVE***********/

$(document).ready(function() {
    var fixHeight = function() {
      $('.navbar-nav').css(
        'max-height',
        document.documentElement.clientHeight - 150
      );
    };
    fixHeight();
    $(window).resize(function() {
        var iWindowsSize = $(window).width();
           if (iWindowsSize  > 992){
            $('.mobileMenu').removeClass('opacity');
             };
         fixHeight();
    });
   

   
      $('.navbar .navbar-toggler').on('click', function() {
       
        fixHeight();
      });
      $('.navbar-toggler, .overlay').on('click', function() {
        $('.mobileMenu, .overlay').toggleClass('open');
        $('.mobileMenu').addClass('opacity');
        
        open = 1;
      });
  
     
      
    
    
      $('.fontSize').on('click', function () {
        $('.mobileMenu, .overlay').toggleClass('open');
      });
      
      open = 0;
      
    
    
  });
  




/*********LIEN ACTIF NAV BAR***********/

let links = $('.nav-link');

let size = links.length;
for(let i = 0; i <  size; i++) {
    links[i].addEventListener("click", function(e){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    })       
}

/*********MODAL***********/ 
var shop = $('.bouton');

var adresse = [
  shop1 = ['10 contour de l\'Église','59700  Marcq-en-Barœul',"03 20 67 09 90"],
  shop2 = ['4 rue de Wambrechies','59520  Marquette-Lez-Lille','03 20 56 29 09 '],
  shop3 = ['3 place de la République','59290  Wasquehal','06 06 06 06 06 '],

];

var jour = [
  shop1=["Lundi:", "Mardi:", ".", "Mercredi:", ".", "Jeudi:", ".", "Vendredi:", ".",  "Samedi:", ".",  "Dimanche:"],
  shop2=["Lundi:", "Mardi:", ".", "Mercredi:", ".", "Jeudi:", ".", "Vendredi:", ".",  "Samedi:", ".",  "Dimanche:"],
  shop3=["Lundi:", "Mardi:", ".", "Mercredi:", ".", "Jeudi:", ".", "Vendredi:", ".",  "Samedi:", ".",  "Dimanche:"]
];

var horaire = [
  shop1=["Fermé", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "07h00 - 17h00"],
  shop2=["Fermé", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "07h00 - 12h00"],
  shop3=["Fermé", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "06h30 - 20h00", "07h00 - 12h00"]
];

// CREATE LIST
/*function makeUL(array) {
  
  var list = document.createElement('ul');

  for (var i = 0; i < array.length; i++) {
    var item = document.createElement('li');
    item.classList.add("li");
    item.appendChild(document.createTextNode(array[i]));
    
    list.appendChild(item);
  } 
  return list;
}*/

const handleAdresse = (array) => {
  let leftBoxWrapper = document.querySelector('#leftBoxWrapper')
   array.forEach((elem, key) => {
   p = document.createElement('div')
    p.classList.add(`text_${key}`)
    p.appendChild(document.createTextNode(elem))
    leftBoxWrapper.appendChild(p)
   console.log('p1', p);
  })
 console.log('p2', p);
}

function makeUL(array) {
  
  var list = document.createElement('ul');

  for (var i = 0; i < array.length; i++) {
    var item = document.createElement('li');
    item.classList.add("li");
    item.appendChild(document.createTextNode(array[i]));
    
    list.appendChild(item);
  } 
  return list;
}
 /*********LEAFLET***********/ 
var mymap = L.map('mapid').setView([50.670808, 3.069450], 13);
var shop1 = [50.666077, 3.072889];
var shop2 = [50.677081, 3.066277];
var shop3 = [50.66960, 3.12987];


var tile = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiYm91bGFuZ2VyaWVicmljZSIsImEiOiJjazhlanJoMWkwMzVxM21xczJlbXZtYW5qIn0.cQVUNHpEbI4hXwBpMVH-5A'
});

theMarker = {};

var icon = L.divIcon({
  className: 'custom-div-icon',
  html: "<div style='background-color:rgb(39, 39, 32);' class='marker-pin'></div><i class='myPin'></i>",
  iconSize: [30, 42],
  iconAnchor: [15, 42]
});

/*************DISPLAY MODAL************/

$('.bouton').click(function() {
  console.log('cc')
  var note = $(this).attr('value');
 console.log(note);
  if (note == 1) { 
      $("#adresse").children().remove();
      $("#jour").children().remove();
      $("#horaires").children().remove();
      document.getElementById('leftBoxWrapper').appendChild(handleAdresse(adresse[0]));
      document.getElementById('jour').appendChild(makeUL(jour[0]));
      document.getElementById('horaires').appendChild(makeUL(horaire[0]));
     var li =  $('li');
     for (let i=0; i<li.length;i++){
      var acu = li[i];
      if(acu.innerText === ".") {
         acu.innerHTML = "<br>";
      }
    }
     
    if (theMarker != undefined) {
        mymap.removeLayer(theMarker);
    };
    theMarker = L.marker(shop1, {
      icon:icon
    }).addTo(mymap); 
  } else if (note == 2){
    
      $("#adresse").children().remove();
      $("#jour").children().remove();
      $("#horaires").children().remove();
      document.getElementById('leftBoxWrapper').appendChild(handleAdresse(adresse[1]));
      document.getElementById('jour').appendChild(makeUL(jour[1]));
      document.getElementById('horaires').appendChild(makeUL(horaire[1]));
      var li =  $('li');
      for (let i=0; i<li.length;i++){
       var acu = li[i];
        if(acu.innerText === ".") {
          acu.innerHTML = "<br>";
        }
      }
      if (theMarker != undefined) {
        mymap.removeLayer(theMarker);
    };
    theMarker = L.marker(shop2, {
        icon: icon
      }).addTo(mymap); 
  } else if (note == 3){
    
    $("#adresse").children().remove();
    $("#jour").children().remove();
    $("#horaires").children().remove();
    document.getElementById('leftBoxWrapper').appendChild(handleAdresse(adresse[2]));
    document.getElementById('jour').appendChild(makeUL(jour[2]));
    document.getElementById('horaires').appendChild(makeUL(horaire[2]));
    var li =  $('li');
    for (let i=0; i<li.length;i++){
     var acu = li[i];
      if(acu.innerText === ".") {
        acu.innerHTML = "<br>";
      }
    }
    if (theMarker != undefined) {
      mymap.removeLayer(theMarker);
  };
  theMarker = L.marker(shop3, {
      icon: icon
    }).addTo(mymap); 
}
  
  tile.addTo(mymap);
  // set size map on modal
  $('#exampleModalCenter').on('shown.bs.modal', function() {
    mymap.invalidateSize();
  });   
});


/******* BACK TO TOP ***************/

var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


