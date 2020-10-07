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
  }
  else{

    // Dados
    $id = $_SESSION['ID'];
    $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
    $res = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($res);
    
  }


  $ID_Projeto = $_GET['ID'];

    $sql1 = "SELECT * FROM tb_projetos WHERE ID='$ID_Projeto'";
    $res1 = mysqli_query($conexao, $sql1);


    while($vreg = mysqli_fetch_row($res1)){

      $Titulo = $vreg[1];
      $Descricao = $vreg[2];
      $Palavras = $vreg[3];
      $Ano = $vreg[4];
      $Materia = $vreg[5];
      $Categoria = $vreg[6];
      $Conhecimento = $vreg[7];
      $Texto = $vreg[8];
      $ID_Usuario_Projeto = $vreg[9];

      $sql2 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto'";
      $res2 = mysqli_query($conexao, $sql2);
      $vreg1;
  
      while($vreg1 = mysqli_fetch_row($res2)){
          $ID_Usuario = $vreg1[0];
          $Nome = $vreg1[1];
          $Email = $vreg1[2];
          $Curso = $vreg1[3];
      }
  }
      $_SESSION['ID_Projeto'] = $ID_Projeto;
      $_SESSION['Titulo'] = $Titulo;
      $_SESSION['Descricao'] = $Descricao;
      $_SESSION['Palavras'] = $Palavras;
      $_SESSION['Ano'] = $Ano;
      $_SESSION['Palavras'] = $Palavras;
      $_SESSION['Materia'] = $Materia;
      $_SESSION['Categoria'] = $Categoria;
      $_SESSION['Conhecimento'] = $Conhecimento;
      $_SESSION['Texto'] = $Texto;
      $_SESSION['ID_Usuario_Projeto'] = $ID_Usuario_Projeto;
  
      $_SESSION['Nome'] = $Nome;
      $_SESSION['Curso'] = $Curso;

?>


  <!DOCTYPE html>

  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <title>Denunciar projeto | JACI</title>

      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/style-denuncia.css">

      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    
</head>

  <body>

    <nav>
      <div class="logo">
        <a href="header.php">
          <img src="img/logo-black.png" alt="logo"/>
        </a>
      </div>

    <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>

    <ul>
      <li><a href="header.php">INÍCIO</a></li>
      <li><a href="projetos.php">PROJETOS</a></li>
      <li><a href="criar-projeto.php">CRIAR PROJETO</a></li>

      <?php 
        if(isset($_SESSION['logado'])){
            echo "<li><a class=not-activate href=meu-perfil.php>MEU PERFIL</a></li>";
            echo "<li><a class=not-activate style=display:none href=login.php>ENTRAR</a></li>";
        }
        else{
            echo "<li><a class=not-activate href=login.php>ENTRAR</a></li>";
        }

        if(isset($_SESSION['logado'])){
            echo "<li><a class=not-activate href=logout.php>SAIR</a></li>";
        }
        else{
            echo "<li><a class=not-activate style=display:none href=logout.php>SAIR</a></li>";
        }
      ?>

    </ul>
  </nav>

<?php
if(!($ID_Usuario_Projeto == $_SESSION["ID"])){
?>
  <div class="form">
    <div class="titulo">
      <p> 
      DENUNCIAR <strong>ESTE PROJETO</strong>
      </p>

      <div class="descricao">
          Preencha os campos a seguir para adicionar uma denúncia deste projeto para que
          nossa equipe avalie!
      </div>
    </div>

    <div class="form-cadastro">
      <form method="post" class="login-form" action="controller/denunciar-projeto.php?ID_Projeto=<?php echo $ID_Projeto;?>"> 
      
      <div class="titulo-autor-projeto">
        <?php echo $Titulo; ?>
        <div class="autor-projeto">
        POR <?php echo $Nome; ?>
        </div>
      </div>
        
                
            <div class="txtb">
              <textarea style="height:150px !important" id="comentarios" name="comentarios" rows="6" cols="50" minlength="5" maxlength="8000" size="8000" placeholder="Comentários"></textarea>
            </div>
            
            <div class="txtb">
            <select name="categoria" id="categoria" required>
              <option value="" class="disable-select" disabled selected>Categoria</option>

                
                  <option name="categoria" id="categoria" value="Informações falsas">Informações falsas</option>
                  <option name="categoria" id="categoria" value="Impróprio">Impróprio</option>
                  <option name="categoria" id="categoria" value="Conteúdo ofensivo">Conteúdo ofensivo</option>
                  <option name="categoria" id="categoria" value="Outro">Outro</option>
                
              </select>
            </div>

            <br /><br />
              <input type="submit" class="logbtn" value="ENVIAR DENÚNCIA" name="btn-entrar">
            <br />
            
      </form> 
    </div>
  </div>
<?php
}
else{?>
<div class="form" style="height: 550px !important;">
        <div class="titulo" style="line-height: 56px;"><p> 
        Você <strong>não tem permissão :(</strong></p>
        
        </div>

        <div class="form-cadastro mensagem">
        Esse projeto pertence a você, logo você não pode denunciá-lo<br /><br />

        Caso tenha ocorrido um erro - e esse projeto não é seu, mas não consegue acessá-lo -, nos mande um e-mail:
          <a class="email-link" href="mailto:gruposol413@gmail.com" target="_blank">gruposol413@gmail.com</a>.

              <a href="projetos.php">
                <button class="button button1">VER PROJETOS</button>
              </a>
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
      slideValue.style.left = (value/1) + "%";
      // slideValue.classList.add("show");
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
