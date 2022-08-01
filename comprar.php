<html>
    <!-- dentro do head apenas defino a linguagem o título-->
    <head>
        <meta charset="utf-8">
        <title>VINTED</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <h1>Comprar Artigos</h1>
    
        <?php
            include 'includes/valida.php';
            //estabelece a conexao à base de dados
            include 'includes/liga_bd.php';
            $categoria=$_POST['categoria'];
        ?>
        <form action="comprar.php" id="f1" method="post">
                Categoria: <select name="categoria" id="categoria" onchange="this.form.submit();">
            <?php
            $sql="SELECT * FROM t_categoria";
            //a variavel resultado vai guardar todos os dados de todos os clientes
            $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            //variavel para contar os registos
            //enquanto conseguir ler dados do array resulltado imprime
                echo "<option value = '0'> Todos </option>";
            while($linha =mysqli_fetch_assoc($resultado)){
                if($_POST['categoria']==$linha['id'])
                    echo "<option value ='".$linha['id']."'selected>".$linha['categoria']."</option>";
                else
                    echo "<option value='".$linha['id']."'>".$linha['categoria']."</option>";
            }
            ?>
            </select>
        </form>
        <h2>Produtos</h2>
        <table>
            <tr>
                <td>ID</td><td>Título</td>
                <td>Descrição</td><td>Preço</td>
                <td>Estado</td><td>Fotos</td>
                <td>Comprar</td>
            </tr>
        <?php

            if($_POST['categoria'] == 0)
                $sql="SELECT * FROM t_artigo WHERE vendido=0";
            else
                $sql="SELECT * FROM t_artigo WHERE vendido=0 AND cat=" .$_POST['categoria'];

            //a variavel resultado vai guardar todas as subcategorias da categoria selecionada
            $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            //enquanto conseguir ler dados do array resultado imprime
            while($linha = mysqli_fetch_assoc($resultado)){
                echo "<tr><td>".$linha['id']."</td><td>".$linha['titulo']."</td><td>".$linha['descricao']."</td>";
                echo "<td>".$linha['preco']."</td><td>".$linha['titulo']."</td>";
                echo "<td><img src='artigos/".$linha['foto1']."'width='100'></td><td>";
            ?>
        <form action="comprar2.php" id="f1" method="post">
            <input type="text" size="20" name="id_artigo" value="<?php echo $linha['id'];?>">
            <input type="submit" value = "Ver comentários /Comprar" >
        </form>
            </td></tr>
            <?php
            }
            ?>
            </table>
    </body>
</html>

 