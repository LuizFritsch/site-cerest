var jQuery_3_6_1 = $jQuery.noConflict(true);
jQuery_3_6_1(document).ready(function(){
	jQuery_3_6_1("input").keypress(function(event){
		var request=$(this).val() + String.fromCharCode(event.which);
		var lastChar = request.substr(request.length-1);
		var format = /[!#%^*()\=\[\]{};':"\\|,<>\/?¨]+/;
		if(format.test(lastChar)){
			//se tem caracter especial, retira ele
			event.preventDefault();
		}
	});
});
				