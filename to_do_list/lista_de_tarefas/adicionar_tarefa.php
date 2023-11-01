<!DOCTYPE html>
<html>
<head>
    <title>Página de Cadastro</title>
    <link rel="icon" type="image/x-icon" href="../imagens/ARCS_LOGO.ico">

    <meta charset="UTF-8">

    <!-- Adicione links para o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #34495E; /* Substitua #FF0000 pela cor desejada em formato hexadecimal. */
        }
        .container {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
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
    <div class="container mt-6">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class ="tabela">
                        <div class="card-header">
                            <h2 class="text-center">Cadastrar Tarefa</h2>
                        </div>
                    </div>
                    <div class = "center_tabela">
                        <div class="card-body">
                            <form method="post" action="cadastrar_tarefa.php">
                                <div class="form-group">
                                    <label for="Lista"> Nome da Tarefa </label>
                                    <input type="text" class="form-control input_text" id="nome_tarefa" name="fnome_tarefa" required>
                                    <div class ="mt-2">
                                        <label for="Texto"> Texto da Tarefa </label>
                                        <input type="text" class="form-control input_text" id="texto" name="ftexto" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block color_b">Cadastrar</button>
                            </form>
                            <a href="lista.php">
                                <button class="mt-2 btn btn-primary btn-block color_b">Voltar</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Adicione links para o JavaScript do Bootstrap (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
