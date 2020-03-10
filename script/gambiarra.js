$(document).ready(function(){
	$("input").keypress(function(event){
		var request=$(this).val() + String.fromCharCode(event.which);
		var lastChar = request.substr(request.length-1);
		var format = /[!#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
		if(format.test(lastChar)){
			//se tem caracter especial, retira ele
			event.preventDefault();
		}
	});
});
				