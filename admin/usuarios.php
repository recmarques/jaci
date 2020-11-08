<?php

	// conexao
  // require_once '../conexao.inc';
  $servername = "us-cdbr-east-02.cleardb.com";
  $username = "b0394718678768";
  $password = "33161d76";
  $db_name = "heroku_390caed3836a8d5";
        
  $conexao = mysqli_connect($servername, $username, $password);
  mysqli_select_db($conexao, $db_name);
  
  // $url = parse_url(getenv("mysql://b0394718678768:33161d76@us-cdbr-east-02.cleardb.com/heroku_390caed3836a8d5?reconnect=true"));

  // $server = $url["us-cdbr-east-02.cleardb.com"];
  // $username = $url["b0394718678768"];
  // $password = $url["33161d76"];
  // $db = substr($url["heroku_390caed3836a8d5"], 1);
  
  // $conexao = new mysqli($server, $username, $password, $db);
	
  mysqli_set_charset($conexao, "utf8");

	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
  endif;
  
	// Sessão
  session_start();
    
  // Verificação
  if(isset($_SESSION['logado'])){
        // header('Location: index.php');
    $id = $_SESSION['ID'];
    $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
    $res = mysqli_query($conexao, $sql);

    $dados = mysqli_fetch_array($res);
        
  }

    
?>

<!DOCTYPE html>

  <html lang="en" dir="ltr">
    <head>

      <title>Denúncias disponíveis | JACI</title>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-usuarios.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;600;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700;900&display=swap" rel="stylesheet">
      
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
     
    <style>

      @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
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

        label {
            display: inline-block;
            max-width: 100%;
            margin-bottom: 0px;
            margin-top: 25px;
            font-weight: 700;
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
          z-index: 1;
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
          background: transparent;
          text-decoration: none;
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
            /* margin-top: 21px; */
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
            margin: 5px 0;
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

        .no-show-desktop{
          display: table;
        }

        .no-show-mobile{
          display: none;
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

        body{
          background-color: #24AE91;
        }

      @media screen and (max-width: 700px){
        
        .avaliacao-star{
          width: 5% !important;
        }

        .projeto {
            background-color: #5EC7A7;
            margin: 10px 0 !important;
            /* padding: 50px 50px; */
            padding: 40px 20px !important;
            width: 100% !important;
        }

        .projeto .titulo {
          color: black;
          text-align: left;
          font-weight: 700;
          max-width: 100%;
          font-size: 40px !important;
          text-transform: uppercase;
          font-family: 'Josefin Sans', sans-serif;
        }

        .autor {
          font-size: 22px;
          line-height: 25px;
          text-align: left !important;
          padding-right: 0;
          font-family: 'Josefin Sans', sans-serif;
          padding-left: 0px !important;
       }     
    }

    .not-activate{
      color: black;
    }

    .activate{
      color: white;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
    }  

    .hero-text {
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
    }

    .bem-vindo{
      text-align: right;
      padding-top: 8%;
      color: white;
      padding-right: 11%;
      line-height: 60px;
      font-size:35px;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 1px;
    }

    .banner{
      text-align: right;
      padding-top: 8%;
      color: white;
      line-height: 60px;
      font-size:35px;
      font-family: 'Poppins', sans-serif;
      letter-spacing: 1px;
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
      background-color: transparent; 
      font-weight: 800;
      color: #000; 
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.3s;
    }

    .button1:hover {
      background-color: #0B342C; 
      font-weight: 600;
      color: #fff; 
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.5s;
    }

    .button-vermais {
      border: none;
      padding: 30px 80px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 10px;
      margin: 4px 2px;
      cursor: pointer;
      font-family: 'Josefin Sans', sans-serif;
    }

    .button1-vermais {
      background-color: transparent; 
      font-weight: 800;
      color: #24AE91; 
      border: 2px solid #24AE91;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.3s;
    }

    .button1-vermais:hover {
      background-color: #0000; 
      font-weight: 600;
      color: #fff; 
      border: 2px solid #fff;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.5s;
    }

    .img-banner img{
      width: 100%;
      padding-top: 0;
      padding-left: 75px;
    }

    .titulo-banner{
      text-align: left;
      padding-top: 1% !important;
      color: #fff;
      padding-left: 11% !important;
      line-height: 70px;
      font-size:50px !important;
      max-width: 940px;
      font-family: 'Archivo', sans-serif;
      text-transform: none;
      letter-spacing: 1px;
    }

    @media screen and (min-width: 1400px){

      .img-banner img{
        width: 90%;
        padding-top: 0;
        padding-left: 150px;
      }

      .titulo-banner{
        text-align: left;
        padding-top: 2% !important;
        color: #fff;
        padding-left: 11% !important;
        line-height: 70px;
        font-size:71px;
        font-family: 'Archivo', sans-serif;
        text-transform: none;
        letter-spacing: 1px;
      }

      .autor{
        text-align: left !important;
        padding-top: 1% !important;
        color: #000 !important;
        padding-right: 11%;
        max-width: 100%;
        line-height: 32px;
        font-weight: 600 !important;
        font-size:25px;
        /* font-family: 'Lato', sans-serif !important; */
        font-family: 'Josefin Sans', sans-serif !important;
        letter-spacing: 1px;
      }

      .lista{
        padding: 100px 170px;
        line-height:42px;
        font-weight: 700 !important;
        font-size:19px;
        font-family: 'Lato', sans-serif !important;
        color: #fff;
      }

      .footer{
        background-color: #1D1D1D;
        width: 100%;
        height: 230px !important;
      }

      .bem-vindo{
        text-align: right;
        padding-top: 8%;
        color: white;
        padding-right: 11%;
        line-height: 60px;
        font-size:40px;
        font-family: 'Poppins', sans-serif;
        letter-spacing: 1px;
      }
    }

    .banner{
      color: black;
      text-align: left;
      padding-left: 80px;
      font-size: 50px;
      height: 450px;
      padding-top: 80px;
      width: 50%;
      font-family: 'Josefin Sans', sans-serif;
      margin: 0;
    }

    .banner .titulo{
      color: black;
      text-align: left;
      font-weight: 700;
      max-width: 510px;
      font-size: 50px;
      text-transform: none;
    }

    .banner .autor{
      font-size: 15px;
      margin: 0;
      font-family: 'Josefin Sans', sans-serif;
      padding: 0;
    }

    .row{
      width: 100%;
    }

    @media screen and (max-width: 700px){

      .hero-image{
          height: 430px !important;
      }

      .logbtn {
        width: 45% !important;
        height: 54px;
        border: none;
        margin: 11px 0 0 21% !important;
        font-size: 12px;
        background: linear-gradient(120deg,#222222,#131313,#000000);
        background-size: 200%;
        float: left;
        color: #fff;
        outline: none;
        font-weight: 700;
        cursor: pointer;
        transition: .5s;
        /* margin-left: 20px; */
        font-family: 'Poppins', sans-serif;
      }

      .button{
        padding: 16px 58px;
      }

      .banner{
        width: 100%;
        height: 430px;
        padding-left: 43px;
        /* display: table-row-group; */
        padding-top: 60px;
      }

      .banner .titulo{
        font-size: 35px;
        line-height: 45px;
      }

      .row-2{
        display: block;
      }

      .img-banner img{
        width: 100%;
        padding-top: 0;
        /* padding-left: 50px; */
        padding-left: 0;
      }

      .footer .rede-social{
        text-align: center;
        align-content: center;
        align-items: center;
        padding: 10px;
      }

      .rede-social img{
        width: 10%;
      }

      .footer .logo-footer{
        padding: 10px;
        text-align: center;
        padding-top: 40px;
      }

      .footer .logo-footer img{
        width: 30%;
      }

      .no-show-mobile{
        display: none;
      }

      .hero-image .row{
        padding-right: 0;
        padding-left: 0;
        margin: 0;
      }

      .titulo-banner{
        text-align: left;
        padding-top: 15% !important;
        color: #fff;
        padding-left: 11% !important;
        line-height: 70px;
        font-size:50px !important;
        max-width: 940px;
        font-family: 'Archivo', sans-serif;
        text-transform: none;
        letter-spacing: 1px;
      }
    }  

    .footer{
      background-color: #1D1D1D;
      width: 100%;
      height: 180px;
    }

    .footer .rede-social{
      background-color: #1D1D1D;
      align-content: center;
      align-items: center;
      -moz-box-align: center;
      padding-left: 120px;
      padding-top:55px;
    }

    .footer .logo-footer{
      background-color: #1D1D1D;
      align-content: center;
      align-items: center;
      -moz-box-align: center;
      padding-left: 120px;
      padding-top:45px;
    }

    .footer .logo-footer img{
      width: 30%;
    }

    .projeto{
      background-color: #5EC7A7;
      margin: 50px 100px;
      /* border-radius: 40px; */
      padding: 50px 50px;
    }

    .projeto .titulo{
      color: black;
      text-align: left;
      font-weight: 700;
      max-width: 800px;
      font-size: 59px;
      text-transform: uppercase;
      font-family: 'Josefin Sans', sans-serif;
    }

    .projeto .autor{
      font-size: 15px;
      margin: 0;
      font-family: 'Josefin Sans', sans-serif;
      text-transform: uppercase !important;
      padding: 0;
    }
        
    .button {
      border: none;
      color: #ddd;
      padding: 4px 60px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 10px;
      margin: 4px 2px;
      cursor: pointer;
      font-family: 'Josefin Sans', sans-serif;
    }

    .button1 {
      background-color: transparent; 
      font-weight: 800;
      color: #000; 
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.3s;
    }

    .button-projeto {
      border: none;
      color: #ddd;
      padding: 24px 76px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 10px;
      margin: 4px 2px;
      cursor: pointer;
      font-family: 'Josefin Sans', sans-serif;
    }

    .button1-projeto {
      background-color: transparent; 
      font-weight: 800;
      color: #000; 
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.3s;
      margin-top: 38px;
    }

    .button1-projeto:hover {
      background-color: #0B342C; 
      font-weight: 600;
      color: #fff; 
      border: 2px solid #000;
      font-family: 'Josefin Sans', sans-serif;
      transition: 0.5s;
    }

    .form-filtro{
      padding-left: 10% !important;
    }

    input[type=text]:not(.browser-default) {
        background-color: transparent;
        border: none;
        border-bottom: 1px solid #9e9e9e;
        border-radius: 0;
        outline: none;
        height: 3rem;
        width: 100%;
        font-size: 16px;
        margin: 0;
        padding: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
        -webkit-transition: border .3s, -webkit-box-shadow .3s;
        transition: border .3s, -webkit-box-shadow .3s;
        transition: box-shadow .3s, border .3s;
        transition: box-shadow .3s, border .3s, -webkit-box-shadow .3s;
    }

    .txtb{
        border-bottom: 2px solid #000000 !important;
        position: relative;
        margin: 30px 0 0 0;
    }
  
    .txtb input{
      font-size: 15px;
      color: #000000;
      border: none;
      width: 100%;
      outline: none;
      background: none;
      padding: 0 5px;
      font-family: 'Josefin Sans', sans-serif;
      height: 40px;
    }

    .txtb span::before{
      content: attr(data-placeholder);
      position: absolute;
      top: 50%;
      left: 5px;
      color: #000000;
      transform: translateY(-50%);
      z-index: -1;
      transition: .5s;
    }
  
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
      font-family: 'Josefin Sans', sans-serif;
      color: #282828;
    }
    
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      font-family: 'Josefin Sans', sans-serif;
      color: #282828;
    }
    
    ::-ms-input-placeholder { /* Microsoft Edge */
      font-family: 'Josefin Sans', sans-serif;
      color: #282828;
    }
          
    .logbtn{ 
      width: 21%;
      height: 54px;
      border: none;
      font-size: 12px;
      background: linear-gradient(120deg,#222222,#131313,#000000);
      background-size: 200%;
      float: left;
      color: #fff;
      outline: none;
      font-weight: 700;
      cursor: pointer;
      transition: .5s;
      margin-left: 20px;
      font-family: 'Poppins', sans-serif;      
    }


  @media screen and (min-width: 1400px){
    nav ul li a {
      font-size: 18px;
    }

    nav {
        display: flex;
        height: 100px;
    }

    nav .logo img {
        width: 45%;
        padding-top: 5px;
    }

    .lista{
        padding: 0;
        line-height:42px;
        font-weight: 700 !important;
        font-size:19px;
        font-family: 'Lato', sans-serif !important;
        color: #fff;
    }

    .hero-image{
      background-color: #5EC7A7;
      height: 365px !important;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      margin: 0;
    }

    .projeto .titulo {
      color: black;
      text-align: left;
      font-weight: 700;
      max-width: 800px;
      font-size: 71px;
      line-height: 74px;
      text-transform: uppercase;
      font-family: 'Josefin Sans', sans-serif;
    }

    .titulo-banner strong{
      font-size: 60px;
    }

    .button-projeto {
        padding: 14px 76px;
    }

    .logbtn {
        height: 62px;
        font-size: 15px;
    }

    input[type=text]:not(.browser-default) {
      
        font-size: 21px;
    }
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
    .txtb input, input[type="number"], .txtb select, .txtb select optgroup, .txtb select option, .txtb textarea {
    font-size: 18px;
    }

    .avaliacao-star{
      width: 2%;
    }

  </style>
  </head>

  <body>

    <nav>
      <div class="logo">
        <a href="index.php">
          <img src="img/logo-black.png" alt="logo"/>
        </a>
     </div>

      <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
          <i class="fas fa-bars"></i>
        </label>

        <ul>
            <li><a href="index.php">INÍCIO</a></li>
            <li><a href="projetos.php">PROJETOS</a></li>
            <li><a class="active" href="usuarios.php">USUÁRIOS</a></li>
            <li><a href="denuncias.php">DENÚNCIAS</a></li>

          <?php 
                if(isset($_SESSION['logado'])){
                  // echo "<li><a class=not-activate href=meu-perfil.php>MEU PERFIL</a></li>";
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

    <div class="hero-image" id="topo">

      <a href="header.php">
        <img src="img/arrow.png" alt="voltar" class="voltar" alt="seta voltar"/>
      </a>
            
      <div class="row">
        <div class="col-sm-9 titulo-banner">
          <strong>Estes são os usuários cadastrados.</strong><br />
        </div>
      </div>

      <div class="form-filtro">
        <form method="post" class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        
        

          <div class="txtb" style="float:left;">
            <input type="text" placeholder="Palavra-chave" name="palavra" id="palavra" size="45" maxlength="30" required>     
          </div>

         
          <!-- <div class="txtb" style="float:left; margin-left: 30px;">
            <input type="text" placeholder="Palavra-chave" name="palavra" id="palavra" size="45" maxlength="30" required>     
          </div> -->
              
        <input type="submit" class="logbtn" value="Pesquisar" name="btn-entrar">      
        </form> 
      </div>

    </div>

    <div class="lista">
      <?php

        if(isset($_POST['btn-entrar'])){
            $palavra = $_POST['palavra'];
            $sql1 = "SELECT * FROM tb_cadastros WHERE Nome LIKE '%$palavra%' OR Email LIKE '%$palavra%' OR Curso LIKE '%$palavra%'";
            // $sql1 = "SELECT * FROM tb_projetos WHERE Comentarios LIKE '%$palavra%' OR Categoria LIKE '%$palavra%'";
            
        } 
        // $sql1 = "SELECT * FROM tb_projetos WHERE Palavras LIKE '%$palavra%' OR Titulo LIKE '%$palavra%' OR Materia LIKE '%$palavra%'";
        
        else{
            $sql1 = "SELECT * FROM tb_cadastros ORDER BY ID DESC;";
        }

        $res1 = mysqli_query($conexao, $sql1);
        $vreg1;

        while($vreg1 = mysqli_fetch_row($res1)){

          $ID_User = $vreg1[0];
  
          $_SESSION['ID_User'] = $ID_User;

          $Nome = $vreg1[1];
          $Email = $vreg1[2];
          $Curso = $vreg1[3];


      ?>

        <div class="projeto">

          <div class="titulo">
            <?php
                echo $Nome;
            ?>
          </div>

          <div class="autor">
            <?php
              echo $Email." | ".$Curso;
            ?>
          </div>

          <!-- <a href="denuncia.php?ID=<?php echo $ID_User; ?>">
            <button class="button-projeto button button1-projeto button1" id="$ID_Projeto">VER MAIS</button>
          </a> -->
        </div>

          <?php
          }
          ?>

    </div>
    

    <div class="go-up">
      <a href="#topo">
        <img src="img/Up.png" alt="voltar para o topo" alt="voltar para o topo"/>
      </a>
    </div>

    <div class="footer">
     
        <div class="col-sm-2 rede-social">
          <a href="https://www.facebook.com/" target="_blank">
            <img src="img/facebook.png" alt="facebook"/>
            </a>
        </div>

        <div class="col-sm-2 rede-social">
          <a href="https://www.instagram.com/" target="_blank">
            <img src="img/insta.png" alt="instagram"/>
            </a>
        </div>

        <div class="col-sm-2 rede-social">
          <a href="https://twitter.com/" target="_blank">
            <img src="img/twitter.png" alt="twitter"/>
            </a>
        </div>

        <div class="col-sm-2 rede-social">
          <a href="mailto:gruposol413@gmail.com" target="_blank">
            <img src="img/mail.png" alt="e-mail"/>
            </a>
        </div>

        <div class="col-sm-4 logo-footer" >
          <a href="header.php">
          <img src="img/jaci.png" alt="logo"/>
          </a>
        </div>

    </div>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
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
