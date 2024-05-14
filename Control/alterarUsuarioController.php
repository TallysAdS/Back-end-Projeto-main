<?php
require_once '../Model/DTO/UsuarioDTO.php';
require_once '../Model/DAO/UsuarioDAO.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $idUsu = $_POST["idUsu"];
  $nomeUsu = $_POST["nomeUsu"];
  $sobrenomeUsu = $_POST["sobrenomeUsu"];
  $emailUsu = $_POST["emailUsu"];
  $telefoneUsu = $_POST["telefoneUsu"];
  $perfilUsu = $_POST["perfilUsu"];
  $situacaoUsu = $_POST["situacaoUsu"];

  $usuarioDTO = new UsuarioDTO;
  $usuarioDTO->setIdUsu($idUsu);
  $usuarioDTO->setNomeUsu($nomeUsu);
  $usuarioDTO->setSobrenomeUsu($sobrenomeUsu);
  $usuarioDTO->setEmailUsu($emailUsu);
  $usuarioDTO->setTelefoneUsu($telefoneUsu);
  $usuarioDTO->setPerfilUsu($perfilUsu);
  $usuarioDTO->setSituacaoUsu($situacaoUsu);

  $usuarioDAO = new UsuarioDAO();

  $sucesso = $usuarioDAO->alterarUsuario($usuarioDTO);

  if ($sucesso) {
    $msg = "Usuário alterado com sucesso! <br>";
  } else {
    $msg = "Aconteceu um problema na alteração de dados.<br>" . $sucesso;
  }
  echo "{$msg}";
}
?>
