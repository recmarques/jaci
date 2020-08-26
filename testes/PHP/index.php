<?php
	
	// testar criptografia https://www.youtube.com/watch?v=dVTwNJ9kR2g&list=PLwXQLZ3FdTVEITn849NlfI9BGY-hk1wkq&index=41


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
	
	// sessão
	session_start();
	$resultado;
	$sql;
	$dados;
	
	// Botão enviar
	if(isset($_POST['btn-entrar'])):
		$erros = array();
		$email = mysqli_escape_string($conexao, $_POST['email']);
		$senha = mysqli_escape_string($conexao, $_POST['senha']);
		
		if(empty($email) or empty($senha)){
			$erros[] = "<li> O campo e-mail/senha precisa ser preenchido </li>";
		}
		else{
			
			$sql = "SELECT Email FROM tb_cadastros WHERE Email = '$email'";
			$resultado = mysqli_query($conexao, $sql);
			
			if(mysqli_num_rows($resultado) > 0){
				
				$sql = "SELECT * FROM tb_cadastros WHERE Email = '$email' AND Senha = '$senha'";
				$resultado = mysqli_query($conexao, $sql);

				if(mysqli_num_rows($resultado) == 1){
					
					$dados = mysqli_fetch_array($resultado);
					mysqli_close($conexao);
					$_SESSION['logado'] = true;
					
					$_SESSION['ID'] = $dados['ID'];
					header('Location: home.php');
				}
				else{
					$erros[] = "<li> E-mail e senha não conferem! </li>";
				}
			}
			else{
				
				$erros[] = "<li> E-mail inexistente! </li>";
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

	<hr />
		<form method="post" action="
			<?php
			echo $_SERVER['PHP_SELF'];
			?>"
		>
		
			<label>Login:</label><br />
			<input type="text" name="email" id="email" size="40" maxlength="30" /><br /><br />
			
			<label>Senha:</label><br />
			<input type="password" name="senha" id="senha" size="60" maxlength="50" /><br /><br />
			
			<?php
	
			if(!empty($erros)){
				foreach($erros as $erro){
					echo $erro;
				}
			}
			
			?>
	
			<button type="submit" name="btn-entrar">Entrar</button>
		
		</form>
		
	</body>
			
</html>