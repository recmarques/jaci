<?php

    $servername = "us-cdbr-east-02.cleardb.com";
    $username = "b0394718678768";
    $password = "33161d76";
    $db_name = "heroku_390caed3836a8d5";
        
    $conexao = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conexao, $db_name);

    if(mysqli_connect_error()):
        echo "Falha na conexão: ".mysqli_connect_error();
    endif;
    mysqli_set_charset($conexao, "utf8");


    // verificando último ID cadastrado
	$sql1 = "SELECT * FROM tb_cadastros";
	$res1 = mysqli_query($conexao, $sql1);
    $vreg;
    $maior = 0;
					
	while($vreg = mysqli_fetch_row($res1)){
        $ID = $vreg[0];
        
        if($ID > $maior){
            $maior = $ID;
        }
		
    }

    
    //$vcod = rand(1, 999999999999999);
    
    $vcod = $maior + 1;

    $vnome = $_POST["nome"];
    $vemail = $_POST["email"];
    $vcurso = $_POST["curso"];
    $vsenha = $_POST["senha"];
    $vsenha2 = $_POST["senha2"];


    if($vsenha == $vsenha2){
    $sql = "INSERT INTO tb_cadastros
    VALUES ($vcod, '$vnome', '$vemail', '$vcurso', '$vsenha')";
    $res = mysqli_query($conexao, $sql);

    $linhas = mysqli_affected_rows($conexao);

    if($linhas == 1){
        $mensagem = "Cadastro feito com sucesso!";
    }
    else{
        $mensagem = "Falha na gravação do cadastro!";
    }
    mysqli_close($conexao);
    } else{
        $mensagem = "Senhas informadas não são iguais!";
    }

?>


<html lang="pt-br" dir="ltr">
    <head>
            <meta charset="utf-8">

            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            
            <title><?php echo $mensagem." | JACI"; ?></title>
        
            <link rel="icon" href="../img/favicon.png" type="image/png" />
            <link rel="stylesheet" href="css/style-cadastro.css">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
            
            <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
        <style>
            body{
                min-height: 100vh;
                /* background-image: linear-gradient(120deg,#5EC7A7,#00857B); */
                /* background-image: url("../img/Splash\ Desktop.png"); */
                background-image: url("../img/background-cadastro-sucesso.png") !important;
                font-family: 'Josefin Sans', sans-serif;
            }

        </style>
    </head>
    <body>

        <br />

        <div class="cadastro-sucesso"> 

            <p class="mensagem">
                <?php
                echo $mensagem;
                ?>
            </p>

            <br /><br />
                
            <a href="../login.php">
                <button class="button button1">ENTRAR</button><br />
            </a>

            <br />

            <a href="../header.php">
                <button class="button button1">ACESSAR SEM LOGIN</button><br />
            </a>

            <br />

            <a href="../cadastro.php">
                <input type="submit" class="logbtn" value="VOLTAR">
            </a>
    
        </div> 
     </body>

</html>