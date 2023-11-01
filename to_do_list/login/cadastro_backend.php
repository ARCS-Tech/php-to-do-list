<?php
    // Inclua o arquivo de conexão com o banco de dados (login_backend.php).
    include("../conexao.php");
    include("../functions.php");
   
   
    // Recupere os valores do formulário.

    $recnome_completo = $_POST["fnome_completo"];
    debug_to_console($recnome_completo);

    $rectelefone = $_POST["ftelefone"];
    debug_to_console($rectelefone);

    $recname = $_POST["fusuario"];
    debug_to_console($recname);


    $recsenha = $_POST["fsenha"];
    debug_to_console($recsenha);

    $recsenha_confirm = $_POST["fsenha_confirm"];
    debug_to_console($recsenha);
    
    $query = "SELECT * FROM usuarios WHERE usuario = '$recname'";
    $result = $conexao->query($query);
    debug_to_console($query);

    if($result){
        debug_to_console('2');

        if($result->num_rows == 0 ){

            if($recsenha == $recsenha_confirm){
                
                $query = "INSERT INTO usuarios (usuario,senha,telefone,nome_completo ) VALUES ('$recname','$recsenha','$rectelefone','$recnome_completo' )";
                debug_to_console("print query");
                mysqli_query($conexao,$query);
                debug_to_console('3');

                header('Location: login.php');
            }
            else{
                header('location: cadastro.php?s=3&nome='.$recnome_completo.'&telefone='.$rectelefone.'&user='.$recname);
            }
            
        }else{

            debug_to_console('4');
            header('location: cadastro.php?s=2&nome='.$recnome_completo.'&telefone='.$rectelefone.'&user='.$recname);
        }
    }else{ 
        // se algo der errado no banco de dados
    }
    debug_to_console('5');
    // Redirecione para uma página de sucesso ou faça o que for apropriado.
    
?>
