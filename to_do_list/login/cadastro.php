<?php
    $status_cadastro = 0;
    if (isset($_GET['s'])) {
        $status_cadastro = $_GET['s'];
        // s = 2 (usuario cadastrado) 
        // s = 3 (senha diferentes)
    }
    $nome = "";
    $telefone = "";
    $user = "";

    if (isset($_GET['nome'])) {
        $nome = $_GET['nome'];
    }
    if (isset($_GET['telefone'])) {
        $telefone = $_GET['telefone'];
    }
    if (isset($_GET['user'])) {
        $user = $_GET['user'];       
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Página de Cadastro</title>
    <link rel="icon" type="image/x-icon" href="../imagens/ARCS_LOGO.ico">

    <meta charset="UTF-8">

    <!-- Adicione links para o CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
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
        .User_cad{
            color : #B03A2E; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="tabela">
                        <div class="card-header">
                            <h2 class="text-center">Cadastro</h2>
                        </div>
                    </div>
                    <div class="center_tabela">
                        <div class="card-body">
                            <form method="post" action="cadastro_backend.php">
                                <div class="form-group">
                                    <label for="usuario">Nome Completo:</label>
                                    <input type="text" class="form-control , input_text" value ='<?php echo $nome ?>'id="nome_completo" name="fnome_completo" required>
                                </div>
                                
                                    <div class="form-group">
                                        <label for ="senha">Telefone:</label>
                                        <input type="text"  class="form-control , input_text" value = '<?php echo $telefone ?>' onclick="telefoneText()" id="telefone" name="ftelefone" required>
                                    </div>

                                <div class="form-group">
                                    <label for="usuario">Usuário:</label>
                                    <input type="text" class="form-control , input_text" value='<?php echo $user?>' id="usuario" name="fusuario" required>
                                    <?php 
                                        if($status_cadastro == 2){
                                            echo '<p class ="User_cad mt-1 ml-1">Usuário ja cadastrado.</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="form-group">
                                    <label for ="senha">Senha:</label>
                                    <input type="password" class="form-control input_text" id="senha" name="fsenha" required>
                                    <?php 
                                        if($status_cadastro == 3){
                                            echo '<p class ="User_cad mt-1 ml-1">Desculpe, as senhas não coincidem. Por favor, tente novamente.</p>';
                                        }
                                    ?> 
                                </div>
                                <div class="form-group">
                                    <label for ="senha">Confirme sua senha:</label>
                                    <input type="password" class="form-control , input_text" id="senha_confirm" name="fsenha_confirm" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block color_b">Cadastrar</button>
                            </form>
                            <div class ="mt-2">
                                <a href="login.php">
                                <button class="btn btn-primary btn-block color_b">Voltar</button>
                                </a>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function telefoneText(){
            var $telefoneJ = $("#telefone");
            $telefoneJ.mask('(00) 00000-0000');
        }
    </script>
</body>
</html>
