<?php
    
    //valida variaveis de sessao
    session_start();

             //validação das variáveis de sessão
             if((!isset ($_SESSION['id']) == true) and (!isset($_SESSION['nick'])== true)){
                 header('location:erro_acesso.html');
             }
?>