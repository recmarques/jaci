<?php
	
	// testar criptografia https://www.youtube.com/watch?v=dVTwNJ9kR2g&list=PLwXQLZ3FdTVEITn849NlfI9BGY-hk1wkq&index=41


	// conexao
	require_once '../conexao.inc';
	// include 'conexao.inc';
	
	// sessão
	session_start();
	$resultado;
	$sql;
	
	// Botão enviar
	if(isset($_POST['btn-entrar'])):
		$erros = array();
		$login = mysqli_escape_string($conexao, $_POST['login']);
		$senha = mysqli_escape_string($conexao, $_POST['senha']);
		
		if(empty($login) or empty($senha)){
			$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
		}
		else{
			
			$sql = "SELECT username FROM tb_cadastro WHERE username = '$login'";
			$resultado = mysqli_query($conexao, $sql);
			
			if(mysqli_num_rows($resultado) > 0){
				
				$sql = "SELECT * FROM tb_cadastro WHERE username = '$login' AND senha = '$senha'";
				$resultado = mysqli_query($conexao, $sql);

				if(mysqli_num_rows($resultado) == 1){
					$dados = mysqli_fetch_array($resultado);
					mysqli_close($conexao);
					$_SESSION['logado'] = true;
					$_SESSION['cod_usuario'] = $dados['cod'];
					header('Location: home.php');
				}
				else{
					$erros[] = "<li> Usuário e senha não conferem! </li>";
				}
			}
			else{
				
				$erros[] = "<li> Usuário inexistente! </li>";
			}
			
		}
		
	endif;

?>


<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	</head>
	
	<body>
	
	<h1> Login </h1>
	<?php
	
	if(!empty($erros)){
		foreach($erros as $erro){
			echo $erro;
		}
	}
	
	?>
	
	<hr />
		<form method="post" action="
			<?php
			echo $_SERVER['PHP_SELF'];
			?>"
		>
		
			<label>Login:</label><br />
			<input type="text" name="login" id="login" size="40" maxlength="30" /><br /><br />
			
			<label>Senha:</label><br />
			<input type="password" name="senha" id="senha" size="60" maxlength="50" /><br /><br />
			
			<button type="submit" name="btn-entrar">Entrar</button>
		
		</form>
		
	</body>
			
</html>