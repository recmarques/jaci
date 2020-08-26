<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "jacidb";

    $conexao = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conexao, $db_name);

    if(mysqli_connect_error()):
        echo "Falha na conexão: ".mysqli_connect_error();
    endif;
    mysqli_set_charset($conexao, "utf8");
    // $vcod;
    // $vcod++;
    $vcod = rand(1, 99999999);
    // $vcod = 1;
    $vnome = $_POST["nome"];
    $vemail = $_POST["email"];
    $vcurso = $_POST["curso"];
    $vsenha = $_POST["senha"];

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

?>


<html>
    <head>
            <meta charset="utf-8">
            <title>
                <?php
                echo $mensagem." | JACI";
                ?>
            </title>
        
            <link rel="icon" href="../img/favicon.png" type="image/png" />
        
            <link rel="stylesheet" href="style-sucesso.css">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                
                <a href="../login.html">
                    <button class="button button1">ENTRAR</button><br />
                </a>
                <br />
                <a href="../header.html">
                    <button class="button button1">ACESSAR SEM LOGIN</button><br />
                </a>
                <br />

                <a href="../cadastro.php">
                    <input type="submit" class="logbtn" value="VOLTAR">
                </a>
    
        </div> 
     </body>

</html>