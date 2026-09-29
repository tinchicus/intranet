const form_a_c = document.getElementById("form_add_cancion");
const form_m_c = document.getElementById("form_mod_cancion");
const artista_c = document.getElementById("artista");
const album_c = document.getElementById("album");
const genero_c = document.getElementById("genero");
const pais_c = document.getElementById("pais");
const btn_acc_sng = document.getElementsByName("boton_accion_song");

function play_song()
{
	let tape = document.getElementById("tape");
	let img = document.getElementById("img-tape-accion");
	let imagen = extraer_archivo(img.src,"/");
	if (imagen == "play.mhm.png")
	{
		img.src = "pics/pause.mhm.png";
		tape.play();
	} else {
		img.src = "pics/play.mhm.png";
		tape.pause();		
	}
}

if (artista_c)
{
	artista_c.addEventListener("change", function(){
		if (form_a_c) form_a_c.submit();
		if (form_m_c) form_m_c.submit();
	}, false);
}

if (album_c)
{
	album_c.addEventListener("change", function(){
		if (form_a_c) form_a_c.submit();
		if (form_m_c) form_m_c.submit();
	}, false);
}

if (genero_c)
{
	genero_c.addEventListener("change", function(){
		if (form_a_c) form_a_c.submit();
		if (form_m_c) form_m_c.submit();
	}, false);
}

if (pais_c)
{
	pais_c.addEventListener("change", function(){
		if (form_a_c) form_a_c.submit();
		if (form_m_c) form_m_c.submit();
	}, false);
}

if (btn_acc_sng.length > 0)
{
	btn_acc_sng[0].addEventListener("click", function(){
		if (form_a_c)
		{
			form_a_c.action="php/datos/musica/agregar.cancion.php";
			capa_load_song.style.display="block";
			form_a_c.submit();
		}
		if (form_m_c)
		{
			form_m_c.action="php/datos/musica/modif.cancion.php";
			form_m_c.submit();
		}
	}, false);
	btn_acc_sng[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/musica/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);
}