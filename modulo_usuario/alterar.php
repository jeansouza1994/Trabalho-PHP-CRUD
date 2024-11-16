<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Aluno</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <h1> Tela de Alteração de Dados </h1>

        <form action="salvar_alteracao.php" method="POST">
            <?php
            include '../servico/Banco.php';

            $id = $_GET['id'];

            try {
                $banco = new Banco();

                // Consulta para buscar os dados do registro pelo ID
                $sql = "SELECT * FROM alunos WHERE id = $id";

                foreach ($banco->query($sql) as $row) {
                    echo '
                    <input type="hidden" name="id" value="' . $row['id'] . '">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome"
                            value="' . $row['nome'] . '" placeholder="Nome do aluno">
                    </div>

                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="text" class="form-control" name="data_nascimento" id="data_nascimento"
                            value="' . $row['data_nascimento'] . '" placeholder="AAAA-MM-DD">
                    </div>

                    <div class="mb-3">
                        <label for="matricula" class="form-label">Matrícula</label>
                        <input type="text" class="form-control" name="matricula" id="matricula"
                            value="' . $row['matricula'] . '" placeholder="Matrícula do aluno">
                    </div>

                    <input type="submit" class="btn btn-primary" value="Salvar">';
                }
            } catch (Exception $e) {
                var_dump($e->getMessage());
                die();
            }
            ?>
        </form>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>
