<!DOCTYPE html>
  <html>
    <head>

      <meta charset="utf-8">
      <title>Esqueci minha senha | JACI</title>
      <link rel="icon" href="img/favicon.png" type="image/png" />
      <link rel="stylesheet" href="css/style-senha.css">
      <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
     
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
     
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
    </head>

    <body>
      
      <form method="post" class="login-form" action="controller/alterar-senha.php"> 
      
            <img src="img/logo-black.png" class="no-show-mobile" alt="logo jaci"/>
            <img src="img/logo-black.png" class="no-show-desktop" alt="logo jaci"/>
            <br /><p class="login">Alterar senha</p>
     
            <div class="txtb">
                <input type="text" placeholder="Email" name="email" id="email" size="40" maxlength="30" required>
                <span data-placeholdr="Email"></span>
            </div>

            <div class="txtb">
				<input type="text" placeholder="Curso" name="curso" id="curso" minlength="2" maxlength="15">
				<span data-placeholdr="Curso"></span>
			</div>

            <div class="txtb">
				<input type="password" placeholder="Nova Senha" name="senha" id="senha" minlength="6" maxlength="15" required>
				<span data-placeholdr="Password"></span>
			</div>


            <p class="aviso">
            <?php
            
            if(!empty($erros)){
              foreach($erros as $erro){
                echo $erro;
              }
            }
            
            ?>
            </p>

            <div class="bottom-text">
				Já tem uma conta? <a href="login.php">Entre!</a>
			</div>

            <input type="submit" class="logbtn" value="Alterar Senha" name="btn-entrar">

            <div class="bottom-text">
                Não tem uma conta? <a href="cadastro.php">Registre-se!</a>
            </div>
            <hr /><br />
            <a href="header.php">
            <div class="bottom-text-login">
             Acesse sem login
          </div></a>
            <!-- <input type="submit" class="logbtn" value="Acessar sem login"> -->
      </form> 
      
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    </body>
  </html>