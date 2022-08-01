<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3000;url=login2.php">
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <title>VINTED</title>

    </head>
    <body>
    <h1>Vender Artigos</h1>
    <?php

        include 'includes/liga_bd.php';
        include 'includes/valida.php';
    ?>
    <h2>Pesquisa de Produtos</h2>
    <table><tr>
        <td>ID</td><td>Título</td><td>Descrição</td><td>Preço</td>
        <td>Estado</td><td>Fotos</td><td>Comprar</td></tr>
    <?php
        if($_POST ['valor_cat'] == 0)
            $sql="SELECT * FROM t_artigo WHERE vendido=0";
        else{
            if($_POST ['valor_subcat'] == 0)
                $sql = "SELECT * FROM t_artigo WHERE vendido=0 AND cat=".$_POST['valor_cat'];
            else
                $sql = "SELECT * FROM t_artigo WHERE vendido=0 AND cat=".$_POST['valor_cat']." AND subcat=".$_POST['valor_subcat'];
        }
    if ($_POST ['campo'] == 1) 
        $sql = $sql." AND titulo like '%".$_POST['texto']."%'";
    if ($_POST ['campo'] == 2) 
        $sql = $sql." AND descricao like '%".$_POST['texto']."%'";
        //Filtro para acrescentar os preços
    $sql = $sql. " AND preco > ".$_POST['preco_min']. " AND preco <" .$_POST['preco_max'];
    if($_POST['estado']>0)
        $sql = $sql." AND estado ".$_POST['estado'];
    
    $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));

    while($linha = mysqli_fetch_assoc($resultado))
    {
        echo "<tr><td>".$linha['id']."</td><td>".$linha['titulo']."</td><td>".$linha['descricao']."</td>";
        echo "<td>".$linha['preco']."</td><td>".$linha['estado']."</td>";
        echo "<td><img src = 'artigos/".$linha['foto1']."' width='100'></td><td>";
        ?>
        <form action = "comprar2.php" id="f1" method="post">
        <input type = "hidden" size = "20" name="id_artigo" value= "<?php echo $linha['id'];?>">
        <input type="submit" value="Ver comentários / Comprar">
        </form>
        </td></tr>
    <?php
    }
    echo $sql;
    ?>
    </table>
    <input type = "button"  value= "Voltar ao menu" onclick="window.open('login2.php','_self')"><br/><br/>      
    </body>
</html>