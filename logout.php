<html>
    <!-- dentro do head apenas defino a linguagem o título-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="5;url=index.html">
        <title>VINTED</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <!-- tudo o que aparece dentro da página tem de estar no body-->
    <body>
        <?php

            session_start();
            $_SESSION = array();
            session_destroy();
        ?>

        <!-- cabeçalho maior do site -->
        <h1>Vinted</h1>
        <!--br (abreviatura de break) cria quebra de linha-->
        <br>

         <h2>Sessão Terminada com Sucesso!</h2>   
         <h3>Aguarde que vai ser redirecionado...</h3>

        <!--cada hiperligação utiliza a tag a-->
        <a href="index.html" target="_self">Voltar a tentar...</a><br><br>
        <!-- <a href="gerir_U.php" target="_self">Listar e gerir utilizador </a><br><br>
        -->
        <!-- os br são quebras de linha, se reparar temos 2 por linha -->
    </body>
</html>