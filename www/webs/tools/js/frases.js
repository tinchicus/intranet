const form_add = document.getElementById("form_add_frase");
const form_mod = document.getElementById("form_mod_frase");
const capa_ver = document.getElementById("capa-marco-ver-frase");
const capa_frases = document.getElementById("capa-marco-frases");
const capa_add = document.getElementById("capa-marco-agregar-frase");
const capa_del = document.getElementById("capa-marco-eliminar-frase");
const capa_mod = document.getElementById("capa-marco-modif-frase");
const btn_ver = document.getElementsByName("boton_ver");
const btn_del = document.getElementsByName("boton_elim");
const btn_mod = document.getElementsByName("boton_modif");
const btn_add = document.getElementById("boton-agregar");
const btn_acc = document.getElementsByName("boton_accion");
const btn_acc_del = document.getElementsByName("boton_accion_del");
const btn_acc_add = document.getElementsByName("boton_accion_add");
const btn_acc_mod = document.getElementsByName("boton_accion_mod");
const add_cnl = document.getElementById("btn_cancelar_add");
const id_frase = document.getElementsByName("id_frase");
const capa_ajax = document.getElementById("capa-ajax-frase");
const capa_ajax_mod = document.getElementById("capa-ajax-modif-frase");
const capa_cerrar = document.getElementById("capa-cerrar-ajax");
let texto = document.getElementById("texto");
let autor = document.getElementById("autor");
const nuevo_autor = document.getElementById("capa-nuevo-autor");
let nombre = document.getElementById("nombre");
let apellido = document.getElementById("apellido");
let pais = document.getElementById("pais");
let pais2 = document.getElementById("pais2");
const tkn_mod = document.getElementById("tkn_mod");
let id_dato = document.getElementById("dato_elim");
let tkn_del = document.getElementById("tkn_elim");

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
		location.href = "php/datos/frases/cargar.php?t=" + dvn[1] + "&codigo=nuevo";
	}, false);
}

if (autor)
{
	autor.addEventListener("change", function(){
		if (form_add) form_add.submit();
		if (form_mod) form_mod.submit();
	}, false);
}

if (pais)
{
	pais.addEventListener("change", function(){
		if (form_add) form_add.submit();
		if (form_mod) form_mod.submit();
	}, false);
}

if (btn_acc_del.length > 0)
{
	btn_acc_del[0].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/frases/eliminar.php?t=" + dvn[1] + "&id="  + id_dato.value;
	}, false);
	btn_acc_del[1].addEventListener("click", function(){
		capa_del.style.display="none";
	}, false);
}

if (btn_acc_add.length > 0)
{
	btn_acc_add[0].addEventListener("click", function(){
		form_add.action = "php/datos/frases/agregar.php";
		form_add.submit();
	}, false);
	btn_acc_add[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/frases/cargar.php?t=" + dvn[1] + "&codigo=";		
	}, false);
}

if (btn_acc_mod.length > 0)
{
	btn_acc_mod[0].addEventListener("click", function(){
		form_mod.action = "php/datos/frases/modificar.php";
		form_mod.submit();
	}, false);
	btn_acc_mod[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/frases/cargar.php?t=" + dvn[1] + "&codigo=";		
	}, false);
}



for(let i=0; i < btn_ver.length; i++)
{
	btn_ver[i].addEventListener("click", function(){
		runAjax(capa_ajax.id, "php/pages/frases/ver.ajax.php?id=" + id_frase[i].value);
		capa_ver.style.display="block";
	}, false);
}

for(let i=0; i < btn_del.length; i++)
{
	btn_del[i].addEventListener("click", function(){
		//alert(id_frase[i].value);
		id_dato.value = id_frase[i].value;
		capa_del.style.display="block";
	}, false);
}

for(let i=0; i < btn_mod.length; i++)
{
	btn_mod[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/frases/cargar.php?t=" + dvn[1] + "&codigo=" + id_frase[i].value;		
	}, false);
}