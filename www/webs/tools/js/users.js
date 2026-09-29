const form_add = document.getElementById("form_add_user");
const form_rst = document.getElementById("form_reset_pwd");
const form_mod = document.getElementById("form_mod_user");
const capa_del = document.getElementById("capa-marco-elim-user");
const capa_usr_dato = document.getElementsByName("capa_user_dato");
const capa_tit_del = document.getElementById("capa-celda-dato-del");
const capa_reset = document.getElementById("capa-marco-reset-pwd");
const capa_info = document.getElementById("capa-marco-info-user");
const capa_ajax = document.getElementById("capa-ajax-ver-info");
const uuid_del = document.getElementById("uuid_del");
const uuid = document.getElementById("uuid_rst");
const pass1 = document.getElementById("pass1_rst");
const pass2 = document.getElementById("pass2_rst");
const userid = document.getElementsByName("userid");
const btn_usr_add = document.getElementById("boton-agregar-usuario");
const btn_usr_mod = document.getElementsByName("boton_usuario_mod");
const btn_usr_pwd = document.getElementsByName("boton_usuario_pwd");
const btn_usr_ver = document.getElementsByName("boton_usuario_ver");
const btn_usr_del = document.getElementsByName("boton_usuario_del");
const btn_acc_rst = document.getElementsByName("boton_accion_rst");
const btn_acc_mod = document.getElementsByName("boton_accion_mod");
const btn_acc_del = document.getElementsByName("boton_accion_del");
const btn_acc_add = document.getElementsByName("boton_accion_add");

function runAjax(objeto,server)
{
	var xmlHttp;
    xmlHttp=null;
    if (window.XMLHttpRequest)
	{
		xmlHttp=new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
	{
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    if (xmlHttp!=null)
	{
    	var obj=document.getElementById(objeto);
        xmlHttp.open("GET",server);
        xmlHttp.onreadystatechange=function()
		{
        	if (xmlHttp.readyState==4 && xmlHttp.status==200) 
			{
        		obj.innerHTML=xmlHttp.responseText;
        	}
		}
    }
    else
    {
    	alert("Este Browser no soporta AJAX");
    }
	xmlHttp.send(null);
}

function chk_pwd(clave1, clave2)
{
	if (!clave1) return "blanco";
	if (clave1 != clave2) return "diferentes";
	return "ok";
}

function cerrar_info()
{
	capa_info.style.display="none";
}

if (btn_usr_add)
{
	btn_usr_add.addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/users/cargar.php?t=" + dvn[1] + "&codigo=nuevo";
	}, false);
}

if (btn_acc_rst.length > 0)
{
	btn_acc_rst[0].addEventListener("click", function(){
		let chequeo = chk_pwd(pass1.value, pass2.value);
		switch(chequeo)
		{
			case "blanco":
				alert("La password no puede ser en blanco");
				return false;
				break;
			case "diferentes":
				alert("Las passwords deben ser iguales");
				return false;
				break;
			default:
				alert("Password modificada con exito");
				form_rst.action="php/datos/users/reset.php";
				form_rst.submit();
				break;
		}
	}, false);
	btn_acc_rst[1].addEventListener("click", function(){
		pass1.value="";
		pass2.value="";
		capa_reset.style.display="none";
	}, false);
}

if (btn_acc_mod.length > 0)
{
	btn_acc_mod[0].addEventListener("click", function(){
		form_mod.action="php/datos/users/modificar.php";
		form_mod.submit();
	}, false);
	btn_acc_mod[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/users/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);
}

if (btn_acc_del.length > 0)
{
	let dvn = location.href.split("=");
	btn_acc_del[0].addEventListener("click", function(){
		location.href = "php/datos/users/eliminar.php?t=" + dvn[1] + "&id=" + uuid_del.value;
	}, false);
	btn_acc_del[1].addEventListener("click", function(){
		location.href = "php/datos/users/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);
}

if (btn_acc_add.length > 0)
{
	btn_acc_add[0].addEventListener("click", function(){
		let chequeo = chk_pwd(clave1.value, clave2.value);
		switch(chequeo)
		{
			case "blanco":
				alert("La password no puede ser en blanco");
				return false;
				break;
			case "diferentes":
				alert("Las passwords deben ser iguales");
				return false;
				break;
		}
		form_add.action = "php/datos/users/agregar.php";
		form_add.submit();
	}, false);
	btn_acc_add[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/users/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);
}

for(let i=0; i < btn_usr_pwd.length; i++)
{
	btn_usr_pwd[i].addEventListener("click", function(){
		uuid.value = userid[i].value;
		capa_reset.style.display="block";
	}, false);
}

for(let i=0; i < btn_usr_ver.length; i++)
{
	btn_usr_ver[i].addEventListener("click", function(){
		capa_info.style.display="block";
		runAjax(capa_ajax.id,"php/pages/users/ver.php?uuid=" + userid[i].value);
	}, false);
}

for(let i=0; i < btn_usr_mod.length; i++)
{
	btn_usr_mod[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/users/cargar.php?t=" + dvn[1] + "&codigo=" + userid[i].value;
	}, false);
}

for(let i=0; i < btn_usr_del.length; i++)
{
	btn_usr_del[i].addEventListener("click", function(){
		capa_tit_del.innerHTML += " " + capa_usr_dato[i].innerText + "?";
		uuid_del.value = userid[i].value;
		capa_del.style.display="block";
	}, false);
}