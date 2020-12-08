<?php

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

?>


  <!DOCTYPE html>

  <html lang="pt-br" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <title>Criar projeto | JACI</title>

      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-criar-projeto.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
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
      <li><a class="active" href="criar-projeto.php">CRIAR PROJETO</a></li>
      <!-- <li><a href="#">Feedback</a></li> -->
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


  <div class="form">
    <div class="titulo">
      <p> 
        CADASTRAR <strong>NOVO PROJETO</strong>
      </p>

      <div class="descricao">
          Preencha os campos a seguir para adicionar um novo projeto e ajudar um aluno!
      </div>
    </div>

    <div class="form-cadastro">
      <form method="post" class="login-form" action="controller/cadastrar-projeto.php"> 
      
          <div class="txtb">
            <input type="text" placeholder="Título do projeto" name="titulo" id="titulo" size="100" maxlength="100" required>
            <span data-placeholdr="Email"></span>
          </div>

          <div class="txtb">
            <input type="text" placeholder="Descrição" id="descricao" name="descricao" size="1000" maxlength="1000" required>
            <span data-placeholdr="Password"></span>
          </div>

          <div class="txtb">
            <input type="text" placeholder="Palavras-Chave" id="palavras-chave" name="palavras-chave" size="300" maxlength="300" required>
            <span data-placeholdr="Password"></span>
          </div>

          <div class="txtb">
            <select name="materia" id="materia" required>
              <option value="" class="disable-select" disabled selected>Disciplina</option>

                <optgroup label="Disciplinas comuns">
                  <option value="Biologia">Biologia</option>
                  <option value="Filosofia">Filosofia</option>
                  <option value="Física">Física</option>
                  <option value="Geografia">Geografia</option>
                  <option value="História">História</option>
                  <option value="Inglês">Inglês</option>
                  <option value="Matemática">Matemática</option>
                  <option value="Literatura">Literatura</option>
                  <option value="Língua Portuguesa">Língua Portuguesa</option>
                  <option value="Sociologia">Sociologia</option>
                  <option value="Química">Química</option>
                  <option value="Outro">Outro</option>
                </optgroup>

                <optgroup label="Disciplinas de Informática">
                  <option value="Aplicações Web">Aplicações Web</option>
                  <option value="Banco de dados">Banco de dados</option>
                  <option value="Gestão Industrial">Gestão Industrial</option>
                  <option value="Programação">Programação</option>
                  <option value="Redes">Redes</option>
                  <option value="Sistemas Computacionais">Sistemas Computacionais</option>
                  <option value="Teoria e Desenvolvimento de Sistemas">Teoria e Desenvolvimento de Sistemas</option>
                </optgroup>

                <optgroup label="Disciplinas de Mecânica">
                  <option value="Elementos de Máquinas">Elementos de Máquinas</option>
                  <option value="Máquinas e Aparelhos Mecânicos">Máquinas e Aparelhos Mecânicos</option>
                  <option value="Resistência dos Materiais">Resistência dos Materiais</option>
                  <option value="Segurança do trabalho">Segurança do trabalho</option>
                </optgroup>
                
              </select>
            </div>

            <div class="txtb">
              <input type="number" placeholder="Ano em que o projeto foi feito" id="ano" name="ano" size="4" maxlength="4" required>
              <span data-placeholdr="Password"></span>
            </div>
            
            <!-- <br /><br />
             <p class="categoria categoria-titulo">Categoria </p>
            <br /><br /><br />

            <input type="radio" class="categoria" name="categoria" id="categoria" value="Artigo" required/><p class="categoria">Artigo</p><br /><br />
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Manual" required/><p class="categoria">Manual</p><br /><br />
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Resumo" required/><p class="categoria">Resumo</p><br /><br />
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Trabalho" required/><p class="categoria">Trabalho</p><br /><br >
            <input type="radio" class="categoria" name="categoria" id="categoria" value="Texto" required/><p class="categoria">Texto</p><br /><br /><br /> -->
            
            <div class="txtb">
            <select name="categoria" id="categoria" required>
              <option value="" class="disable-select" disabled selected>Categoria</option>

                
                  <option value="Artigo">Artigo</option>
                  <option value="Exercício">Exercício</option>
                  <option value="Manual">Manual</option>
                  <option value="Resumo">Resumo</option>
                  <option value="Trabalho">Trabalho</option>
                  <option value="Texto">Texto</option>
                
              </select>
            </div>

            <br /><br />
              <p class="categoria categoria-titulo">Nível de conhecimento</p>
            <br /><br />
            
            <div class="range">
              <div class="sliderValue">
                <span class="sliderValue-span">100</span>
              </div>

              <div class="field">
                <div class="value left">Baixo</div>
                  <input type="range" class="input-value" name="conhecimento" id="conhecimento" min="10" max="200" value="100" steps="1">
                <div class="value right">Alto</div>
              </div>
            </div>


            <div class="txtb">
              <textarea style="height:200px !important" id="texto" name="texto" rows="6" cols="50" minlength="10" maxlength="8000" size="8000" placeholder="Seu texto"></textarea>
            </div>
            
            <br /><br />
              <input type="submit" class="logbtn" value="CADASTRAR PROJETO" name="btn-entrar">
            <br />
            
      </form> 
    </div>
  </div>

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
