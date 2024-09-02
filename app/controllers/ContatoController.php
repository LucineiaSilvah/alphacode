<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../models/Contato.php';

class ContatoController {
    private $model;

    public function __construct($db) {
        $this->model = new Contato($db);
    }

    public function cadastrarContato() {
        // Inicialize uma array para armazenar erros
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar se os campos obrigatórios não estão vazios
            if (empty($_POST['nome'])) {
                $errors[] = 'O nome é obrigatório.';
            } else {
                $this->model->nome = $_POST['nome'];
            }

            if (empty($_POST['nascimento'])) {
                $errors[] = 'A data de nascimento é obrigatória.';
            } else {
                $this->model->nascimento = $_POST['nascimento'];
            }

            if (empty($_POST['email'])) {
                $errors[] = 'O email é obrigatório.';
            } else {
                $this->model->email = $_POST['email'];
            }

            // Campos não obrigatórios
            $this->model->profissao = $_POST['profissao'] ?? '';
            $this->model->telefone = $_POST['tel'] ?? '';
            $this->model->celular = $_POST['cel'] ?? '';
            $this->model->whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
            $this->model->sms = isset($_POST['sms']) ? 1 : 0;
            $this->model->email_notificacao = isset($_POST['email_notificacao']) ? 1 : 0;

            // Verificar se há erros
            if (empty($errors)) {
                // Tentar cadastrar
                if ($this->model->cadastrar()) {
                    // Redirecionar para evitar reenvios
                    header("Location: index.php?action=listarContatos");
                    exit();
                } else {
                    $errors[] = "Erro ao cadastrar o contato.";
                }
            }
        }

        // Carregar a view com erros, se houver
        require_once __DIR__ . '/../views/index.php';
    }
    
    public function listarContatos() {
        $contatos = $this->model->listarContatos();
        require_once __DIR__ . '/../views/index.php';
    }


    public function editarContato() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Captura os dados do formulário
            $id = $_POST['id']; // Certifique-se de que o ID está sendo enviado corretamente no formulário
            $this->model->nome = $_POST['nome'];
            $this->model->nascimento = $_POST['nascimento'];
            $this->model->email = $_POST['email'];
            $this->model->profissao = $_POST['profissao'];
            $this->model->telefone = $_POST['telefone'];
            $this->model->celular = $_POST['celular'];
            $this->model->whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
            $this->model->sms = isset($_POST['sms']) ? 1 : 0;
            $this->model->email_notificacao = isset($_POST['email_notificacao']) ? 1 : 0;
    

           
            // Chama o método editar() do modelo para atualizar o contato
            if ($this->model->editar($id)) {
                header("Location: index.php"); // Redireciona após a edição
                exit();
            } else {
                echo "Erro ao editar o contato.";
            }
        }
    }
    
    public function excluirContato($id) {
        echo "ID recebido para exclusão: " . $id;  // Adicione esta linha para verificar o ID recebido
        if ($this->model->excluir($id)) {
            echo "Contato excluído com sucesso.";  // Adicione esta linha para confirmar a exclusão
            header("Location: index.php?action=listarContatos");
            exit();
        } else {
            echo "Erro ao excluir o contato.";
        }
    }
    
    
    
    
    
    
    
}
?>
