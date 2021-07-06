<?php 
try {

    $pdo = new PDO('mysql: host=localhost; dbname=db_teste', 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Forca mostrar o erro;
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
if(isset($_POST['deletarDados'])){
    $id = $_POST['delete_id'];

    $deletar = $pdo->query("DELETE FROM usuarios WHERE id='$id' ");

    if($deletar){
        header("Location: index.php");
    }else {
        echo "Erro ao deletar";
    }
}