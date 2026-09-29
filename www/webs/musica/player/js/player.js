const tape=document.getElementById("tape");
const barra=document.getElementById("seekbar");
const capa_add_pl = document.getElementById("capa-marco-add-playlist");
const btn_plr = document.getElementsByName("boton_control_player");
const btn_vlv_plr = document.getElementById("boton-volver-player");
const cod_prx = document.getElementById("cod-prx");
const tip_prx = document.getElementById("tip-prx");
const cod_ant = document.getElementById("cod-ant");
const tip_ant = document.getElementById("tip-ant");
const actual = document.getElementById("actual");
const capa_lst_plr = document.getElementById("capa-marco-lista-player");
const loop_dsc = document.getElementById("disco-loop");
const archivo_dsc = document.getElementsByName("archivo_disco");
const btn_lst_plr = document.getElementsByName("boton_lista_player");
const cod_lst = document.getElementsByName("codigo_lst");
const trk_lst = document.getElementsByName("track_lst");
const btn_cnc_dsc = document.getElementsByName("boton_cancion_disco");
const cnc_ply = document.getElementById("cancion-playing");
const btn_pl_add = document.getElementsByName("boton_control_pl_player");

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

function anterior()
{
	const tip_act = document.getElementById("tip-act");
	switch(tip_act.value)
	{
		case "ar":
			cancion_anterior();
			break;
		case "al":
			disco_anterior();
			break;
		case "pl":
			pl_anterior();
			break;
	}	
}

function cancion_anterior()
{
	let dvn = location.href.split("=");
	location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_ant.value + "&tipo=" + tip_ant.value;	
}

function disco_anterior()
{
	let actual;
	let dvn = location.href.split("=");
	let actual_src = extraer_archivo(tape.src,"/");
	for(let i=0; i < archivo_dsc.length; i++)
	{
		if (actual_src == archivo_dsc[i].value) actual = i;
	}
	actual--;
	if (actual < 0)
	{
		location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_ant.value + "&tipo=" + tip_ant.value;
	} else {
		cnc_ply.innerHTML = "Reproduciendo:<br>" + btn_cnc_dsc[actual].innerText;
		tape.src="../../../musica/" + archivo_dsc[actual].value;
		tape.play();
	}
}

function pl_anterior()
{
	let ant;
	let dvn = location.href.split("=");
	let trk_lst = document.getElementsByName("track_lst");
	let trk_act = document.getElementById("trk-act");
	for(let i=0; i < trk_lst.length; i++)
	{
		if (trk_act.value == trk_lst[i].value) ant = i;
	}
	ant--;
	if (ant < 0) ant = trk_lst.length - 1;
	location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_lst[ant].value + "&track=" + trk_lst[ant].value + "&tipo=pl"; 
}

function proximo()
{
	const tip_act = document.getElementById("tip-act");
	switch(tip_act.value)
	{
		case "ar":
			proxima_cancion();
			break;
		case "al":
			proximo_disco();
			break;
		case "pl":
			proximo_pl();
			break;
	}
}
function proxima_cancion()
{
	let dvn = location.href.split("=");
	location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_prx.value + "&tipo=" + tip_prx.value;
}

function proximo_disco()
{
	let actual;
	let dvn = location.href.split("=");
	let actual_src = extraer_archivo(tape.src,"/");
	for(let i=0; i < archivo_dsc.length; i++)
	{
		if (actual_src == archivo_dsc[i].value) actual = i;
	}
	actual++;
	if (actual < archivo_dsc.length)
	{
		cnc_ply.innerHTML = "Reproduciendo:<br>" + btn_cnc_dsc[actual].innerText;
		tape.src="../../../musica/" + archivo_dsc[actual].value;
		tape.play();
	} else {
		if (loop_dsc.value == 0)
			location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_prx.value + "&tipo=" + tip_prx.value;
		else
		cnc_ply.innerHTML = "Reproduciendo:<br>" + btn_cnc_dsc[0].innerText;
		tape.src="../../../musica/" + archivo_dsc[0].value;
		tape.play();			
	}
}

function proximo_pl()
{
	let prx;
	let dvn = location.href.split("=");
	let trk_lst = document.getElementsByName("track_lst");
	let trk_act = document.getElementById("trk-act");
	for(let i=0; i < trk_lst.length; i++)
	{
		if (trk_act.value == trk_lst[i].value) prx = i;
	}
	prx++;
	if (prx >= cod_lst.length) prx = 0;
	location.href = "php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_lst[prx].value + "&track=" + trk_lst[prx].value + "&tipo=pl"; 
}

function loopear()
{
	const tip_act = document.getElementById("tip-act");
	switch(tip_act.value)
	{
		case "pl":
		case "ar":
			loop_cancion();
			break;
		case "al":
			loop_disco();
			break;
	}
}

function loop_cancion()
{
	let i = window.getComputedStyle(btn_plr[3]).getPropertyValue('background-image');
	let img = extraer_archivo_url(i, "/");
	if (img=="loop.png")
	{
		btn_plr[3].style.backgroundImage="url(pics/straight.png)";
		tape.loop=false;
	} else {
		btn_plr[3].style.backgroundImage="url(pics/loop.png)";
		tape.loop=true;		
	}
}

function loop_disco()
{
	let i = window.getComputedStyle(btn_plr[3]).getPropertyValue('background-image');
	let img = extraer_archivo_url(i, "/");
	if (img=="loop.png")
	{
		btn_plr[3].style.backgroundImage="url(pics/straight.png)";
		loop_dsc.value=0;
	} else {
		btn_plr[3].style.backgroundImage="url(pics/loop.png)";
		loop_dsc.value=1;
	}
}

function extraer_archivo(origen,divisor)
{
	let s = origen.split(divisor);
	let final = s[s.length-1];
	return final;
}

function extraer_archivo_url(origen,divisor)
{
	let s = origen.split(divisor);
	let final = s[s.length-1].substring(0, s[s.length-1].length-2);
	return final;
}

function DatosTape(audio, barra, div)
{
	let a=document.getElementById(div);
	let b=document.getElementById(audio);
 	let s=document.getElementById(barra);
	let minTot=Math.floor(b.duration/60);
	let segTot=Math.floor(b.duration % 60);
	let minCor=Math.floor(b.currentTime/60);
	let segCor=Math.floor(b.currentTime % 60);
	if (minTot<10) { minTot="0" + minTot; }
	if (segTot<10) { segTot="0" + segTot; }
	if (minCor<10) { minCor="0" + minCor; }
	if (segCor<10) { segCor="0" + segCor; }
	a.innerHTML=minCor + ":" + segCor + " / " + minTot + ":" + segTot;
	
	s.value = (b.currentTime * s.max) / b.duration;
}

function BuscarPista(audio, barra, pos)
{
	let c=document.getElementById(audio);
	let s=document.getElementById(barra);
	
	c.currentTime=(s.value * c.duration) / s.max;
	boton_play.style.backgroundImage = "url(pics/pausemhm.png)";
}

if (btn_vlv_plr)
{
	btn_vlv_plr.addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href="php/datos/volver.php?t=" + dvn[1];
	}, false);
}

if (btn_pl_add.length > 0)
{
	btn_pl_add[0].addEventListener("click", function(){
		let lista = document.getElementById("play_lists");
		let archivo = extraer_archivo(tape.src, "/");
		if (!lista.value)
		{
			alert("Debes elegir una lista");
		} else {
			runAjax('','php/datos/agregar.pl.php?lista=' + lista.value + '&archivo=' + archivo);
			capa_add_pl.style.display="none";
			btn_plr[2].style.backgroundImage="url(pics/pausemhm.png)";
			tape.play();
		}
	}, false);
	btn_pl_add[1].addEventListener("click", function(){
		capa_add_pl.style.display="none";
		btn_plr[2].style.backgroundImage="url(pics/pausemhm.png)";
		tape.play();
	}, false);
}

if (btn_plr.length > 0)
{
	btn_plr[0].addEventListener("click", function(){ anterior(); }, false);
	btn_plr[1].addEventListener("click", function(){ 
		capa_add_pl.style.display="block"; 
		tape.pause();
		}, false);
	btn_plr[2].addEventListener("click", function(){
		let i = window.getComputedStyle(btn_plr[2]).getPropertyValue('background-image');
		let img = extraer_archivo_url(i, "/");
		if(img == "pausemhm.png")
		{
			btn_plr[2].style.backgroundImage="url(pics/playmhm.png)";
			tape.pause();
		} else {
			btn_plr[2].style.backgroundImage="url(pics/pausemhm.png)";
			tape.play();
		}
	}, false);
	btn_plr[3].addEventListener("click", function(){ loopear(); }, false);
	btn_plr[4].addEventListener("click", function(){ proximo(); }, false);
}

if (barra)
{
	barra.addEventListener("mousedown", function(){ tape.pause(); }, false);
	barra.addEventListener("mouseup", function(){ tape.play(); }, false);
	barra.addEventListener("change", function(){ BuscarPista('tape','seekbar'); }, false);
}

if (tape)
{
	tape.addEventListener("timeupdate", function(){ DatosTape('tape','seekbar','tiempo'); }, false);
	tape.addEventListener("ended", function(){ proximo(); }, false);
	tape.play();
}

for(let i=0; i < btn_cnc_dsc.length; i++)
{
	btn_cnc_dsc[i].addEventListener("click", function(){
		cnc_ply.innerHTML = "Reproduciendo:<br>" + btn_cnc_dsc[i].innerText;
		tape.src="../../../musica/" + archivo_dsc[i].value;
		tape.play();
		btn_plr[2].style.backgroundImage="url(pics/pausemhm.png)";
	}, false);
}

for(let i=0; i < btn_lst_plr.length; i++)
{
	let dvn = location.href.split("=");
	const tip_lst = document.getElementsByName("tipo_lst");
	btn_lst_plr[i].addEventListener("click", function(){
		location.href="php/datos/cargar.php?t=" + dvn[1] + "&codigo=" + cod_lst[i].value + "&tipo=" + tip_lst[i].value + "&track=" + trk_lst[i].value;
	}, false);
}

if (actual)
{
	const cel_lst_plr = document.getElementsByName("celda_lista_player");
	const alto_celda = window.getComputedStyle(cel_lst_plr[0]).getPropertyValue('height');
	capa_lst_plr.scrollTop=(parseInt(alto_celda)) * parseInt(actual.value);
}
