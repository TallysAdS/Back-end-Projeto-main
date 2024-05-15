<?php
require_once '../Control/listarUsuariosController.php';
require_once '../Control/excluirUsuarioController.php';
require_once '../Control/alterarUsuarioController.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap" rel="stylesheet" />
    <link href="../_cdn/boot.css" rel="stylesheet" />
    <link href="../_cdn/style.css" rel="stylesheet" />
    <link href="../_cdn/listarUsuarios.css" rel="stylesheet" />
    <title>Meraki Moda Feminina</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.delete-user').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('id');
            if(confirm('Tem certeza que deseja excluir este usuário?')) {
                $.ajax({
                    url: '../Control/excluirUsuarioController.php',
                    type: 'GET',
                    data: { idUsu: userId },
                    success: function(response) {
                        alert('Usuário excluído com sucesso!');
                        location.reload();
                    },
                    error: function() {
                        alert('Erro ao excluir usuário.');
                    }
                });
            }
        });
    });
    </script>
</head>

<body>
    <header class="main_header">
        <div class="main_header_content">
            <a href="#" class="logo">
                <img width="150" height="150" src="../img/logo.png" alt="Meraki Moda Feminina" title="Meraki Moda Feminina" />
            </a>
            <nav class="main_header_content_menu">
                <ul>
                    <li><a href="opcao.php">Voltar</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="list_container">
        <h1>Listagem de Dados</h1>
    </div>

    <?php foreach ($todos as $t) : ?>
        <table>
            <tr>
                <th><p>Nome:</p> <input type="text" name="nomeUsu" value="<?= $t['nomeUsu']; ?>" required></th>
                <th><p>Sobrenome:</p> <input type="text" name="sobrenomeUsu" value="<?= $t['sobrenomeUsu']; ?>" required></th>
                <th><p>Email:</p> <input type="email" name="emailUsu" value="<?= $t['emailUsu']; ?>" required></th>
                <th><p>Celular:</p> <input type="text" name="telefoneUsu" value="<?= $t['telefoneUsu']; ?>"></th>
                <th><p>Perfil:</p> <input type="text" name="perfilUsu" value="<?= $t['perfilUsu']; ?>"></th>
                <th><p>Situação:</p> <input type="text" name="situacaoUsu" value="<?= $t['situacaoUsu']; ?>"></th>
                <th>
                    <a href="alterarUsuario.php?idUsu=<?= $t['idUsu']; ?>">&#9998;</a>
                    <a href="#" class="delete-user" data-id="<?= $t['idUsu']; ?>">&#10008;</a>
                </th>
            </tr>
        </table>
        
    <?php endforeach; ?>

</body>
</html>
