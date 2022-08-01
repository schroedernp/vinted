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
    <h1>Pesquisar Artigos</h1>
        <?php
            include 'includes/valida.php';
            //estabelece a conexao à base de dados
            include 'includes/liga_bd.php';
            $categoria=$_POST['categoria'];
        ?>
        <form action="pesq.php" id="f1" method="post">
                Categoria: <select name="categoria" id="categoria" onchange="this.form.submit();">
            <?php
            if($categoria ==0)
                echo "<option value= '0' selected> Todos </option>";
            else
                echo"<option value='0'> Todos </option>";

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
            </select><br><br>
            Subcategoria: <select name="subcategoria" id="subcategoria" onchange="atualiza();">
            <?php
            if($categoria==0)
                echo "<option value='0' selected> Todos </option>";
            else{
                $sql2="SELECT * FROM t_subcat WHERE categoria=".$_POST['categoria'];
                //a variavel resultado vai guardar todas as subcategorias da categoria selecionada
                $resultado2 = mysqli_query($ligacao, $sql2) or die(mysqli_error($ligacao));
                //enquanto conseguir ler dados do array resultado imprime
                while($linha2 = mysqli_fetch_assoc($resultado2)){
                    echo "<option value='".$linha2['id']."'>".$linha2['subcat']."</option>";
                }
            }
            ?>
            </select>  
        </form>
        <form action="pesq2.php" id="f2" method="post">
            <input type="text" size="30" name="valor_cat" value="0" id="valor_cat" required>
            <input type="text" size="30" name="valor_subcat" value = "0" required>
          
        Campo a pesquisa: <select name="campo">
            <option value="0"> Nenhum </option>
            <option value="1"> Título </option>
            <option value="2"> Descrição </option>
        </select><br/><br/>
        Texto a pesquisar: <input type="text" size="50" name="texto" ><br/><br/>
        Preço mínimo: <input type="text" size="10" name="preco_min" required value="0"><br/><br/>
        Preço máximo: <input type="text" size="10" name="preco_max" required value="99999"><br/><br/>
        Estado: <select name="estado">
            <option value="0"> Não aplicável </option>
            <option value="1"> 1 estrela </option>
            <option value="2"> 2 estrela </option>
            <option value="3"> 3 estrela </option>
            <option value="4"> 4 estrela </option>
            <option value="5"> 5 estrela </option>
        </select><br/><br/>
        <input type="submit" value="Pesquisar"><br>

        </form>
        <form action="pesq.php" method="post">
            <input type="hidden" name ="categoria" value="0">
            <input type="submit" value="Limpar">
        </form><br><br>
        <input type="button" value="Voltar ao menu" onclick="window.open('login2.php', '_self')"><br/><br/>
    </body>
</html>

 