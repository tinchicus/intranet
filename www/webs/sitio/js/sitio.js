let demora_frase;
const capa_frase = document.getElementsByName("capa_marco_frases_sitio");
const btn_lst_plr = document.getElementsByName("boton_lista_player");
const capa_video = document.getElementById("capa-video-sitio");
const capa_musica = document.getElementById("capa-musica");
const capa_tools = document.getElementById("capa-tools");
const capa_news = document.getElementById("capa-marco-news-sitio");
const btn_mas_nov = document.getElementById("boton-mas-news");

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

function extraer_archivo_url(origen,divisor)
{
	let s = origen.split(divisor);
	let final = s[s.length-1].substring(0, s[s.length-1].length-2);
	return final;
}

function cerrar_plr()
{
	const capa_ajax = document.getElementById("capa-ajax-player");
	const tape = document.getElementById("tape");
	tape.pause();
	capa_ajax.style.transition="left .5s";
	capa_ajax.style.left="-100%";
}

function cambiar(track,codex,ancho) 
{ 
	const capa_ajax = document.getElementById("capa-ajax-player");
	runAjax(capa_ajax.id,'php/pages/player.ajax.php?codigo=' + codex + '&ancho=' + ancho + "&id=" + track);
}

function playit()
{
	const tape = document.getElementById("tape");
	const btn_ply = document.getElementById("boton-play");
	let img = extraer_archivo_url(btn_ply.style.backgroundImage,"/");
	if (img == "playmhm.png")
	{
		btn_ply.style.backgroundImage="url(pics/pausemhm.png)";
		tape.play();
	} else {
		btn_ply.style.backgroundImage="url(pics/playmhm.png)";
		tape.pause();		
	}
}

if (capa_video) { capa_video.addEventListener("click", function(){ location.href = "../videos/"; }, false); }

if (capa_musica) capa_musica.addEventListener("click", function(){ location.href="../musica/"; }, false);

if (capa_tools) capa_tools.addEventListener("click", function(){ location.href="../tools/"; }, false);

if (btn_mas_nov)
{
	const btn_cls_nov = document.getElementById("boton-cerrar-news");
	const seccion = document.getElementById("seccion");
	const capa_ajax = document.getElementById("capa-ajax-news-sitio");
	btn_mas_nov.addEventListener("click", function(){
		capa_news.style.display="block";
		runAjax(capa_ajax.id,'php/pages/news.ajax.php?seccion=' + seccion.value);
	}, false);
	btn_cls_nov.addEventListener("click", function(){
		capa_news.style.display="none";
	}, false);
	seccion.addEventListener("change", function(){
		runAjax(capa_ajax.id,'php/pages/news.ajax.php?seccion=' + seccion.value);
	}, false);
}

if (btn_lst_plr.length > 0)
{
	const capa_ajax = document.getElementById("capa-ajax-player");
	const cod_lst = document.getElementsByName("codigo_lst");
	const row_tbl = document.getElementsByName("row_tabla");
	const capa_lst = document.getElementById("capa-cont-tabla-lista");
	const alto_celda = window.getComputedStyle(row_tbl[0]).getPropertyValue('height');
	btn_lst_plr[0].addEventListener("click", function(){
		if (parseInt(window.getComputedStyle(capa_lst).getPropertyValue('top')) < 0) 
		{ 
			capa_lst.style.transition="top .5s";
			capa_lst.style.top = parseInt(window.getComputedStyle(capa_lst).getPropertyValue('top')) + parseInt(alto_celda); 
		}
	}, false);
	btn_lst_plr[1].addEventListener("click", function(){
		if (parseInt(window.getComputedStyle(capa_lst).getPropertyValue('top')) > -(parseInt(alto_celda) * (cod_lst.length - 1))) 
		{
			capa_lst.style.transition="top .5s";
			capa_lst.style.top = parseInt(window.getComputedStyle(capa_lst).getPropertyValue('top')) - parseInt(alto_celda); 
		}
	}, false);
	for(let i=0; i < row_tbl.length; i++)
	{
		row_tbl[i].addEventListener("click", function(){
			runAjax(capa_ajax.id,'php/pages/player.ajax.php?codigo=' + cod_lst[i].value + '&ancho=' + parseInt(alto_celda) + "&id=0");
			capa_ajax.style.transition="left .5s";
			capa_ajax.style.left=0;
		}, false);
	}
}

demora_frase = setInterval(function(){
	let prx;
	for(let i=0; i < capa_frase.length; i++)
	{
		let opacidad = window.getComputedStyle(capa_frase[i]).getPropertyValue('opacity');
		if (opacidad == 1) prx = i;
	}
	prx++;
	if (prx >= capa_frase.length) prx = 0;
	for(let i=0; i < capa_frase.length; i++)
	{
		if (i == prx)
		{
			capa_frase[i].style.transition="all 1s";
			capa_frase[prx].style.opacity = 1;
		} else {
			capa_frase[i].style.transition="all 1s";
			capa_frase[i].style.opacity = 0;
		}
	}
	}, 30000);