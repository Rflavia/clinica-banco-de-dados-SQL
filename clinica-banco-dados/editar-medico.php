<style>
.medico-card{
	background: rgba(0,0,0,0.55);
	backdrop-filter: blur(12px);

	padding: 35px;
	border-radius: 25px;

	max-width: 900px;
	margin: 60px auto;

	color: white;

	box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

.medico-card h1{
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

<?php
	$sql = "SELECT * FROM medico
			WHERE id_medico=".$_REQUEST['id_medico'];

	$res = $conn->query($sql);

	$row = $res->fetch_object();
?>

<div class="medico-card">

<h1>Editar Médico</h1>

<form action="?page=salvar-medico" method="POST">

	<input type="hidden"
	name="acao"
	value="editar">

	<input type="hidden"
	name="id_medico"
	value="<?php print $row->id_medico; ?>">

	<div class="mb-3">

		<label class="form-label">Nome</label>

		<input type="text"
		name="nome_medico"
		value="<?php print $row->nome_medico; ?>"
		class="form-control">

	</div>

	<div class="mb-3">

		<label class="form-label">CRM</label>

		<input type="text"
		name="crm_medico"
		value="<?php print $row->crm_medico; ?>"
		class="form-control">

	</div>

	<div class="mb-3">

		<label class="form-label">Especialidade</label>

		<input type="text"
		name="especialidade_medico"
		value="<?php print $row->especialidade_medico; ?>"
		class="form-control">

	</div>

	<div class="mb-3">

		<button class="btn btn-success" type="submit">

		Salvar

		</button>

	</div>

</form>

</div>