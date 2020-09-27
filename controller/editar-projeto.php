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
    <title>Editar projeto | JACI</title>
      <link rel="icon" href="../img/favicon.png" type="image/png" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
   
    
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
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
  font-family: 'Josefin Sans', sans-serif;
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
    height: 1170px;
    position: absolute;
  top: 50%;
  left: 50%;
  margin-top: 390px;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 89%;
  padding: 10px 30px;
  border-bottom: solid 20px #1F9E84;

}


.form .titulo{
    float: left;
    padding-left: 50px;
    padding-top: 50px;
  color: #5EC7A7;
  font-size: 49px;
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



.form-sempermissao{
    background-color: #1F1F1F;
    margin: auto;
    height: 450px;
    position: absolute;
  top: 50%;
  left: 50%;
  margin-top: 65px;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 80%;
  padding: 10px 30px;
  border-bottom: solid 20px #1F9E84;

}

.form-sempermissao .titulo{
    float: left;
    padding-left: 50px;
    padding-top: 50px;
  color: #5EC7A7;
  font-size: 49px;
    width: 680px;
    text-align: left;
}

.form-sempermissao .titulo p{
  text-transform: uppercase;
}

.form-sempermissao .descricao{
    float: left;
  color: #fff;
  font-size: 20px;
  width: 450px;
  text-align: left;
    padding-top: 20px;
}



.form-sempermissao .descricao a{
  
  color: #fff;
  text-decoration: none;
}

.form-sempermissao .descricao a:hover{
  
  color: #5EC7A7;
  text-decoration: none;
  transition: 0.7s;
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

  .disable-select{
    color: #777;
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


@media screen and (max-width: 700px){
    .form{
      background-color: transparent !important;
      margin-top: 353px;
    }
    
    .form .titulo {
    float: left;
    color: #1f1f1f;
    padding-left: 0;
    padding-top: 50px;
    font-size: 47px;
    width: 280px;
    text-align: left;
}

.form .descricao {
    float: left;
    color: #fff;
    font-size: 20px;
    width: 280px;
    text-align: left;
    padding-bottom: 45px;
    padding-top: 20px;
}

.form-cadastro {
    float: inherit;
    padding-right: 50px;
    padding-top: 10px;
    width: 116%;
    color: #DFDFDF;
}

.form-sempermissao{
      background-color: transparent !important;
      margin-top: 0px;
    }
    
    .form-sempermissao .titulo {
    float: left;
    color: #1f1f1f;
    padding-left: 0;
    padding-top: 50px;
    font-size: 47px;
    width: 280px;
    text-align: left;
}

.form-sempermissao .descricao {
    float: left;
    color: #fff;
    font-size: 20px;
    width: 280px;
    text-align: left;
    padding-bottom: 45px;
    padding-top: 20px;
}


::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    font-family: 'Josefin Sans', sans-serif;
    color: #000;
  }
  
  :-ms-input-placeholder { /* Internet Explorer 10-11 */
    font-family: 'Josefin Sans', sans-serif;
    color: #000;
  }
  
  ::-ms-input-placeholder { /* Microsoft Edge */
    font-family: 'Josefin Sans', sans-serif;
    color: #000;
  }

  .range {
    height: 80px;
    width: 100%;
    background: #1F1F1F;
    border-radius: 10px;
    padding: 0 65px 0 70px;
}


.logbtn{
  display: block;
  width: 100%;
  margin: auto;
  height: 70px;
  border: none;
  font-size: 14px;
  background-color:#1f1f1f;
  background-size: 200%;
  color: #fff;
  outline: none;
  font-weight: 700;
  cursor: pointer;
  transition: .5s;
      
}

.logbtn:hover{

  background-color:#000;
  transition: 0.5s;
      
}

.txtb {
    border-bottom: 2px solid #000000;
}

}


    </style>
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

if($_SESSION['ID'] == $ID_Usuario_Projeto){

?>
  <div class="form">
    <div class="titulo"><p> 
    EDITAR <strong>PROJETO</strong></p>
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


            
         <!-- !! Arrumar materia (não é atualizada - dá erro quando a matéria continua a mesma) -->
            <div class="txtb">
              <select name="materia" id="materia" required>
                <!-- <option value="<?php echo $Materia; ?>" class="disable-select" disabled selected><?php echo $Materia; ?></option> -->
                
                <!-- <option value="" class="disable-select" disabled selected>Matéria</option> -->
                <optgroup label="Matérias comuns">

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

              <optgroup label="Informática">
                <option name="materia" id="materia" value="Aplicações Web">Aplicações Web</option>
                <option name="materia" id="materia" value="Banco de dados">Banco de dados</option>
                <option name="materia" id="materia" value="Gestão Industrial">Gestão Industrial</option>
                <option name="materia" id="materia" value="Programação">Programação</option>
                <option name="materia" id="materia" value="Redes">Redes</option>
                <option name="materia" id="materia" value="Sistemas Computacionais">Sistemas Computacionais</option>
                <option name="materia" id="materia" value="Teoria e Desenvolvimento de Sistemas">Teoria e Desenvolvimento de Sistemas</option>
              </optgroup>

              <optgroup label="Mecânica">
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
            
            
            <br /><br /> <p class="categoria categoria-titulo">Categoria </p><br /><br /><br />

            
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
          ?>
         
            
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
      <div class="descricao">
          Esse projeto pertence a outra pessoa, logo você não pode editá-lo.<br /><br />Caso tenha
          ocorrido um erro - e esse projeto é seu, mas não consegue acessá-lo -, nos mande um email: <a href="mailto:gruposol413@gmail.com" target="_blank">gruposol413@gmail.com</a>.
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
