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
      

        $vtitulo = $_POST["titulo"];
        $vdescricao = $_POST["descricao"];
        $vpalavras = $_POST["palavras-chave"];
        $vano = $_POST["ano"];

        $vmateria = $_POST["materia"];
        $vnotaprofessor = $_POST["nota"];
        $vcategoria = $_POST["categoria"];
        $vconhecimento = $_POST["conhecimento"];
        $vtexto = $_POST["texto"];

        $ID_Projeto = $_GET['IDProjeto'];

        $sql = "UPDATE tb_projetos SET
        Titulo = '$vtitulo', Descricao = '$vdescricao', Palavras = '$vpalavras',
        Ano = $vano, Materia = '$vmateria', Nota = $vnotaprofessor, Categoria = '$vcategoria', Conhecimento = $vconhecimento, Texto = '$vtexto'
        WHERE ID = $ID_Projeto AND ID_Usuario = $id";

        // WHERE ID_Usuario = $ID_Usuario AND 
        $res = mysqli_query($conexao, $sql);

        $linhas = mysqli_affected_rows($conexao);

        if($linhas == 1){
            $mensagem = "Atualização feita com sucesso!";
        }
        else{
            $mensagem = "Falha na atualização do projeto!";
        }
    }


?>


<!DOCTYPE html>

  <html lang="pt-br" dir="ltr">
    <head>
     
      <title><?php echo $mensagem; ?> | JACI</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <link rel="icon" href="../img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-atualizar-projeto.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"> 
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
    <style>

    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Josefin Sans', sans-serif;
    } 

    body{
      background: #1F9E84;
    }

    nav{
      display: flex;
      height: 80px;
      width: 100%;
      background: #24AE91;
      align-items: center;
      justify-content: space-between;
      padding: 0 50px 0 100px;
      flex-wrap: wrap;
    }

    nav .logo{
      color: #fff;
      font-size: 35px;
      font-weight: 600;
    }

    nav .logo img{
      width: 40%;
      padding-top: 10px;
    }

    nav ul{
      display: flex;
      flex-wrap: wrap;
      list-style: none;
    }

    nav ul li{
      margin: 0 5px;
    }

    nav ul li a{
      color: #000;
      text-decoration: none;
      font-size: 18px;
      font-weight: 500;
      padding: 8px 15px;
      border-radius: 5px;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      padding-right: 35px;
      padding-left: 35px;
      font-size: 14px;
      font-weight: 700;
      align-content: center;
      text-align: center;
    }

    nav ul li a.active,
    nav ul li a:hover{
      color: #fff;
      /* background: #fff; */
    }

    nav .menu-btn i{
      color: #fff;
      font-size: 30px;
      cursor: pointer;
      display: none;
    }

    input[type="checkbox"]{
      display: none;
    }

    @media (max-width: 1000px){
      nav{
        padding: 0 40px 0 50px;
      }
    }

    @media (max-width: 920px) {
      nav .menu-btn i{
        display: block;
      }
      
      #click:checked ~ .menu-btn i:before{
        content: "\f00d";
      }

      nav ul{
        position: fixed;
        top: 80px;
        left: -100%;
        background: #24AE91;
        height: 100vh;
        width: 100%;
        text-align: center;
        display: block;
        transition: all 0.3s ease;
      }

      #click:checked ~ ul{
        left: 0;
      }

      nav ul li{
        width: 100%;
        margin: 40px 0;
      }

      nav ul li a{
        width: 100%;
        margin-left: -100%;
        display: block;
        font-size: 20px;
        transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      }
      
      #click:checked ~ ul li a{
        margin-left: 0px;
      }

      nav ul li a.active,
      nav ul li a:hover{
        background: none;
        color: #fff;
      }
    }

    .form{
      background-color: #1F1F1F;
      margin: auto;
      height: 480px;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: 50px;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: -1;
      width: 75%;
      padding: 10px 30px;
      border-bottom: solid 20px #1F9E84;
    }

    .form .titulo{
      float: left;
      padding-left: 50px;
      padding-top: 50px;
      color: #5EC7A7;
      font-size: 67px;
      width: 430px;
      text-align: left;
    }

    .form .titulo p{
      text-transform: uppercase;
    }

    .form .descricao{
      float: left;
      color: #fff;
      font-size: 20px;
      width: 350px;
      text-align: left;
      padding-top: 20px;
    }

    .form-cadastro{
      float: right;
      padding-right: 50px;
      padding-top: 10px;
      width: 520px;
      color: #DFDFDF;
    }

    .login-form img{
      width: 100%;
      padding-left: 55px;
      padding-right: 55px;
    }

    .txtb{
      border-bottom: 2px solid #DFDFDF;
      position: relative;
      margin: 20px 0;
    }
  
    .txtb input{
      font-size: 15px;
      color: #fff;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      font-family: 'Josefin Sans', sans-serif;
      height: 40px;
    }
  
    .txtb select{
      font-size: 15px;
      color: #fff;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      font-family: 'Josefin Sans', sans-serif;
      height: 40px;
    }

    .txtb select option,.txtb select optgroup {
      font-size: 15px;
      color: #000;
      font-family: 'Josefin Sans', sans-serif;
    }

    .txtb textarea{
      font-size: 15px;
      color: #fff;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      font-family: 'Josefin Sans', sans-serif;
      height: 40px;
    }

    input[type="number"]{
      font-size: 15px;
      color: #fff;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      font-family: 'Josefin Sans', sans-serif;
      height: 40px;
    }

    input[type=radio]:checked ~ .check {
      border: 5px solid #0DFF92;
    }

    input[type=radio]:checked ~ .check::before{
      background: #0DFF92;
    }

    input[type=radio]:checked ~ label{
      color: #0DFF92;
    }

    .txtb span::before{
      content: attr(data-placeholder);
      position: absolute;
      top: 50%;
      left: 5px;
      color: #DFDFDF;
      transform: translateY(-50%);
      z-index: -1;
      transition: .5s;
    }
    
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      font-family: 'Josefin Sans', sans-serif;
      color: #777;
    }
    
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      font-family: 'Josefin Sans', sans-serif;
      color: #777;
    }
  
    ::-ms-input-placeholder { /* Microsoft Edge */
      font-family: 'Josefin Sans', sans-serif;
      color: #777;
    }
    
    .fsenha a{
      color: #DFDFDF;
      /* text-decoration: underline; */
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      line-height: 40px;
      font-weight: 900;
    }

    .logbtn{
      display: block;
      width: 100%;
      margin: auto;
      height: 70px;
      border: none;
      font-size: 14px;
      background-color:#24AE91;
      background-size: 200%;
      color: #fff;
      outline: none;
      font-weight: 700;
      cursor: pointer;
      transition: .5s;
      font-family: 'Poppins', sans-serif;   
    }

    .logbtn:hover{
      background-color:#177561;
      transition: 0.5s;    
    }

    .bottom-text a{
      color: #0c0c0c;
      font-family: 'Josefin Sans', sans-serif;
      font-size: 13px;
      font-weight: 900;
    }

    .bottom-text-login a{
      color: #0c0c0c;
      font-family: 'Josefin Sans', sans-serif;
      font-size: 13px;
      font-weight: 900;
    }

    hr{
      border-top: 2px solid rgb(0, 0, 0);
    }

    .no-show-desktop{
      display: table;
    }

    .no-show-mobile{
      display: none;
    }

    .login-form .login {
      text-align: center;
      align-content: center;
      font-family: 'Josefin Sans', sans-serif;
      color: white;
      font-size: 17px;
      font-weight: 700;
    }

    .bottom-text-login{
      /* margin-top: 60px; */
      background-color: #111111;
      text-align: center;
      line-height: 40px;
      color: white !important;
      transition: .5s;
      font-weight: 700;
      font-size: 12px;
      font-family: 'Poppins', sans-serif;   
    }

    .bottom-text-login:hover{
      /* margin-top: 60px; */
      background-color: #000000;
      text-align: center;
      line-height: 40px;
      color: white !important;
      font-size: 12px;
      font-family: 'Poppins', sans-serif; 
    }

    .bottom-text-login a{
      font-family: 'Josefin Sans', sans-serif;  
    }

    ::-webkit-scrollbar{
      width: 10px;
    }

    ::-webkit-scrollbar-track{
      border: 7px solid rgb(19, 19, 19);
      box-shadow: inset 0 0 2.5px 2px rgb(0,0,0,0.5);
    }

    ::-webkit-scrollbar-thumb{
      background: linear-gradient(
      45deg,
      #98cec3,
      #98cec3
      );
      border-radius: 3px;
    }

    .categoria{
      color: #DFDFDF;
      text-align: left;
      float: left;
    }

    .range{
      height: 80px;
      width: 480px;
      background: #1F1F1F;
      border-radius: 10px;
      padding: 0 65px 0 70px;
    }

    .sliderValue{
      position: relative;
      width: 100%;
    }

    .sliderValue span{
      position: absolute;
      height: 45px;
      width: 45px;
      transform: translateX(-70%) scale(0);
      font-weight: 500;
      top: -40px;
      line-height: 55px;
      z-index: 2;
      color: #fff;
      transform-origin: bottom;
      transition: transform 0.3s ease-in-out;
    }

    .sliderValue span.show{
      transform: translateX(-70%) scale(1);
    }

    .sliderValue span:after{
      position: absolute;
      content: '';
      height: 100%;
      width: 100%;
      background: #5EC7A7;
      border: 3px solid #fff;
      z-index: -1;
      left: 50%;
      transform: translateX(-50%) rotate(45deg);
      border-bottom-left-radius: 50%;
      box-shadow: 0px 0px 8px rgba(0,0,0,0.1);
      border-top-left-radius: 50%;
      border-top-right-radius: 50%;
    }

    .field{
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      position: relative;
    }

    .field .value{
      position: absolute;
      font-size: 15px;
      color: #5EC7A7;
      font-weight: 600;
    }

    .field .value.left{
      left: -60px;
    }

    .field .value.right{
      right: -43px;
    }

    .range input{
      -webkit-appearance: none;
      width: 100%;
      height: 3px;
      background: #ddd;
      border-radius: 5px;
      outline: none;
      border: none;
      z-index: 2222;
    }

    .range input::-webkit-slider-thumb{
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      background: red;
      border-radius: 50%;
      background: #5EC7A7;
      border: 1px solid #5EC7A7;
      cursor: pointer;
    }

    .range input::-moz-range-thumb{
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      background: red;
      border-radius: 50%;
      background: #5EC7A7;
      border: 1px solid #5EC7A7;
      cursor: pointer;
    }

    .range input::-moz-range-progress{
      background: #5EC7A7;
    }

    .categoria-titulo{
      font-weight: 700;
    }

    .mensagem{
        padding: 77px 50px 0 0;
        font-size: 27px;
        text-align: right;
    }

    .button {
      border: none;
      color: #ddd;
      padding: 1px 40px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 10px;
      margin: 4px 2px;
      cursor: pointer;
      font-family: 'Josefin Sans', sans-serif;
    }

    .button1 {
      background-color: #1f9e84; 
      font-weight: 800;
      color: #000; 
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.5s;
      font-size: 13px;
      margin-top: 70px;
      padding: 36px 68px;
    }

    .button1:hover {
      background-color: #000; 
      font-weight: 600;
      color: #fff; 
      border: 2px solid #fff;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.5s;
    }


  @media screen and (max-width: 700px){

    .button1{
      background-color: #1f9e84;
      font-weight: 800;
      color: #000;
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.5s;
      font-size: 10px;
      margin-top: 20px;
      padding: 23px 64px;
    }

    nav .logo img{
          width: 30%;
          padding-top: 0px;
        }

    .form{
      background-color: #1F1F1F;
      margin: auto;
      height: 480px;
      position: absolute;
      top: 44%;
      left: 36%;
      margin-top: 50px;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: -1;
      width: 75%;
      padding: 10px 30px;
      border-bottom: solid 20px #1F9E84;
    }

    .form-cadastro {
      float: right;
      padding-right: 50px;
      padding-top: 10px;
      width: 100%;
      color: #DFDFDF;
    }

    .mensagem {
      /* padding: 39px 0px 0 0;
      font-size: 27px;
      text-align: left; */
      padding: 25px 0px 0 0;
      font-size: 21px;
      text-align: left;
    }

    .form .titulo {
      float: left;
      padding-left: 50px;
      padding-top: 50px;
      color: #051915;
      font-size: 62px !important;
      width: 430px;
      text-align: left;
    }
  }

  </style>
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
  
  <div class="form">
    <div class="titulo">
      <p> 
      <?php
        if($mensagem == 'Falha na atualização do projeto!'){
          // echo $vcod."".$vtitulo."".$vdescricao;
          echo "Falha na <strong>atualização do projeto!</strong>";   
        }
        else{
          echo "Mudanças salvas <strong>com sucesso!</strong>";
        }
      ?>
      </p>

      <!-- <div class="descricao">
          Preencha os campos a seguir para adicionar um novo projeto e ajudar um aluno!
      </div> -->

    </div>

    <div class="form-cadastro mensagem">
        <?php
        if($mensagem == 'Falha na atualização do projeto!'){
            // echo $vcod."".$vtitulo."".$vdescricao;
          echo "Infelizmente não foi possível cadastrar seu projeto! Tente novamente!";
          }
          else{
              echo "Obrigado por compartilhar seu conhecimento com todos!";
          }
        ?>

        <?php
          if($mensagem == 'Falha na atualização do projeto!'){ ?>
            <a href="./../meu-perfil.php">
              <button class="button button1">TENTAR NOVAMENTE</button>
            </a>
          <?php
            }
            else{
          ?>
            <a href="./../projeto.php?ID=<?php echo $ID_Projeto; ?>">
              <button class="button-projeto button button1-projeto button1" id="$ID_Projeto">VER PROJETO</button>
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