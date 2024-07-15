<?php

include 'Model/conexao.php';
include 'Model/Manager.php';

$manager = new Manager();


class Alertas
{
    public static function sucess($message)
    {
        echo "<div class='alert text-center alert-success' role='alert'>
            $message
            </div>";
    }

    public static function danger($message)
    {
        echo "<div class='alert text-center alert-danger' role='alert'>
            $message
            </div>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />

    <link rel="apple-touch-icon" sizes="180x180" href="resources/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="resources/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="resources/favicon-16x16.png">
    <link rel="manifest" href="resources/site.webmanifest">
    <link rel="mask-icon" href="resources/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <style type="text/css">
        body {
            margin: 20px;
            background-color: #ffffff;
        }

        * {
            font-family: 'Open Sans', sans-serif;
        }

        h2 {
            font-family: 'Open Sans', sans-serif;
        }

        .thead {
            background-color: #f7f7f7;
        }
    </style>

</head>

<body>



    <div class="container">

        <?php
        if (isset($_GET['cod'])) {
            switch ($_GET['cod']) {
                case 1:
                    Alertas::sucess('Cadastro confirmado com sucesso');
                    break;
                case 2:
                    Alertas::sucess('Cadastro excluido com sucesso');
                    break;
                case 3:
                    Alertas::sucess('Cadastro atualizado com sucesso');
                    break;
                default:
                    Alertas::danger('Nenhuma ação realizada');
                    break;
            }
        }
        ?>

        <h2 class="text-center">Lista de Usuários <i class="bi bi-people-fill"></i></h2>

        <h5 class="text-end">
            <a href="view/page_register.php" class="btn btn-primary btn-xs">
                <i class="bi bi-person-plus-fill"></i>
            </a>
        </h5>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>CPF</th>
                        <th>DT. DE NASCIMENTO</th>
                        <th>ENDEREÇO</th>
                        <th>TELEFONE</th>
                        <th colspan="3">AÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($manager->list_client() as $data): ?>
                        <tr>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nome'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['cpf'] ?></td>
                            <td><?= $data['dtnascimento'] ?></td>
                            <td><?= $data['endereco'] ?></td>
                            <td><?= $data['telefone'] ?></td>
                            <td>
                                <form action="view/page_update.php" method="get">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <button class="btn btn-warning btn-xs">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="/Atividade_MVC/Controller/delete_cliente.php" method="post"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                    <button class="btn btn-danger btn-xs">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <script type="text/javascript"
                        src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
                    <script type="text/javascript"
                        src="https://cdnjs.cloudfare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>

</html>