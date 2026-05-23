<style>
.funcionario-card{
	background: rgba(0,0,0,0.55);
	backdrop-filter: blur(12px);

	padding: 35px;
	border-radius: 25px;

	max-width: 900px;
	margin: 60px auto;

	color: white;

	box-shadow: 0 8px 32px rgba(0,0,0,0.35);
}

.funcionario-card h1{
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
include('config.php');

if (isset($_GET['id_funcionario'])) {

    $id = $_GET['id_funcionario'];

    $sql = "SELECT * FROM funcionarios
            WHERE id_funcionario = $id";

    $res = $conn->query($sql);

    if ($res->num_rows > 0) {

        $row = $res->fetch_object();

    } else {

        echo "<script>
                alert('Funcionário não encontrado.');
              </script>";

        echo "<script>
                location.href='?page=listar-funcionario';
              </script>";

        exit;
    }
}
?>

<div class="funcionario-card">

<h1>Editar Funcionário</h1>

<form action="?page=salvar-funcionario" method="POST">

    <input type="hidden"
    name="acao"
    value="editar">

    <input type="hidden"
    name="id_funcionario"
    value="<?= $row->id_funcionario ?>">

    <div class="mb-3">

        <label class="form-label">Nome</label>

        <input type="text"
        name="nome_funcionario"
        value="<?= $row->nome_funcionario ?>"
        class="form-control"
        required>

    </div>

    <div class="mb-3">

        <label class="form-label">Cargo</label>

        <input type="text"
        name="cargo_funcionario"
        value="<?= $row->cargo_funcionario ?>"
        class="form-control"
        required>

    </div>

    <div class="mb-3">

        <label class="form-label">E-mail</label>

        <input type="email"
        name="email_funcionario"
        value="<?= $row->email_funcionario ?>"
        class="form-control"
        required>

    </div>

    <div class="mb-3">

        <label class="form-label">Telefone</label>

        <input type="text"
        name="telefone_funcionario"
        value="<?= $row->telefone_funcionario ?>"
        class="form-control">

    </div>

    <div class="mb-4">

        <label class="form-label">Status</label>

        <select name="status_funcionario"
        class="form-control">

            <option value="ativo"
            <?= ($row->status_funcionario == 'ativo') ? 'selected' : '' ?>>

            Ativo

            </option>

            <option value="demitido"
            <?= ($row->status_funcionario == 'demitido') ? 'selected' : '' ?>>

            Demitido

            </option>

        </select>

    </div>

    <div class="mb-3">

        <button type="submit"
        class="btn btn-success">

        Salvar Alterações

        </button>

    </div>

</form>

</div>