<style>
.consulta-list-card{
	background: rgba(0,0,0,0.55);
	backdrop-filter: blur(12px);

	padding: 35px;
	border-radius: 25px;

	max-width: 1400px;
	margin: 60px auto;

	color: white;

	box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

.consulta-list-card h1{
	font-size: 50px;
	font-weight: bold;
	margin-bottom: 20px;
}

.info-text{
	font-size: 18px;
	margin-bottom: 20px;
	color: rgba(255,255,255,0.85);
}

.table{
	color: white;
	border-collapse: separate;
	border-spacing: 0 10px;
}

.table th{
	background: rgba(255,255,255,0.10);

	padding: 18px;
	border: none;

	font-weight: 600;
	color: white;
}

.table th:first-child{
	border-top-left-radius: 15px;
	border-bottom-left-radius: 15px;
}

.table th:last-child{
	border-top-right-radius: 15px;
	border-bottom-right-radius: 15px;
}

.table td{
	background: rgba(255,255,255,0.12);

	border: none;
	padding: 18px;

	vertical-align: middle;

	color: white;
	font-weight: 500;
}

.table td:first-child{
	border-top-left-radius: 15px;
	border-bottom-left-radius: 15px;
}

.table td:last-child{
	border-top-right-radius: 15px;
	border-bottom-right-radius: 15px;
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
</style>

<div class="consulta-list-card">

<h1>Listar Consulta</h1>

<?php
	$sql = "SELECT * FROM consulta AS c
			INNER JOIN paciente AS p
			ON p.id_paciente = c.paciente_id_paciente
			INNER JOIN medico AS m
			ON m.id_medico = c.medico_id_medico";

	$res = $conn->query($sql);

	$qtd = $res->num_rows;

	if($qtd > 0){

		print "<p class='info-text'>Encontrou <b>$qtd</b> resultado(s)</p>";

		print "<table class='table'>";

		print "<tr>";
		print "<th>#</th>";
		print "<th>Paciente</th>";
		print "<th>Médico</th>";
		print "<th>Data</th>";
		print "<th>Hora</th>";
		print "<th>Descrição</th>";
		print "<th>Ações</th>";
		print "</tr>";

		while($row = $res->fetch_object()){

			print "<tr>";

			print "<td>".$row->id_consulta."</td>";
			print "<td>".$row->nome_paciente."</td>";
			print "<td>".$row->nome_medico."</td>";
			print "<td>".$row->data_consulta."</td>";
			print "<td>".$row->hora_consulta."</td>";
			print "<td>".$row->descricao_consulta."</td>";

			print "<td>

					<button class='btn btn-success'
					onclick=\"location.href='?page=editar-consulta&id_consulta=".$row->id_consulta."';\">

					Editar

					</button>

					<button class='btn btn-danger'
					onclick=\"if(confirm('Tem certeza que deseja excluir?')){

					location.href='?page=salvar-consulta&acao=excluir&id_consulta=".$row->id_consulta."';

					}else{false;}\">

					Excluir

					</button>

			       </td>";

			print "</tr>";
		}

		print "</table>";

	}else{

		print "<p class='info-text'>Não encontrou resultado</p>";
	}
?>

</div>