<?php
require_once './app/config/db.php';
require_once './app/controllers/ContatoController.php';

$database = new Database();
$db = $database->getConnection();

$controller = new ContatoController($db);



$action = isset($_GET['action']) ? $_GET['action'] : 'listarContatos';
switch ($action) {
  case 'cadastrarContato':
    $controller->cadastrarContato();
    break;
  case 'editarContato':
    $controller->editarContato();
    break;
  case 'excluirContato': // Novo caso para exclusão de contato
    $id = isset($_GET['id']) ? $_GET['id'] : null; // Obtém o ID do contato a ser excluído
    if ($id) {
      $controller->excluirContato($id); // Chama o método de exclusão no controlador
    } else {
      echo "ID de contato não fornecido.";
    }
    break;
  case 'listarContatos':
  default:
    $controller->listarContatos();
    break;
}
