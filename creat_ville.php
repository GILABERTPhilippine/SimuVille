<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use Classes\Autoloader;
use Classes\Catastrophe;
use Classes\Partie;
use Classes\Ville;
use Classes\Database;

require 'Classes/Autoloader.php';
Autoloader::register();


$tab = $_POST['tab'];
$nbrVille = intval($_POST['nbrVille']);
$nbAnSimu = intval($_POST['nbAnSimu']);
$ville = [];

switch ($_POST['case']) {

    case 'villes':
        $partie = new Partie($nbAnSimu);
        // var_dump($nbrVille);
        $partie->createPartie();

        for ($i = 0; $i < $nbrVille; $i++) {
            $popInitiale = $tab[$i]['populationInitiale'];
            $txNat = $tab[$i]['tauxNatalite'];
            $txMort = $tab[$i]['tauxMortalite'];

            $villes = new Ville($popInitiale, $txNat, $txMort);

            $villes->registerVille();

            $villes->registerVillePartieCata();

            $tabVille = [];

            $tabVille[] = $villes->get_popInitiale();
            $tabVille[] = $villes->get_txNat();
            $tabVille[] = $villes->get_txMort();
            // var_dump($tabVille);
            $ville[] = $tabVille;

        }

        $data = json_encode($ville);

        echo $data;
        break;
    case 'stats':
        $partie->setStats();
        $stats = $partie->getStatGlobal();
        echo $stats;
        break;
    case 'csv':
        $partie->getCSV();
        break;
}