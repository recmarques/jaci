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
      if(isset($_SESSION['logado'])){
        
        // header('Location: index.php');
        $id = $_SESSION['ID'];
        $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
        $res = mysqli_query($conexao, $sql);

        $dados = mysqli_fetch_array($res);
 
      }

      $sql1 = "SELECT * FROM tb_projetos WHERE ID='1'";
      $res1 = mysqli_query($conexao, $sql1);
  
          $ID_Projeto1;
          $Titulo1;
          $Descricao1;
          $Palavras1;
          $Ano1;
          $Materia1;
          $Categoria1;
          $Conhecimento1;
          $Texto1;
          $ID_Usuario_Projeto1;
          $ID_Usuario2;
          $Nome1;
          $Email1;
          $Curso1;

          while($vreg = mysqli_fetch_row($res1)){

            $ID_Projeto1 = $vreg[0];
            $Titulo1 = $vreg[1];
            $Descricao1 = $vreg[2];
            $Palavras1 = $vreg[3];
            $Ano1 = $vreg[4];
            $Materia1 = $vreg[5];
            $Categoria1 = $vreg[6];
            $Conhecimento1 = $vreg[7];
            $Texto1 = $vreg[8];
            $ID_Usuario_Projeto1 = $vreg[9];

            $sql2 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto1'";
            $res2 = mysqli_query($conexao, $sql2);
            $vreg1;

            while($vreg1 = mysqli_fetch_row($res2)){
                $ID_Usuario1 = $vreg1[0];
                $Nome1 = $vreg1[1];
                $Email1 = $vreg1[2];
                $Curso1 = $vreg1[3];
            }
          }



      $sql2 = "SELECT * FROM tb_projetos WHERE ID='2'";
      $res2 = mysqli_query($conexao, $sql2);

      $ID_Projeto2;
      $Titulo2;
      $Descricao2;
      $Palavras2;
      $Ano2;
      $Materia2;
      $Categoria2;
      $Conhecimento2;
      $Texto2;
      $ID_Usuario_Projeto2;
      $ID_Usuario2;
      $Nome2;
      $Email2;
      $Curso2;

      while($vreg = mysqli_fetch_row($res2)){

        $ID_Projeto2 = $vreg[0];
        $Titulo2 = $vreg[1];
        $Descricao2 = $vreg[2];
        $Palavra2 = $vreg[3];
        $Ano2 = $vreg[4];
        $Materia2 = $vreg[5];
        $Categoria2 = $vreg[6];
        $Conhecimento2 = $vreg[7];
        $Texto2 = $vreg[8];
        $ID_Usuario_Projeto2 = $vreg[9];

        $sql3 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto2'";
        $res3 = mysqli_query($conexao, $sql3);
        $vreg1;

        while($vreg1 = mysqli_fetch_row($res3)){
            $ID_Usuario2 = $vreg1[0];
            $Nome2 = $vreg1[1];
            $Email2 = $vreg1[2];
            $Curso2 = $vreg1[3];
        }
      }


      $sql3 = "SELECT * FROM tb_projetos WHERE ID='3'";
      $res3 = mysqli_query($conexao, $sql3);

      $ID_Projeto3;
      $Titulo3;
      $Descricao3;
      $Palavras3;
      $Ano3;
      $Materia3;
      $Categoria3;
      $Conhecimento3;
      $Texto3;
      $ID_Usuario_Projeto3;
      $ID_Usuario3;
      $Nome3;
      $Email3;
      $Curso3;

      while($vreg = mysqli_fetch_row($res3)){

        $ID_Projeto3 = $vreg[0];
        $Titulo3 = $vreg[1];
        $Descricao3 = $vreg[2];
        $Palavra3 = $vreg[3];
        $Ano3 = $vreg[4];
        $Materia3 = $vreg[5];
        $Categoria3 = $vreg[6];
        $Conhecimento3 = $vreg[7];
        $Texto3 = $vreg[8];
        $ID_Usuario_Projeto3 = $vreg[9];

        $sql4 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto3'";
        $res4 = mysqli_query($conexao, $sql4);
        $vreg1;

        while($vreg1 = mysqli_fetch_row($res4)){
            $ID_Usuario3 = $vreg1[0];
            $Nome3 = $vreg1[1];
            $Email3 = $vreg1[2];
            $Curso3 = $vreg1[3];
        }
      }


      $sql4 = "SELECT * FROM tb_projetos WHERE ID='4'";
      $res4 = mysqli_query($conexao, $sql4);

      $ID_Projeto4;
      $Titulo4;
      $Descricao4;
      $Palavras4;
      $Ano4;
      $Materia4;
      $Categoria4;
      $Conhecimento4;
      $Texto4;
      $ID_Usuario_Projeto4;
      $ID_Usuario4;
      $Nome4;
      $Email4;
      $Curso4;

      while($vreg = mysqli_fetch_row($res4)){

        $ID_Projeto4 = $vreg[0];
        $Titulo4 = $vreg[1];
        $Descricao4 = $vreg[2];
        $Palavra4 = $vreg[3];
        $Ano4 = $vreg[4];
        $Materia4 = $vreg[5];
        $Categoria4 = $vreg[6];
        $Conhecimento4 = $vreg[7];
        $Texto4 = $vreg[8];
        $ID_Usuario_Projeto4 = $vreg[9];

        $sql5 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto4'";
        $res5 = mysqli_query($conexao, $sql5);
        $vreg1;

        while($vreg1 = mysqli_fetch_row($res5)){
            $ID_Usuario4 = $vreg1[0];
            $Nome4 = $vreg1[1];
            $Email4 = $vreg1[2];
            $Curso4 = $vreg1[3];
        }
      }


      $sql5 = "SELECT * FROM tb_projetos WHERE ID='5'";
      $res5 = mysqli_query($conexao, $sql5);

      $ID_Projeto5;
      $Titulo5;
      $Descricao5;
      $Palavras5;
      $Ano5;
      $Materia5;
      $Categoria5;
      $Conhecimento5;
      $Texto5;
      $ID_Usuario_Projeto5;
      $ID_Usuario5;
      $Nome5;
      $Email5;
      $Curso5;

      while($vreg = mysqli_fetch_row($res5)){

        $ID_Projeto5 = $vreg[0];
        $Titulo5 = $vreg[1];
        $Descricao5 = $vreg[2];
        $Palavra5 = $vreg[3];
        $Ano5 = $vreg[4];
        $Materia5 = $vreg[5];
        $Categoria5 = $vreg[6];
        $Conhecimento5 = $vreg[7];
        $Texto5 = $vreg[8];
        $ID_Usuario_Projeto5 = $vreg[9];

        $sql6 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto5'";
        $res6 = mysqli_query($conexao, $sql6);
        $vreg1;

        while($vreg1 = mysqli_fetch_row($res6)){
            $ID_Usuario5 = $vreg1[0];
            $Nome5 = $vreg1[1];
            $Email5 = $vreg1[2];
            $Curso5 = $vreg1[3];
        }
      }


      $sql6 = "SELECT * FROM tb_projetos WHERE ID='6'";
      $res6 = mysqli_query($conexao, $sql6);

      $ID_Projeto6;
      $Titulo6;
      $Descricao6;
      $Palavras6;
      $Ano6;
      $Materia6;
      $Categoria6;
      $Conhecimento6;
      $Texto6;
      $ID_Usuario_Projeto6;
      $ID_Usuario6;
      $Nome6;
      $Email6;
      $Curso6;

      while($vreg = mysqli_fetch_row($res6)){

        $ID_Projeto6 = $vreg[0];
        $Titulo6 = $vreg[1];
        $Descricao6 = $vreg[2];
        $Palavra6 = $vreg[3];
        $Ano6 = $vreg[4];
        $Materia6 = $vreg[5];
        $Categoria6 = $vreg[6];
        $Conhecimento6 = $vreg[7];
        $Texto6 = $vreg[8];
        $ID_Usuario_Projeto6 = $vreg[9];

        $sql7 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto6'";
        $res7 = mysqli_query($conexao, $sql7);
        $vreg1;

        while($vreg1 = mysqli_fetch_row($res7)){
            $ID_Usuario6 = $vreg1[0];
            $Nome6 = $vreg1[1];
            $Email6 = $vreg1[2];
            $Curso6 = $vreg1[3];
        }
      }
    
?>





<!DOCTYPE html>

  <html lang="en" dir="ltr">
    <head>
      <title>Página Inicial | JACI</title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta charset="utf-8">

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style-home.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link rel="icon" sizes="192x192" href="img/favicon.png" type="image/png">
      <link rel="apple-touch-icon" sizes="57x57" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="60x60" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="72x72" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="76x76" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="114x114" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="120x120" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="144x144" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="152x152" href="img/favicon.png">
      <link rel="apple-touch-icon" sizes="180x180" href="img/favicon.png">
      <link rel="icon" type="image/png" sizes="192x192" href="img/favicon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
      <link rel="icon" type="image/png" sizes="96x96" hhref="img/favicon.png">
      <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
      <link rel="manifest" href="img/favicon.png">
        
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      
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
          background: #23a78a;
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

    .hero-image {
      background-color: #24AE91;
      height: 475px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
      margin: 0;
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
      padding-top: 10%;
      color: white;
      padding-right: 11%;
      line-height: 55px;
      font-size:31px;
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

    @media screen and (min-width: 1400px){
      .img-banner img{
        width: 90%;
        padding-top: 0;
        padding-left: 150px;
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

      .button {
        border: none;
        color: #ddd;
        padding: 4px 60px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 11px;
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

      .button1-projeto {
        background-color: transparent; 
        font-weight: 800;
        color: #000; 
        border: 2px solid #000;
        font-family: 'Josefin Sans', sans-serif;
        transition: 0.3s;
      }

      .button1-projeto:hover {
        background-color: #0B342C; 
        font-weight: 600;
        color: #fff; 
        border: 2px solid #000;
        font-family: 'Josefin Sans', sans-serif;
        transition: 0.5s;
      }

      .footer{
        background-color: #1D1D1D;
        width: 100%;
        height: 220px !important;
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

      .ver-mais{
        padding-left: 45%;
      }

      .button-vermais {
        border: none;
        padding: 30px 100px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 11px;
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
            max-width: 510px;
            font-size: 58px;
            text-transform: uppercase;
        }
        .banner .autor {
            font-size: 17px;
            margin: 0;
            text-transform: uppercase;
            padding: 0;
        }

        .button-projeto {
            
            padding: 4px 65px;
            
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
      text-transform: uppercase;
    }

    .banner .autor{
      font-size: 15px;
      margin: 0;
      text-transform: uppercase;
      padding: 0;
    }

    .row{
      width: 100%;
    }

    .row-2{
      width: 100%;
      display: -webkit-inline-box;
      padding: 0;
    }

    .ver-mais{
      height: 100px;
      background-color: #1D1D1D;
      width: 100%;
      align-content: center;
      align-items: center;
      -moz-box-align: center;
      padding-left: 42%;
      padding-top: 5px;
    }

    .footer{
      background-color: #1D1D1D;
      width: 100%;
      align-content: center;
      align-items: center;
      -moz-box-align: center;
      height: 170px;
    }

    .footer .rede-social{
      background-color: #1D1D1D;
      align-content: center;
      align-items: center;
      -moz-box-align: center;
      padding-left: 110px;
      padding-top: 30px;
    }

    .footer .logo-footer{
      background-color: #1D1D1D;
      align-content: center;
      align-items: center;
      -moz-box-align: center;
      padding-left: 120px;
    }

    .footer .logo-footer img{
      width: 65%;
    }

    .rede-social img{
      width: 90%;
    }

    @media screen and (max-width: 700px){

      .hero-image{
        height: 640px;
      }

      .banner .autor{
        line-height: 30px;
        padding: 21px 0;
      }

      .bem-vindo{
        font-size: 23px;
        line-height: 37px;
        text-align: center !important;
        padding-right: 0;
        padding-left: 0;
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

      .button-projeto {
        border: none;
        color: #ddd;
        padding: 1px 65px;
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
      }

      .button1-projeto:hover {
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

      .ver-mais{
        padding: 0;
        text-align: center;
        align-content: center;
        align-items: center;
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

      .hero-image .row{
        padding-right: 0;
        padding-left: 0;
        margin: 0;
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

    .hero-image strong{
      font-weight: 600;
    }
   
  </style>
    </head>
      <body>
        <nav>
          <div class="logo">
            <a href="header.php">
            <img src="img/logo-black.png" alt="logo"/></a>
          </div>
        <input type="checkbox" id="click">
          <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
          </label>

          <ul>
            <li><a class="active" href="header.php">INÍCIO</a></li>
            <li><a href="projetos.php">PROJETOS</a></li>
            <li><a href="criar-projeto.php">CRIAR PROJETO</a></li>
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


        <div class="hero-image" id="hero-image">
          <div class="row">

            <div class="col-sm-5 img-banner">
              <img src="img/img-banner.png" alt="personagem"/>
            </div>

            <div class="col-sm-7 bem-vindo">Seja bem-vindo(a),
              <?php 
                if(isset($_SESSION['logado'])){
                  echo $dados['Nome'];
                }
              ?>
              <br />

              <strong>Qual material deseja acessar?</strong><br />

              <a href="projetos.php">
                <button class="button button1">VER PROJETOS</button>
              </a>
            </div>

          </div>
        </div>
    

      <!-- PRIMEIRA LINHA -->
      <div class="row-2">

      
        <div class="banner" style="background-color: #5EC7A7;">
          <div class="titulo">
          <?php
            echo $Titulo1;
          ?>
          </div>

          <div class="autor">
          <?php
            echo $Nome1." | ".$Ano1. " | ".$Materia1;
            
          ?>
          </div>

          <a href="projeto.php?ID=<?php echo $ID_Projeto1; ?>">
            <button class="button-projeto button button1-projeto button1">VER MAIS</button>
          </a>
        </div>

        
        <div class="banner" style="background-color: #B7EBDB;">
          <div class="titulo">
          <?php
            echo $Titulo2;
          ?>
          </div>

          <div class="autor">
          <?php
            echo $Nome2." | ".$Ano2. " | ".$Materia2;;
            
          ?>
          </div>

          <a href="projeto.php?ID=<?php echo $ID_Projeto2; ?>">
            <button class="button-projeto button button1-projeto button1">VER MAIS</button>
          </a>
        </div>


        </div>


      <!-- SEGUNDA LINHA -->
      <div class="row-2">


        <div class="banner" style="background-color: #A5FFE4;">
          <div class="titulo">
          <?php
              echo $Titulo3;
            ?>
          </div>

          <div class="autor">
          <?php
              echo $Nome3." | ".$Ano3. " | ".$Materia3;
              
            ?>
          </div>

          <a href="projeto.php?ID=<?php echo $ID_Projeto3; ?>">
            <button class="button-projeto button button1-projeto button1">VER MAIS</button>
          </a>
        </div>

      
        <div class="banner" style="background-color: #86C3B1;">
          <div class="titulo">
          <?php
              echo $Titulo4;
            ?>
          </div>

          <div class="autor">
          <?php
              echo $Nome4." | ".$Ano4. " | ".$Materia4;;
              
            ?>
          </div>

          <a href="projeto.php?ID=<?php echo $ID_Projeto4; ?>">
            <button class="button-projeto button button1-projeto button1">VER MAIS</button>
          </a>
        </div>


      </div>


      <!-- TERCEIRA LINHA -->
      <div class="row-2 no-show-mobile">
    
        <div class="banner" style="background-color: #8EDDC5;">
          <div class="titulo">
          <?php
                echo $Titulo5;
              ?>
          </div>

          <div class="autor">
          <?php
                echo $Nome5." | ".$Ano5. " | ".$Materia5;;
                
              ?>
          </div>
          <a href="projeto.php?ID=<?php echo $ID_Projeto5; ?>">
            <button class="button-projeto button button1-projeto button1">VER MAIS</button>
          </a>
      </div>

  
      <div class="banner" style="background-color: #5BBDA0;">
        <div class="titulo">
        <?php
              echo $Titulo6;
            ?>
        </div>

        <div class="autor">
        <?php
              echo $Nome6." | ".$Ano6. " | ".$Materia6;;
              
            ?>
        </div>
        <a href="projeto.php?ID=<?php echo $ID_Projeto6; ?>">
          <button class="button-projeto button button1-projeto button1">VER MAIS</button>
        </a>
      </div>


    </div>



  <div class="ver-mais">
    <a href="projetos.php">
      <button class="button-vermais button1-vermais">VER MAIS</button>
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
          <a href="#">
          <img src="img/jaci.png" alt="jaci logo"/>
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
