<?php

  $arquivo = fopen("contador.txt", "r");
  $cont = fread($arquivo, 21); //999 999 999 999 999 999 999
  $cont++;

  $arquivo = fopen("contador.txt", "w");
  fwrite($arquivo, $cont);

  fclose($arquivo);

?>

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>Seja bem-vindo(a)! | JACI</title>
      <link rel="icon" href="img/favicon.png" type="image/png" />
      <!-- <link rel="icon" href="img/logo-preta-preenchida.png" type="image/png" /> -->
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <link rel="stylesheet" href="css/style-splash.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      
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
    </head>

    <body>

        <div class="row">
            <div class="col-sm-6">
                <img src="img/splash-img.png" class="splash-img no-show-mobile"/>
            </div>

            <div class="col-sm-6 right-col">
                <div class="right">
                <img src="img/logo-black.png" class="logo-splash"/><br />
                <img src="img/splash-img.png" class="splash-img no-show-desktop"/>
                Sua plataforma de estudos<br />online!<br /><br />
                
                <a href="header.php">
                <button class="button button1">ACESSAR A PLATAFORMA</button><br />
                </a>

                <a href="cadastro.php">
                <button class="button button1">CADASTRAR</button>
                </a>

           
                </div>
            </div>
          </div>
        
    </body>
  </html>
