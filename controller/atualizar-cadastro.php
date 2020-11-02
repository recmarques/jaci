<?php

   // conexao
  // require_once '../conexao.inc';
  $servername = "us-cdbr-east-02.cleardb.com";
  $username = "b0394718678768";
  $password = "33161d76";
  $db_name = "heroku_390caed3836a8d5";
    
  $conexao = mysqli_connect($servername, $username, $password);
  mysqli_select_db($conexao, $db_name);

  mysqli_set_charset($conexao, "utf8");
  
	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	endif;
	// include 'conexao.inc';
	
	// Sessão
  session_start();
    
  // Verificação
  if(!isset($_SESSION['logado'])){
      header('Location: ../login.php');
  }
  else{

        // Dados
        $id = $_SESSION['ID'];
        $ID_Usuario = $_SESSION['ID'];
        $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
        $res = mysqli_query($conexao, $sql);

        $dados = mysqli_fetch_array($res);
      

        $Nome = $_POST["nome"];
        $Email = $_POST["email"];
        $Curso = $_POST["curso"];
        $SenhaAntiga = $_POST["senha"];
        $SenhaNova = $_POST["senha2"];

        $ID_Usuario = $_GET['IDUsuario'];

        $sql = "SELECT * FROM tb_cadastros WHERE ID = $ID_Usuario AND Senha = '$SenhaAntiga'";
        $res = mysqli_query($conexao, $sql);
        $linhas = mysqli_affected_rows($conexao);

        if($linhas == 1){

        if(empty($SenhaNova)){

        $sql = "UPDATE tb_cadastros SET
        Nome = '$Nome', Email = '$Email', Curso = '$Curso', Senha = $SenhaAntiga
        WHERE ID = $ID_Usuario";
          
        }
        else{

        $sql = "UPDATE tb_cadastros SET
        Nome = '$Nome', Email = '$Email', Curso = '$Curso', Senha = $SenhaNova
        WHERE ID = $ID_Usuario";

        }
        $res = mysqli_query($conexao, $sql);

        $linhas = mysqli_affected_rows($conexao);

            if($linhas == 1){
                $mensagem = "Atualização feita com sucesso!";
            }
            else{
                $mensagem = "Falha na atualização do cadastro!";
            }
        }
        else{
          $mensagem = "Senha não bate com o cadastro do usuário!";
        }
    }


?>


<!DOCTYPE html>

  <html lang="en" dir="ltr">
    <head>
     
      <title><?php echo $mensagem; ?> | JACI</title>

      <link rel="icon" href="../img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-atualizar-conta.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   
  </head>
    <body>

      <nav>
        <div class="logo">
          <a href="./../header.php">
            <img src="../img/logo-black.png" alt="logo jaci"/>
          </a>
        </div>

      <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>

      <ul>
        <li><a href="../header.php">INÍCIO</a></li>
        <li><a href="./../projetos.php">PROJETOS</a></li>
        <li><a href="./../criar-projeto.php">CRIAR PROJETO</a></li>
        <!-- <li><a href="#">Feedback</a></li> -->
        <?php 
          if(isset($_SESSION['logado'])){
            echo "<li><a class=not-activate href=../meu-perfil.php>MEU PERFIL</a></li>";
            echo "<li><a class=not-activate style=display:none href=../login.php>ENTRAR</a></li>";
          }
          else{
            echo "<li><a class=not-activate href=../login.php>ENTRAR</a></li>";
          }

          if(isset($_SESSION['logado'])){
            echo "<li><a class=not-activate href=../logout.php>SAIR</a></li>";
          }
          else{
            echo "<li><a class=not-activate style=display:none href=../logout.php>SAIR</a></li>";
          }

        ?>

      </ul>
    </nav>
  
  <div class="form">
    <div class="titulo">
      <p> 
      <?php
        if($mensagem == 'Falha na atualização do cadastro!'){
          // echo $vcod."".$vtitulo."".$vdescricao;
          echo "Falha na <strong>atualização do cadastro!</strong>";   
        }
        elseif ($mensagem == 'Senha não bate com o cadastro do usuário!'){
          echo "Falha na <strong>atualização do cadastro!</strong>";
      }
        else{
          echo "Atualização feita <strong>com sucesso!</strong>";
        }
      ?>
      </p>

    </div>

    <div class="form-cadastro mensagem">
        <?php
        if($mensagem == 'Falha na atualização do cadastro!'){
            
          echo "Infelizmente não foi possível atualizar seu cadastro! Tente novamente!";
          }
          elseif ($mensagem == 'Senha não bate com o cadastro do usuário!'){
              echo "Tente novamente mais tarde!";
          }
          else{
            echo "Seus dados foram atualizados<br />com sucesso! Você pode verificá-los<br />na página do seu perfil"; 
          }
        ?>

        <?php
          if($mensagem == 'Falha na atualização do projeto!' || $mensagem == 'Senha não bate com o cadastro do usuário!'){ ?>
            <a href="./../meu-perfil.php">
              <button class="button button1">TENTAR NOVAMENTE</button>
            </a>
          <?php
            }
            else{
          ?>
            <a href="./../meu-perfil.php">
              <button class="button-projeto button button1-projeto button1">MEU PERFIL</button>
            </a>
          <?php
              }
          ?>   
          <!-- </a> -->
      </div>
    </div>

  </body>
</html>
<?php

mysqli_close($conexao);

?>
