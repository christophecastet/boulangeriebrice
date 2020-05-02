

$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});

/* 
let card = $('.customBorderCardProduit');
let size = card.length;
let accu = 0;
for (let i = 0; i < size; i++) {
  accu = accu + 1;
  if(accu == i+1) {
    $('.mousseOver').mouseover(function(){
        $('.mousseOver').addClass('hideFont');
        $('.mousseOver').css('cursor', 'pointer');
        $('.disponibilite').css('display', 'block');
    })
    $('.mousseOver').mouseout(function(){
        $('.mousseOver').removeClass('hideFont');
        $('.mousseOver').css('cursor', 'pointer');
        $('.disponibilite').css('display', 'none');
    })
  }

}
*/
let  mousseOver =$('.mousseOver');

mousseOver.mouseover(function() {
    let cliked = $(this);
    cliked.addClass('hideFont');
    cliked.css('cursor', 'pointer');
    let target = this.nextSibling;
    target.nextSibling.style.display='block';
});
mousseOver.mouseout(function() {
    let cliked = $(this);
    cliked.removeClass('hideFont');
    cliked.css('cursor', 'pointer');
    let target = this.nextSibling;
    target.nextSibling.style.display='none';
 });
 
 let allergeneShow = $('.allergeneShow');
 
 allergeneShow.mouseover(function() {
    let array = [];
    array.push(this.nextSibling.nextElementSibling);
    let target = [];
    target.push(array[0].children);
    array[0].style.display = 'block';
    let test = [];
    test.push(target[0]);
    for (var item of test[0]) {
        item.style.display = 'inline';
    }
});
 allergeneShow.mouseout(function() {
    let array = [];
    array.push(this.nextSibling.nextElementSibling);
    let target = [];
    target.push(array[0].children);
    array[0].style.display = 'none';
    let test = [];
    test.push(target[0]);
    for (var item of test[0]) {
        item.style.display = 'none';
    }
  
});

/*
$('.menuProduits').click(function() {
    let data =  $(this).attr('data-value');
    alert(data);
    $.ajax({
        url: "http://127.0.0.1:8000/nos.produits.switch",
        type:"POST",
        data:{
            data:data
        },
        
        success: function success(response) {
            console.log(response.message);
        },
    
        error: function error (error){
           console.log(error);
        },
        
    })
    
})*/


