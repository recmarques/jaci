<?php
	
	// testar criptografia https://www.youtube.com/watch?v=dVTwNJ9kR2g&list=PLwXQLZ3FdTVEITn849NlfI9BGY-hk1wkq&index=41

	// conexao
	// require_once '../conexao.inc';
	
	$servername = "us-cdbr-east-02.cleardb.com";
        $username = "b0394718678768";
        $password = "33161d76";
        $db_name = "heroku_390caed3836a8d5";
    
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
			$erros[] = "O campo e-mail/senha precisa ser preenchido";
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
					header('Location: header.php');
				}
				else{
					$erros[] = "E-mail e senha não conferem!";
				}
			}
			else{
				
				$erros[] = "E-mail inexistente!";
			}
			
		}
		
	endif;

?>


<!DOCTYPE html>
  <html>
    <head>

      <meta charset="utf-8">
      <title>Login | JACI</title>
      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-login.css">
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
     
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    </head>

    <body>
      
      <form method="post" class="login-form" action="
			<?php
			echo $_SERVER['PHP_SELF'];
			?>"> 
      
            <img src="img/jaci.png" class="no-show-mobile" alt="logo"/>
            <img src="img/logo-black.png" class="no-show-desktop" alt="logo jaci"/>
            <br /><p class="login">Faça seu login</p>
     
            <div class="txtb">
                <input type="text" placeholder="Email" name="email" id="email" size="40" maxlength="30" required>
                <span data-placeholdr="Email"></span>
            </div>

            <div class="txtb">
                <input type="password" placeholder="Senha" id="senha" name="senha" required>
                <span data-placeholdr="Password"></span>
            </div>


            <p class="aviso">
            <?php
            
            if(!empty($erros)){
              foreach($erros as $erro){
                echo $erro;
              }
            }
            
            ?>
            </p>

            <p class="fsenha"><a href="senha.php">Esqueci minha senha</a></p>
            <input type="submit" class="logbtn" value="Entrar" name="btn-entrar">

            <div class="bottom-text">
                Não tem uma conta? <a href="cadastro.php">Registre-se</a>
            </div>
            <hr /><br />
            <a href="header.php">
            <div class="bottom-text-login">
             Acesse sem login
          </div></a>
      </form> 
      
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    </body>
  </html>
