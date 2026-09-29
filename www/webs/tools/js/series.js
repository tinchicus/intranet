const form_s = document.getElementById("form-add-serie");
const form_s_m = document.getElementById("form_mod_serie");
const capa_add_serie = document.getElementById("capa-marco-agregar-serie");
const capa_lst_mod_ser = document.getElementById("capa-lista-mod-serie");
const btn_mst_ser = document.getElementById("boton-mostrar-serie");
const img_mst_ser = document.getElementById("img-mostrar-serie");
const btn_acc_ser = document.getElementsByName("boton_accion_serie");
const capa_mst_serie = document.getElementById("capa-mostrar-lista-serie");
const tit_ser = document.getElementsByName("titulo_serie");
const arc_ser = document.getElementsByName("archivo_serie");
const btn_add_lst = document.getElementsByName("boton_add_lista");
const btn_add_lst_m = document.getElementsByName("boton_add_lst");
const td_lst_vid = document.getElementsByName("td_modif_lista_video");
const btn_omt = document.getElementsByName("boton_omitir");
const lista_v = document.getElementsByName("lista_videos");
const vid_l = document.getElementsByName("videos_l[]");
let lista_s = document.getElementById("lista-serie");

function agregar_lista(titulo,archivo)
{
	lista_s.value += (archivo + ";");
	document.getElementById("capa-lista-videos-add").innerHTML += titulo + "<br>";
}

function extraer_archivo(origen, separador)
{
	let s = origen.split(separador);
	return s[s.length-1];
}

function eliminar_lista(codigo, tipo, titulo)
{
	let destino = document.getElementById("id-elemento");
	capa_eliminar.style.display="block";
	destino.innerText = titulo + "?";
	codex_d.value = codigo;
	tipex_d.value = tipo;
}

function agregar_video_lista(valores)
{
	let tabla = "<input type=\"hidden\" id=\"videos_l\" name=\"videos_l[]\" value=\"" + valores + "\">";
	capa_lst_mod_ser.innerHTML += tabla;
	form_s_m.submit();
}

function submit_serie()
{
	if (form_s)
	{
		if (!titulo.value)
		{
			alert("Debe tener un titulo!");
			return false;
		}
		if (!seccion.value)
		{
			alert("Debe elegir una seccion!");
			return false;
		}
		if (!categoria.value)
		{
			alert("Debe elegir una categoria!");
			return false;
		}
		if (!lista_s.value)
		{
			alert("Debe elegir algun video!");
			return false;
		} 
		form_s.action = "php/datos/videos/agregar.serie.php";
		form_s.submit();
	}

	if (form_s_m)
	{
		form_s_m.action = "php/datos/videos/modificar.serie.php";
		form_s_m.submit();
	}
}

if (btn_acc_ser.length > 0)
{
	btn_acc_ser[0].addEventListener("click", function(){
		submit_serie();
	}, false);
	btn_acc_ser[1].addEventListener("click", function(){
		let dvn = location.href.split("=");
		location.href = "php/datos/videos/cargar.php?t=" + dvn[1] + "&codigo=";
	}, false);
}

if (btn_mst_ser)
{
	btn_mst_ser.addEventListener("click", function(){
		capa_lst_mod_ser.style.transition="left 1s";
		capa_mst_serie.style.transition="left 1s";
		let img = extraer_archivo(img_mst_ser.src,"/");
		if (img == "adelante.png")
		{
			img_mst_ser.src = "pics/atras.png";
			capa_lst_mod_ser.style.left = 0;
			capa_mst_serie.style.left="90%";
		} else {
			img_mst_ser.src = "pics/adelante.png";
			capa_lst_mod_ser.style.left = "-90%";
			capa_mst_serie.style.left= 0;			
		}
	}, false);
}
for(let i=0; i < btn_add_lst.length; i++)
{
	btn_add_lst[i].addEventListener("click", function(){
		agregar_lista(tit_ser[i].innerText, arc_ser[i].value);
	}, false);
}

for(let i=0; i < btn_add_lst_m.length; i++)
{
	btn_add_lst_m[i].addEventListener("click", function(){
		//form_s_m.submit();
		agregar_video_lista(lista_v[i].value)
	}, false);
}

for(let i=0; i < btn_omt.length; i++)
{
	btn_omt[i].addEventListener("click", function(){
		let v = vid_l[i].value.split(";");
		if (btn_omt[i].innerText == "-")
		{
			btn_omt[i].innerText = "+"
			td_lst_vid[i].style.opacity="0.2";
			vid_l[i].value = v[0] + ";" + v[1] + ";si";
		} else {
			btn_omt[i].innerText = "-"
			td_lst_vid[i].style.opacity="1";
			vid_l[i].value = v[0] + ";" + v[1] + ";no";
		}
	}, false);
}