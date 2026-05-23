<style>
.paciente-card{
	background: rgba(0,0,0,0.55);
	backdrop-filter: blur(12px);

	padding: 35px;
	border-radius: 25px;

	max-width: 900px;
	margin: 60px auto;

	color: white;

	box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

.paciente-card h1{
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

.radio-group{
	display: flex;
	gap: 25px;
	margin-top: 10px;
}

.radio-group label{
	display: flex;
	align-items: center;
	gap: 8px;

	font-size: 16px;
	color: rgba(255,255,255,0.9);
}

.radio-group input[type="radio"]{
	accent-color: #4ac983;
	transform: scale(1.2);
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

<div class="paciente-card">

<h1>Cadastrar Paciente</h1>

<form action="?page=salvar-paciente" method="POST">

	<input type="hidden" name="acao" value="cadastrar">

	<div class="mb-3">
		<label class="form-label">Nome</label>

		<input type="text"
		name="nome_paciente"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">E-mail</label>

		<input type="email"
		name="email_paciente"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">Fone</label>

		<input type="text"
		name="fone_paciente"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">Endereço</label>

		<input type="text"
		name="endereco_paciente"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">CPF</label>

		<input type="text"
		name="cpf_paciente"
		class="form-control">
	</div>

	<div class="mb-3">
		<label class="form-label">Data de Nascimento</label>

		<input type="date"
		name="dt_nasc_paciente"
		class="form-control">
	</div>

	<div class="mb-4">

		<label class="form-label">Sexo</label>

		<div class="radio-group">

			<label>
				<input type="radio"
				name="sexo_paciente"
				value="m">

				Masculino
			</label>

			<label>
				<input type="radio"
				name="sexo_paciente"
				value="f">

				Feminino
			</label>

		</div>

	</div>

	<div class="mb-3">

		<button type="submit"
		class="btn btn-success">

		Salvar

		</button>

	</div>

</form>

</div>