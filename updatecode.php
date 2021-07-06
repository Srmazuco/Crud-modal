<?php
try {

    $pdo = new PDO('mysql: host=localhost; dbname=db_teste', 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Forca mostrar o erro;
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
if(isset($_POST['updateDados'])){
    $id = $_POST['update_id'];

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $atualizar = $pdo->query("UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE id='$id' ");

    if($atualizar){
        echo "<script> alert('Dados Atualizados'); </script>";
        header("Location: index.php");
    }else{
        echo "<script> alert('Nao foi possivel atualizar'); </script>";
    }
}