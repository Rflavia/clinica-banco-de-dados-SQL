<style>
.list-container{
	max-width: 1200px;
	margin: 40px auto;
	padding: 35px;

	background: rgba(0,0,0,0.45);
	backdrop-filter: blur(10px);

	border-radius: 20px;

	box-shadow: 0 8px 32px rgba(0,0,0,0.3);

	color: white;
}

.list-container h1{
	margin-bottom: 20px;
	font-weight: bold;
}

.table{
	color: white;
	margin-top: 20px;
	border-radius: 15px;
	overflow: hidden;
}

.table th{
	background: rgba(255,255,255,0.12);
	color: white;
	border: none;
	padding: 15px;
}

.table td{
	background: rgba(255,255,255,0.12);
	border: none;
	padding: 15px;
	vertical-align: middle;

	color: white;
	font-weight: 500;
}

.table tr:hover td{
	background: rgba(255,255,255,0.18);
	transition: 0.3s;
}

.btn{
	border-radius: 10px;
	padding: 8px 16px;
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

.btn-danger{
	background: #ff5c6f4f;
	border: none;
	color: white;
}

.btn-danger:hover{
	background: #ff7687;
}

.info-text{
	font-size: 18px;
	margin-bottom: 15px;
}
</style>

<div class="list-container">

<h1>Listar Médico</h1>

<?php
	$sql = "SELECT * FROM medico";

	$res = $conn->query($sql);

	$qtd = $res->num_rows;

	if($qtd > 0){

		print "<p class='info-text'>
				Encontrou <b>$qtd</b> resultado(s)
			   </p>";

		print "<table class='table'>";

		print "<tr>";
		print "<th>#</th>";
		print "<th>Nome</th>";
		print "<th>CRM</th>";
		print "<th>Especialidade</th>";
		print "<th width='220'>Ações</th>";
		print "</tr>";

		while($row = $res->fetch_object()){

			print "<tr>";

			print "<td>".$row->id_medico."</td>";

			print "<td>".$row->nome_medico."</td>";

			print "<td>".$row->crm_medico."</td>";

			print "<td>".$row->especialidade_medico."</td>";

			print "<td>

				<button class='btn btn-success'
				onclick=\"location.href='?page=editar-medico&id_medico=".$row->id_medico."';\">

				Editar

				</button>

				<button class='btn btn-danger'

				onclick=\"if(confirm('Tem certeza que deseja excluir?')){

				location.href='?page=salvar-medico&acao=excluir&id_medico=".$row->id_medico."';

				}else{false;}\">

				Excluir

				</button>

			</td>";

			print "</tr>";
		}

		print "</table>";

	}else{

		print "<div class='alert alert-light'>
				Não encontrou resultado.
			   </div>";
	}
?>

</div>