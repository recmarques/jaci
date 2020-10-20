<?php

	// conexao
  // require_once '../conexao.inc';
  $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "jacidb";
	
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
    header('Location: login.php');
  }else{

    // Dados
    $ID_Usuario = $_SESSION['ID'];
    $sql = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario'";
    $res = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($res);

    
    $_SESSION['ID'] = $dados['ID'];
  }

    $ID_Usuario = $_GET['ID'];

    $sql1 = "SELECT * FROM tb_cadastros WHERE ID='$ID_Usuario'";
    $res1 = mysqli_query($conexao, $sql1);


    while($vreg = mysqli_fetch_row($res1)){

      $Nome = $vreg[1];
      $Email = $vreg[2];
      $Curso = $vreg[3];
      $Senha = $vreg[4];
      
  }
      // $_SESSION['ID_Projeto'] = $ID_Projeto;
      // $_SESSION['Titulo'] = $Titulo;
      // $_SESSION['Descricao'] = $Descricao;
      // $_SESSION['Palavras'] = $Palavras;
      // $_SESSION['Ano'] = $Ano;
      // $_SESSION['Palavras'] = $Palavras;
      // $_SESSION['Materia'] = $Materia;
      // $_SESSION['Categoria'] = $Categoria;
      // $_SESSION['Conhecimento'] = $Conhecimento;
      // $_SESSION['Texto'] = $Texto;
      // $_SESSION['ID_Usuario_Projeto'] = $ID_Usuario_Projeto;
  
      // $_SESSION['Nome'] = $Nome;
      // $_SESSION['Curso'] = $Curso;

?>



<!DOCTYPE html>

  <html lang="en" dir="ltr">
    <head>
      
      <title>Editar projeto | JACI</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link rel="stylesheet" href="css/style-editar-cadastro.css"> 
      <link rel="icon" href="../img/favicon.png" type="image/png" />
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    
  </head>
  <body>
    <nav>
      <div class="logo">
        <a href="header.php">
        <img src="../img/logo-black.png" alt="logo"/></a>
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

<?php

if($_SESSION['ID'] == $ID_Usuario){

?>
  <div class="form">
    <div class="titulo"><p> 
    EDITAR <strong>MEUS DADOS</strong></p>
      <div class="descricao">
          Preencha os campos a seguir para editar seus dados!
      </div>
    </div>

    <div class="form-cadastro">
      <form method="post" class="login-form" action="atualizar-cadastro.php?IDUsuario=<?php echo $ID_Usuario;?>"> 
      
      <div class="txtb">
				<input type="text" placeholder="Nome" name="nome" id="nome" minlength="5" maxlength="40" value="<?php echo $Nome; ?>" required>
				<span data-placeholdr="Nome"></span>
			</div>

			<div class="txtb">
				<input type="text" placeholder="E-mail" name="email" id="email"minlength="5"  maxlength="40" value="<?php echo $Email; ?>" required>
				<span data-placeholdr="Email"></span>
			</div>

			<div class="txtb">
				<input type="text" placeholder="Curso" name="curso" id="curso" minlength="2" maxlength="15" value="<?php echo $Curso; ?>" required>
				<span data-placeholdr="Curso"></span>
			</div>

			<div class="txtb">
				<input type="password" placeholder="Senha" name="senha" id="senha" minlength="6" maxlength="15" required>
				<span data-placeholdr="Password"></span>
			</div>

			<div class="txtb">
				<input type="password" placeholder="Nova senha" name="senha2" id="senha2" minlength="6" maxlength="15">
				<span data-placeholdr="Password-confirm"></span>
			</div>

           

      <input type="submit" class="logbtn" value="ATUALIZAR CADASTRO" name="btn-entrar"><br />
            
        
      </form> 
      </div>

    </div>
    
    <?php
      }
      else{
      ?>


<div class="form-sempermissao">
    <div class="titulo"><p> 
    VOCÊ <strong>NÃO TEM PERMISSÃO PARA ACESSAR ESSA PÁGINA :(</strong></p>
    </div>
      <div class="descricao">
          Esses dados pertencem a outra pessoa, logo você não pode editá-los.<br /><br />Caso tenha
          ocorrido um erro - e esse cadastro é seu, mas não consegue acessá-lo -, nos mande um e-mail: <a href="mailto:gruposol413@gmail.com" target="_blank">gruposol413@gmail.com</a>.
      </div>
    </div>

    </div>

      <?php
      }
      ?>

<script>
  const slideValue = document.querySelector(".sliderValue-span");
  const inputSlider = document.querySelector(".input-value");

  inputSlider.oninput = (()=>{
    let value = inputSlider.value;
    slideValue.textContent = value;
    slideValue.style.left = (value/2) + "%";
    slideValue.classList.add("show");
  });

  inputSlider.onblur = (()=>{
    slideValue.classList.remove("show");
  });

</script>

</body>
</html>

<?php

mysqli_close($conexao);

?>
