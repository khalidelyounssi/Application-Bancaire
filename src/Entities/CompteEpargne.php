<?php

require_once 'Compte.php';

class CompteEpargne extends Compte {
   



    public function deposer($amount) {
        $this->solde += $amount;
    }
    public function retirer($amount) {
        if ($this->solde >= $amount) {
            $this->solde -= $amount; 
            return true;
        } else {
            echo "Solde insuffisant!";
            return false;
        }
    }
}
