let formulario = document.getElementById("form1");
let msg = document.getElementById("texto_error");
let usuario = document.getElementById("user");
let clave = document.getElementById("pass");

let dvn = location.href.split("=");
switch(dvn[1])
{
	case "-1":
		msg.innerText = "Usuario y/o Password incorrectas";
		break;
	case "-2":
		msg.innerText = "No tienes privilegios suficientes";
		break;
	case "-3":
		msg.innerText = "El usuario esta bloqueado";
		break;
}
	
formulario.addEventListener("submit", function(){
	if (usuario.value == "")
	{
		event.preventDefault();
		msg.innerHTML = "El usuario no puede ser en blanco";
		return false;
	}
	if (clave.value == "")
	{
		event.preventDefault();
		msg.innerHTML = "La password no puede ser en blanco";
		return false;
	}		
}, false);
