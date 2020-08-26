<?php

	// conexao
    // require_once '../conexao.inc';
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "jacidb";
	
	$conexao = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conexao, $db_name);
	
	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	endif;
	// include 'conexao.inc';
	
	// Sessão
    session_start();
    
    // Verificação
    if(!isset($_SESSION['logado'])){
        header('Location: index.php');
    }

    // Dados
    
    $id = $_SESSION['ID'];
    $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
    $res = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($res);

    mysqli_close($conexao);
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Página restrita</title>
	</head>
	
	<body>
    <h1> Olá <?php echo $dados['Nome']; ?></h1>

    <a href="logout.php">Sair</a>
	</body>
			
</html>