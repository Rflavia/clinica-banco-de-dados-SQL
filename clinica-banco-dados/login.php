<?php
session_start();

if(isset($_POST['usuario']) && isset($_POST['senha'])){

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if($usuario == "admin" && $senha == "123456"){

        $_SESSION['logado'] = true;

        header("Location: index.php");
        exit;

    }else{
        $erro = "Usuário ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - SCC</title>

<link rel="stylesheet" href="css/bootstrap.min.css">

<style>

body{
	margin: 0;
	padding: 0;

	height: 100vh;

	background-image:
	linear-gradient(
		rgba(0,0,0,0.55),
		rgba(0,0,0,0.65)
	),
	url('img/inicio.jpg');

	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;

	display: flex;
	justify-content: center;
	align-items: center;

	font-family: Arial, sans-serif;

	overflow: hidden;
}

.login-container{

	width: 400px;

	padding: 40px;

	border-radius: 30px;

	background: rgba(255,255,255,0.07);

	backdrop-filter: blur(18px);

	border: 1px solid rgba(255,255,255,0.10);

	box-shadow:
	0 20px 70px rgba(0,0,0,0.75);

	color: white;

	position: relative;
	z-index: 2;
}

.login-icon{

	width: 50px;
	height: 50px;

	border-radius: 50%;

	margin: 0 auto 20px auto;

	border: 2px solid rgba(255,255,255,0.25);
}

.login-container h1{

	font-size: 32px;

	font-weight: bold;

	text-align: center;

	margin-bottom: 10px;
}

.login-subtitle{

	text-align: center;

	font-size: 14px;

	color: rgba(255,255,255,0.55);

	margin-bottom: 30px;
}

.form-control{

	background: rgba(255,255,255,0.10);

	border: 1px solid rgba(255,255,255,0.08);

	color: white;

	padding: 14px;

	border-radius: 14px;

	font-size: 14px;
}

.form-control:focus{

	background: rgba(255,255,255,0.14);

	border-color: rgba(255,255,255,0.20);

	color: white;

	box-shadow: none;
}

.form-control::placeholder{
	color: rgba(255,255,255,0.45);
}

.btn-login{

	width: 100%;

	padding: 14px;

	border: none;

	border-radius: 14px;

	background: rgba(255,255,255,0.95);

	color: #111;

	font-weight: bold;

	transition: 0.3s;
}

.btn-login:hover{

	background: white;

	transform: translateY(-2px);
}

.erro{

	background: rgba(255,92,111,0.22);

	padding: 12px;

	border-radius: 12px;

	margin-bottom: 20px;

	text-align: center;

	color: white;
}

</style>

</head>

<body>

<div class="login-container">

	<div class="login-icon"></div>

	<h1>SCC</h1>

	<div class="login-subtitle">
		Sistema de Controle Clínico
	</div>

	<?php
	if(isset($erro)){
		print "<div class='erro'>$erro</div>";
	}
	?>

	<form method="POST">

		<div class="mb-3">

			<input
				type="text"
				name="usuario"
				class="form-control"
				placeholder="Usuário"
				required
			>

		</div>

		<div class="mb-4">

			<input
				type="password"
				name="senha"
				class="form-control"
				placeholder="Senha"
				required
			>

		</div>

		<button class="btn-login" type="submit">
			Entrar
		</button>

	</form>

</div>

</body>
</html>