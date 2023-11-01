
<?php

  //include de variaveis de sessão e conexão cm MYSQL.
  include("../conexao.php");
  include("../session.php");

  [$pass_id,$pass_nome] = verificar_session_ativa();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de tarefas</title>
    <link rel="icon" type="image/x-icon" href="../imagens/ARCS_LOGO.ico">

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .text_name{
            margin:0 auto;
            margin-top:5px;
        }
        .buttons_padrao{
           width: 200px;
           height: 45px;           
        }
        .estilização_tabela{
            margin: 0 auto;
            margin-top: 0px;

        }
        .button_right{

            margin-right:5px;
            float: right;
        }
        .button_right_nmargin{
            text-align:right;
        }

        .div_button_right_sair{
            position: fixed;
            margin-right:5px;
            margin-bottom:5px;
            right: 0;
            bottom: 0;
            left: 10;            
        }
        .button_right_sair{
           width: 200px;
           height: 50px;           
        }
        .tarefa_concluida{
            background-color: #28B463;
        }
        .tarefa_n_concluida{
            background-color: #D0D3D4;
        }
        body {
            background-color: #95A5A6; /* Substitua #FF0000 pela cor desejada em formato hexadecimal. */
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
        .alinhamento_esquerda{
            text-align: left !important ;
        }
        .tamanho_fonte{
            font-size: 25px;
        }
        .tamanho_botao_img{
            width:25px;
            height:25px;
        }
        .tamanho_botao_img_edit{
            width:30px;
            height:30px;
        }

    </style>
</head>

<body>

    <div class="text_name row justify-content-between ">
        <div class="col-6 alinhamento_esquerda tamanho_fonte ">
            Bem vindo a sua lista de tarefas, <b><?=$pass_nome?></b>!
        </div>
        <div class="col-6 button_right_nmargin ">
            <a href ="../login/editar_user.php?id= <?=$pass_id?>">
                <button class="btn btn-primary color_b buttons_padrao">Editar meus dados</button>
            </a>
        </div>
    </div>

    <div class ="text_name row justify-content-between " >
        <div class="col-6">
        </div>
        <div class = "col-6 button_right_nmargin ">
            <a href ="adicionar_tarefa.php">
                <button type="submit" class="btn btn-primary color_b buttons_padrao">Cadastrar tarefa</button>
            </a>
        </div>
    </div>
    <div class ="div_button_right_sair ">
        <a href ="../login/deslogar.php">
            <button class="btn btn-primary color_b button_right_sair">Sair</button>
        </a>
    </div>  
    <?php    
        
    // Consulta para obter todas as tarefas
    $query = "SELECT * FROM tarefas WHERE id_usuario = '$pass_id' ORDER BY data ASC";
    $result = $conexao->query($query);



    if ($result) {
        if ($result->num_rows > 0) {
            //tr = table row , th = table header , td= table data.
            echo '<table class="table mt-5">';
            echo '<thead class = "thead-dark">';
            echo '<tr><th class="text-center">Titulo</th><th class="text-center">Texto</th><th class="text-center">Data</th><th class="text-center">Concluir</th><th class="text-center">Editar</th><th class="text-center">Deletar</th></tr>';
            echo '</thead>';
            while ($row = $result->fetch_assoc()) {
                if($row['status'] == 2 ){
                    echo '<tr class = "tarefa_concluida">';
                }else{
                    echo '<tr class = "tarefa_n_concluida">'; 
                }
                
                echo '<td class="text-center">' . $row['titulo'] . '</td>';
                echo '<td class="text-center">' . $row['texto'] . '</td>';
                echo '<td class="text-center">' . $row['data'] . '</td>';
                echo '<td class="text-center">';
                echo '<a href="concluir.php?id=' . $row['id'] . '" onclick="return confirm(\'deseja concluir esta tarefa?\')"><img src="../imagens/check.png" alt="Check" class="tamanho_botao_img"></a>';
                echo '</td>';
                echo '<td class="text-center">';
                echo '<a href="editar.php?id=' . $row['id'] . '"><img src="../imagens/edit.png" alt="Edit" class="tamanho_botao_img_edit"></a> ';
                echo '</td>';
                echo '<td class="text-center">';
                echo '<a href="excluir.php?id=' . $row['id'] . '" onclick="return confirm(\'Tem certeza que deseja deletar esta tarefa?\')"><img src="../imagens/delete.png" alt="Delete" class="tamanho_botao_img"></a>';
                echo '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Nenhuma tarefa encontrada.';
        }

        $result->free();
    } else {
        echo "Erro na consulta: " . $conexao->error;
    }

    $conexao->close();
    ?>
                

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
