<?php

    function verificar_session_ativa(){
        session_start();

        if (isset($_SESSION['id_pass'])) {
            $pass_id = $_SESSION['id_pass'];
            $pass_nome = $_SESSION['nome_usuario'];

            $pass_nome = ucfirst($pass_nome);

            return array ($pass_id , $pass_nome);  

            // Sessão ativa, o usuário está logado.
        } else {
            // Sessão não está ativa, redirecione o usuário para a página de login.
            header('Location: ../login/login.php');
            exit();
        }
    }

    function session_login(){
        session_start();

        if (isset($_SESSION['id_pass'])) {
            session_destroy();
        } 
    }

   

?>