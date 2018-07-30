function disableForm() {
	var forms = document.getElementsByClassName("form-control");
	for (i=0; i<forms.length; i++){
		forms[i].disabled = true;
	} 	

	var forms_file = document.getElementsByName("File");
	for (i=0; i<forms_file.length; i++){
		forms_file[i].disabled = false;
	}
}

function enableForm() {
	var forms = document.getElementsByClassName("form-control");
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
activeForm();