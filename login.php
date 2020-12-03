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

					if($email == 'gruposol413@gmail.com'){
						// header('Location: admin/index.php');
						header('Location: header.php');
					}
					else{
						header('Location: header.php');
					}
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
   
    <style>
	
		@media screen and (min-width: 1400px){
			.login-form {
				width: 437px !important;
				background: #282828;
				height: 639px !important;
				padding: 50px 40px !important;
				border-radius: 10px;
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translate(-50%,-50%);
			}
			.logbtn {
				display: block;
				width: 100%;
				height: 48px;
				border: none;
				font-size: 14px;
				background: linear-gradient(120deg,#5EC7A7,#3b9e81,#00857B);
				background-size: 200%;
				color: #fff;
				outline: none;
				font-weight: 700;
				cursor: pointer;
				transition: .5s;
				font-family: 'Poppins', sans-serif;
			}

			.bottom-text-login {
				/* margin-top: 60px; */
				background-color: #4fb697;
				text-align: center;
				line-height: 50px;
				color: white !important;
				transition: .5s;
				font-weight: 700;
				font-size: 14px;
				height: 50px;
				font-family: 'Poppins', sans-serif;
			}

			.bottom-text-login:hover {
			
				line-height: 50px;
				font-size: 14px;
				font-family: 'Poppins', sans-serif;
			}

			.fsenha a {
				color: #5EC7A7;
				font-family: 'Poppins', sans-serif;
				font-size: 13px;
				line-height: 40px;
				font-weight: 700;
			}

			.bottom-text {
				/* margin-top: 60px; */
				text-align: left;
				line-height: 40px;
				color: white;
				font-size: 15px;
				font-family: 'Josefin Sans', sans-serif;
			}

			.txtb input {
				font-size: 16px;
			}
		}
	</style>
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