<?php

	// conexao
    // require_once '../conexao.inc';
    $servername = "us-cdbr-east-02.cleardb.com";
    $username = "b0394718678768";
    $password = "33161d76";
    $db_name = "heroku_390caed3836a8d5";
        
    $conexao = mysqli_connect($servername, $username, $password);
    mysqli_select_db($conexao, $db_name);
    
    $sql1;
    $res1;
    
	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	endif;
	// include 'conexao.inc';
	
	// Sessão
    session_start();
    
    // Verificação
    if(isset($_SESSION['logado'])){
        // header('Location: index.php');
        $id = $_SESSION['ID'];
        $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
        $res = mysqli_query($conexao, $sql);

        // if(isset($_SESSION['logado'])){
        //     echo $dados['Nome'];
        //   }
        $dados = mysqli_fetch_array($res);
        $id_user = $dados['ID'];
        
        $sql1 = "DELETE FROM tb_cadastros WHERE ID = '$id_user'";
        $res1 = mysqli_query($conexao, $sql1);

        $sql2 = "DELETE FROM tb_projetos WHERE ID_Usuario = '$id_user'";
        $res2 = mysqli_query($conexao, $sql2);


        $linhas = mysqli_affected_rows($conexao);

        // if($linhas == 1){
            $mensagem = "Conta excluída com sucesso!";
        // }
        // else{
        //     $mensagem = "Sua conta não foi excluída!";
        // }

        
    
    
?>



<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8">
            <title>
            <?php
                echo $mensagem." | JACI";
                ?>
            </title>
        
            <link rel="icon" href="../img/favicon.png" type="image/png" />
        
            <link rel="stylesheet" href="css/style-excluir-conta.css">
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <script scr="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

            <div class="imagem">
                <img src="../img/excluir.png" alt="logo"/>
            </div>

            <p class="obrigado">
                <?php
                if($mensagem == "Conta excluída com sucesso!"){
                    echo "Obrigado por fazer parte dessa jornada conosco!";
                }
                else{
                    echo "Tente novamente mais tarde!";
                }
                ?>
            </p>

                <br /><br />
                
                <a href="../cadastro.php">
                    <button class="button button1">CADASTRAR</button><br />
                </a>
                <br />
                <a href="../header.php">
                    <input type="submit" class="logbtn" value="ACESSAR SEM LOGIN">
                </a>
                <br />

               
    
        </div> 
     </body>

</html>
<?php

    session_unset();
    session_destroy();
        

    mysqli_close($conexao);
}


    ?>