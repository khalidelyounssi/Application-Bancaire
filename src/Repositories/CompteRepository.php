<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entities/Compte.php';

class CompteRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function add($compte, $type, $clientId) {
        $sql = "INSERT INTO comptes (numero, solde, type, client_id, decouvert_autorise) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        
        $decouvert = ($type === 'Courant') ? 500 : 0;

        $stmt->execute([
            $compte->getNumero(),
            $compte->getSolde(),
            $type,
            $clientId,
            $decouvert,
        ]);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM comptes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateSolde($id, $nouveauSolde) {
        $stmt = $this->pdo->prepare("UPDATE comptes SET solde = ? WHERE id = ?");
        $stmt->execute([$nouveauSolde, $id]);
    }



    public function delete($id) {
    $compte = $this->findById($id); 
    
    if ($compte['solde'] == 0) {
        $sql = "DELETE FROM comptes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        echo "compte supprime.\n";
    } else {
        echo "mpossible! Le compte n'est pas vide .\n";
    }
}

    
    public function getAll() {
        return $this->pdo->query("SELECT * FROM comptes")->fetchAll(PDO::FETCH_ASSOC);
    }
}