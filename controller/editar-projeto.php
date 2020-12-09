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
    header('Location: login.php');
  }else{

    // Dados
    $ID_Usuario = $_SESSION['ID'];
    $sql = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario'";
    $res = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($res);

    
    $_SESSION['ID'] = $dados['ID'];
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
      $NotaProfessor = $vreg[6];
      $Categoria = $vreg[7];
      $Conhecimento = $vreg[8];
      $Texto = $vreg[9];
      $ID_Usuario_Projeto = $vreg[10];

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
      $_SESSION['NotaProfessor'] = $NotaProfessor;
      $_SESSION['Categoria'] = $Categoria;
      $_SESSION['Conhecimento'] = $Conhecimento;
      $_SESSION['Texto'] = $Texto;
      $_SESSION['ID_Usuario_Projeto'] = $ID_Usuario_Projeto;
  
      $_SESSION['Nome'] = $Nome;
      $_SESSION['Curso'] = $Curso;

?>



<!DOCTYPE html>

  <html lang="pt-br" dir="ltr">
    <head>
      
      <title>Editar projeto | JACI</title>
      
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link rel="stylesheet" href="css/style-editar-projeto.css"> 
      <link rel="icon" href="../img/favicon.png" type="image/png" />
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
    
  </head>
  <body>
    <nav>
      <div class="logo">
        <a href="../header.php">
        <img src="../img/logo-black.png" alt="logo"/></a>
    </div>
<input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
<li><a href="../header.php">INÍCIO</a></li>
<li><a href="./../projetos.php">ATIVIDADES</a></li>
<li><a href="./../criar-projeto.php">CADASTRAR ATIVIDADE</a></li>
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

if($_SESSION['ID'] == $ID_Usuario_Projeto){

?>
  <div class="form">
    <div class="titulo"><p> 
    EDITAR <strong>ATIVIDADE</strong></p>
      <div class="descricao">
          Preencha os campos a seguir para editar seu projeto que já foi cadastrado!
      </div>
    </div>

    <div class="form-cadastro">
      <form method="post" class="login-form" action="atualizar-projeto.php?IDProjeto=<?php echo $ID_Projeto;?>"> 
      
            <div class="txtb">
                <input type="text" placeholder="Título do projeto" name="titulo" id="titulo" size="100" maxlength="100" value="<?php echo $Titulo; ?>" required>
                <span data-placeholdr="Email"></span>
            </div>

            <div class="txtb">
                <input type="text" placeholder="Descrição" id="descricao" name="descricao" size="1000" value="<?php echo $Descricao; ?>" maxlength="1000" required>
                <span data-placeholdr="Password"></span>
            </div>

            <div class="txtb">
              <input type="text" placeholder="Palavras-Chave" id="palavras-chave" name="palavras-chave" value="<?php echo $Palavras; ?>" size="300" maxlength="300" required>
              <span data-placeholdr="Password"></span>
            </div>


            
        <div class="txtb">
              <select name="materia" id="materia" required>
                <!-- <option value="<?php echo $Materia; ?>" class="disable-select" disabled selected><?php echo $Materia; ?></option> -->
                
                <!-- <option value="" class="disable-select" disabled selected>Disciplinas</option> -->
                <optgroup label="Disciplinas comuns">

                <!-- <option value=""><?php echo $Materia; ?></option> -->
                <option name="materia" id="materia" value="<?php echo $Materia; ?>" selected><?php echo $Materia; ?></option>
                <option name="materia" id="materia" value="Biologia">Biologia</option>
                <option name="materia" id="materia" value="Filosofia">Filosofia</option>
                <option name="materia" id="materia" value="Física">Física</option>
                <option name="materia" id="materia" value="Geografia">Geografia</option>
                <option name="materia" id="materia" value="História">História</option>
                <option name="materia" id="materia" value="Inglês">Inglês</option>
                <option name="materia" id="materia" value="Matemática">Matemática</option>
                <option name="materia" id="materia" value="Literatura">Literatura</option>
                <option name="materia" id="materia" value="Língua Portuguesa">Língua Portuguesa</option>
                <option name="materia" id="materia" value="Sociologia">Sociologia</option>
                <option name="materia" id="materia" value="Química">Química</option>
                <option name="materia" id="materia" value="Outro">Outro</option>
              </optgroup>

              <optgroup label="Disciplinas de Informática">
                <option name="materia" id="materia" value="Aplicações Web">Aplicações Web</option>
                <option name="materia" id="materia" value="Banco de dados">Banco de dados</option>
                <option name="materia" id="materia" value="Gestão Industrial">Gestão Industrial</option>
                <option name="materia" id="materia" value="Programação">Programação</option>
                <option name="materia" id="materia" value="Redes">Redes</option>
                <option name="materia" id="materia" value="Sistemas Computacionais">Sistemas Computacionais</option>
                <option name="materia" id="materia" value="Teoria e Desenvolvimento de Sistemas">Teoria e Desenvolvimento de Sistemas</option>
              </optgroup>

              <optgroup label="Disciplinas de Mecânica">
                <option name="materia" id="materia" value="Elementos de Máquinas">Elementos de Máquinas</option>
                <option name="materia" id="materia" value="Máquinas e Aparelhos Mecânicos">Máquinas e Aparelhos Mecânicos</option>
                <option name="materia" id="materia" value="Resistência dos Materiais">Resistência dos Materiais</option>
                <option name="materia" id="materia" value="Segurança do trabalho">Segurança do trabalho</option>
              </optgroup>
              </select>
            </div>

            <div class="txtb">
              <input type="number" placeholder="Ano em que o projeto foi feito" value="<?php echo $Ano; ?>" id="ano" name="ano" size="4" maxlength="4" required>
              <span data-placeholdr="Password"></span>
            </div>

            <div class="txtb">
              <input type="number" placeholder="Nota atribuída pelo professor" value="<?php echo $NotaProfessor; ?>" id="nota" name="nota" size="2" maxlength="2" step="any" required>
              <span></span>
            </div>
            
            <div class="txtb">
            <select name="categoria" id="categoria" required>
            <option name="categoria" id="categoria" value="<?php echo $Categoria; ?>" selected><?php echo $Categoria; ?></option>
                
                
                  <option value="Artigo">Artigo</option>
                  <option value="Exercício">Exercício</option>
                  <option value="Manual">Manual</option>
                  <option value="Resumo">Resumo</option>
                  <option value="Trabalho">Trabalho</option>
                  <option value="Texto">Texto</option>
                
              </select>
            </div>
            
            <!-- <br /><br /> <p class="categoria categoria-titulo">Categoria </p><br /><br /><br /> 

            
          <?php 

          switch($Categoria){
            case 'Texto': ?>

          <input type="radio" class="categoria" name="categoria" id="categoria" value="Artigo" required/><p class="categoria">Artigo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Manual" required/><p class="categoria">Manual</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Resumo" required/><p class="categoria">Resumo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Trabalho" required/><p class="categoria">Trabalho</p><br /><br >
          <input type="radio" class="categoria" name="categoria" id="caterogia" value="<?php echo $Categoria; ?>" required checked="checked"/><p class="categoria"><?php echo $Categoria; ?></p><br /><br />

          <?php
          break;

          case 'Artigo': ?>

          <input type="radio" class="categoria" name="categoria" id="caterogia" value="<?php echo $Categoria; ?>" required checked="checked"/><p class="categoria"><?php echo $Categoria; ?></p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Manual" required/><p class="categoria">Manual</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Resumo" required/><p class="categoria">Resumo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Trabalho" required/><p class="categoria">Trabalho</p><br /><br >
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Texto" required/><p class="categoria">Texto</p><br /><br /><br />

          <?php
          break;
  
          case 'Manual': ?>

          <input type="radio" class="categoria" name="categoria" id="categoria" value="Artigo" required/><p class="categoria">Artigo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="caterogia" value="<?php echo $Categoria; ?>" required checked="checked"/><p class="categoria"><?php echo $Categoria; ?></p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Resumo" required/><p class="categoria">Resumo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Trabalho" required/><p class="categoria">Trabalho</p><br /><br >
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Texto" required/><p class="categoria">Texto</p><br /><br /><br />
  
          <?php
          break;

          case 'Resumo': ?>

            <input type="radio" class="categoria" name="categoria" id="categoria" value="Artigo" required/><p class="categoria">Artigo</p><br /><br />
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Manual" required/><p class="categoria">Manual</p><br /><br />
            <input type="radio" class="categoria" name="categoria" id="caterogia" value="<?php echo $Categoria; ?>" required checked="checked"/><p class="categoria"><?php echo $Categoria; ?></p><br /><br />
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Trabalho" required/><p class="categoria">Trabalho</p><br /><br >
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Texto" required/><p class="categoria">Texto</p><br /><br /><br />
    
          <?php
          break;

          case 'Trabalho': ?>

          <input type="radio" class="categoria" name="categoria" id="categoria" value="Artigo" required/><p class="categoria">Artigo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Manual" required/><p class="categoria">Manual</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Resumo" required/><p class="categoria">Resumo</p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="caterogia" value="<?php echo $Categoria; ?>" required checked="checked"/><p class="categoria"><?php echo $Categoria; ?></p><br /><br />
          <input type="radio" class="categoria" name="categoria" id="categoria" value="Texto" required/><p class="categoria">Texto</p><br /><br /><br />
      
          <?php
          break;

          }
          ?>-->
         
            
          <br /><br /> <p class="categoria categoria-titulo">Nível de conhecimento </p><br /><br />
          <div class="range">
            <div class="sliderValue">
              <span class="sliderValue-span">100</span>
            </div>
                <div class="field">
                <div class="value left">Baixo</div>
                    <input type="range" class="input-value" name="conhecimento" id="conhecimento" min="10" value="<?php echo $Conhecimento; ?>" max="200" value="100" steps="1">
                <div class="value right">Alto</div>
                </div>
            </div>


            <div class="txtb">
            <textarea style="height:200px !important" id="texto" name="texto" rows="6" cols="50" minlength="10" maxlength="8000" size="8000" placeholder="Seu texto"><?php echo $Texto; ?></textarea></div>
            

            <br /><br />

            <input type="submit" class="logbtn" value="ATUALIZAR PROJETO" name="btn-entrar">

           <br />
            
        
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
          Esse projeto pertence a outra pessoa, logo você não pode editá-lo.<br /><br />Caso tenha
          ocorrido um erro - e esse projeto é seu, mas não consegue acessá-lo -, nos mande um e-mail: <a href="mailto:gruposol413@gmail.com" target="_blank">gruposol413@gmail.com</a>.
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
