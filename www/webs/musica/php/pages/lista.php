<div class="capa_marco_lista_musica">
	<div class="capa_grilla_lista_musica">
		<?php foreach($listado as $l) { 
			switch($l->tipo) 
			{
				case "pl":
					$tipo = "PlayList";
					break;
				case "al":
					$tipo = "Album";
					break;
				case "ar":
					$tipo = "Cancion";
					break;
			}		
		?>
		<div class="capa_tabla_lista_musica">
			<div class="capa_celda_lista_musica">
				<button type="button" name="boton_elem_musica" class="boton_elem_musica" style="background-image:url(../../musica/pics/<?= $l->foto ? $l->foto : "fondo.jpg"; ?>);">
					<div class="tabla_elem_musica">
						<div class="row_elem_musica_01"></div>
						<div class="row_elem_musica_02">
							<div class="celda_elem_musica">
								<?= $tipo; ?><br>
								<?= $l->artista ? $l->artista . "<br>" : ""; ?>
								<?= $l->titulo; ?>
								<input type="hidden" name="codigo_lst" value="<?= $l->codigo; ?>">
								<input type="hidden" name="tipo_lst" value="<?= $l->tipo; ?>">
							</div>
						</div>
					</div>
				</button>
			</div>
		</div>
		<?php } ?>
	</div>
</div>