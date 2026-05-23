<style>
.funcionario-list-card{
	background: rgba(0,0,0,0.55);
	backdrop-filter: blur(12px);

	padding: 35px;
	border-radius: 25px;

	max-width: 1500px;
	margin: 60px auto;

	color: white;

	box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

.funcionario-list-card h1{
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

.status-badge{
	padding: 8px 14px;
	border-radius: 20px;
	font-size: 14px;
	font-weight: 600;
	display: inline-block;
}

.status-ativo{
	background: rgba(56,178,109,0.25);
	color: #7dffb0;
}

.status-demitido{
	background: rgba(255,92,111,0.20);
	color: #ff9cab;
}
</style>

<div class="funcionario-list-card">

<h1>Listar Funcionários</h1>

<?php

$sql = "SELECT * FROM funcionarios";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {

    print "<p class='info-text'>
            Encontrou <b>$qtd</b> resultado(s)
           </p>";

    print "<table class='table'>";

    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>Cargo</th>";
    print "<th>E-mail</th>";
    print "<th>Telefone</th>";
    print "<th>Status</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {

        $statusClasse =
        ($row->status_funcionario == 'ativo')
        ? 'status-ativo'
        : 'status-demitido';

        print "<tr>";

        print "<td>" . $row->id_funcionario . "</td>";

        print "<td>" . $row->nome_funcionario . "</td>";

        print "<td>" . $row->cargo_funcionario . "</td>";

        print "<td>" . $row->email_funcionario . "</td>";

        print "<td>" . $row->telefone_funcionario . "</td>";

        print "<td>
                <span class='status-badge $statusClasse'>
                    " . ucfirst($row->status_funcionario) . "
                </span>
               </td>";

        print "<td>

                <button class='btn btn-success'
                onclick=\"location.href='?page=editar-funcionario&id_funcionario=" . $row->id_funcionario . "';\">

                Editar

                </button>

                <button class='btn btn-danger'
                onclick=\"if(confirm('Tem certeza que deseja excluir?')){

                location.href='?page=salvar-funcionario&acao=excluir&id_funcionario=" . $row->id_funcionario . "';

                }\">

                Excluir

                </button>

               </td>";

        print "</tr>";
    }

    print "</table>";

} else {

    print "<p class='info-text'>
            Não há funcionários cadastrados.
           </p>";
}
?>

</div>