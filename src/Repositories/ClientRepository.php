<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entities/Client.php';

class ClientRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function add(Client $c) {
        $checkSql = "SELECT COUNT(*) FROM clients WHERE email = ?";
        $stmtCheck = $this->pdo->prepare($checkSql);
        $stmtCheck->execute([$c->getEmail()]);
      $existe = $stmtCheck->fetchColumn(); 

        if ($existe > 0) {
            echo " Erreur :Email dija existe\n";
            return;
        }

        $sql = "INSERT INTO clients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$c->getNom(), $c->getPrenom(), $c->getEmail(), $c->getTelephone()]);
        
        $c->setId($this->pdo->lastInsertId());
        echo " succes !\n";
    }

    public function delete($clientId) {
        $checkSql = "SELECT COUNT(*) FROM comptes WHERE client_id = ?";
        $stmtCheck = $this->pdo->prepare($checkSql);
        $stmtCheck->execute([$clientId]);
        
        $nbComptes = $stmtCheck->fetchColumn();

        if ($nbComptes > 0) {
            echo "impossible de supprimer\n";
        } else {
            $sql = "DELETE FROM clients WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$clientId]);
        }
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM clients")->fetchAll(PDO::FETCH_ASSOC);
    }
}