<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>VINTED</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Gestão de Vendas de Artigos</h1>
        <?php


            include 'includes/valida.php';

            include 'includes/liga_bd.php';


                $tipo=$_POST['tipo'];
                ?>
                <form action="historico.php" id="f1" method="post">
                    Tipo: <select name="tipo" id="tipo" onchange="this.form.submit();">
                    <option value="0" <?php if ($tipo==0) echo "selected"; ?>> Todos</option>
                    <option value="1" <?php if ($tipo==1) echo "selected"; ?>> Pendentes</option>
                    <option value="2" <?php if ($tipo==2) echo "selected"; ?>> Vendidos</option>
                </select>
                </form>


                <h2>Produtos </h2>
                <table>
                <tr>
                    <td>ID</td><td>Titulo</td>
                    <td>Descrição</td><td>Preço</td>
                    <td>Estado</td><td>Fotos</td>
                    <td>Detalhes</td>
                </tr>

                <?php
                    if ($_POST['tipo']==0)
                        $sql="SELECT * FROM t_artigo WHERE id_user=".$_SESSION['id'];
                    if ($_POST['tipo']==1)
                        $sql="SELECT * FROM t_artigo WHERE id_user=".$_SESSION['id']." AND vendido=0";
                    if ($_POST['tipo']==2)
                        $sql="SELECT * FROM t_artigo WHERE id_user=".$_SESSION['id']." AND vendido<>0";


                    $resultado =mysqli_query($ligacao, $sql) or die (mysqli_error($ligacao));

                while($linha = mysqli_fetch_assoc($resultado))
                {
                    echo "<tr><td>".$linha['id']."</td><td>".$linha['titulo']."</td><td>".$linha['descricao']."</td>";
                    echo "<td>".$linha['preco']."</td><td>".$linha['estado']."</td>";
                    echo "<td><img src='artigos/".$linha['foto1']."' width='100'></td><td>";
                    ?>
                    <form action="historico2.php" id="f1" method="post">
                    <input type="hidden" size="20" name="id_artigo" value="<?php echo $linha['id'];?>">
                    <input type="submit" value="Ver detalhes">
                    </form>
                    </td></tr>

                <?php
                }
                ?>

            </table>
    </body>
</html>
       