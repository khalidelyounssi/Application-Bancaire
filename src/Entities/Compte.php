    <?php


abstract class  Compte {
    protected $id;
    protected $numero;
    protected $solde;
    protected $titulaire;


    public function __construct($numero, $solde, $titulaire) {
        $this->numero = $numero;
        $this->solde = $solde;
        $this->titulaire = $titulaire;
    }

     public function getId() {
        return $this->id;
     }


   
    public function getNumero() {
        return $this->numero;
    }
    public function getSolde() {
        return $this->solde;
    }
    public function getTitulaire() {
        return $this->titulaire;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function setSolde($solde) {
            $this->solde = $solde;
    }
    public function setTitulaire($titulaire) {
        $this->titulaire = $titulaire;
    }

    abstract public function deposer($amount);

    abstract public function retirer($amount);
   

}