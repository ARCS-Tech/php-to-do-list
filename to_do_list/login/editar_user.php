<!DOCTYPE html>
<html>
<head>
    <title>Altere seu dados</title>
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

        if(isset($_GET['id'])){

            $user_id = $_GET['id'];
            include("../conexao.php");
            include("../session.php");

            [$pass_id,$pass_nome] = verificar_session_ativa();


            $query = "SELECT senha, telefone, nome_completo FROM usuarios WHERE id = $user_id ";
            $stmt = $conexao->prepare($query);
        
            if ($stmt) {
                $stmt->execute();
                $stmt->bind_result($user_senha, $user_telefone,$user_nc);
                $stmt->fetch();

                echo '<div class="container mt-5"><div class="row justify-content-center align-items-center"><div class="col-md-6"><div class="card"><div class ="tabela"><div class="card-header"><h2 class="text-center">Editar Usuário</h2></div></div>';
                echo '<div class ="center_tabela"><div class="card-body"><form method="post">Dados do perfil de: <b>' . $user_nc . '</b><br>';
                echo 'Senha:';
                echo '<input type="text"class= "form-control input_text" name="new_password" value=' . $user_senha . '><br>';
                echo 'Telefone: <input type="text" name="new_number" class= "form-control input_text" value="' . $user_telefone . '"><br>';
                echo 'Nome Completo: <input type="text" name="new_full_name" class= "form-control input_text" value="' . $user_nc . '"><br>';
                echo '<input type="submit" class = "btn btn-primary btn-block , color_b" value="Salvar">';
                echo '<a href="../lista_de_tarefas/lista.php"> <input class = "btn btn-primary btn-block mt-2 color_b" value="Voltar"></a>';
                echo '</form></div></div></div></div></div></div>';

                $stmt->close();
            } else {
                echo "Erro na preparação da consulta: " . $conexao->error;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Receber os dados do formulário e atualizar o usuário no banco de dados
                $new_passoword = $_POST['new_password'];
                $new_number = $_POST['new_number'];
                $new_nc = $_POST['new_full_name'];
    
                $updateQuery = "UPDATE usuarios SET senha = ?, telefone = ?, nome_completo = ? WHERE id = ?";
                $stmt = $conexao->prepare($updateQuery);
    
                if ($stmt) {
                    $stmt->bind_param("sssi", $new_passoword, $new_number, $new_nc , $user_id );
                    if ($stmt->execute()) {
                        echo "Usuário atualizado com sucesso.";

                        $_SESSION['nome_usuario'] = $new_nc;
                        header("location: ../lista_de_tarefas/lista.php ");
                        
                    } else {
                        echo "Erro na atualização: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Erro na preparação da consulta: " . $conexao->error;
                }
            }

        }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

