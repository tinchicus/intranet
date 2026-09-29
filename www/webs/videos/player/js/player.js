let demora, inicio;
const capa_boton = document.getElementById("capa-menu-botones-player");
const capa_pausa = document.getElementById("capa-pausa-player");
const btn_plr = document.getElementsByName("boton_player_menu");
const codigo_prx = document.getElementById("codigo_prx");
const tipo_prx = document.getElementById("tipo_prx");
const track_prx = document.getElementById("track_prx");
const vhs = document.getElementById("vhs");

function mostrar_menu()
{
	capa_boton.style.transition="top .3s";
	capa_boton.style.top=0;
}
function ocultar_menu()
{
	capa_boton.style.transition="top .3s";
	capa_boton.style.top="-200";
}
function volver()
{
	let dvn=location.href.split("=");
	vhs.pause();
	location.href = "php/volver.php?t=" + dvn[1] + "&codigo=" + codigo_prx.value + "&tipo=" + tipo_prx.value;
}
function avanzar()
{
	let dvn=location.href.split("=");
	vhs.pause();
	location.href = "php/cargar.php?t=" + dvn[1] + "&codigo=" + codigo_prx.value + "&tipo=" + tipo_prx.value + "&track=" + track_prx.value;
}

if(btn_plr.length > 0)
{
	btn_plr[0].addEventListener("click", function(){ volver(); }, false);
	btn_plr[1].addEventListener("click", function(){ avanzar(); }, false);
	btn_plr[2].addEventListener("click", function(){ volver(); }, false);
	btn_plr[3].addEventListener("click", function(){ avanzar(); }, false);
}

vhs.addEventListener("ended", function(){
	avanzar();
}, false);
vhs.addEventListener("mouseover", function(){
	mostrar_menu();
}, false);
capa_boton.addEventListener("mouseover", function(){
	mostrar_menu();
}, false);
capa_boton.addEventListener("mouseout", function(){
	ocultar_menu();
}, false);
vhs.addEventListener("mouseout", function(){
	ocultar_menu();
}, false);
vhs.addEventListener("pause", function(){
	demora = setTimeout(function(){
		ocultar_menu();
		capa_pausa.style.top=0;
		},5000);	
}, false);
vhs.addEventListener("play", function(){
	clearTimeout(demora);
	}, false);
capa_pausa.addEventListener("click", function(){
	capa_pausa.style.top="-100%";
	vhs.play();
	}, false);

inicio = setTimeout(function(){ 
	ocultar_menu();
	vhs.play();
	}, 5000);