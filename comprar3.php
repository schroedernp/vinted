<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3000;url=login2.php">
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <title>VINTED</title>
    </head>
    <body>
        <h1>Registro de comentários</h1>
        <?php

            include 'includes/valida.php';

            include 'includes/liga_bd.php';

                $sql ="INSERT INTO t_art_comen (id_artigo, comentario, avaliacao, data, publico, id_user) VALUES
                        ($_POST[id_artigo], '$_POST[comentario]', $_POST[avaliacao], '$_POST[data]',
                        $_POST[publico], '".$_SESSION['id']. "');";

                        if (mysqli_query($ligacao, $sql))
                            echo "<h2>Comentário inserido com sucesso! </h2>";
                echo $sql;
                mysqli_close($ligacao);
                ?>
                <br/>
                <a href="login2.php" target="_self">Voltar ao Menu</a>
    </body>
</html>
       
 