<style>
.form-container{
	max-width: 700px;
	margin: 40px auto;
	padding: 40px;

	background: rgba(0,0,0,0.45);
	backdrop-filter: blur(10px);

	border-radius: 20px;

	box-shadow: 0 8px 32px rgba(0,0,0,0.3);

	color: white;
}

.form-container h1{
	margin-bottom: 30px;
	font-weight: bold;
}

.form-control{
	background: rgba(255,255,255,0.12);
	border: 1px solid rgba(255,255,255,0.15);

	color: white;

	padding: 12px;
	border-radius: 10px;
}

.form-control:focus{
	background: rgba(255,255,255,0.18);
	color: white;

	border-color: #0d6efd;

	box-shadow: none;
}

label{
	margin-bottom: 8px;
	font-weight: 500;
}

.btn-success{
	background: #38b26d59;
	border: none;
	color: white;

	padding: 10px 25px;
	border-radius: 10px;
	font-weight: 600;
}

.btn-success:hover{
	background: #4ac983;
}
</style>

<div class="form-container">

<h1>Cadastrar Médico</h1>

<form action="?page=salvar-medico" method="POST">

	<input type="hidden" name="acao" value="cadastrar">

	<div class="mb-3">
		<label>Nome</label>
		<input type="text" name="nome_medico" class="form-control">
	</div>

	<div class="mb-3">
		<label>CRM</label>
		<input type="text" name="crm_medico" class="form-control">
	</div>

	<div class="mb-3">
		<label>Especialidade</label>
		<input type="text" name="especialidade_medico" class="form-control">
	</div>

	<div class="mb-3">
		<button class="btn btn-success" type="submit">
			Salvar
		</button>
	</div>

</form>

</div>




