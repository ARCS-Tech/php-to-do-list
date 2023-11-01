<?php
    
    include("../session.php");
    session_login();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
    <link rel="icon" type="image/x-icon" href="../imagens/ARCS_LOGO.ico">

    <meta charset="UTF-8">
    <!-- Adicione links para o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .rouded_img{
            border-radius: 100%;
        }
        .tamanho_logo{
            width:540px;
            height:200px;
        }
        @media only screen and (max-width: 1439px){
            .tamanho_logo{
                width:450px;
                height:150px;
            }
        }
        @media only screen and (max-width: 1023px){
            .tamanho_logo{
                width:330px;
                height:120px;
            }
        }
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
    
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center mb-3">
            <img src="../imagens/ARCS_LOGO.jpg" alt="Logo" class="img-fluid rouded_img tamanho_logo">
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class ="tabela">
                        <div class="card-header">
                            <h2 class="text-center">Faça Login</h2>
                        </div>
                    </div>
                    <div class = "center_tabela">
                        <div class="card-body">
                            <form method="post" action="login_backend.php">
                                <div class="form-group">
                                    <label for="usuario">Usuário:</label>
                                    <input type="text" class="form-control , input_text" id="usuario" name="fusuario" required>
                                </div>
                                <div class="form-group">
                                    <label for ="senha">Senha:</label>
                                    <input type="password" class="form-control , input_text" id="senha" name="fsenha" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block , color_b">Entrar</button>
                            </form>
                            <div class ="mt-2">
                                <a href="cadastro.php">
                                <button class="btn btn-primary btn-block , color_b">Cadastro</button>
                                </a>
                            </div> 
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
