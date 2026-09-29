let ancho_ven = window.innerWidth;
const btn_flt = document.getElementsByName("boton_filtro");
const capa_load_song = document.getElementById("capa-carga-musica");
const capa_ver_mus = document.getElementById("capa-marco-ver-musica");
const capa_ajax_ver = document.getElementById("capa-marco-ajax-musica");
const capa_dat_mus = document.getElementsByName("capa_datos_musica");
const td_acc_mus = document.getElementsByName("td_acciones_musica");
const btn_mus_mod = document.getElementsByName("boton_musica_modif");
const btn_mus_inf = document.getElementsByName("boton_musica_info");
const btn_mus_del = document.getElementsByName("boton_musica_elim");
const nuevo_elem = document.getElementById("nuevo");
const codex = document.getElementsByName("codex");
const tipex = document.getElementsByName("tipex");

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

function eliminar_musica(codigo, tipo, titulo)
{
	let dvn = location.href.split("=");
	let capa_elim = document.getElementById("capa-marco-eliminar");
	let btn_del_mus = document.getElementsByName("boton_elim_musica");
	let td_tit = document.getElementById("td_titulo_elim");
	td_tit.innerHTML = titulo + " ?";
	capa_elim.style.display = "block";
	btn_del_mus[0].addEventListener("click", function(){
		switch(tipo)
		{
			case "ar":
				location.href="php/datos/musica/eliminar.cancion.php?t=" + dvn[1] + "&codigo=" + codigo;
				break;
			case "al":
				location.href="php/datos/musica/eliminar.disco.php?t=" + dvn[1] + "&codigo=" + codigo;
				break;
			case "pl":
				location.href="php/datos/musica/eliminar.pl.php?t=" + dvn[1] + "&codigo=" + codigo;
				break;
		}
	}, false);
	btn_del_mus[1].addEventListener("click", function(){
		capa_elim.style.display = "none";
	}, false);
	
}

function extraer_archivo(fuente, separador)
{
	let s = fuente.split(separador);
	return s[s.length - 1];
}

function mostrar_info(codigo, tipo)
{
	let arc_ajax;
	capa_ver_mus.style.display = "block";
	switch(tipo)
	{
		case "ar":
			arc_ajax = "ver.cancion.php";
			break;
		case "al":
			arc_ajax = "ver.disco.php";
			break;
		case "pl":
			arc_ajax = "ver.pl.php";
			break;
	}
	runAjax(capa_ajax_ver.id, 'php/pages/musica/' + arc_ajax + '?codigo=' + codigo);
}

function cerrar_info()
{
	let tape = document.getElementById("tape");
	tape.pause();
	capa_ver_mus.style.display = "none";
}

if (nuevo_elem)
{
	nuevo_elem.addEventListener("change", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/musica/cargar.php?t=" + dvn[1] + "&codigo=" + nuevo_elem.value;
	}, false);
}

for(let i=0; i < btn_mus_mod.length; i++)
{
	btn_mus_mod[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href="php/datos/musica/cargar.php?t=" + dvn[1] + "&codigo=" + codex[i].value + "&tipo=" + tipex[i].value;
	}, false);
}
for(let i=0; i < btn_mus_inf.length; i++)
{
	btn_mus_inf[i].addEventListener("click", function(){
		mostrar_info(codex[i].value,tipex[i].value);
	}, false);
}
for(let i=0; i < btn_mus_del.length; i++)
{
	btn_mus_del[i].addEventListener("click", function(){
		eliminar_musica(codex[i].value,tipex[i].value,td_acc_mus[i].innerText);
	}, false);
}

for(let i=0; i < btn_flt.length; i++)
{
	btn_flt[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "./musica.php?t=" + dvn[1] + "=1&id=" + i;
	}, false);
}

for(let i=0; i < td_acc_mus.length; i++)
{
	capa_dat_mus[i].addEventListener("mouseover", function(){
		if (parseInt(ancho_ven) >= 800)
		{
			td_acc_mus[i].style.transition = "all .5s";
			td_acc_mus[i].style.opacity = "0.9";
		}
	}, false);
	capa_dat_mus[i].addEventListener("mouseout", function(){
		if (parseInt(ancho_ven) >= 800)
		{
			td_acc_mus[i].style.transition = "all .5s";
			td_acc_mus[i].style.opacity = "0.2";
		}
	}, false);
}
window.addEventListener("resize", function(){
	ancho_ven = window.innerWidth;
	if (parseInt(ancho_ven) < 800)
	{
		for(let i=0; i < td_acc_mus.length; i++)
			td_acc_mus[i].style.opacity = "0.9";
		capa_lst.style.left = "-90%";
	} else {
		for(let i=0; i < td_acc_mus.length; i++)
			td_acc_mus[i].style.opacity = "0.2";
		capa_lst.style.left = "50%";
	}
}, false);