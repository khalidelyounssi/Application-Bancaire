<?php
require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entities/Transaction.php';

class TransactionRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function add(Transaction $t) {
        $sql = "INSERT INTO transactions (type, montant, compte_id) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$t->getType(), $t->getMontant(), $t->getCompteId()]);
    }

    public function getByCompte($compteId) {
        $stmt = $this->pdo->prepare("SELECT * FROM transactions WHERE compte_id = ? ORDER BY date_transaction DESC");
        $stmt->execute([$compteId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}