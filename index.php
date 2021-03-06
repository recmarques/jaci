<?php

  $arquivo = fopen("contador.txt", "r");
  $cont = fread($arquivo, 21); //999 999 999 999 999 999 999
  $cont++;

  $arquivo = fopen("contador.txt", "w");
  fwrite($arquivo, $cont);

  fclose($arquivo);

?>

<!DOCTYPE html>
  <html lang="pt-br" dir="ltr">
    <head>
      <meta charset="utf-8">
      
      <title>Seja bem-vindo(a)! | JACI</title>
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      
      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-splash.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      
     <style>
      @media screen and (min-width: 1400px){

      .col-sm-6 .right, .col-sm-6 .right img{
        align-content: left;
        align-items: left;
        max-width: 600px;
        padding-top: 50px;
        padding-right: 0px;
        font-weight: 900;
        text-align: right;
        color: white;
        font-size: 25px;
        font-family: 'Poppins', sans-serif;
        width: 63% !important;
      }

      .button {
        border: none;
        height: 115px;
        width: 355px;
        font-size: 13px;
        margin: 7px 2px;
        cursor: pointer;
        font-family: 'Josefin Sans', sans-serif;
      }

      .button1 {
        background-color: transparent; 
        font-weight: 800;
        color: #000; 
        border: 3px solid #000;
        font-family: 'Josefin Sans', sans-serif;
        transition: 0.3s;
      }
          
      .right-col{
        padding-right: 215px !important;
      }
    }
     </style>
    </head>

    <body>

        <div class="row">
        
            <div class="col-sm-6">
                <img src="img/splash-img.png" class="splash-img no-show-mobile" alt="splash image"/>
            </div>

            <div class="col-sm-6 right-col">
                <div class="right">
                  <img src="img/logo-black.png" class="logo-splash" alt="logo preta"/><br />
                  <img src="img/splash-img.png" class="splash-img no-show-desktop" alt="personagem"/>
                  Sua plataforma de estudos<br />online!<br /><br />
                
                  <a href="header.php">
                    <button class="button button1">ACESSAR A PLATAFORMA</button><br />
                  </a>

                  <a href="cadastro.php">
                    <button class="button button1">CADASTRAR</button>
                  </a>

                   <!-- <p class="acessos">
                    <?php
                      echo "Quantidade de acessos: $cont ❤";
                    ?>
                  </p>  -->
                </div>
            </div>

        </div>
        
    </body>
  </html>
