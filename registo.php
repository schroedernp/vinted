<html>
    <head>
        <meta charset="utf-8">
        <title>Registo de Utilizadores - Forum NS</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <!-- ao fim de 5 segundo redireciona para o index-->
        <meta http-equiv="refresh" content="5000;url=index.html">
    </head>
    <body>
        <h1>Registar Utilizadores</h1>
        <?php
                // liga á base de dados
                include 'includes/liga_bd.php';
                include 'includes/valida_foto.php';
                $tmp=password_hash($_POST['pass'],PASSWORD_DEFAULT);

        if($uploadOk == 0){
            echo "O seu ficheiro não foi enviado.";
        }else{
            if($uploadOk == 1){
                move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
        //crio a instrução sql para inserir um novo registo
               
                $sql ="INSERT INTO t_user (nick, nome, email, data_nasc, pass, foto) VALUES
                    ('$_POST[nick]', '$_POST[nome]','$_POST[email]',
                    '$_POST[data_nasc]','".$tmp."','".$foto."')";
            echo $sql; 
        // os campos recebidos do formulário anterior pelo metodo post, tudo tem pelicas
             if (mysqli_query($ligacao, $sql))
                 echo "<h3>Utilizador inserido com sucesso!</h3>"; 
                 }
        }
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>