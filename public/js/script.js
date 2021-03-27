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


let hours = [
  {
    lundi: 'Fermé'
  },
  {
    mardi: "06h30 - 20h00"
  },
  {
    mercredi: "06h30 - 20h00"
  },
  {
    jeudi: "06h30 - 20h00"
  },
  {
    vendredi: "06h30 - 20h00"
  },
  {
    samedi: "06h30 - 20h00"
  },
  {
    dimanche: "7h00 - 12h00"
  },

]

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
    div = document.createElement('div')
    div.classList.add(`text_${key}`)
    div.appendChild(document.createTextNode(elem))
    leftBoxWrapper.appendChild(div)
  })

}

const handleHours = (array) => {
  let rightBoxWrapper = document.querySelector('#rightBoxWrapper')
  array.forEach((elem, key) => {
    for(const k in elem) {
      dDays = document.createElement('div')
      dHours = document.createElement('div')
      dDays.classList.add(`days`)
      dHours.classList.add('hours')
      $('.days').each( (key) => {
        $(this).css({'grid-row': key+1})
      })
      $('.hours').each( (key) => {
        $(this).css({'grid-row': key+1})
      })
      dDays.appendChild(document.createTextNode(`${k} :`))
      dHours.appendChild(document.createTextNode(elem[k]))
      rightBoxWrapper.appendChild(dDays)
      rightBoxWrapper.appendChild(dHours)
    }
  })
 /*  for (const key in array) {
    console.log(key);
    console.log(array[key]);
    dDays = document.createElement('div')
    dDays.classList.add(`days`)
    $('.days').css({gridRow: key+1})
    dDays.appendChild(document.createTextNode(array[key]))
    rightBoxWrapper.appendChild(dDays)
  } */
}

const handleClear = (text) => {
    $(text).remove()
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
  handleClear('.days')
  handleClear('.hours')
  handleHours(hours)
  var note = $(this).attr('value');
  if (note == 1) { 
    handleClear(".text_0")
    handleClear(".text_1")
    handleClear(".text_2")
    document.getElementById('leftBoxWrapper').appendChild(handleAdresse(adresse[0]));

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
    handleClear(".text_0")
    handleClear(".text_1")
    handleClear(".text_2")
    document.getElementById('leftBoxWrapper').appendChild(handleAdresse(adresse[1]));
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
    handleClear(".text_0")
    handleClear(".text_1")
    handleClear(".text_2")
    document.getElementById('leftBoxWrapper').appendChild(handleAdresse(adresse[2]));
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


