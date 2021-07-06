<?php
// $pdo = new PDO('mysql: host=sql300.epizy.com; dbname=epiz_26793459_db_teste_crud', 'epiz_26793459', 'xUjIBZFeUW1');
try {

    $pdo = new PDO('mysql: host=localhost; dbname=db_teste', 'root', '');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Forca mostrar o erro;
} catch (PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}

if (isset($_POST['inserirDados'])) {
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            if (isset($_POST['senha']) && !empty($_POST['senha'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $inserindo = $pdo->query("INSERT INTO usuarios SET nome= '$nome', email= '$email', senha= '$senha' ");

                if($inserindo){
                    header("Location: index.php");
                }else {
                    echo "Erro ao inserir";
                }
            }else {
                header("Location: index.php");
            }
        }else {
            header("Location: index.php");
        }
    }else {
        header("Location: index.php");
    }
}
