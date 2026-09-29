const btn_slr = document.getElementById("btn_salir");
const btn_vlv = document.getElementById("btn_volver");
const btn_vlv_low = document.getElementById("btn_vlv");

btn_slr.addEventListener("click", function(){
	let dvn = location.href.split("?");
	location.href="php/datos/salir.php?" + dvn[1];
	}, false);

if (btn_vlv)
{
	btn_vlv.addEventListener("click", function(){
		let dvn = location.href.split("?");
		let tkn = dvn[1].split("&");
		location.href="./?" + tkn[0];
	}, false);
}

if (btn_vlv_low)
{
	btn_vlv_low.addEventListener("click", function(){
		let dvn = location.href.split("?");
		let tkn = dvn[1].split("&");
		location.href="./?" + tkn[0];
	}, false);
}