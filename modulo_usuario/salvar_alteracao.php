<?php

include '../servico/Banco.php';

// Recebendo os dados enviados via POST
$id = $_POST['id'];
$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$matricula = $_POST['matricula'];

try {
    // Criando uma instância da classe Banco
    $banco = new Banco();

    // Comando SQL para atualizar os dados do registro
    $sql = "UPDATE alunos 
            SET nome = :nome, 
                data_nascimento = :data_nascimento, 
                matricula = :matricula 
            WHERE id = :id";

    // Preparando a consulta para evitar SQL Injection
    $stmt = $banco->prepare($sql);

    // Vinculando os parâmetros
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
    $stmt->bindParam(':matricula', $matricula, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Executando a consulta
    $stmt->execute();

    // Redirecionando para a página de consulta
    echo '
    <script>
    window.location.href = "consulta.php";
    </script>
    ';
} catch (Exception $e) {
    // Exibindo mensagens de erro em caso de falha
    var_dump($e->getMessage());
    die();
}
?>
