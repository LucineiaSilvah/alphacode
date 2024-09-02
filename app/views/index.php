<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Cadastro de Contatos</title>
</head>
<body >
    <style>
      .bg-custom{
  background: #068ed0;
  color: #fff;
  
}
.bd-custom{
  border-bottom: 2px solid #068ed0;
}
/* Estilo padrão para a tabela */
.tabela-contatos {
    width: 100%;
    border-collapse: collapse;
}

/* Ocultar a tabela padrão em telas pequenas */
@media (max-width: 768px) {
    .tabela-contatos {
        display: none; /* Ocultar tabela em dispositivos móveis */
    }

    /* Estilo para exibir como lista/cartos */
    .contato-item {
        border: 1px solid #ccc; /* Apenas um exemplo de estilo */
        margin-bottom: 16px; /* Espaçamento entre itens */
        padding: 16px;
        border-radius: 4px;
    }

    .contato-item h5 {
        margin: 0; /* Ajusta o espaçamento do título */
    }

    .contato-item img {
        cursor: pointer; /* Muda o cursor para indicar que é clicável */
        margin: 0 8px; /* Espaço entre os botões de ação */
    }
}
    </style>
    <header >
    <nav class="navbar bg-custom">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">
      <img src="assets/logo_alphacode.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      Cadastro de Contatos
    </a>
  </div>
</nav>
    </header>
<main class="p-4">
<form  method="POST" action="index.php?action=cadastrarContato" class="row g-3 m-4">
  <div class="col-md-6">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" name="nome" placeholder="Nome Completo" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0"id="nome" required>
   
  </div>
  <div class="col-md-6">
    <label for="nascimento" class="form-label ">Data de nascimento</label>
    <input type="date" name="nascimento" placeholder="Data de Nascimento" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="nascimento" required>
    
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" name="email" placeholder="E-mail" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="email" required>
   
  </div>
  <div class="col-md-6">
    <label for="profissao" class="form-label">Profissão</label>
    <input type="text" name="profissao" placeholder="Profissão" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0"id="profissao">
    
  </div>
  <div class="col-md-6">
    <label for="tel" class="form-label">Telefone para contato</label>
    <input type="tel" name="tel" placeholder="Telefone" class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="tel">
   
  </div>
  <div class="col-md-6">
    <label for="cel" class="form-label">Celular para contato</label>
    <input type="tel" name="cel" placeholder="Celular"  class="form-control bd-custom border-top-0 border-start-0 border-end-0 rounded-0" id="cel" required>
   
  </div>
 
  
  <div class="col-6">
  <div class="form-check">
      
      <input class="form-check-input" type="checkbox" type="checkbox" name="whatsapp" id="whatsapp"> 
      <label class="form-check-label" for="whatsapp">
      Número de celular possui WhatsApp
      </label>

  </div>
  </div>
  <div class="col-6">
  <div class="form-check">
      <input  type="checkbox" id="gridCheck">
      <input class="form-check-input" type="checkbox" name="sms" id="sms"> 
      <label class="form-check-label" for="sms">
      Enviar notificações por SMS
      </label>
  </div>
  </div>
  <div class="col-6">
  <div class="form-check">
      
      <input class="form-check-input" type="checkbox" name="email_notificacao" id="email_notificacao">
      <label class="form-check-label" for="email_notificacao">
      Enviar notificações por E-mail
      </label>
  </div>
  </div>
  <div class="col-6">
  <button type="submit" class="btn bg-custom">Cadastrar contato</button>
  </div>
</form>

<hr>

<!-- Exibir erros, se houver -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<!-- Modal de Edição -->
<div class="modal fade" id="editarContatoModal" tabindex="-1" aria-labelledby="editarContatoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarContatoModalLabel">Editar Contato</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editarContatoForm" method="POST" action="index.php?action=editarContato">
        <div class="modal-body">
          <input type="hidden" id="editarId" name="id"> <!-- Campo oculto para armazenar o ID do contato -->
          <div class="mb-3">
            <label for="editarNome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="editarNome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="editarNascimento" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="editarNascimento" name="nascimento" required>
          </div>
          <div class="mb-3">
            <label for="editarEmail" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="editarEmail" name="email" required>
          </div>
          <div class="mb-3">
            <label for="editarProfissao" class="form-label">Profissão</label>
            <input type="text" class="form-control" id="editarProfissao" name="profissao">
          </div>
          <div class="mb-3">
            <label for="editarTelefone" class="form-label">Telefone para contato</label>
            <input type="tel" class="form-control" id="editarTelefone" name="telefone">
          </div>
          <div class="mb-3">
            <label for="editarCelular" class="form-label">Celular para contato</label>
            <input type="tel" class="form-control" id="editarCelular" name="celular">
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="editarWhatsapp" name="whatsapp">
            <label class="form-check-label" for="editarWhatsapp">Número de celular possui WhatsApp</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="editarSMS" name="sms">
            <label class="form-check-label" for="editarSMS">Enviar notificações por SMS</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="editarEmailNotificacao" name="email_notificacao">
            <label class="form-check-label" for="editarEmailNotificacao">Enviar notificações por E-mail</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Tabela de contatos -->
<div class="p-4 m-4">
    <table class="table shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Data de nascimento</th>
                <th scope="col">E-mail</th>
                <th scope="col">Celular para contato</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
    <?php if (!empty($contatos)): ?>
        <?php foreach ($contatos as $contato): ?>
            <tr>
                <td><?php echo htmlspecialchars($contato['nome']); ?></td>
                <td><?php echo htmlspecialchars($contato['nascimento']); ?></td>
                <td><?php echo htmlspecialchars($contato['email']); ?></td>
                <td><?php echo htmlspecialchars($contato['celular']); ?></td>
                <td>
                    <img class="btn btn-sm" onclick="abrirModalEditar(<?php echo htmlspecialchars(json_encode($contato)); ?>)" src="assets/editar.png" alt="Editar">
                    
                    <!-- Verifica se o id está definido e cria o botão de exclusão -->
                    <?php if (isset($contato['id'])): ?>
                        <button class="btn btn-sm" onclick="confirmarExclusao(<?php echo htmlspecialchars($contato['id']); ?>)">
                            <img src="assets/excluir.png" alt="Excluir">
                        </button>
                    <?php else: ?>
                        <button class="btn btn-sm" disabled>Excluir</button>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Nenhum contato encontrado.</td>
        </tr>
    <?php endif; ?>
</tbody>


    </table>
</div>
</main>
<footer class="d-flex bg-custom justify-content-between align-items-center pt-4 p-2">
<p>Termos | Politicas</p>
<p>&copy;<span><img width="60px" src="assets/logo_rodape_alphacode.png" alt=""></span> Copyright 2022</p>
<p>&copy;Alphacode IT Solutions 2022</p>
</footer>


<script>


    function confirmarExclusao(id) {
        // Verifica se o ID foi passado corretamente
        console.log('ID para exclusão:', id);

        // Confirmar antes de excluir
        if (confirm('Tem certeza de que deseja excluir este contato?')) {
            // Redireciona para a URL de exclusão
            window.location.href = 'index.php?action=excluirContato&id=' + id;
        }
    }


  function abrirModalEditar(contato) {

  

    // Preencher os campos do modal com os dados do contato
    document.getElementById('editarId').value = contato.id; // Certifique-se de que o ID do contato está disponível no array $contato
    document.getElementById('editarNome').value = contato.nome;
    document.getElementById('editarNascimento').value = contato.nascimento;
    document.getElementById('editarEmail').value = contato.email;
    document.getElementById('editarProfissao').value = contato.profissao;
    document.getElementById('editarTelefone').value = contato.telefone;
    document.getElementById('editarCelular').value = contato.celular;
    document.getElementById('editarWhatsapp').checked = contato.whatsapp == 1;
    document.getElementById('editarSMS').checked = contato.sms == 1;
    document.getElementById('editarEmailNotificacao').checked = contato.email_notificacao == 1;

    // Mostrar o modal de edição
    var editarModal = new bootstrap.Modal(document.getElementById('editarContatoModal'));
    editarModal.show();
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>