const capa_ver = document.getElementById("capa-marco-ver-news");
const capa_add = document.getElementById("capa-marco-agregar-news");
const capa_lst = document.getElementById("capa-marco-lista");
const capa_del = document.getElementById("capa-marco-eliminar");
const capa_ajax_ver = document.getElementById("capa-ajax-datos-news");
const btn_ver = document.getElementsByName("boton_ver");
const btn_del = document.getElementsByName("boton_elm");
const btn_mod = document.getElementsByName("boton_mod");
const codex = document.getElementsByName("codex");
const codigo = document.getElementById("codigo");
const btn_crr_ver = document.getElementById("boton-cerrar-ver");
const btn_add = document.getElementById("boton-agregar");
const btn_acc_add = document.getElementsByName("boton_accion_add");
const btn_acc_del = document.getElementsByName("boton_accion_elim");
const btn_acc_mod = document.getElementsByName("boton_accion_mod");
const tipo = document.getElementById("tipo");
const texto = document.getElementById("texto");
const form1 = document.getElementById("form-add-news");
const form2 = document.getElementById("form-mod-news");

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

function cerrar_info()
{
	capa_ver.style.display="none";
}

if (btn_add)
{
	btn_add.addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/news/cargar.php?t=" + dvn[1] + "&codigo=nuevo";
		}, false);
}


if (btn_acc_add.length > 0)
{
	btn_acc_add[0].addEventListener("click", function(){
		if (tipo.value=="")
		{
			alert("Debes seleccionar la seccion de la novedad");
			return false;
		}
		if (texto.value=="")
		{
			alert("Debes ingresar una novedad");
			return false;
		}
		form1.submit();
	}, false);
	btn_acc_add[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/news/cargar.php?t=" + dvn[1] + "&codigo=";		
	}, false);
}

if (btn_acc_del.length > 0)
{
	btn_acc_del[0].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/news/eliminar.php?t=" + dvn[1] + "&codigo=" + codigo.value;
	}, false);
	btn_acc_del[1].addEventListener("click", function(){
		capa_del.style.display="none";
	}, false);
}

if (btn_acc_mod.length > 0)
{
	btn_acc_mod[0].addEventListener("click", function(){
		form2.submit();
	}, false);
	btn_acc_mod[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/news/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);	
}

for(let i=0; i < btn_ver.length; i++)
{
	btn_ver[i].addEventListener("click", function(){
		capa_ver.style.display="block";
		runAjax(capa_ajax_ver.id,'php/pages/news/ver.ajax.php?codigo=' + codex[i].value);
	}, false);
}
for(let i=0; i < btn_del.length; i++)
{
	btn_del[i].addEventListener("click", function(){
		capa_del.style.display="block";
		codigo.value = codex[i].value;
	}, false);
}
for(let i=0; i < btn_mod.length; i++)
{
	btn_mod[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/news/cargar.php?t=" + dvn[1] + "&codigo=" + codex[i].value;
	}, false);
}