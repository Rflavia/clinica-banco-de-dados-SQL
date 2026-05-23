<style>
.consulta-card{
	background: rgba(0,0,0,0.55);
	backdrop-filter: blur(12px);

	padding: 35px;
	border-radius: 25px;

	max-width: 900px;
	margin: 60px auto;

	color: white;

	box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

.consulta-card h1{
	font-size: 50px;
	font-weight: bold;
	margin-bottom: 30px;
}

.form-label{
	font-weight: 500;
	margin-bottom: 8px;
	color: rgba(255,255,255,0.9);
}

.form-control{
	background: rgba(255,255,255,0.08);
	border: none;
	border-radius: 12px;

	color: white;
	padding: 14px;
}

.form-control:focus{
	background: rgba(255,255,255,0.12);
	color: white;

	box-shadow: 0 0 10px rgba(255,255,255,0.15);
	border: none;
}

.form-control::placeholder{
	color: rgba(255,255,255,0.5);
}

select.form-control option{
	background: #1c1c1c;
	color: white;
}

textarea.form-control{
	min-height: 120px;
	resize: none;
}

.btn{
	border-radius: 10px;
	padding: 10px 20px;
	font-weight: 500;
}

.btn-success{
	background: #38b26d59;
	border: none;
	color: white;
}

.btn-success:hover{
	background: #4ac983;
}
</style>

<div class="consulta-card">

<h1>Editar Consulta</h1>

<?php
	$sql = "SELECT * FROM consulta
			WHERE id_consulta=".$_REQUEST['id_consulta'];

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>

<form action="?page=salvar-consulta" method="POST">

	<input type="hidden" name="acao" value="editar">

	<input type="hidden" name="id_consulta" value="<?php print $row->id_consulta; ?>">

	<div class="mb-3">
		<label class="form-label">Paciente</label>

		<select name="paciente_id_paciente" class="form-control">

			<option>-= Escolha o paciente =-</option>

			<?php
				$sql_1 = "SELECT * FROM paciente";

				$res_1 = $conn->query($sql_1);

				if($res_1->num_rows > 0){

					while($row_1 = $res_1->fetch_object()){

						if($row_1->id_paciente == $row->paciente_id_paciente){

							print "<option value='".$row_1->id_paciente."' selected>".$row_1->nome_paciente."</option>";

						}else{

							print "<option value='".$row_1->id_paciente."'>".$row_1->nome_paciente."</option>";
						}
					}

				} else{

					print "<option>Não há pacientes</option>";
				}
			?>

		</select>
	</div>

	<div class="mb-3">
		<label class="form-label">Médico</label>

		<select name="medico_id_medico" class="form-control">

			<option>-= Escolha o medico =-</option>

			<?php
				$sql_2 = "SELECT * FROM medico";

				$res_2 = $conn->query($sql_2);

				if($res_2->num_rows > 0){

					while($row_2 = $res_2->fetch_object()){

						if($row_2->id_medico == $row->medico_id_medico){

							print "<option value='".$row_2->id_medico."' selected>".$row_2->nome_medico."</option>";

						}else{

							print "<option value='".$row_2->id_medico."'>".$row_2->nome_medico."</option>";
						}
					}

				} else{

					print "<option>Não há medicos</option>";
				}
			?>

		</select>
	</div>

	<div class="mb-3">
		<label class="form-label">Data</label>

		<input type="date"
		name="data_consulta"
		value="<?php print $row->data_consulta; ?>"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">Hora</label>

		<input type="time"
		name="hora_consulta"
		value="<?php print $row->hora_consulta; ?>"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">Descrição</label>

		<textarea name="descricao_consulta"
		class="form-control"><?php print $row->descricao_consulta; ?></textarea>
	</div>

	<div class="mb-3">
		<button class="btn btn-success" type="submit">
			Salvar
		</button>
	</div>

</form>

</div>