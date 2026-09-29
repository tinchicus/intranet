const form_a_d = document.getElementById("form_add_disc");
const form_m_d = document.getElementById("form_mod_disc");
const artista_d = document.getElementById("artista");
const genero_d = document.getElementById("genero");
const pais_d = document.getElementById("pais");
const cantidad = document.getElementById("cantidad");
const lineas_tab = document.getElementById("lineas-tabla");
const add_lin_disc = document.getElementById("agregar-lineas-disco");
const btn_acc_dsc = document.getElementsByName("boton_accion_disco");

function elegir_track(id)
{
	let lista = document.getElementsByName("archi_lst");
	let tape = document.getElementById("tape");
	let img = document.getElementById("img-tape-accion");
	img.src = "pics/pause.mhm.png";
	tape.src = "../../../musica/" + lista[id].value;
	tape.play();
}

function siguiente()
{
	let prx;
	let lista = document.getElementsByName("archi_lst");
	let tape = document.getElementById("tape");
	let img = document.getElementById("img-tape-accion");
	img.src = "pics/pause.mhm.png";
	let origen = extraer_archivo(tape.src,"/");
	for(let i=0; i < lista.length; i++)
	{
		if (lista[i].value == origen) prx = i;
	}
	prx++;
	tape.src = "../../../musica/" + lista[prx].value;
	tape.play();
}

if (artista_d)
{
	artista_d.addEventListener("change", function(){
		if (form_a_d) form_a_d.submit();
	}, false);
}
if (genero_d)
{
	genero_d.addEventListener("change", function(){
		if (form_a_d) form_a_d.submit();
	}, false);
}
if (pais_d)
{
	pais_d.addEventListener("change", function(){
		if (form_a_d) form_a_d.submit();
	}, false);
}

if (add_lin_disc)
{
	add_lin_disc.addEventListener("click", function(){
		if (lineas_tab.value)
		{
			let total = parseInt(cantidad.value) + parseInt(lineas_tab.value);
			cantidad.value = total;
			form_a_d.submit();
		}
	}, false);
}

if (btn_acc_dsc.length > 0)
{
	btn_acc_dsc[0].addEventListener("click", function(){
		if (form_a_d) 
		{
			form_a_d.action = "php/datos/musica/agregar.disco.php";
			capa_load_song.style.display="block";
			form_a_d.submit();
		}
		if (form_m_d)
		{
			form_m_d.action = "php/datos/musica/modif.disco.php";
			form_m_d.submit();			
		}
	}, false);
	btn_acc_dsc[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/musica/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);
}