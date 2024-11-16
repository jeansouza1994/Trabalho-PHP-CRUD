<?php

include '../servico/Banco.php';

// Recebendo os dados do formulário através do método GET
$nome = $_GET['nome'];
$data_nascimento = $_GET['data_nascimento'];
$matricula = $_GET['matricula'];

try {
    // Criando uma instância da classe Banco
    $banco = new Banco();

    // Comando SQL para inserir os dados na tabela 'alunos'
    $sql = "INSERT INTO alunos (nome, data_nascimento, matricula) 
            VALUES ('$nome', '$data_nascimento', '$matricula')";

    // Executando o comando SQL
    $banco->exec($sql);

    // Redirecionando para a página de consulta
    echo '
    <script>
    window.location.href = "consulta.php";
    </script>
    ';

} catch (Exception $e) {
    // Capturando e exibindo qualquer erro
    var_dump($e->getMessage());
    die();
}
?>
