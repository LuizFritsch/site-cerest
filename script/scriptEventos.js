var jQuery_3_6_1 = jQuery.noConflict(true);

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


jQuery_3_6_1(document).ready(function(){

    //Verifica se a Janela está no topo
    jQuery_3_6_1(window).scroll(function(){
        if (jQuery_3_6_1(this).scrollTop() > 100) {
            jQuery_3_6_1('.scrollToTop').fadeIn();
        } else {
            jQuery_3_6_1('.scrollToTop').fadeOut();
        }
    });

    //Onde a mágia acontece! rs
    jQuery_3_6_1('.scrollToTop').click(function(){
        jQuery_3_6_1('html, body').animate({scrollTop : 0},800);
        return false;
    });

});

jQuery_3_6_1(document).ready(function(){
    jQuery_3_6_1('#btnAdd').attr('disabled',true);
    jQuery_3_6_1('#inputAtividade').keyup(function(){
        if(jQuery_3_6_1(this).val().length !=0)
            jQuery_3_6_1('.btnAdd').attr('btnAdd', false);            
        else
            jQuery_3_6_1('.btnAdd').attr('btnAdd',true);
    })
});

jQuery_3_6_1(document).ready(function(){
  var allButtons = document.querySelectorAll(".btn-inscrito");
  for (var i = 0; i < allButtons.length; i++) {
    allButtons[i].addEventListener("mouseover", function() {
      this.textContent = "Cancelar Inscricao";
    })
    allButtons[i].addEventListener("mouseout", function() {
      this.textContent = "Ja esta inscrito neste evento";
    })
  }
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

jQuery_3_6_1(function() {
        
  jQuery_3_6_1('.list-group-item').on('click', function() {
    jQuery_3_6_1('.glyphicon', this)
      .toggleClass('glyphicon-chevron-right')
      .toggleClass('glyphicon-chevron-down');
  });

});

function nucleoAncora(p1, p2) {
  jQuery_3_6_1('.scrollNucleo').click(function(){
        jQuery_3_6_1('html, body').animate({scrollTop : 0},800);
        return false;
    });
}


/**
  Funcao que n permite o reenvio de formulario
*/
jQuery_3_6_1(document).ready(function(){
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
});
        
  