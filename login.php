<?php
session_start();
include 'servico/Banco.php';

// $email = $_GET['email_variavel'];
// $senha = $_GET['senha_variavel'];
// $idade = $_GET['idade'];

$email = $_POST['email'];
$senha = $_POST['senha'];

/**
 * 
 drop table usuario_segunda;
  create table usuario_segunda(
  id serial primary key,
  email varchar(100),
  senha varchar(500)
  );

  begin; 
  insert into usuario_segunda(email,senha) values('admin@teste', '123');
  insert into usuario_segunda(email,senha) values('luana@teste', '456');
  insert into usuario_segunda(email,senha) values('vicente@teste', '789');
  ---rollback;
  commit;
 */


 try {

    $banco = new Banco();

    $sql ="select * from usuario_segunda order by 1";//comando sql

    $autenticou=false;

    foreach ($banco->query($sql) as $row) {
        if ($email==$row['email'] && $senha==$row['senha']) {
            $autenticou=true;
            break;
        }
    //    echo '<p>'.$row['id'] . '</p><br>';
    //    echo '<p>'.$row['email']  . '</p><br>';
    //    echo '<p>'.$row['senha']  . '</p><br>';
    }

 }catch (Exception $e ) {
    var_dump($e->getMessage());
    die();
 }
 
if ($autenticou==true)  {
    $_SESSION['autenticado'] = true;
    echo '
    <script>
    window.location.href = "menu.php";
    </script>
    ';
    
}else {
    unset($_SESSION['autenticado']);
    echo 'Login ou senha inválidos';
}



?>