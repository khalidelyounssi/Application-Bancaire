<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entities/Client.php';

class ClientRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function add(Client $c) {
        $sql = "INSERT INTO clients (nom, prenom, email, telephone) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$c->getNom(), $c->getPrenom(), $c->getEmail(), $c->getTelephone()]);
        
        $c->setId($this->pdo->lastInsertId());
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM clients")->fetchAll(PDO::FETCH_ASSOC);
    }
}