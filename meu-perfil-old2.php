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

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
  <title>Meu perfil | JACI</title>
      <link rel="icon" href="img/favicon.png" type="image/png" />
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style-home.css">
    
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <meta charset="utf-8">
      
      <link rel="icon" href="img/favicon.png" type="image/png" />
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style-perfil-old2.css">
  
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
    

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
      <link rel="icon" href="img/favicon.png" type="image/png" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
   
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
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

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 0px;
    margin-top: 25px;
    font-weight: 700;
}

nav{
  display: flex;
  height: 80px;
  width: 100%;
  background: #404040;
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
  z-index: 1;
  list-style: none;
}
nav ul li{
  margin: 0 5px;
}
nav ul li a{
  color: #24AE91;
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
  text-decoration: none;
  background-color: transparent;
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
    background: #404040;
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
    margin: 7px 0;
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


@media screen and (max-width: 700px){


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


body{
  background-color: #1D1D1D !important;
}



  .not-activate{
      color: #5EC7A7;
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
          padding: 20px;
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

        .popup{
					position: fixed;
					top: 15px; bottom: 0; 
		      right: 15px;
					margin: auto;
					width: 480px;
					height: 450px;
          padding: 40px;

					border: solid 1px #4c4d4f;
					background: #5EC7A7;
					display: none;
          font-size: 17px;
          text-align: center;
          font-family: 'Poppins', sans-serif;
        }
        
        /* .popup{
					position: absolute;
					top: 0; bottom: 0; 
					left: 0; right:0;
					margin: auto;
					width: 500px;
					height: 450px;
          padding: 40px;

					border: solid 1px #4c4d4f;
					background: #24AE91;
          background-image: url("img/Background.png");
					display: none;
          font-size: 17px;
          text-align: center;
          font-family: 'Poppins', sans-serif;
				} */


        .info-popup{
          color: black;
          padding-top: 10px;
          padding-bottom: 10px;
          font-weight: bold;
          font-size: 20px;
          text-transform: uppercase;
          font-family: 'Josefin Sans', sans-serif;
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
          height: 70px !important;
          width: 300px;
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


        .button2 {
          background-color: transparent; 
          font-weight: 800;
          color: #000; 
          height: 60px !important;
          width: 150px;
          border: 2px solid #000;
          font-family: 'Josefin Sans', sans-serif;
          transition: 0.3s;
        }

        .button2:hover {
          background-color: #0B342C; 
          font-weight: 600;
          color: #fff; 
          border: 2px solid #000;
          font-family: 'Josefin Sans', sans-serif;
          transition: 0.5s;
        }

        .info-close{
          color: black;
          padding-right: 0;
          margin: 0;
          float: right;
          padding-top: 0;
          font-weight: 900;
        }

        .info-close a{
          color: black;
          padding-right: 0;
          margin: 0;
          font-size: 19px;
          text-decoration: none;
          font-weight: 900;
        }
        .not-activate{
      color: #24AE91;
  }

  .activate{
      color: white;
  }


    </style>
  </head>
  <body>
    <nav>
      <div class="logo">
        <a href="header.php">
          <img src="img/logo.png" alt="logo"/>
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
<!-- <li><a href="#">Feedback</a></li> -->
<?php 
                if(isset($_SESSION['logado'])){
                  echo "<li><a class=active href=meu-perfil.php>MEU PERFIL</a></li>";
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

    <div class="row">
            <div class="col-sm-3 info">
                <div class="nome">
                <?php
                if(isset($_SESSION['logado'])){
                  echo $dados['Nome'];
                }
                ?>
                </div><br />
                <div class="update">
                    <a href="javascript: abrir();">
                    Minhas informações
                    </a>
                </div>

                <div class="update">
                    <a href="#">
                    Meus Projetos
                    </a>
                </div>

                <div class="excluir">
                    <a href="controller/excluir.php">
                    EXCLUIR MINHA CONTA
                    </a>
                </div>
            </div>
            <div class="col-sm-9 meus-projetos">




            <div>
          
                      <div class="banner" style="background-color: #5EC7A7;">
                        <div class="titulo">
                        <!-- <?php
                          echo $Titulo1;
                        ?> -->A IMPORTÂNCIA DA FILOSOFIA
                        </div>

                        
                      <a href="projeto.php?ID=<?php echo $ID_Projeto1; ?>">
                      <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                      </a>
                    
                      </div>

                      <div class="banner" style="background-color: #5EC7A7;">
                        <div class="titulo">
                        <!-- <?php
                          echo $Titulo1;
                        ?> -->A IMPORTÂNCIA DA FILOSOFIA
                        </div>

                        
                      <a href="projeto.php?ID=<?php echo $ID_Projeto1; ?>">
                      <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                      </a>
                    
                      </div>

                      <div class="banner" style="background-color: #5EC7A7;">
                        <div class="titulo">
                        <!-- <?php
                          echo $Titulo1;
                        ?> -->A IMPORTÂNCIA DA FILOSOFIA
                        </div>

                        
                      <a href="projeto.php?ID=<?php echo $ID_Projeto1; ?>">
                      <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                      </a>
                    
                      </div>

                      <div class="banner" style="background-color: #5EC7A7;">
                        <div class="titulo">
                        <!-- <?php
                          echo $Titulo1;
                        ?> -->A IMPORTÂNCIA DA FILOSOFIA
                        </div>

                        
                      <a href="projeto.php?ID=<?php echo $ID_Projeto1; ?>">
                      <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                      </a>
                    
                      </div>

          
          </div>
         
              
            <div id="popup" class="popup">
                <!-- <div class="info-close">
                  <a href="javascript: fechar();">X</a>
                </div> -->
              <strong class="info-popup">Suas informações</strong><br />	

              <br /><strong>Nome</strong><br />
              <?php
                if(isset($_SESSION['logado'])){
                  echo $dados['Nome'];
                }
              ?>

              <br /><br /><strong>E-mail</strong><br />
              <?php
                if(isset($_SESSION['logado'])){
                  echo $dados['Email'];
                }
              ?>

              <br /><br /><strong>Curso</strong><br />
              <?php
                if(isset($_SESSION['logado'])){
                  echo $dados['Curso'];
                }
              ?>
              <br /><br />
              <a href="#">
                <button class="button button1">EDITAR MINHAS INFORMAÇÕES</button>
              </a>

            </div>

            </div>
        </div>

  <!-- <div class="footer">
     
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
          <a href="#">
          <img src="img/jaci.png" alt="jaci logo"/>
          </a>
        </div>

  </div> -->
 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <script type="text/javascript">

						document.getElementById('popup').style.display = 'block';
					
					function abrir(){
						document.getElementById('popup').style.display = 'block';
					}
					function fechar(){
						document.getElementById('popup').style.display =  'none';
					}
				</script>

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