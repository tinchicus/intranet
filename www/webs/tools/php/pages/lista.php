<div id="capa-marco-lista">
	<div id="capa-botones-lista">
		<?php if ($datos->rol >= 1002) { ?>
		<div class="div_boton_app">
			<button class="btn_app" name="boton_app">Frases</button>
			<input type="hidden" name="app_file" value="frases.php">		
		</div>
		<div class="div_boton_app">
			<button class="btn_app" name="boton_app">Musica</button>
			<input type="hidden" name="app_file" value="musica.php">		
		</div>
		<div class="div_boton_app">
			<button class="btn_app" name="boton_app">Videos</button>
			<input type="hidden" name="app_file" value="videos.php">		
		</div>
		<div class="div_boton_app">
			<button class="btn_app" name="boton_app">Novedades</button>
			<input type="hidden" name="app_file" value="news.php">		
		</div>
		<?php } ?>
		<?php if ($datos->rol >= 1003) { ?>
		<div class="div_boton_app">
			<button class="btn_app" name="boton_app">Usuarios</button>
			<input type="hidden" name="app_file" value="users.php">		
		</div>
		<?php } ?>
	</div>	
</div>
