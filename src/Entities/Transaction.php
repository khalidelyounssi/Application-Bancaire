<?php

class Transaction {
    private $id;
    private $type;       
    private $montant;
    private $dateTransaction;
    private $compteId;   
    public function __construct($type, $montant, $compteId) {
        $this->type = $type;
        $this->montant = $montant;
        $this->compteId = $compteId;
    }

    public function getType() {
         return $this->type; 
        }
    public function getMontant() {
         return $this->montant; 
        }
    public function getCompteId() {
         return $this->compteId; 
        }
    
    public function setId($id) {
         $this->id = $id;
         }
    public function getId() {
         return $this->id; 
        }
    
    public function setDate($date) {
         $this->dateTransaction = $date;
         }
    public function getDate() {
         return $this->dateTransaction; 
        }
}