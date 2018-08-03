function disableForm() {
	var forms = document.getElementsByClassName("Disable");
	for (i=0; i<forms.length; i++){
		forms[i].disabled = true;
	} 	

	var forms_file = document.getElementsByName("File");
	for (i=0; i<forms_file.length; i++){
		forms_file[i].disabled = false;
	}
}

function enableForm() {
	var forms = document.getElementsByClassName("Disable");
	for (i=0; i<forms.length; i++){
		forms[i].disabled = false;
	}

	var forms_file = document.getElementsByName("File");
	for (i=0; i<forms_file.length; i++){
		forms_file[i].disabled = true;
	}
}

function activeForm() {
	var elements = document.getElementsByClassName("nav-link");
	for (var i=0; i<elements.length; i++) {
		if (elements[i].href == document.URL) {
			elements[i].classList.add("active");

		}
	}

}

function color(){
	var elements = document.getElementsByClassName("nav-item");
	for(var i=0;i<elements.length;i++){
		if(elements[i].href == document.URL){
			elements[i]
		}
	}
}

function warningForm() {
	var forms = document.getElementsByClassName("hidden");
	for (i=0; i<forms.length; i++){
		//console.log(forms[i].childNodes[0].innerHTML)
		 if(forms[i].childNodes[0].innerHTML == '0'){
		 	document.getElementById("hidden").style.visibility = "hidden";
		 }
		 else
		 	document.getElementById("hidden").style.visibility = "visible";
	} 	
	
}

function hiddenForm() {
	
		document.getElementById("hidden").style.visibility = "hidden";
		$('#warning').html("0");
		$.ajax({
                 url: 'test.php',
                 success: function(data) {
                    console.log(data);
                     data = data.split('|');
                     $('#1').html(data[0]);
                     $('#3').html(data[2]);
                     $('#4').html(data[3]);
                     $('#6').html(data[5]);
                     $('#7').html(data[6]);
                     $('#9').html(data[8]);
                     $('#10').html(data[9]);
                     $('#12').html(data[11]);
                     $('#13').html(data[12]);
                     $('#15').html(data[14]);
                 }
             });
	
}

function warning_home() {
		
	$home=document.URL="http://localhost/Web/public/home";
			if ($home == document.URL) {							
				$.ajax({
                 url: 'test.php',
                 success: function(data) {
                     data = data.split('|');
                     $('#a1').html(data[0]);
                     $('#a2').html(data[1]);
                     $('#a3').html(data[2]);
                     $('#a4').html(data[3]);
                     $('#a5').html(data[4]);
                     $('#a6').html(data[5]);
                     $('#a7').html(data[6]);
                     $('#a8').html(data[7]);
                     $('#a9').html(data[8]);
                     $('#a10').html(data[9]);
                     $('#a11').html(data[10]);
                     $('#a12').html(data[11]);
                     $('#a13').html(data[12]);
                     $('#a14').html(data[13]);
                     $('#a15').html(data[14]);
                 }
             });
	}
	
}


activeForm();
warningForm();
warning_home();

