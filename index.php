<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>CRUD MODAL</title>
</head>

<body>


    <!-- Formulario de cadastro -->
    <div class="modal fade" id="estudandoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar dados usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="insertcode.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Digitar Nome">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Digitar Email">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" name="senha" class="form-control" placeholder="Digitar Senha">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="inserirDados" class="btn btn-primary">Adicionar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim do formulario de cadastro -->



    <!-- Formulario de editar -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar dados dos usuarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="updatecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digitar Nome">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digitar Email">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="text" name="senha" id="senha" class="form-control" placeholder="Digitar Senha">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="updateDados" class="btn btn-primary">Atualizar Dados</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim do formulario de editar -->

    <!-- Formulario de excluir -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir dados do usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deletecode.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h4>Deseja realmente deletar os dados selecionados.?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="deletarDados" class="btn btn-primary">Sim</button>
                        <button type="button" class="btn btn-secondary" >Nao</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fim do formulario de excluir -->


    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2 style="text-align: center;">PHP CRUD bootstrap MODAL (POP UP MODAL)</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#estudandoModal">
                        Adicionar Usuario
                    </button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <?php

                    try {

                        $pdo = new PDO('mysql: host=localhost; dbname=db_teste', 'root', '');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Forca mostrar o erro;
                    } catch (PDOException $e) {
                        echo "Falha na conexão: " . $e->getMessage();
                    }

                    $selecionar = $pdo->query("SELECT * FROM usuarios");

                    ?>


                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Senha</th>
                            </tr>
                        </thead>
                        <?php
                        if ($selecionar) {
                            foreach ($selecionar as $dados) :
                        ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $dados['id']; ?> </td>
                                        <td> <?php echo $dados['nome']; ?> </td>
                                        <td> <?php echo $dados['email']; ?> </td>
                                        <td> <?php echo $dados['senha']; ?> </td>
                                        <td> <button type="button" class="btn btn-success editbtn">Editar</button> </td>
                                        <td> <button type="button" class="btn btn-danger deletebtn">Excluir</button> </td>
                                    </tr>
                                </tbody>
                        <?php
                            endforeach;
                        } else {
                            echo "Erro ao selecionar";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#nome').val(data[1]);
                $('#email').val(data[2]);
                $('#senha').val(data[3]);
            })
        })
    </script>
</body>

</html>