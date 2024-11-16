<?php

include '../servico/Banco.php';

// Recebendo o ID do registro a ser excluído
$id = $_GET['id'];

try {
    // Criando uma instância da classe Banco
    $banco = new Banco();

    // Comando SQL para excluir o registro da tabela 'alunos'
    $sql = "DELETE FROM alunos WHERE id = $id";

    // Executando o comando SQL
    $banco->exec($sql);

    // Redirecionando para a página de consulta após a exclusão
    echo '
    <script>
    window.location.href = "consulta.php";
    </script>
    ';
} catch (Exception $e) {
    // Exibindo qualquer erro que ocorrer durante a execução
    var_dump($e->getMessage());
    die();
}
?>
