<?php

	// conexao
    // require_once '../conexao.inc';
    $servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "jacidb";
	
	$conexao = mysqli_connect($servername, $username, $password);
	mysqli_select_db($conexao, $db_name);
    mysqli_set_charset($conexao, "utf8");
	
	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	endif;
	// include 'conexao.inc';
	
	// Sessão
    session_start();
    
    // Verificação
    if(isset($_SESSION['logado'])){
        $id = $_SESSION['ID'];
        $sql = "SELECT * FROM tb_cadastros WHERE ID = '$id'";
        $res = mysqli_query($conexao, $sql);

        $dados = mysqli_fetch_array($res);

        
      }

      $ID_Projeto = $_GET['ID'];

      $sql1 = "SELECT * FROM tb_projetos WHERE ID='$ID_Projeto'";
      $res1 = mysqli_query($conexao, $sql1);


      while($vreg = mysqli_fetch_row($res1)){

        $Titulo = $vreg[1];
        $Descricao = $vreg[2];
        $Palavras = $vreg[3];
        $Ano = $vreg[4];
        $Materia = $vreg[5];
        $Categoria = $vreg[6];
        $Conhecimento = $vreg[7];
        $Texto = $vreg[8];
        $ID_Usuario_Projeto = $vreg[9];

        $sql2 = "SELECT * FROM tb_cadastros WHERE ID = '$ID_Usuario_Projeto'";
        $res2 = mysqli_query($conexao, $sql2);
        $vreg1;
    
        while($vreg1 = mysqli_fetch_row($res2)){
            $ID_Usuario = $vreg1[0];
            $Nome = $vreg1[1];
            $Email = $vreg1[2];
            $Curso = $vreg1[3];
        }
    }
        $_SESSION['ID_Projeto'] = $ID_Projeto;
        $_SESSION['Titulo'] = $Titulo;
        $_SESSION['Descricao'] = $Descricao;
        $_SESSION['Palavras'] = $Palavras;
        $_SESSION['Ano'] = $Ano;
        $_SESSION['Palavras'] = $Palavras;
        $_SESSION['Materia'] = $Materia;
        $_SESSION['Categoria'] = $Categoria;
        $_SESSION['Conhecimento'] = $Conhecimento;
        $_SESSION['Texto'] = $Texto;
        $_SESSION['ID_Usuario_Projeto'] = $ID_Usuario_Projeto;
    
        $_SESSION['Nome'] = $Nome;
        $_SESSION['Curso'] = $Curso;

    //   $ID_Projeto = $_SESSION['ID_Projeto'];
    //   $Titulo = $_SESSION['Titulo'];
    //   $Descricao = $_SESSION['Descricao'];
    //   $Palavras $_SESSION['Palavras'];
    //   $Ano = $_SESSION['Ano'];
    //   $Palavras = $_SESSION['Palavras'];
    //   $Materia = $_SESSION['Materia'];
    //   $Categoria = $_SESSION['Categoria'];
    //   $Conhecimento = $_SESSION['Conhecimento'];
    //   $Texto = $_SESSION['Texto'];
    //   $ID_Usuario_Projeto = $_SESSION['ID_Usuario_Projeto'];
    
    
?>



<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title><?php echo $_SESSION['Titulo']." | JACI"; ?></title>
      <link rel="icon" href="img/favicon.png" type="image/png" />
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="author" content="Renata de Castro M. - EQUIPE SOL">
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="css/style-projeto.css">
     
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
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700;900&display=swap" rel="stylesheet">
    <style>

    body{
        background-color: #24AE91;
    }

    .nav-wrapper{
        background-color: #23a78a;
        font-family: 'Josefin Sans', sans-serif;
    }
    .nav-wrapper .brand-logo{
        padding-left: 80px;
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
        padding-top: 8%;
        color: white;
        padding-right: 11%;
        line-height: 60px;
        font-size:35px;
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
        border: 2px solid #000;
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
        color: #fff; 
        border: 2px solid #fff;
        padding: 26px 71px;
        font-family: 'Josefin Sans', sans-serif;
        transition: 0.3s;
    }

    .button1:hover {
        background-color: #24AE91; 
        font-weight: 600;
        color: #fff; 
        border: 2px solid #fff;
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

    .titulo-banner{
        text-align: left;
        padding-top: 2% !important;
        color: #000;
        padding-left: 11% !important;
        line-height: 70px;
        font-size:71px;
        max-width: 877px !important;
        font-family: 'Josefin Sans', sans-serif;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

  
    .autor{
        text-align: left !important;
        padding-top: 1% !important;
        color: #000 !important;
        padding-right: 3% !important;
        max-width: 400px;
        line-height: 32px;
        font-weight: 900 !important;
        font-size:25px; 
        text-transform: uppercase !important;
        font-family: 'Lato', sans-serif !important;
        letter-spacing: 1px;
    }




    .texto{
        padding: 100px 170px;
        line-height:42px;
        font-weight: 700 !important;
        text-align: justify;
        font-size:19px;
        font-family: 'Lato', sans-serif !important;
        color: #fff;
    }

    .descrição{
        padding: 90px 170px;
        line-height: 42px;
        background-color: #393939;
        font-weight: 700 !important;
        font-size:19px;
        font-family: 'Lato', sans-serif !important;
        color: #fff;
    }


    .footer{
        background-color: #1D1D1D;
        width: 100%;
        height: 230px !important;
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
        padding: 0;
    }

    .row{
        width: 100%;
    }


    @media screen and (max-width: 700px){

    .hero-image{
        height: 640px;
    }


    .banner{
        width: 100%;
        height: 430px;
        padding-left: 43px;
        /* display: table-row-group; */
        padding-top: 60px;
    }

    .go-up-buttons {
    position: absolute;
    text-align: center;
    align-items: center;
    padding-left: 47px;
    padding-top: 16px !important;
    /* margin-left: 130px; */
    margin-left: 0 !important;
    align-content: center;
    align-content: center;
    }

    .button{
        padding: 16px 28px !important;
    }

    .banner .titulo{
        font-size: 35px;
        line-height: 45px;
    }

    .row-2{
        display: block;
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

    .hero-image .row{
        padding-right: 0;
        padding-left: 0;
        margin: 0;
    }

        .autor {
            text-align: left !important;
            padding-top: 1% !important;
            color: #000 !important;
            padding-right: 11%;
            text-transform: uppercase !important;
            max-width: 100% !important;
            line-height: 32px;
            font-weight: 900 !important;
            font-size: 20px;
            font-family: 'Lato', sans-serif !important;
            letter-spacing: 1px;
        }

        .ano, .curso{
            font-size: 20px !important;
        }

        .texto {
            padding: 100px 130px;
            line-height: 42px;
            background-color: #272727;
            font-weight: 700 !important;
            text-align: justify;
            font-size: 16px;
            font-family: 'Lato', sans-serif !important;
            color: #fff;
        }
}  


    .footer{
        background-color: #1D1D1D;
        width: 100%;
        height: 180px;
    }

    .footer .rede-social{
        background-color: #1D1D1D;
        align-content: center;
        align-items: center;
        -moz-box-align: center;
        padding-left: 120px;
        padding-top:55px;
    }

    .footer .logo-footer{
        background-color: #1D1D1D;
        align-content: center;
        align-items: center;
        -moz-box-align: center;
        padding-left: 120px;
        padding-top:45px;
    }


    .footer .logo-footer img{
        width: 55%;
    }

    .go-up-buttons{
        position: absolute;
        text-align: center;
        align-items: center;
        margin-left: 130px;
        align-content: center;
        align-content: center;
    }

</style>  
</head>

    <body>
        <nav>
            <div class="nav-wrapper">
              <a href="header.php" class="brand-logo">
                  <img src="img/logo-black.png" alt="logo black jaci" alt="logo jaci"/>
              </a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="not-activate" href="header.php">INÍCIO</a></li>
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

      

          
        <div class="hero-image" id="topo">
            <a href="header.php">
            <img src="img/arrow.png" alt="voltar" class="voltar" alt="seta voltar"/>
            </a>
            
            <div class="row">
            <div class="col-sm-9 titulo-banner">
                <strong>
                <?php
                    echo $_SESSION['Titulo'];
                ?>
                </strong><br />
            </div>

            <div class="col-sm-3 autor"><strong>POR
            <?php
                    echo $_SESSION['Nome'];
                ?>
                </strong><br />
                <strong class="ano">
                <?php
                    echo $_SESSION['Ano'];
                ?>
                </strong><br /><br />
                <strong class="curso">
                <?php
                    echo $_SESSION['Curso'];
                ?>
                </strong>
            </div>
        </div>
    </div>

    <div class="descrição">
    <?php
                    echo $_SESSION['Descricao'];
                ?>
                <div class="go-down">
                    <a href="#texto">
                    <img src="img/down.png" alt="ir para o texto" alt="para baixo"/>
                    </a>
                </div>
    </div>


    <div class="texto" id="texto">
        <p>
        <?php
                    echo $_SESSION['Texto'];
                ?>
        </p>

        <!-- <p>Quis enim lobortis scelerisque fermentum dui faucibus in ornare. Sit amet justo donec enim
            diam vulputate ut pharetra. Id consectetur purus ut faucibus pulvinar elementum integer.
            Amet nisl suscipit adipiscing bibendum est ultricies integer quis auctor.</p>

        <p>Tellus orci ac auctor augue. Commodo odio aenean sed adipiscing diam donec adipiscing
            tristique risus. Non curabitur gravida arcu ac tortor dignissim convallis aenean et.
            Placerat orci nulla pellentesque dignissim enim sit.</p>

            <br /><br />

        <p>Tellus orci ac auctor augue. Commodo odio aenean sed adipiscing diam donec adipiscing
            tristique risus. Non curabitur gravida arcu ac tortor dignissim convallis aenean et.
            Placerat orci nulla pellentesque dignissim enim sit. Tristique senectus et netus et
            malesuada fames ac turpis. Et tortor at risus viverra. Sodales ut eu sem integer
            vitae justo eget magna fermentum. Viverra ipsum nunc aliquet bibendum enim. Cras
            adipiscing enim eu turpis egestas. Vel quam elementum pulvinar etiam non quam lacus 
            suspendisse. Integer enim neque volutpat ac tincidunt vitae semper quis. Pellentesque
            elit ullamcorper dignissim cras tincidunt.</p>

        <p>Tellus orci ac auctor augue. Commodo odio aenean sed adipiscing diam donec adipiscing
            tristique risus. Non curabitur gravida arcu ac tortor dignissim convallis aenean et.
            Placerat orci nulla pellentesque dignissim enim sit. Tristique senectus et netus et
            malesuada fames ac turpis. Et tortor at risus viverra. Sodales ut eu sem integer vitae
            justo eget magna fermentum. Viverra ipsum nunc aliquet bibendum enim. Cras adipiscing
            enim eu turpis egestas. Vel quam elementum pulvinar etiam non quam lacus.</p> -->

    </div>
    

    <div class="go-up">
        <div class="go-up-buttons">
            <a href="avaliar.php">
                <button class="button-projeto button button1-projeto button1">AVALIAR</button>
            </a>

            <a href="denunciar.php">
                <button class="button-projeto button button1-projeto button1">DENUNCIAR</button>
            </a>
        </div>
        <a href="#topo">
        <img src="img/up.png" alt="voltar para o topo" alt="para cima"/>
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
          <img src="img/jaci.png" alt="logo"/>
          </a>
        </div>

    </div>
 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>

<?php

mysqli_close($conexao);

?>