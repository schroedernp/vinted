<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">        
        <title>VINTED</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
        function valida_caracteres(e){
            var k = e.keyCode;
            return((k > 64 && k < 91)|| (k > 96 && k < 123) || (k >= 48 && k <= 57) || k ==8 || k ==32);
        }
        </script>

    </head>
    <body>
        <h1>Venda de artigo</h1>
    <?php

    include 'includes/liga_bd.php';
    include 'includes/valida.php';

    $id_artigo=$_POST['id_artigo'];
    ?>
        <?php
        $sql = "SELECT * FROM t_artigo where id=". $id_artigo;
        //echo $sql
        //a variavel resultado vai guardar todos os dados de todos os clientes
        $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
        $linha = mysqli_fetch_assoc($resultado);
        ?>

        Id: <?php echo $linha['id'];?><br><br>
        Título: <?php echo $linha['titulo'];?><br><br>
        Descrição <?php echo $linha['descricao'];?><br><br>
        Preço: <?php echo $linha['preco'];?>euros<br><br>
        Estado: <?php echo $linha['estado'];?>estrelas<br><br>

        <img src="artigos/<?php echo $linha['foto1']?>" width="150">
        <img src="artigos/<?php echo $linha['foto2']?>" width="150">
        <img src="artigos/<?php echo $linha['foto3']?>" width="150">
    
    <h2>Comentários</h2>
    <table>
    <tr>
        <td>ID</td>
        <td>Comentário</td>
        <td>Classificação</td>
        <td>Data</td>
        <td>Utilizador</td>
    </tr>
    <?php
    $sql = "SELECT * FROM t_art_comen where publico =0 AND id_artigo = ". $id_artigo;
    $resultado =mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
    while($linha = mysqli_fetch_assoc($resultado))
    {
        
        $sql_user ="SELECT nick FROM t_user WHERE id=".$linha['id_user'];
        $res_user =mysqli_query($ligacao, $sql_user) or die(mysqli_error($ligacao));
        $linha_user = mysqli_fetch_assoc($res_user);

        echo "<tr><td>".$linha['id']."</td><td>".$linha['comentario']."</td><td>".$linha['avaliacao']."</td>";
        echo "<td>".$linha['data']."</td><td>".$linha['id_user']."- ".$linha_user['nick']."</td></tr>";
    

        $sql_res="SELECT * FROM t_art_comen_v WHERE id_comen=".$linha['id'];
        $res_res =mysqli_query($ligacao, $sql_res) or die(mysqli_error($ligacao));
        $linha_res = mysqli_fetch_assoc($res_res);

        if(!$linha_res)
        {
           ?>
            <tr><td>&nbsp;</td>
                <td colspan="6"><b>O vendedor ainda não respondeu</b></td></tr>
        <?php

        }
        else
        {
    ?>
          
            <tr>
            <td colspan="4"><b>Resposta: <?php echo $linha_res['resposta'];?></b></td>
            <td colspan="2"><b>Data: <?php echo $linha_res['data'];?></b></td></tr>
            <?php
        }
    }
    ?>


    </table>
    <br><br>
    <form action ="comprar3.php" method = "post">
        <input type="hidden" name ="id_artigo" value="<?php echo $id_artigo;?>">
        Comentário: <br>
        <textarea cols="80" rows="5" name="comentario" id="comentario" onkeypress= "return valida_caracteres(event)"></textarea><br><br>
        Classificação: <input type="number" min="1" max = "5" name="avaliacao"><br><br>
        Data: <input type="text" readonly name="data" value="<?php echo date("h:i:sa");?>"><br><br>
        Publico:<select name="publico">
            <option value="0">Publico</option>  
            <option value="1">Privado</option>   
        </select> 
        <input type="submit" value="Comentar">
    </form>


    </body>
</html>