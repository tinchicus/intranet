let mitad;
const vhs = document.getElementById("vhs");
const btn_mnu = document.getElementsByName("boton_menu_videos");
const btn_flt_01 = document.getElementsByName("boton_filtro_videos");
const capa_menu = document.getElementById("capa-marco-menu-videos");
const capa_filtro = document.getElementById("capa-marco-filtro-videos");
const capa_flt_02 = document.getElementsByName("capa_filtro2_videos");
const capa_ultimo = document.getElementById("capa-marco-ultimo-video");
const capa_cont = document.getElementsByName("capa_cont_lista_videos");
const flt2_vlr = document.getElementsByName("filtro2_vlr");
const limpiar_filtro = document.getElementById("boton-limpiar-filtro-videos");
const capa_arriba = document.getElementById("capa-menu-arriba");
const btn_vlv_ser = document.getElementById("boton-volver-serie");
const capa_cont_serie = document.getElementsByName("capa_cont_lista_serie");

let tipos = ["lista","sagas","series","pelis","seccion","pais","ano","estudio","categoria"];

function extraer_archivo_url(origen,divisor)
{
	let s = origen.split(divisor);
	let final = s[s.length-1].substring(0, s[s.length-1].length-2);
	return final;
}

function filtrar(filtro)
{
	let dvn = location.href.split("=");
	for(let i=0; i < capa_flt_02.length; i++) { capa_flt_02[i].style.display="none"; }
	
	switch(filtro)
	{
		case "lista":
		case "sagas":
		case "series":
		case "pelis":
		case "limpiar":
			location.href="php/datos/filtrar.php?t=" + dvn[1] + "&filtro1=" + filtro + "&filtro2=";
			break;
		case "seccion":
			segundo_filtro(0,"boton_filtro2_seccion_videos",filtro,dvn[1]);
			break;
		case "pais":
			segundo_filtro(1,"boton_filtro2_pais_videos",filtro,dvn[1]);
			break;
		case "ano":
			segundo_filtro(2,"boton_filtro2_ano_videos",filtro,dvn[1]);
			break;
		case "estudio":
			segundo_filtro(3,"boton_filtro2_estudio_videos",filtro,dvn[1]);
			break;
		case "categoria":
			segundo_filtro(4,"boton_filtro2_categ_videos",filtro,dvn[1]);
			break;
	}
}

function segundo_filtro(id,boton,filtro1,token)
{
	capa_flt_02[id].style.display="grid";
	let botones = document.getElementsByName(boton);
	for(let i=0; i < botones.length; i++)
	{
		botones[i].addEventListener("click", function(){
			let filtro2;
			if (filtro1!="categoria") { filtro2=botones[i].innerText; } else { filtro2=flt2_vlr[i].value; }
			location.href="php/datos/filtrar.php?t=" + token + "&filtro1=" + filtro1 + "&filtro2=" + filtro2;
		}, false);
	}
}

if (btn_vlv_ser)
{
	btn_vlv_ser.addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href="php/datos/volver.php?t=" + dvn[1] + "&tipo=serie";
	}, false);
}

if (btn_mnu.length > 0)
{
	btn_mnu[0].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href="php/datos/volver.php?t=" + dvn[1];
	}, false);
	btn_mnu[1].addEventListener("click", function(){
		let i = window.getComputedStyle(btn_mnu[1]).getPropertyValue('background-image');
		let tope = window.getComputedStyle(capa_menu).getPropertyValue('height');
		let img = extraer_archivo_url(i, "/");
		if (img == "mas.png")
		{
			btn_mnu[1].style.backgroundImage = "url(pics/menos.png)";
			capa_filtro.style.transition="top .5s";
			capa_filtro.style.top = tope;
		} else {
			btn_mnu[1].style.backgroundImage="url(pics/mas.png)";			
			capa_filtro.style.transition="top .5s";
			capa_filtro.style.top = "-100%";
		}
	}, false);
}

if (limpiar_filtro)
{
	limpiar_filtro.addEventListener("click", function(){ filtrar("limpiar"); }, false);
}

for(let i=0; i < btn_flt_01.length; i++)
{
	btn_flt_01[i].addEventListener("click", function(){
		filtrar(tipos[i]);
	}, false);
}

if (capa_ultimo)
{
	capa_ultimo.addEventListener("click", function(){
		let codex = document.getElementById("codigo_ult");
		let tipex = document.getElementById("tipo_ult");
		let dvn=location.href.split("=");
		location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + codex.value + "&tipo=" + tipex.value + "&track=0";
	}, false);
}

for(let i=0; i < capa_cont.length; i++)
{
	let dvn=location.href.split("=");
	let codex = document.getElementsByName("codigo_lst");
	let tipex = document.getElementsByName("tipo_lst");	
	capa_cont[i].addEventListener("click", function(){
		// alert(codex[i].value + "::" + tipex[i].value);
		location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + codex[i].value + "&tipo=" + tipex[i].value + "&track=0";
	}, false);
}

for(let i=0; i < capa_cont_serie.length; i++)
{
	let dvn=location.href.split("=");
	let codex = document.getElementById("codigo_ser");
	let tipex = document.getElementById("tipo_ser");
	let track = document.getElementsByName("track_lst");
	capa_cont_serie[i].addEventListener("click", function(){
		// alert(codex[i].value + "::" + tipex[i].value);
		location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + codex.value + "&tipo=" + tipex.value + "&track=" + track[i].value;
	}, false);
}

if (vhs)
{
	vhs.addEventListener("timeupdate", function(){
		if (vhs.currentTime > (mitad + 25)) { 
			vhs.currentTime = mitad;
		}
	}, false);
}

capa_arriba.addEventListener("click", function(){ window.scrollTo({top:0, behavior:'smooth'}); }, false);

setTimeout(function(){ 				
	mitad = parseInt(vhs.duration) / 5;
	vhs.currentTime = mitad;
	vhs.muted = true;
	vhs.play();
}, 7000);
