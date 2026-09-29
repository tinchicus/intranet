const form_a_v = document.getElementById("form-add-video");
const form_m_v = document.getElementById("form-mod-video");
const form_a_s = document.getElementById("form-add-serie");
const form_m_s = document.getElementById("form-mod-serie");
const video_lista = document.getElementsByName("capa_video_datos_lista");
const celda_lista = document.getElementsByName("celda_lista_video_datos");
const capa_izq = document.getElementById("capa-lado-izquierdo-mini");
const capa_der = document.getElementById("capa-lado-derecho-mini");
const capa_elim = document.getElementById("capa-marco-eliminar-gral");
const capa_ver = document.getElementById("capa-marco-ver-video");
const capa_ajax = document.getElementById("capa-ajax-ver-contenido");
const capa_carga = document.getElementById("capa-carga-animacion");
const btn_acc_lst = document.getElementsByName("boton_accion_lista");
const btn_acc_vid = document.getElementsByName("boton_accion_peli");
const btn_del_vid = document.getElementsByName("boton_elim_dato");
const btn_new = document.getElementById("nuevo");
const btn_ver = document.getElementsByName("boton_ver");
const btn_mod = document.getElementsByName("boton_mod");
const btn_del = document.getElementsByName("boton_del");
const btn_vid_omt = document.getElementsByName("boton_video_omt");
const codex = document.getElementsByName("codex");
const tipex = document.getElementsByName("tipex");
let codex_d = document.getElementById("codex_d");
let tipex_d = document.getElementById("tipex_d");
let lista_serie = document.getElementById("lista-serie");
let lista_agregado = document.getElementById("capa-lista-videos-agregados");
let lista_add_mini = document.getElementById("capa-lista-videos-agregados-mini");
const btn_vid_add = document.getElementsByName("boton_video_add");
const btn_lst_add = document.getElementsByName("boton_lista_add");
const btn_lst_add_mini = document.getElementsByName("boton_lista_add_mini");
const btn_mov_lst = document.getElementsByName("boton_mover_lista");
const tit_lst_vid = document.getElementsByName("titulo_lista_videos");
const tit_vid = document.getElementsByName("titulo_video");
const arc_ser = document.getElementsByName("archivo_serie");
const vid_lst = document.getElementsByName("videos_l[]");
const titulo = document.getElementById("titulo");
const director = document.getElementById("director");
const seccion = document.getElementById("seccion");
const pais = document.getElementById("pais");
const idioma = document.getElementById("idioma");
const estudio = document.getElementById("estudio");
const archivo = document.getElementById("archivo");

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
	let vhs = document.getElementById("vhs");
	if (vhs) { vhs.pause(); }
	capa_ver.style.display="none";
}

function eliminar_lista(codigo, tipo, titulo)
{
	let td_titulo = document.getElementById("td-elemento-id");
	capa_elim.style.display="block";
	td_titulo.innerHTML = "Deseas eliminar a<br>" + titulo + "?";
	codex_d.value = codigo;
	tipex_d.value = tipo;
}

function submit_form()
{
	if (!titulo.value)
	{
		alert("Debes ingresar el titulo");
		return false;
	}
	if (!seccion.value)
	{
		alert("Debes elegir o ingresar una seccion");
		return false;
	}
	if (!categoria.value)
	{
		alert("Debes elegir la categoria");
		return false;
	}
	if (form_a_v)
	{
		capa_carga.style.display="block";
		form_a_v.action="php/datos/videos/agregar.video.php";
		form_a_v.submit();
	}
	if (form_m_v)
	{
		capa_carga.style.display="block";
		form_m_v.action="php/datos/videos/modificar.video.php";
		form_m_v.submit();
	}
	if (form_a_s)
	{
		if (!lista_serie.value)
		{
			alert("Debes elegir aunque sea un video");
			return false;
		}
		form_a_s.action="php/datos/videos/agregar.serie.php";
		form_a_s.submit();		
	}
	if (form_m_s)
	{
		form_m_s.action="php/datos/videos/modificar.serie.php";
		form_m_s.submit();		
	}
}

if (btn_new)
{
	btn_new.addEventListener("change", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/videos/cargar.php?t=" + dvn[1] + "&codigo=" + btn_new.value;
	}, false);
}

if (director)
{
	director.addEventListener("change", function(){
		if (form_a_v) form_a_v.submit();
		if (form_m_v) form_m_v.submit();
	}, false);
}

if (seccion)
{
	seccion.addEventListener("change", function(){
		if (form_a_v) form_a_v.submit();
		if (form_m_v) form_m_v.submit();
	}, false);
}

if (pais)
{
	pais.addEventListener("change", function(){
		if (form_a_v) form_a_v.submit();
		if (form_m_v) form_m_v.submit();
	}, false);
}

if (idioma)
{
	idioma.addEventListener("change", function(){
		if (form_a_v) form_a_v.submit();
		if (form_m_v) form_m_v.submit();
	}, false);
}

if (estudio)
{
	estudio.addEventListener("change", function(){
		if (form_a_v) form_a_v.submit();
		if (form_m_v) form_m_v.submit();
	}, false);
}

if (btn_acc_vid.length > 0)
{
	btn_acc_vid[0].addEventListener("click", function(){
		submit_form();
	}, false);
	btn_acc_vid[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/videos/cargar.php?t=" + dvn[1] + "&codigo="; 
	}, false);
}

if (btn_del_vid.length > 0)
{
	btn_del_vid[0].addEventListener("click",function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/videos/eliminar.php?t=" + dvn[1] + "&tipo=" + tipex_d.value + "&codigo=" + codex_d.value;
	}, false);
	btn_del_vid[1].addEventListener("click",function(){
		capa_elim.style.display="none";
	}, false);
}

if (btn_mov_lst.length > 0)
{
	btn_mov_lst[0].addEventListener("click", function(){
		capa_izq.style.transition="left .5s";
		capa_der.style.transition="left .5s";
		capa_izq.style.left="-100%";
		capa_der.style.left="0";
	}, false);
	btn_mov_lst[1].addEventListener("click", function(){
		capa_izq.style.transition="left .5s";
		capa_der.style.transition="left .5s";
		capa_der.style.left="100%";
		capa_izq.style.left="0";
	}, false);
}

for(let i = 0; i < btn_acc_lst.length; i++)
{
	btn_acc_lst[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "./videos.php?t=" + dvn[1] + "=1&id=" + i;
	}, false);
}

for(let i=0; i < video_lista.length; i++)
{
	video_lista[i].addEventListener("mouseover", function(){
		celda_lista[i].style.transition="all .5s";
		celda_lista[i].style.opacity="0.9";
	}, false);
	video_lista[i].addEventListener("mouseout", function(){
		celda_lista[i].style.transition="all .5s";
		celda_lista[i].style.opacity="0.2";
	}, false);
}

for(let i=0; i < btn_del.length; i++)
{
	btn_del[i].addEventListener("click", function(){
		const td_dato = document.getElementsByName("celda_lista_video_datos");
		eliminar_lista(codex[i].value, tipex[i].value, td_dato[i].innerText);
	}, false);
}

for(let i=0; i < btn_ver.length; i++)
{
	btn_ver[i].addEventListener("click", function(){
		capa_ver.style.display="block";
		switch(tipex[i].value)
		{
			case "peli":
				runAjax(capa_ajax.id, 'php/pages/videos/ver.peli.php?codigo=' + codex[i].value);
				break;
			case "serie":
			case "saga":
			case "lista":
				runAjax(capa_ajax.id, 'php/pages/videos/ver.serie.php?codigo=' + codex[i].value);
				break;
		}
	}, false); 
}

for(let i=0; i < btn_mod.length; i++)
{
	btn_mod[i].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/videos/cargar.php?t=" + dvn[1] + "&codigo=" + codex[i].value;
	}, false);
}

for(let i=0; i < btn_vid_add.length; i++)
{
	btn_vid_add[i].addEventListener("click", function(){
		lista_serie.value += arc_ser[i].value + ";";
		lista_agregado.innerHTML += tit_vid[i].innerText + "<br>";
		lista_add_mini.innerHTML += tit_vid[i].innerText + "<br>";
	}, false);
}

for(let i=0; i < btn_vid_omt.length; i++)
{
	btn_vid_omt[i].addEventListener("click", function(){
		let s = vid_lst[i].value.split(";");
		if(btn_vid_omt[i].innerText == "+")
		{
			vid_lst[i].value = s[0] + ";" + s[1] + ";" + "si";
		} else {
			vid_lst[i].value = s[0] + ";" + s[1] + ";" + "no";
		}
		form_m_s.submit();
	}, false);
}

for(let i=0; i < btn_lst_add.length; i++)
{
	btn_lst_add[i].addEventListener("click", function(){
		let texto = "<input type=\"hidden\" id=\"videos_l\" name=\"videos_l[]\" value=\"" + arc_ser[i].value + ";" + tit_vid[i].innerText + ";no\">";
		tit_lst_vid[tit_lst_vid.length-1].innerHTML += texto;
		form_m_s.submit();
	}, false);
}