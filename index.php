<?php

require_once 'src/Entities/Client.php';
require_once 'src/Entities/CompteCourant.php'; 
require_once 'src/Entities/Transaction.php';

require_once 'src/Repositories/ClientRepository.php';
require_once 'src/Repositories/CompteRepository.php';
require_once 'src/Repositories/TransactionRepository.php';


$repoclient = new ClientRepository();
$repocompte = new CompteRepository();
$repotransaction = new TransactionRepository();

$client = new Client('khalid', 'elyou','elyo@gmail.com', "06440000");
// $repoclient->add($client); 


$monCompte = new CompteCourant("NF-1542", 0, $client); // Solde 0
// $repocompte->add($monCompte, 'Courant', $client->getId());


$tousLesComptes = $repocompte->getAll();
$leDernier = end($tousLesComptes); 
$idCompte = $leDernier['id']; 


$amount = 0;

$monCompte->setSolde($leDernier['solde']); 
// $monCompte->deposer($amount);
$monCompte->retirer($amount);

$newSolde = $monCompte->getSolde(); 


$repocompte->updateSolde($idCompte, $newSolde);


// $tran = new Transaction('DEPOT', $amount, $idCompte); 
$tran = new Transaction('retirer', $amount, $idCompte); 
$repotransaction->add($tran);

echo "✅ Solde  $newSolde $ ";
echo "<br>";



$hestorys = $repotransaction->getByCompte($idCompte);


foreach ($hestorys as $h) {
    echo "-".$h['type']
    .$h['montant']
    .$h['date_transaction'];

    echo "<br>";
}