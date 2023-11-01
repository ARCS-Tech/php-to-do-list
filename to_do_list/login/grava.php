<?php
    // Inclua o arquivo de conexão com o banco de dados (login_backend.php).
    include("login_backend.php");

    // Recupere os valores do formulário.
    $recname = $_POST["fusuario"];
    $recsenha = $_POST["fsenha"];

    // Insira os dados no banco de dados.
    $query = "INSERT INTO usuarios (usuario, senha) VALUES ('$recname', '$recsenha')";
    mysqli_query($conexao, $query);

    // Redirecione para uma página de sucesso ou faça o que for apropriado.
    header("Location: sucesso.php");
?>
