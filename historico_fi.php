<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3000;url=login2.php">
        <link type="text/css" rel="stylesheet" href="recursos/style/style.css">
        <title>VINTED</title>
    </head>

    <body>
        <h1>Registro de Comentários</h1>
        <?php

            include 'includes/valida.php';

            include 'includes/liga_bd.php';


            //Crio a instrução sql para adicionar um registro na base de dados
            $sql="UPDATE t_artigo SET vendido=".$_POST['utilizador']." WHERE id=".$_POST['id_artigo'];
                echo $sql;

                if (mysqli_query($ligacao, $sql))
                    echo "<h2>Venda Efetuada com Sucesso! </h2>";
                mysqli_close($ligacao);
                ?>
                <br/>
                <a href="login2.php" target="_self">Volta ao Menu</a>
    </body>
</html>
       