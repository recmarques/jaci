<?php

	// conexao
    // require_once '../conexao.inc';
     $servername = "us-cdbr-east-02.cleardb.com";
     $username = "b0394718678768";
     $password = "33161d76";
     $db_name = "heroku_390caed3836a8d5";
    
     $conexao = mysqli_connect($servername, $username, $password);
     mysqli_select_db($conexao, $db_name);
  
    $id;
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
    }
    else{
      if(isset($_SESSION['logado'])){

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

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>

  <title>Meu perfil | <?php echo $dados[1]." | ";?>JACI</title>
      
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta charset="utf-8">
      
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style-perfil.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;400;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="icon" href="img/favicon.png" type="image/png" />
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
      
 
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

    .excluir{
    /* padding: 300px 60px; */
    /* padding-top: 50px; */
      padding-top: 30px !important;
      font-family: 'Josefin Sans', sans-serif;
      text-transform: uppercase;
      font-weight: 900;
      text-decoration: none;
      color: #000000;
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

      .popup{
        position: static !important;
        width: 100%;
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
      background-color: #353535 !important
    }

    /* 
    body{
      background-color: #1D1D1D !important;
    } */

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
					top: 79px; bottom: 0; 
		      right: 15px;
					margin: auto;
					width: 645px;
					height: 515px;
          padding: 40px;
          color: black;
					border: solid 1px #4c4d4f;
					background: #5EC7A7;
					display: none;
          font-size: 19px;
          text-align: center;
          /* font-family: 'Poppins', sans-serif; */
          font-family: 'Source Sans Pro', sans-serif;
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
          font-size: 25px;
          font-weight: bold;
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
          text-decoration: none;
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
          text-decoration: none;
        }

        .button2:hover {
          background-color: #0B342C; 
          font-weight: 600;
          color: #fff; 
          text-decoration: none;
          border: 2px solid #000;
          font-family: 'Josefin Sans', sans-serif;
          transition: 0.5s;
        }

        .button3 {
          background-color: transparent; 
          font-weight: 800;
          color: #000; 
          height: 60px !important;
          width: 180px;
          border: 2px solid #000;
          font-family: 'Josefin Sans', sans-serif;
          transition: 0.3s;
          text-decoration: none;
        }

        .button3:hover {
          background-color: #0B342C; 
          font-weight: 600;
          color: #fff; 
          text-decoration: none;
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

        .seus-projetos{
          font-weight: 900;
          font-family: 'Josefin Sans', sans-serif;
        }


    @media screen and (max-width: 700px){

      .banner{
          width: 100%;
          height: 300px;
          padding-left: 30px;
          padding-top: 30px !important;
      }

      .banner .titulo{
      font-size: 33px;
      line-height: 40px;
      }

      .banner .autor{
      font-size: 15px;
      margin: 0;
      text-transform: uppercase;
      padding: 0;
      line-height: 35px;
      }

      .popup-denuncias{
			width: 95% !important;
			height: 315px !important;
			padding: 15px;
      line-height: 30px;
			background: #CA3C3C;
      display:block;
      font-family: 'Poppins', sans-serif;
      }
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

      .banner .titulo {
        color: black;
        text-align: left;
        font-weight: 700;
        max-width: 90%;
        font-size: 49px;
        line-height: 66px;
        text-transform: uppercase;
      }

      .banner {
        width: 53%;
        height: 350px;
      }

      .popup {
        position: fixed;
        bottom: 0;
        right: 15px;
        margin: auto;
        width: 45%;
        top: 63px;
        height: 610px;
      }

      .info-popup {
        color: black;
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
        font-size: 29px;
        font-weight: bold;
        text-transform: uppercase;
        font-family: 'Josefin Sans', sans-serif;
      }

      .informacoes-user-popup{
        font-size: 23px;
      }

      .banner .autor {
          font-size: 17px;
      }

      .button{
        font-size: 12px;
      }

      .button2 {
          height: 65px !important;
          width: 163px;
      }

      .button3 {
          height: 65px !important;
          width: 163px;
      }
    }

    .popup-denuncias{
			position: fixed;
			top: 0; bottom: 0; 
			left: 0; right:0;
			/* margin: auto; */
      margin-top: 96px;
      margin-left:10px;
			width: 50%;
			height: 180px;
			padding: 15px;
      line-height: 30px;
			/* border: solid 1px #4c4d4f; */
			background: #CA3C3C;
			/* display: none; */
      display:block;
      font-family: 'Poppins', sans-serif;
		
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

            <div class="col-sm-9 meus-projetos">

          <!-- <?php


            $sql4 = "SELECT * FROM tb_projetos WHERE ID_Usuario = '$id' ORDER BY ID DESC";
            $res4 = mysqli_query($conexao, $sql4);

            if (!(mysqli_num_rows($res4)==0)) {

            while($vreg4 = mysqli_fetch_row($res4)){

                $ID_Projeto = $vreg4[0];

                $_SESSION['ID_Projeto'] = $ID_Projeto;

                $Titulo = $vreg4[1];
                $Descricao = $vreg4[2];
                $Palavras = $vreg4[3];
                $Ano = $vreg4[4];
                $Materia = $vreg4[5];
                $Categoria = $vreg4[6];
                $Conhecimento = $vreg4[7];
                $Texto = $vreg4[8];
                $ID_Usuario_Projeto = $vreg4[9];
                 

            $sql2 = "SELECT * FROM tb_denuncias WHERE ID_Projeto = '$ID_Projeto'";
            $res2 = mysqli_query($conexao, $sql2);

            if (!(mysqli_num_rows($res2)==0)) {

            while($vreg2 = mysqli_fetch_row($res2)){

                $ID_Denuncia = $vreg2[0];

                $_SESSION['ID_Denuncia'] = $ID_Denuncia;

                $Comentarios_Denuncia = $vreg2[1];
                $Categoria_Denuncia = $vreg2[2];
                $ID_Projeto_Denuncia = $vreg2[3];
                $ID_Usuario_Denuncia = $vreg2[4];


                $sql3 = "SELECT * FROM tb_projetos WHERE ID = '$ID_Projeto_Denuncia'";
                $res3 = mysqli_query($conexao, $sql3);

                if (!(mysqli_num_rows($res3)==0)) {

                while($vreg3 = mysqli_fetch_row($res3)){

                      $ID_Projeto = $vreg3[0];

                      $_SESSION['ID_Projeto'] = $ID_Projeto;
            
                      $Titulo = $vreg3[1];
                      $Descricao = $vreg3[2];
                      $Palavras = $vreg3[3];
                      $Ano = $vreg3[4];
                      $Materia = $vreg3[5];
                      $Categoria = $vreg3[6];
                      $Conhecimento = $vreg3[7];
                      $Texto = $vreg3[8];
                      $ID_Usuario_Projeto = $vreg3[9];

          ?>
            <div id="popup-denuncias" class="popup-denuncias">
                <p>Seu projeto <?php echo "<strong> '".$Titulo."' </strong>"; ?> foi denúnciado por conter
                <?php
                if ($Categoria_Denuncia == 'Outro'){
                  echo 'algum motivo não explícito';
                }
                else{
                echo $Categoria_Denuncia;
                }?>! Por favor, revise o conteúdo publicado.
                </p>			


                <a style="text-decoration: none;" href="javascript: fechar();">
                      <button class="button-projeto button button1-projeto button2">ENTENDIDO</button>
                </a>

                <a style="text-decoration: none;" href="projeto.php?ID=<?php echo $ID_Projeto; ?>">
                      <button class="button-projeto button button1-projeto button3">VER PROJETO</button>
                </a>
            </div>
            <?php
            }}}}}} 
            ?> -->


                      <!-- <a href="javascript: abrir();">Abrir Pop-up</a><br>
                      <a href="javascript: fechar();">Fechar Pop-up</a><br>
                      
                      <a href="#" onMouseOver="abrir();">Passar o mouse para abrir</a><br>
                      <a href="#" onMouseOver="fechar();">Passar o mouse para fechar</a> -->

            <div>

              <h3 class="seus-projetos"><strong>SEUS PROJETOS</strong></h3>
            
            <?php

                $sql1 = "SELECT * FROM tb_projetos WHERE ID_Usuario = '$id' ORDER BY ID DESC";
                $res1 = mysqli_query($conexao, $sql1);
                
                if (!(mysqli_num_rows($res1)==0)) {
               
                while($vreg = mysqli_fetch_row($res1)){

                    $ID_Projeto = $vreg[0];

                    $_SESSION['ID_Projeto'] = $ID_Projeto;

                    $Titulo = $vreg[1];
                    $Descricao = $vreg[2];
                    $Palavras = $vreg[3];
                    $Ano = $vreg[4];
                    $Materia = $vreg[5];
                    $Categoria = $vreg[6];
                    $Conhecimento = $vreg[7];
                    $Texto = $vreg[8];
                    $ID_Usuario_Projeto = $vreg[9];
    
                    ?>
                   
                  <div class="banner" style="background-color: #5EC7A7;">
                      
                    <div class="titulo">
                      <?php
                        echo $Titulo;
                      ?>
                    </div>

                    <div class="autor">
                      <?php
                        echo $Ano. " | ".$Materia;
                      ?>
                    </div>
                        
                      <!-- <a href="projeto.php?ID=<?php echo $ID_Projeto; ?>">
                      <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                      </a> -->

                      <a style="text-decoration: none;" href="projeto.php?ID=<?php echo $ID_Projeto; ?>">
                        <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                      </a>

                      <a href="controller/editar-projeto.php?ID=<?php echo $ID_Projeto; ?>"><img src="img/edit.png" alt="editar projeto" /></a>

                      <a href="controller/excluir-projeto.php?ID=<?php echo $ID_Projeto; ?>"><img src="img/delete.png" alt="excluir projeto"/></a>
                      
                    
                      </div>
                    
                  <?php
                    }}
                    else
                    {
                  ?>

                    <div class="banner" style="background-color: #5EC7A7;">

                        <div class="titulo">
                          Nenhum projeto cadastrado!
                        </div>

                        <div class="autor">
                          CRIE UM PROJETO AGORA! CLIQUE NO BOTÃO ABAIXO.
                        </div>
                        
                        <a href="criar-projeto.php">
                          <button class="button-projeto button button1-projeto button2">CADASTRAR</button>
                        </a>
                    
                    </div>

                  <?php
                  }
                  ?>

               
                  <h3 class="seus-projetos"><strong>SUAS DENÚNCIAS FEITAS</strong></h3>
                  
                  <?php

                    $sql1 = "SELECT * FROM tb_denuncias WHERE ID_Usuario = '$id'";
                    $res1 = mysqli_query($conexao, $sql1);
                    
                    if (!(mysqli_num_rows($res1)==0)) {
                  
                    while($vreg = mysqli_fetch_row($res1)){

                        $ID_Denuncias = $vreg[0];

                        $_SESSION['ID_Denuncias'] = $ID_Denuncias;

                        $Comentarios_Denuncias = $vreg[1];
                        $Categoria_Denuncias = $vreg[2];
                        $ID_Projeto_Denuncias = $vreg[3];
                        $ID_Usuario_Denuncias = $vreg[4];


                        $sql3 = "SELECT * FROM tb_projetos WHERE ID = '$ID_Projeto_Denuncias'";
                        $res3 = mysqli_query($conexao, $sql3);

                        if (!(mysqli_num_rows($res3)==0)) {

                        while($vreg3 = mysqli_fetch_row($res3)){

                              $ID_Projeto = $vreg3[0];

                              $_SESSION['ID_Projeto'] = $ID_Projeto;
                    
                              $Titulo = $vreg3[1];
                              $Descricao = $vreg3[2];
                              $Palavras = $vreg3[3];
                              $Ano = $vreg3[4];
                              $Materia = $vreg3[5];
                              $Categoria = $vreg3[6];
                              $Conhecimento = $vreg3[7];
                              $Texto = $vreg3[8];
                              $ID_Usuario_Projeto = $vreg3[9];
        
                        ?>
                      
                      <div class="banner" style="background-color: #5EC7A7;">
                          
                        <div class="titulo">
                          <?php
                            echo $Titulo;
                          ?>
                        </div>

                        <div class="autor">
                          <?php
                            echo $Categoria." | Motivo: ".$Categoria_Denuncias;
                          ?>
                        </div>
                            

                          <a style="text-decoration: none;" href="projeto.php?ID=<?php echo $ID_Projeto; ?>">
                            <button class="button-projeto button button1-projeto button2">VER MAIS</button>
                          </a>

                          <a href="controller/editar-denuncia.php?ID=<?php echo $ID_Denuncias; ?>"><img src="img/edit.png" alt="editar projeto" /></a>

                          <a href="controller/excluir-denuncia.php?ID=<?php echo $ID_Denuncias; ?>"><img src="img/delete.png" alt="excluir projeto"/></a>
                          
                        
                          </div>
                        
                      <?php
                        }}}}
                        else
                        {
                      ?>

                        <div class="banner" style="background-color: #5EC7A7;">

                            <div class="titulo">
                              Nenhuma denúncia feita!
                            </div>

                            <div class="autor">
                              VOCÊ PODE DENUNCIAR QUALQUER PROJETO QUE ACHAR NECESSÁRIO!
                            </div>
                            
                            <a href="projetos.php">
                              <button class="button-projeto button button1-projeto button3">VER PROJETOS</button>
                            </a>
                        
                        </div>

                      <?php
                      }
                      ?>




                  </div>
         
              
            <div id="popup" class="popup">
                <!-- <div class="info-close">
                  <a href="javascript: fechar();">X</a>
                </div> -->
              <strong class="info-popup">Suas informações</strong><br />	
              

              <div class="informacoes-user-popup">
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
              </div>
              <br /><br />
              <a href="controller/editar-cadastro.php?ID=<?php echo $id; ?>">
                <button class="button button1" style="margin: auto; width: 285px;">EDITAR MINHAS INFORMAÇÕES</button>
              </a>

              <div class="excluir">
                    <a href="controller/excluir.php">
                    EXCLUIR MINHA CONTA
                    </a>
                </div>

            </div>

            </div>
        </div>

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

      <script type="text/javascript">
					function abrir(){
						document.getElementById('popup-denuncias').style.display = 'block';
					}
					function fechar(){
						document.getElementById('popup-denuncias').style.display =  'none';
					}

			</script>

    </body>
  </html>

<?php
  mysqli_close($conexao);
?>
