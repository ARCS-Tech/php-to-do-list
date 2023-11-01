<?php
    // Inclua o arquivo de conexão com o banco de dados (login_backend.php).
    include("../conexao.php");
    include("../functions.php");
    
    // Recupere os valores do formulário.
    $recname = $_POST["fusuario"];
    debug_to_console($recname);

    $recsenha = $_POST["fsenha"];
    debug_to_console($recsenha);

    // Insira os dados no banco de dados.
    $query = "SELECT * FROM usuarios WHERE usuario = '$recname' AND senha = '$recsenha' ";
    debug_to_console("print query");

   if( $recvalue = mysqli_query($conexao, $query)){
        debug_to_console("passou query");

        $num_rows = mysqli_num_rows($recvalue);
        debug_to_console($num_rows);

        if($num_rows > 0){

            $row_id = $recvalue -> fetch_assoc();
            $pass_id = $row_id["id"];
            $nome_user_f = $row_id['nome_completo'];
            debug_to_console($pass_id);

            session_start();
            $_SESSION['id_pass'] = "$pass_id";
            $_SESSION['nome_usuario'] = "$nome_user_f";

            debug_to_console("sucesso");
            header('Location: ../lista_de_tarefas/lista.php');

        }else{

            header('Location: login.php');
            debug_to_console("falha login");

        }
    }else{
        debug_to_console("erro de query");
    }
?>
