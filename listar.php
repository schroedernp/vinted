<html>
    <head>
        <title>Vinted</title>
        <!-- ao fim de 5 segundo redireciona para o index-->   
    </head>
    <body>
        <?php
      
            include 'includes/liga_bd.php';
        //crio a instrução sql para inserir um novo registo
        $sql = "SELECT * FROM t_user";
        $resultado=mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));
        $conta = 0;
        while($linha = mysqli_fetch_assoc($resultado))
        {
            echo"<h3>Id:" . $linha['id']."</h3>";
            echo"<b>Nick: </b> ".$linha['nick']."<br>";
            echo"<b>Nome: </b> ".$linha['nome']."<br>";
            echo"<b>Data de Nasc: </b> ".$linha['data_nasc']."<br>";
            echo"<b>Foto: </b> <br> <img src= 'pics/".$linha['foto']."' height= '100'><br><br>";
           
            if($linha['apagado']==0){
                ?>
                <form action = "bloquear_U.php" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
                    <input type="submit" value="Bloquear">
                </form> 
                <?php
            }else{
                ?>
                <form action = "desbloquear_U.php" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
                    <input type="submit" value="Desbloquear">
                </form> 
            </div>
                <?php
            }
            ?>
            <form action = "alterar_U.php" method="post">
                <input type="hidden" name="id_user" value="<?php echo $linha['id'];?>"><br>
                <input type="submit" value="Alterar">
            </form> <br>
            <?php
        
        echo "<hr>";
        $conta = $conta + 1;
        } 
        echo "<b>Número de utilizadores na base de dados -> " . $conta . "</b>";
        mysqli_close($ligacao);

    
        ?>
        <br/>
         <a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>