<?php

	// conexao
    // require_once '../conexao.inc';
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "jacidb";
	
	$conexao = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conexao, $db_name);
	
	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	endif;
	// include 'conexao.inc';
	
	// Sessão
    session_start();
    
    // Verificação

    mysqli_set_charset($conexao, "utf8");
    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }else{

    if(isset($_SESSION['logado'])){
        // header('Location: index.php');
        $id = $_SESSION['ID'];
        $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
        $res = mysqli_query($conexao, $sql);

        $dados = mysqli_fetch_array($res);

        
    
    // Dados
    // $id = $_SESSION['ID'];
    // $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
    // $res = mysqli_query($conexao, $sql);

    // $dados = mysqli_fetch_array($res);
    }
    }

    mysqli_close($conexao);
    
?>






<!DOCTYPE html>
  <html>
    <head>

      <meta charset="utf-8">
      <title>Meu perfil | JACI</title>
      <link rel="icon" href="img/favicon.png" type="image/png" />
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style-perfil.css">
      <!-- <link rel="stylesheet" href="testes/Responsive Navigation Menu/style.css"> -->
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <style>
body{
  background-color: #1D1D1D !important;
}

  .nav-wrapper{
      background-color: #23a78a;
      font-family: 'Josefin Sans', sans-serif;
  }
  .nav-wrapper .brand-logo{
      padding-left: 55px;
  }

  .nav-wrapper .brand-logo img{
      width: 30%;
  }



  @media screen and (max-width: 700px){
      
      .nav-wrapper .brand-logo img{
          width: 40%;
      }
  }

  #nav-mobile{
      padding-right: 10px;
      
      
  }

  #nav-mobile a{
      padding-right: 35px;
      padding-left: 35px;
      font-size: 14px;
      font-weight: 700;
      align-content: center;
      text-align: center;
  }

  #nav-mobile a:hover{
     text-decoration: none;
      color: white;

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


@media screen and (min-width: 1400px){

.footer{
background-color: #1D1D1D;
width: 100%;
height: 200px !important;
}

.footer .rede-social{
background-color: #1D1D1D;
align-content: center;
align-items: center;
-moz-box-align: center;
padding-left: 110px;
padding-top: 25px;
}

.footer .logo-footer{
background-color: #1D1D1D;
align-content: center;
align-items: center;
-moz-box-align: center;
padding-left: 120px;
}


.footer .logo-footer img{
width: 55%;

}

.rede-social img{
width: 70% !important;
padding-top: 10px;
}


}

.row{
width: 100% !important;
}

.footer{
background-color: #1D1D1D;
width: 100%;
align-content: center;
align-items: center;
-moz-box-align: center;
height: 185px;
}

.footer .rede-social{
background-color: #1D1D1D;
align-content: center;
align-items: center;
-moz-box-align: center;
padding-left: 110px;
padding-top: 45px;
}

.footer .logo-footer{
background-color: #1D1D1D;
align-content: center;
align-items: center;
-moz-box-align: center;
padding-left: 120px;
padding-top: 25px;

}


.footer .logo-footer img{
width: 65%;

}

.rede-social img{
width: 90%;
}

@media screen and (max-width: 700px){

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


      </style>
    
    </head>

    <body>

  

        <nav>
            <div class="nav-wrapper">
              <a href="header.php" class="brand-logo">
                  <img src="img/logo-black.png" />
              </a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="activate" href="header.php">INÍCIO</a></li>
                <li><a class="not-activate" href="projetos.php">PROJETOS</a></li>
                <li><a class="not-activate" href="criar-projeto.php">CRIAR PROJETO</a></li>
                
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
            </div>
          </nav>

      
          <div class="row">
            <div class="col-sm-3 info">
                <div class="nome">
                <?php
                if(isset($_SESSION['logado'])){
                  echo $dados['Nome'];
                }
                ?>
                </div>
                <div class="update">
                    <a href="#">
                    Minhas informações
                    </a>
                </div>

                <div class="excluir">
                    <a href="controller/excluir.php">
                    EXCLUIR MINHA CONTA
                    </a>
                </div>
            </div>
            <div class="col-sm-9 meus-projetos">
                
            </div>
        </div>

  <div class="footer">
     
        <div class="col-sm-2 rede-social">
          <a href="https://www.facebook.com/" target="_blank">
            <img src="img/facebook.png"/>
            </a>
        </div>

        <div class="col-sm-2 rede-social">
          <a href="https://www.instagram.com/" target="_blank">
            <img src="img/insta.png"/>
            </a>
        </div>

        <div class="col-sm-2 rede-social">
          <a href="https://twitter.com/" target="_blank">
            <img src="img/twitter.png"/>
            </a>
        </div>

        <div class="col-sm-2 rede-social">
          <a href="mailto:gruposol413@gmail.com" target="_blank">
            <img src="img/mail.png"/>
            </a>
        </div>

        <div class="col-sm-4 logo-footer" >
          <a href="#">
          <img src="img/jaci.png"/>
          </a>
        </div>

  </div>
 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
  </html>