<html>
    <head>
        <meta charset="utf-8">
        <title>Vinted</title>
        <!-- ao fim de 5 segundo redireciona para o index-->
        <meta http-equiv="refresh" content="5;url=index.html">
    </head>
    <body>
        <h1>Bloqueio de Utilizadores</h1>
        <?php
                // liga á base de dados
            include 'includes/liga_bd.php';
            include 'includes/valida.php';
           

        //crio a instrução sql para bloquearum novo registo
        $sql = "UPDATE t_user SET apagado =1 WHERE id=$_POST[id_user]";
            //echo $sql;
        // os campos recebidos do formulário anterior pelo metodo post, tudo tem pelicas
        if (mysqli_query($ligacao, $sql))
            echo "<h3>Utilizador bloqueado com sucesso!</h3>"; 
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <input type="button" value="Continuar" onclick="window.history.go(-2)">
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>