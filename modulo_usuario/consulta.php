<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <h1> Cadastro de Alunos </h1>

    <br>
    <a href="incluir.html" class="btn btn-primary"> Incluir </a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../servico/Banco.php';

                try {
                    $banco = new Banco();

                    // Comando SQL para obter os dados da tabela 'alunos'
                    $sql = "SELECT * FROM alunos ORDER BY id";

                    // Iterando sobre os resultados da consulta
                    foreach ($banco->query($sql) as $row) {
                        echo '
                        <tr>
                            <th scope="row">' . $row['id'] . '</th>
                            <td>' . $row['nome'] . '</td>
                            <td>' . $row['data_nascimento'] . '</td>
                            <td>' . $row['matricula'] . '</td>
                            <td>
                                <a href="incluir.html?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Incluir</a>
                                <a href="alterar.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Alterar</a>
                                <a href="excluir.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>';
                    }
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                    die();
                }
            ?>
        </tbody>
    </table>
</div> <!-- Fim container -->
    
<!-- Bootstrap Bundle com Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
