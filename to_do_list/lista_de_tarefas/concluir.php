<?php
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Conectando ao banco de dados (substitua com suas credenciais)
        include("../conexao.php");

        // Consulta para deletar o usuário
        $updateQuery = "UPDATE tarefas SET status = 2 WHERE id = ? ";
        $stmt = $conexao->prepare($updateQuery);

        if ($stmt) {
            $stmt->bind_param("i", $userId);
            if ($stmt->execute()) {
                echo "Tarefa concluida com sucesso.";
                header("location: lista.php");

            } else {
                echo "Erro na conclusão: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conexao->error;
        }

        $conexao->close();
    } else {
        echo "ID de usuário não especificado.";
    }
?>