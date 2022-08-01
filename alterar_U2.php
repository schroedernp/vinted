<?php
ob_start();
//session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vinted</title>
        <meta http-equiv="refresh" content="400;url=index.html">
    </head>
    <body>
        <h1>Alteração de Utilizadores</h1>

    <?php
    //liga a base de dados
    include 'includes/liga_bd.php';
  


    $tmp=password_hash($_POST['pass'],PASSWORD_DEFAULT);

    if(empty($_FILES['ficheiro']['name'][0]))
    {
        $sql = "UPDATE t_user SET
        nick='$_POST[nick]',
        nome='$_POST[nome]',
        email='$_POST[email]',
        data_nasc='$_POST[data_nasc]',
        pass='".$tmp."'
        WHERE id=$_POST[id_user]";
    }
    //caso tenha trocado a imagem
    else
    {
        include 'includes/valida_foto.php';
        if ($uploadOk == 1) {

            move_uploaded_file($_FILES["ficheiro"]["tmp_name"], $target_file);
            unlink('pics/'.$_POST['nome_foto']);
            $tmp=password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $sql = "UPDATE t_user SET
            nick='$_POST[nick]',
            nome='$_POST[nome]',
            email='$_POST[email]',
            data_nasc='$_POST[data_nasc]',
            pass='".$tmp."',
            foto='".$foto."'
            WHERE id=$_POST[id_user]";
        }
    }

    if (mysqli_query($ligacao, $sql))
        echo "<h3>Utilizador alterado com sucesso!</h3>";
    mysqli_close($ligacao); echo "<br/>";
    ?>
    <br/><h4>Aguarde que será redirecionado</h4><a href="index.html" target="_self">Volta ao menu</a>
    </body>
</html>