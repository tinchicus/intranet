<div id="capa-marco-reset-passwd">
	<div id="capa-sombra-reset"></div>
	<div id="capa-marco-dialogo">
		<form id="form_reset_pwd" name="form_reset_pwd" method="post" action="php/datos/users/reset.php">
		<input type="hidden" name="token" id="token" value="<?= $t; ?>">
		<input type="hidden" name="uuid_reset" id="uuid_reset" value="">
		<table class="tabla_dialogo">
			<tr>
				<td class="td_dialogo_1">Nueva Password:</td>
				<td class="td_dialogo_2"><input type="password" name="pass1_rst" id="pass1_rst" value=""></td>
			</tr>
			<tr>
				<td class="td_dialogo_1">Repetir Password:</td>
				<td class="td_dialogo_2"><input type="password" name="pass2_rst" id="pass2_rst" value=""></td>
			</tr>
			<tr>
				<td class="td_dialogo_1"><button style="cursor:pointer; ">Modificar</button></td>
				<td class="td_dialogo_2"><button id="boton_no_reset" type="button" style="cursor:pointer; ">Cancelar</button></td>
			</tr>
		</table>
		</form>
	</div>
</div>