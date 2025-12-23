<?php

require_once 'Compte.php';

class CompteCourant extends Compte {
    private $decouvertAutorise;

     public function __construct($numero, $solde, $titulaire, $decouvertAutorise = 500) {
        parent::__construct($numero, $solde, $titulaire); 
        $this->decouvertAutorise = $decouvertAutorise;
    }

    public function deposer($amount) {
        $this->solde += ($amount-1) ;
        
    }
    public function retirer($amount) {
        if (($this->solde + $this->decouvertAutorise) >= $amount) {
            $this->solde -= $amount;
            return true;   
        } else {
            echo "Solde insuffisant!";
            return false;
        }
    }
}
