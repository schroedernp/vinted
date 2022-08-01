<html>
    <head>
        <meta charset="utf-8">
        <title>Vinted</title>
    </head>
    <body>
        <h1>Alterar Programadores</h1>
    <?php

    //liga á base de dados
    include 'includes/valida.php';
    include 'includes/liga_bd.php';

    

    $sql = "SELECT * FROM t_user WHERE id=".$_SESSION['id'];
    $resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
    $linha = mysqli_fetch_assoc($resultado);
?>
    <form action="perfil2.php" method="post", enctype="multipart/form-data">
    <p>Id:<input type="text" name="id" size="10" readonly value = "<?php echo $linha['id'];?>"></p>
    <p>Nick:<input type="text" name="nick" size="20" readonly value = "<?php echo $linha['nick'];?>"></p>
    <p>Nome:<input type="text" name="nome" size="100"  value = "<?php echo $linha['nome'];?>"></p>
    <p>E-mail:<input type="text" name="email" size="50"  value = "<?php echo $linha['email'];?>"></p>
    Data de nascimento:<input type="date" name="data_nasc" required  value = "<?php echo $linha['data_nasc'];?>"><br><br>
    Senha:<input type="password"  size="20" name="pass"><br><br>
    Foto: <br> <img src= "pics/<?php echo $linha['foto'];?>" width = "150">
        <input type="hidden" name="nome_foto" value="<?php echo $linha['foto'];?>">
    <br><br> Nova foto:  <input type="file" name="ficheiro"><br><br>
    <input type="submit" name="Alterar">
    <br><br>
    <a href="index.html" target="_self">Volta ao Menu</a>    
    </form>

<?php
mysqli_close($ligacao);
?>
    </body>
</html>