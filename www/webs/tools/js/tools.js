const btn_app = document.getElementsByName("boton_app");
const app = document.getElementsByName("app_file");

for(let i=0; i < btn_app.length; i++)
{
	btn_app[i].addEventListener("click", function(){
		let dvn = location.href.split("?");
		location.href = app[i].value + "?" + dvn[1] + "&app=1";
	}, false);
}



