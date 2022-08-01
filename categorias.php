<html>
    <head>
        <meta charset="utf-8">
        <title>VINTED</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <!-- ao fim de 5 segundo redireciona para o index-->   
    </head>
    <body>
        <?php
      
            include 'includes/liga_bd.php';

        //atualizar se uma caixa de texto existir 
        if(isset($_POST['categoria'])){
            //receber os dados do form
            $categoria=$_POST['categoria'];
            $subcat=$_POST['subcat'];

            //cria a instrução para atualizar
            $sql = "INSERT INTO t_subcat(categoria, subcat) VALUES($categoria, '$subcat')";
            if (mysqli_query($ligacao, $sql))
                echo "<h2>Dados inserido com sucesso!</h2>";
            header("Location: categorias.php");
        }
        ?>   
        <form action = "categorias.php" method="post">
            Categoria: <select name="categoria">
                <?php
                $sql= "SELECT * FROM t_categoria";
                //a variavel resultado vai guardar todos os dados de todos os clientes
                $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
                //variavel para contar os registos
                //enquanto conseguir ler dados do array resultado array
                while($linha =mysqli_fetch_assoc($resultado))
                    echo "<option value='".$linha['id']."'>".$linha['categoria']."</option>";
                ?>
            </select>
            <br>Subcategoria: <input type="text" required name= "subcat">
            <button onclick="location.href='categorias.php'" type="button">Cancelar</button>
            <input type="submit" value="Gravar">
        </form> 
        <h2>Categorias</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Subcategoria</th>
            </tr>
        <?php

            $sql= "SELECT * FROM t_subcat";
            //a variavel resultado vai guardar todos os dados de todos os clientes
            $resultado=mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            //variavel para conter os registos
            //enquanto conseguir ler dados do array resultado imprime 
            while($linha = mysqli_fetch_assoc($resultado))
            {
                echo "<tr><td>".$linha['id']."</td><td>".$linha['categoria']."</td><td>".$linha['subcat']."</td></tr>";
            }
            ?>
            </table>
        
    </body>
</html>