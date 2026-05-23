<?php
session_start();

if (!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de Controle Clínico</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<style>

         .navbar{
	background: transparent !important;
	backdrop-filter: blur(1px);
	padding: 15px 50x;
	position: fixed;
	top: 0;
	width: 10%;
	z-index: 10;
}

.navbar .nav-link,
.navbar .navbar-brand{
	color: white !important;
	font-weight: 500;
}

.navbar .nav-link:hover{
	color: #0d6dfd67 !important;
	transition: 0.2s;
}

.dropdown-menu{
	background-color: rgba(20, 20, 20, 0.43);
	border: none;
}

.dropdown-item{
	color: white;
}

.dropdown-item:hover{
	background-color: #0d6dfd3f;
	color: white;
}
</style>

	<style>
		body{
	margin: 0;
	padding: 0;
	padding-top: 80px;
	min-height: 100vh;

	background:
		linear-gradient(rgba(0,0,0,0.35), rgba(0,0,0,0.35)),
		url('img/fundo.jpeg');

	background-size: cover;
	background-position: center center;
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-color: #000;
}

		.home-bg{
			min-height: calc(100vh - 56px);
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
		}

		.navbar{
			background-color: rgba(0,0,0,0.85) !important;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top">	  
		<div class="container-fluid">
	    <a class="navbar-brand" href="#">SCC</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
	        </li>

			</li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Médicos
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar</a></li>
	            <li><a class="dropdown-item" href="?page=listar-medico">Listar</a></li>
	          </ul>
	        </li>

	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Pacientes
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar</a></li>
	            <li><a class="dropdown-item" href="?page=listar-paciente">Listar</a></li>
	          </ul>
	        </li>

	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Consultas
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
	            <li><a class="dropdown-item" href="?page=listar-consulta">Listar</a></li>
	          </ul>
	        </li>
	        
			<li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Funcionários
	          </a>
	          <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="?page=cadastrar-funcionario">Cadastrar</a></li>
			  <li><a class="dropdown-item" href="?page=listar-funcionario">Listar</a></li>
	          </ul>
	        </li>

			 <li class="nav-item">
    			<a class="nav-link text-white" href="logout.php">
        		Sair
    			</a>

	      </ul>
	    </div>
	  </div>
	</nav>

	<div class="container-fluid p-0">
		<div class="row mt-3">
			<div class="col">
				<?php
					//conectar ao banco de dados
					include('config.php');
					
					switch (@$_REQUEST['page']) {
						case 'cadastrar-medico':
							include('cadastrar-medico.php');
							break;
						case 'editar-medico':
							include('editar-medico.php');
							break;
						case 'listar-medico':
							include('listar-medico.php');
							break;
						case 'salvar-medico':
							include('salvar-medico.php');
							break;

						case 'cadastrar-paciente':
							include('cadastrar-paciente.php');
							break;
						case 'editar-paciente':
							include('editar-paciente.php');
							break;
						case 'listar-paciente':
							include('listar-paciente.php');
							break;
						case 'salvar-paciente':
							include('salvar-paciente.php');
							break;

						case 'cadastrar-consulta':
							include('cadastrar-consulta.php');
							break;
						case 'editar-consulta':
							include('editar-consulta.php');
							break;
						case 'listar-consulta':
							include('listar-consulta.php');
							break;
						case 'salvar-consulta':
							include('salvar-consulta.php');
							break;
						case 'editar-funcionario':
								include('editar-funcionario.php');
								break;
						case 'cadastrar-funcionario': // Aqui chamamos a página correta
									include('cadastrar-funcionario.php');
									break;
						case 'listar-funcionario':
									include('listar-funcionario.php');
									break;
						case 'salvar-funcionario':
										include('salvar-funcionario.php');
										break;
						default:
							include('home.php');
					}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>
</html>