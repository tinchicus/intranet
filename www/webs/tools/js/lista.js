const form_a_l = document.getElementById("form_add_lista");
const form_m_l = document.getElementById("form_mod_lista");
const capa_dst = document.getElementById("capa-texto-lista-pl");
const lst_archivos = document.getElementById("archivo-lista");
const btn_lst_add = document.getElementsByName("boton_lista_agregar");
const capa_lst = document.getElementById("capa-marco-lista-pl");
const arc_lst = document.getElementsByName("archivo_lst");
const btn_acc_lst = document.getElementsByName("boton_accion_lista");
const lst_trk = document.getElementsByName("track_lst[]");
const lst_dat = document.getElementsByName("track_dat[]");
const btn_omt_cnc = document.getElementsByName("boton_omitir_cancion");
const cel_dat_lst = document.getElementsByName("celda_datos_lista");
const lst_dis = document.getElementsByName("lista_dispo");
const btn_cnc_dis = document.getElementsByName("boton_cancion_dispo");

function lista_agregar(archivo, datos)
{
	cel_dat_lst[cel_dat_lst.length-1].innerHTML += "<input type=\"hidden\" id=\"track_lst\" name=\"track_lst[]\" value=\"" + archivo + ";no" + "\">";
	cel_dat_lst[cel_dat_lst.length-1].innerHTML += "<input type=\"hidden\" id=\"track_dat\" name=\"track_dat[]\" value=\"" + datos + ";no" + "\">";
	form_m_l.submit();
}


if (btn_acc_lst.length > 0)
{
	btn_acc_lst[0].addEventListener("click", function(){
		if (form_a_l)
		{
			form_a_l.action = "php/datos/musica/agregar.pl.php";
			form_a_l.submit();
		}
		if (form_m_l)
		{
			form_m_l.action = "php/datos/musica/modif.pl.php";
			form_m_l.submit();
		}
	}, false);
	btn_acc_lst[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/musica/cargar.php?t=" + dvn[1] + "&codigo=";		
	}, false);
}

for(let i=0; i < btn_lst_add.length; i++)
{
	btn_lst_add[i].addEventListener("click", function(){
		lst_archivos.value += arc_lst[i].value + ",";
		capa_dst.innerHTML += btn_lst_add[i].innerText + "<br>";
		btn_lst_add[i].disabled = true;
	}, false);
}

for(let i=0; i < btn_omt_cnc.length; i++)
{
	btn_omt_cnc[i].addEventListener("click", function(){
		if (btn_omt_cnc[i].innerText == "-")
		{
			let s = lst_trk[i].value.split(";");
			lst_trk[i].value = s[0] + ";si";
			btn_omt_cnc[i].innerText = "+";
			cel_dat_lst[i].style.opacity="0.2";
		} else {
			let s = lst_trk[i].value.split(";");
			lst_trk[i].value = s[0] + ";no";
			btn_omt_cnc[i].innerText = "-";
			cel_dat_lst[i].style.opacity="1";
		}
	}, false);
}

for(let i=0; i < btn_cnc_dis.length; i++)
{
	btn_cnc_dis[i].addEventListener("click", function(){
		lista_agregar(lst_dis[i].value, btn_cnc_dis[i].innerText);
	}, false);
}