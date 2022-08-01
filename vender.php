<html>
    <!-- dentro do head apenas defino a linguagem o título-->
    <head>
        <meta charset="utf-8">
        <title>VINTED</title>
        <link href="recursos/style/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            function atualiza(){
                document.getElementById("f2").elements.namedItem("valor_cat").value=
                    document.getElementById("f1").elements.namedItem("categoria").value;
                document.getElementById("f2").elements.namedItem("valor_subcat").value=
                    document.getElementById("f1").elements.namedItem("subcategoria").value;
            }
            atualiza();
        </script>
    </head>
    <!-- tudo o que aparece dentro da página tem de estar no body-->
    <body onload = "atualiza();">
    <h1>Vender Artigos</h1>
        <?php
            include 'includes/valida.php';
            //estabelece a conexao à base de dados
            include 'includes/liga_bd.php';
            $categoria=$_POST['categoria'];
        ?>
        <form action="vender.php" id="f1" method="post">
                Categoria: <select name="categoria" id="categoria" onchange="this.form.submit();">
            <?php
            $sql="SELECT * FROM t_categoria";
            //a variavel resultado vai guardar todos os dados de todos os clientes
            $resultado = mysqli_query($ligacao, $sql) or die(mysqli_error($ligacao));
            //variavel para contar os registos
            //enquanto conseguir ler dados do array resulltado imprime
            while($linha =mysqli_fetch_assoc($resultado)){
                if($_POST['categoria']==$linha['id'])
                    echo "<option value ='".$linha['id']."'selected>".$linha['categoria']."</option>";
                else
                    echo "<option value='".$linha['id']."'>".$linha['categoria']."</option>";
            }
            ?>
            </select>
            <br>Subcategoria: <select name="subcategoria" id="subcategoria" onchange="atualiza();">
            <?php
            $sql2="SELECT * FROM t_subcat WHERE categoria=".$_POST['categoria'];
            //a variavel resultado vai guardar todas as subcategorias da categoria selecionada
            $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
            //enquanto conseguir ler dados do array resultado imprime
            while($linha2 = mysqli_fetch_assoc($resultado2)){
                echo "<option value='".$linha2['id']."'>".$linha2['subcat']."</option>";
            }
            ?>
            </select>  
        </form>
        <form action="vender2.php" id="f2" method="post" enctype="multipart/form-data">
            <input type="hidden" size="20" name="id_user" value="<?php echo $_SESSION['id'];?>" required>
            <input type="hidden" size="30" name="valor_cat" value = "1" id = "valor_cat" required>
            <input type="hidden" size="30" name="valor_subcat" value = "1" required>
        Titulo:<input type="text" size="50" name="titulo" required><br/><br/>
        Preço:<input type="text" size="20" name="preco" required><br/><br/>
        Descrição:<br>
            <textarea cols="80" rows="5" name="descricao"></textarea><br/><br/>
        Estado: <select name="estado">
            <option value="1"> 1 estrela </option>
            <option value="2"> 2 estrela </option>
            <option value="3"> 3 estrela </option>
            <option value="4"> 4 estrela </option>
            <option value="5"> 5 estrela </option>
        </select><br/><br/>

        Foto1:<input type="file" name="ficheiro1"><br><br>
        Foto2:<input type="file" name="ficheiro2"><br><br>
        Foto3:<input type="file" name="ficheiro3"><br><br>
        <input type="submit" value="Vender">
        <input type="reset" value="Limpar">
        </form>
    </body>
</html>

 