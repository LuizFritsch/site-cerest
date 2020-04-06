function scrollBanner() {
	try{
		scrollPos = window.scrollY;
		var headerText = document.querySelector(".header-paralax h1");
		headerText.style.marginTop = -(scrollPos/3)+"px";
		headerText.style.opacity = 1-(scrollPos/480);
	}catch (exception){
		alert("Eu sou um alerta");
	}
}

window.addEventListener('scroll', scrollBanner);


$(document).ready(function(){

    //Verifica se a Janela está no topo
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Onde a mágia acontece! rs
    $('.scrollToTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

});

$(document).ready(function(){
    $('#btnAdd').attr('disabled',true);
    $('#inputAtividade').keyup(function(){
        if($(this).val().length !=0)
            $('.btnAdd').attr('btnAdd', false);            
        else
            $('.btnAdd').attr('btnAdd',true);
    })
});

$(document).ready(function(){
  var btn = document.querySelector(".btn-inscrito");

  btn.addEventListener("mouseover", function() {
    this.textContent = "Cancelar Inscricao";
  })
  btn.addEventListener("mouseout", function() {
    this.textContent = "Ja esta inscrito neste evento";
  })
});

/**
jQuery(document).ready(function(){

jQuery("#subirTopo").hide();

jQuery('a#subirTopo').click(function () {
         jQuery('body,html').animate({
           scrollTop: 0
         }, 800);
        return false;
   });

jQuery(window).scroll(function () {
         if (jQuery(this).scrollTop() > 1000) {
            jQuery('#subirTopo').fadeIn();
         } else {
            jQuery('#subirTopo').fadeOut();
         }
     });
});
**/

$(function() {
        
  $('.list-group-item').on('click', function() {
    $('.glyphicon', this)
      .toggleClass('glyphicon-chevron-right')
      .toggleClass('glyphicon-chevron-down');
  });

});

function nucleoAncora(p1, p2) {
  $('.scrollNucleo').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });
}
