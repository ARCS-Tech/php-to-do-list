<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarefa</title>
    <link rel="icon" type="image/x-icon" href="../imagens/ARCS_LOGO.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        .container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        body {
            background-color: #34495E; /* Substitua #FF0000 pela cor desejada em formato hexadecimal. */
        }
        .tabela{
            background-color: #7F8C8D;
        }
        .center_tabela{
            background-color: #95A5A6;
        }
        .input_text{
            background-color: #d1d6da;
        }
        .color_b{
            background-color: #2E4053;
        }
    </style>

</head>
<body>

    <?php
    if (isset($_GET['id'])) {
        $tarefaId = $_GET['id'];

        // Conectando ao banco de dados (substitua com suas credenciais)
        include("../conexao.php");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Receber os dados do formulário e atualizar o usuário no banco de dados
            $newText = $_POST['new_text'];
            $newtitulo = $_POST['new_titulo'];

            $updateQuery = "UPDATE tarefas SET texto = ?, titulo = ? WHERE id = ?";
            $stmt = $conexao->prepare($updateQuery);

            if ($stmt) {
                $stmt->bind_param("ssi", $newText, $newtitulo, $tarefaId);
                if ($stmt->execute()) {

                    header('Location: lista.php');
                } else {
                    echo "Erro na atualização: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Erro na preparação da consulta: " . $conexao->error;
            }
        }

        // Consulta para obter os dados do usuário
        $query = "SELECT id,titulo,texto FROM tarefas WHERE id = ?";
        $stmt = $conexao->prepare($query);

        if ($stmt) {
            $stmt->bind_param("i", $tarefaId);
            $stmt->execute();
            $stmt->bind_result($id,$titulo,$texto);
            $stmt->fetch();
            $row = $stmt ->fetch();
            
           
            
            echo '<div class="container mt-5"><div class="row justify-content-center align-items-center"><div class="col-md-6"><div class="card"><div class ="tabela"><div class="card-header"><h2 class="text-center">Editar Tarefa</h2></div></div>';
            echo '<div class ="center_tabela"><div class="card-body"><form method="post">Id da tarefa: <b>' . $id . '</b><br>';
            echo 'Titulo:';
            echo '<input type="text" class= "form-control input_text" value='.$titulo.' name="new_titulo"><br>';
            echo 'Texto: <input type="text" name="new_text" value='.$texto.' class= "form-control input_text"><br>';
            echo '<input type="submit" class = "btn btn-primary btn-block color_b" value="Salvar">';
            echo '<a href="../lista_de_tarefas/lista.php"> <input class = "btn btn-primary btn-block mt-2 color_b" value="Voltar"></a>';
            echo '</form></div></div></div></div></div></div>';


            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conexao->error;
        }

        $conexao->close();
    } else {
        echo "ID de usuário não especificado.";
    }
    ?>

</body>
</html>
