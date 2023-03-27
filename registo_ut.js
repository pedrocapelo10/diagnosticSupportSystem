<script>

  
    
  
        // Fetching values from all input fields and storing them in variables.
		const form = document.getElementById("myform");
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const nome = document.getElementById("nome").value;
        const morada = document.getElementById("morada").value;
        const contactos = document.getElementById("contactos").value;
        const email = document.getElementById("email").value;
       
        form.addEventListener('Registar', (e)=> {
			e.preventDefault();
			checkForm();
		});


function setErrorFor(input, message){
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	//add error message inside small
	small.innerText = message;
	//add error class
	formControl.className = 'form-control error';
	
}
	function setSuccessFor(input) {
		const formControl = input.parentElement;
		formControl.className = 'form-control success';
}

       
       
         function checkForm() {
			 //get the values from the inputs
			const usernamevalue =  username.value.trim();
			const passwordvalue = password.value.trim();
			const nomevalue = nome.value.trim();
			const moradavalue = morada.value.trim();
			const contactosvalue = contactos.value.trim();
			const emailvalue = email.value.trim();
			
			if(usernamevalue == '') {
			setErrorFor(username, 'O campo não pode estar vazio.');
			}
			
			else{
				setSuccessFor(username);
			}
			
			
		 }
    
</script>
