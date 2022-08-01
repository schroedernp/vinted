<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3;url=login2.php">
        <link type="text/css" rel="stylesheet" href="recursos/style/style.css"  >
        <title>VINTED</title>
    </head>
    <body>
        <h1>Registo de comentários</h1>
        <?php

            include 'includes/valida.php';

            include 'includes/liga_bd.php';


            $sql="INSERT INTO t_art_comen_v (id_comen, resposta, data) VALUES
                    ($_POST[id_coment], '$_POST[comentario]', '$_POST[data]');";

                if (mysqli_query($ligacao, $sql))
                    echo "<h2>Resposta inserida com sucesso! </h2>";
                mysqli_close($ligacao);
                ?>
                <br/>
                <a href="login2.php" target="_self">Volta ao Menu</a>
    </body>
</html>
       