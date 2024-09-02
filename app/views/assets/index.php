<?php
  $host = 'localhost'; // Nome do host
  $database = 'contatos'; // Nome do banco de dados
  $user = 'root'; // Nome do usuário
  $password = ''; // Senha do usuário
  $port = '3308'; // Porta do MySQL
  
  // Cria uma conexão
  $connection = new mysqli($host, $user, $password, $database, $port);
  
  // Verifica a conexão
  if ($connection->connect_error) {
      die("Falha na conexão: " . $connection->connect_error);
  }
  
  echo "Conexão bem-sucedida!";
?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="views/assets/logo_alphacode.png" type="image/x-icon">
    <title>Cadastro Contatos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="views/css/index.css">
  </head>

  <body>
    <style>
      .bg-custom{
  background: #068ed0;
  color: #fff;
  
}
.bd-custom{
  border-bottom: 2px solid #068ed0;
}
    </style>
    <header class="">
    <nav class="navbar bg-custom">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">
      <img src="views/assets/logo_alphacode.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Cadastro de Contatos
    </a>
  </div>
</nav>
    </header>
<main class="p-4">
<form class="row g-3 m-4">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0"id="nome">
  </div>
  <div class="col-md-6">
    <label for="nascimento" class="form-label ">Data de nascimento</label>
    <input type="password" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="nascimento">
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="email">
  </div>
  <div class="col-md-6">
    <label for="profissao" class="form-label">Profissão</label>
    <input type="password" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0"id="profissao">
  </div>
  <div class="col-md-6">
    <label for="tel" class="form-label">Telefone para contato</label>
    <input type="email" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="tel">
  </div>
  <div class="col-md-6">
    <label for="cel" class="form-label">Celular para contato</label>
    <input type="password" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="cel">
  </div>
 
  
  <div class="col-6">
  <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Numero de celular possui whatsapp
      </label>
    </div>
  </div>
  <div class="col-6">
  <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
       Enviar notificações por sms
      </label>
    </div>
  </div>
  <div class="col-6">
  <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
      Enviar notificações por E-mail
      </label>
    </div>
  </div>
  <div class="col-6">
  <button type="submit" class="btn bg-custom">Cadastrar contato</button>
  </div>
</form>
<hr>
<div class="p-4 m-4">

  <table class="table  shadow-lg p-3 mb-5 bg-body-tertiary rounded">
    <thead >
      <tr >
        <th scope="col">Nome</th>
        <th scope="col">Data de nascimento</th>
        <th scope="col">E-mail</th>
        <th scope="col">Celular para contato</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
       
        <td>leticia pacheco</td>
        <td>03/10/2003</td>
        <td>leticia@gmail.com</td>
        <td>(11)98493-2039</td>
        <td><span>
          <img class="btn" src="views/assets/editar.png" alt="">
          <img class="btn" src="views/assets/excluir.png" alt="">
        </span></td>
      </tr>
      <tr>
      
        <td>leticia pacheco</td>
        <td>03/10/2003</td>
        <td>leticia@gmail.com</td>
        <td>(11)98493-2039</td>
        <td><span>
          <img class="btn" src="views/assets/editar.png" alt="">
          <img class="btn" src="views/assets/excluir.png" alt="">
        </span></td>
      </tr>
      <tr>
       
        <td>leticia pacheco</td>
        <td>03/10/2003</td>
        <td>leticia@gmail.com</td>
        <td>(11)98493-2039</td>
        <td><span>
          <img class="btn" src="views/assets/editar.png" alt="">
          <img class="btn" src="views/assets/excluir.png" alt="">
        </span></td>
      </tr>
     
    </tbody>
  </table>
</div>
</main>
<footer class="d-flex bg-custom justify-content-between align-items-center pt-4 p-2">
 <p>Termos | Politicas</p>
 <p> &copy;<span><img width="60px" src="views/assets/logo_rodape_alphacode.png" alt=""></span> Copyright 2022</p>
 <p>&copy;Alphacode IT Solutions 2022</p>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>