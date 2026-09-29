const btn_mnu_mus = document.getElementsByName("boton_menu_musica");
const btn_elm_mus = document.getElementsByName("boton_elem_musica");
const btn_flt_mus = document.getElementsByName("boton_filtro_musica");
let capa_fil2 = document.getElementsByName("capa_filtro2_musica");
const btn_arr = document.getElementById("boton-arriba");
const capa_filtro = document.getElementById("capa-marco-filtros-musica");
const quitar_filtro = document.getElementById("boton-quitar-filtro");

let tipos = ["listas","discos","canciones","genero","artista","pais","ano"];

function filtrar(tipo)
{
	let botones;
	let dvn = location.href.split("=");
	for(let i=0; i < capa_fil2.length; i++){ capa_fil2[i].style.display="none"; }
	
	switch(tipo)
	{
		case "listas":
		case "discos":
		case "canciones":
		case "limpiar":
			location.href="php/datos/filtrar.php?t=" + dvn[1] + "&filtro1=" + tipo + "&filtro2=";
			break;
		case "genero":
			segundo_filtro(0,"boton_filtro_genero",tipo,dvn[1]);
			break;
		case "artista":
			segundo_filtro(1,"boton_filtro_artista",tipo,dvn[1]);
			break;
		case "pais":
			segundo_filtro(2,"boton_filtro_pais",tipo,dvn[1]);
			break;
		case "ano":
			segundo_filtro(3,"boton_filtro_ano",tipo,dvn[1]);
			break;
	}
}

function segundo_filtro(id,boton,filtro1,token)
{
	capa_fil2[id].style.display="grid";
	let botones = document.getElementsByName(boton);
	for(let i=0; i < botones.length; i++)
	{
		botones[i].addEventListener("click", function(){
			location.href="php/datos/filtrar.php?t=" + token + "&filtro1=" + filtro1 + "&filtro2=" + botones[i].innerText;
		}, false);
	}
}

function extraer_archivo_url(origen,divisor)
{
	let s = origen.split(divisor);
	let final = s[s.length-1].substring(0, s[s.length-1].length-2);
	return final;
}

if (quitar_filtro)
{
	quitar_filtro.addEventListener("click", function(){ filtrar("limpiar");	}, false);
}
if (btn_mnu_mus.length > 0)
{
	btn_mnu_mus[0].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/volver.php?t=" + dvn[1];
	}, false);
	btn_mnu_mus[1].addEventListener("click", function(){
		let img = window.getComputedStyle(btn_mnu_mus[1]).getPropertyValue('background-image');
		let i = extraer_archivo_url(img,"/");
		if (i=="mas.png")
		{
			btn_mnu_mus[1].style.backgroundImage = "url(pics/menos.png)";
			capa_filtro.style.transition="all .5s";
			capa_filtro.style.top=50;
		} else {
			btn_mnu_mus[1].style.backgroundImage = "url(pics/mas.png)";
			filtrar();
			capa_filtro.style.transition="all .5s";
			capa_filtro.style.top="-100%";			
		}
	}, false);
}

if (btn_arr)
{
	btn_arr.addEventListener("click", function(){ window.scrollTo({top:0, behavior:'smooth'}); }, false);
}

for(let i=0; i < btn_flt_mus.length; i++)
{
	btn_flt_mus[i].addEventListener("click", function(){
		filtrar(tipos[i]);
	}, false);
}
for(let i=0; i < btn_elm_mus.length; i++)
{
	let dvn = location.href.split("=");
	let codex = document.getElementsByName("codigo_lst");
	let tipex = document.getElementsByName("tipo_lst");
	btn_elm_mus[i].addEventListener("click", function(){
		location.href="php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + codex[i].value + "&tipo=" + tipex[i].value;
	}, false);
}
