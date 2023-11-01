<?php
    // Inclua o arquivo de conexão com o banco de dados (login_backend.php).
    include("../conexao.php");
    include("..\to_do_list\login\login_backend.php");

    session_start();
    
    if (isset($_SESSION['id_pass'])) {
        $pass_id = $_SESSION['id_pass'];
        // Sessão ativa, o usuário está logado.
    } else {
        // Sessão não está ativa, redirecione o usuário para a página de login.
        header('Location: ../login/login.php');
        exit();
    }   
    // Recupere os valores do formulário.

    $recnome_tarefa = $_POST["fnome_tarefa"];
    

    $rectexto = $_POST["ftexto"];
   

    $recid_usuario = $pass_id ;
    

    // Insira os dados no banco de dados.
    $query = "INSERT INTO tarefas (titulo,texto,id_usuario) VALUES ('$recnome_tarefa','$rectexto','$recid_usuario' )";
    
    mysqli_query($conexao,$query);

    header('Location: lista.php');


    // Redirecione para uma página de sucesso ou faça o que for apropriado.
    
?>
