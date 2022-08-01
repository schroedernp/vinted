<html>
    <head>
        <meta charset="utf-8">
        <title>VintedS</title>
        <!-- ao fim de 5 segundo redireciona para o index-->
        <meta http-equiv="refresh" content="5;url=index.html">
    </head>
    <body>
        <h1>Validação de Utilizadores</h1>
        <?php
            // liga á base de dados
            include 'includes/liga_bd.php';
            
        //Verificar se existe variável de sessão, se usuario ja fez login anteriormente
        if(session_status() !== PHP_SESSION_ACTIVE){
            $sql =" SELECT * FROM t_user WHERE nick ='$_POST[nick]'";
            //vou pesquisar apenas o registo com o nick enviado
            $resultado = mysqli_query($ligacao, $sql);
            //vou ao array resultado e obtenho a primeira linha
            $linha=mysqli_fetch_assoc($resultado);
            //caso nao exista a variavel linha
            if($linha==NULL)
                header('Location:erro.html');
            //caso o nickname exista tenho que verificar se a as senhas sao iguais....
            if(password_verify($_POST['pass'], $linha['pass']))
            {
                if($linha['apagado'] == 1){
                    echo "<h1>A sua conta encontra-se bloqueada pelo administrador</h1>";
                    ?>
                    <input type="button" value="Voltar ao menu" onclick ="window.open('index.html', '_self')">
                  <?php
                }else{
                    echo "<h2>Login com sucesso!</h2>";
                    echo "<h2>Bem-vindo" .$linha['nome']."</h2>";
                session_start();
                $_SESSION['id'] = $linha['id'];
                $_SESSION['nick'] = $linha['nick'];
                header("Location: login2.php");
                exit();
                }
            }//Caso se a senha esteja incorreta
            else{
                header("Location: erro.html");
                exit();
            }

        }
        
        mysqli_close($ligacao); echo "<br/>";
        ?>
        <br/><h4>Aguarde que vai ser redirecionado</h4><a href="index.html" target="_self">Volta ao Menu</a>
    </body>
</html>