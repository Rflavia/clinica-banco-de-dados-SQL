<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['acao'])) {
    $acao = isset($_POST['acao']) ? $_POST['acao'] : $_GET['acao'];

    if ($acao == 'cadastrar') {
        $nome = $_POST['nome_funcionario'];
        $cargo = $_POST['cargo_funcionario'];
        $email = $_POST['email_funcionario'];
        $telefone = $_POST['telefone_funcionario'];
        $status = 'ativo';

        $sql = "INSERT INTO funcionarios (nome_funcionario, cargo_funcionario, email_funcionario, telefone_funcionario, status_funcionario)
                VALUES ('$nome', '$cargo', '$email', '$telefone', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Funcionário cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar funcionário: " . $conn->error . "');</script>";
        }
    }

    if ($acao == 'editar') {
        $id = $_POST['id_funcionario'];
        $nome = $_POST['nome_funcionario'];
        $cargo = $_POST['cargo_funcionario'];
        $email = $_POST['email_funcionario'];
        $telefone = $_POST['telefone_funcionario'];
        $status = $_POST['status_funcionario'];

        $sql = "UPDATE funcionarios SET 
                nome_funcionario = '$nome', 
                cargo_funcionario = '$cargo', 
                email_funcionario = '$email', 
                telefone_funcionario = '$telefone', 
                status_funcionario = '$status' 
                WHERE id_funcionario = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Funcionário atualizado com sucesso!');</script>";
            echo "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar funcionário: " . $conn->error . "');</script>";
        }
    }

    if ($acao == 'excluir') {
        $id = $_GET['id_funcionario'];

        $sql = "DELETE FROM funcionarios WHERE id_funcionario = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Funcionário excluído com sucesso!');</script>";
            echo "<script>location.href='?page=listar-funcionario';</script>";
        } else {
            echo "<script>alert('Erro ao excluir funcionário: " . $conn->error . "');</script>";
        }
    }
}
?>
