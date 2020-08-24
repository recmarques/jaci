<?php

	// conexao
	require_once '../conexao.inc';
	// include 'conexao.inc';
	
	// Sessão
    session_start();
    
    // Verificação
    if(!isset($_SESSION['logado'])){
        header('Location: index.php');
    }

    // Dados
    $cod = $_SESSION['cod_usuario'];
    $sql = "SELECT * FROM tb_cadastro WHERE cod = '$cod'";
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
    <h1> Olá <?php echo $dados['nome']; ?></h1>

    <a href="logout.php">Sair</a>
	</body>
			
</html>