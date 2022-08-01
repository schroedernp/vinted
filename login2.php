<html>
    <head>
        <meta charset="utf-8">
        <title>VINTED</title>

    </head>
    <body>
        <h1>Bem-vindo a VINTED </h1>
        <?php
             
           include 'includes/valida.php';

             echo "<h2>Login com sucesso!</h2>";
             echo "<h2> Bem-vindo " .$_SESSION['nick']."</h2>";
        ?>
        <input type="button" value="Editar perfil" onclick="window.open('perfil.php','_self')"><br>
        <!--<input type="button" value="Vender" onclick="window.open('vender.php', '_self')">-->
        <br>
        <form action= "Vender.php" method="post">
            <input type="hidden" name="categoria" value="1">
            <input type="submit" value="Vender">
        </form>
        <form action= "comprar.php" method="post">
            <input type="hidden" name="categoria" value="0">
            <input type="submit" value="Comprar">
        </form>

        <form action= "pesq.php" method="post">
            <input type="hidden" name="categoria" value="0">
            <input type="submit" value="Pesquisar">
        </form>

        <form action= "historico.php" method="post">
            <input type="hidden" name="tipo" value="0">
            <input type="submit" value="Histórico">
        </form>

        <input type="button" value="Pesquisar" onclick="window.open('pesq.php', '_self')">
        <input type="button" value="Histórico" onclick="window.open('historico.php', '_self')">
        <input type="button" value="Logout" onclick="window.open('logout.php', '_self')">

        <?php
        if(strcmp($_SESSION['nick'], "admin")==0)
       {
            ?>
            <br><br> <h2>Área de Administração</h2>
            <input type="button" value="Gerir Utilizadores" onclick="window.open('gerir_U.php', '_self')">
            <input type="button" value="Gerir Posts" onclick="window.open('gerir_P.php', '_self')">
            <input type="button" value="Gerir Respostas" onclick="window.open('gerir_R.php', '_self')">
        <?php
             } 
        ?>

    </body>
</html>