CREATE DATABASE IF NOT EXISTS banque_db;
USE banque_db;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL
);

CREATE TABLE comptes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(20) NOT NULL,
    solde DECIMAL(10, 2) DEFAULT 0.00,
    type VARCHAR(20) NOT NULL,
    decouvert_autorise DECIMAL(10, 2) DEFAULT 0.00,
    client_id INT,
    FOREIGN KEY (client_id) REFERENCES clients(id)
);

CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(20) NOT NULL,
    montant DECIMAL(10, 2) NOT NULL,
    date_transaction DATETIME DEFAULT CURRENT_TIMESTAMP,
    compte_id INT,
    FOREIGN KEY (compte_id) REFERENCES comptes(id)
);

