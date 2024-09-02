<?php
require_once __DIR__ . '/../config/db.php';

class Contato {
    private $conn;
    private $table_name = "contatos";

    public $id;
    public $nome;
    public $nascimento;
    public $email;
    public $profissao;
    public $telefone;
    public $celular;
    public $whatsapp;
    public $sms;
    public $email_notificacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar() {
        $query = "INSERT INTO " . $this->table_name . " 
        (nome, nascimento, email, profissao, telefone, celular, whatsapp, sms, email_notificacao) 
        VALUES (:nome, :nascimento, :email, :profissao, :telefone, :celular, :whatsapp, :sms, :email_notificacao)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':profissao', $this->profissao);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':celular', $this->celular);
        $stmt->bindParam(':whatsapp', $this->whatsapp);
        $stmt->bindParam(':sms', $this->sms);
        $stmt->bindParam(':email_notificacao', $this->email_notificacao);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function listarContatos() {
        $sql = "SELECT id, nome, nascimento, email, celular FROM contatos"; // Incluído o campo id
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    



    public function editar($id) {
        $query = "UPDATE " . $this->table_name . " 
                  SET nome = :nome, 
                      nascimento = :nascimento, 
                      email = :email, 
                      profissao = :profissao, 
                      telefone = :telefone, 
                      celular = :celular, 
                      whatsapp = :whatsapp, 
                      sms = :sms, 
                      email_notificacao = :email_notificacao
                  WHERE id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // Bind dos parâmetros
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':nascimento', $this->nascimento);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':profissao', $this->profissao);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':celular', $this->celular); // Certifique-se de que o valor de celular está sendo definido corretamente
        $stmt->bindParam(':whatsapp', $this->whatsapp);
        $stmt->bindParam(':sms', $this->sms);
        $stmt->bindParam(':email_notificacao', $this->email_notificacao);
    
        // Executa a consulta e retorna true se bem-sucedida
        if ($stmt->execute()) {
            return true;
        }
    
        return false;
    }
    


     // Método para excluir um contato
     public function excluir($id) {
        echo "ID que será excluído: " . $id;  // Adicione esta linha para verificar o ID no modelo
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo "Execução da exclusão foi bem-sucedida.";  // Confirmação da execução
            return true;
        } else {
            echo "Falha na execução da exclusão.";  // Indica falha
            return false;
        }
    }
    
 
    
}
?>
