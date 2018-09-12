<?php

namespace Classes;

use Classes\Database;

/**
 * Class Ville
 * 
 * Permet de créer une ville
 */
class Ville
{

    /**
     * Stocke l'id de la ville
     *
     * @var int
     */
    private $_idVille;

    /**
     * Population initiale de la ville
     *
     * @var int (2-5000)
     */
    protected $_popInitiale;

    /**
     * Taux de natalité dans la ville
     *
     * @var float (0-1)
     */
    protected $_txNat;

    /**
     * Taux de mortalité dans la ville
     *
     * @var float (0-1)
     */
    protected $_txMort;

    public function __construct($popInitiale, $txNat, $txMort)
    {
        $this->_popInitiale = $popInitiale;
        $this->_txNat = $txNat;
        $this->_txMort = $txMort;
    }


    /**
     * Get stocke l'id de la ville
     *
     * @return  int
     */
    public function get_idVille()
    {
        return $this->_idVille;
    }

    /**
     * Set stocke l'id de la ville
     *
     * @param  int  $_idVille  Stocke l'id de la ville
     *
     * @return  self
     */
    public function set_idVille(int $_idVille)
    {
        $this->_idVille = $_idVille;

        return $this;
    }

    /**
     * Get (2-5000)
     *
     * @return  int
     */
    public function get_popInitiale()
    {
        return $this->_popInitiale;
    }

    /**
     * Set (2-5000)
     *
     * @param  int  $_popInitiale  (2-5000)
     *
     * @return  self
     */
    public function set_popInitiale(int $_popInitiale)
    {
        $this->_popInitiale = $_popInitiale;

        return $this;
    }

    /**
     * Get (0-1)
     *
     * @return  float
     */
    public function get_txNat()
    {
        return $this->_txNat;
    }

    /**
     * Set (0-1)
     *
     * @param  float  $_txNat  (0-1)
     *
     * @return  self
     */
    public function set_txNat(float $_txNat)
    {
        $this->_txNat = $_txNat;

        return $this;
    }

    /**
     * Get (0-1)
     *
     * @return  float
     */
    public function get_txMort()
    {
        return $this->_txMort;
    }

    /**
     * Set (0-1)
     *
     * @param  float  $_txMort  (0-1)
     *
     * @return  self
     */
    public function set_txMort(float $_txMort)
    {
        $this->_txMort = $_txMort;

        return $this;
    }


    /**
     * Permet de vérifier si la généré existe déjà dans la bdd et, si elle n'existe pas, de l'y enregistrer
     *
     * @return void
     */
    public function registerVille()
    {
        
        // Connexion à la base de données
        $pdo = new Database;

        $connect = $pdo->getPdo();

        // Vérification
        $req = $connect->prepare('SELECT * FROM ville WHERE pop_initiale = ? AND tx_nat = ? AND tx_mort = ?');

        $req->bindParam(1, $this->_popInitiale);
        $req->bindParam(2, $this->_txNat);
        $req->bindParam(3, $this->_txMort);


        $req->execute();
        $res = $req->fetch();

        if ($res) {
            $this->_idVille = $res[0];
        } else {

            // Si la ville n'existe pas, on l'enregistre
            $insert = $connect->prepare('INSERT INTO ville (pop_initiale, tx_nat, tx_mort) VALUES(?, ?, ?)');

            $insert->bindParam(1, $this->_popInitiale);
            $insert->bindParam(2, $this->_txNat);
            $insert->bindParam(3, $this->_txMort);

            $insert->execute();


            // Puis on récupère son id
            $getId = $connect->prepare('SELECT id_ville FROM ville WHERE pop_initiale = ? AND tx_nat = ? AND tx_mort = ?');

            $getId->bindParam(1, $this->_popInitiale);
            $getId->bindParam(2, $this->_txNat);
            $getId->bindParam(3, $this->_txMort);

            $getId->execute();
            $id = $getId->fetch();

            $this->_idVille = $id[0];

        }

    }

    public function registerVillePartieCata()
    {

        $pdo = new Database;

        $connect = $pdo->getPdo();

        $reqPartie = $connect->query('SELECT max(id_partie) FROM partie');

        $resPartie = $reqPartie->fetch();

        $id_partie = $resPartie[0];

        $insert = $connect->prepare('INSERT INTO ville_partie_cata VALUES(?, ?, ?, ?)');

        $insert->bindParam(1, $this->_idVille);
        $insert->bindParam(2, $id_partie);
        $insert->bindParam(3, $id_cata);
        $insert->bindParam(4, $annee_cata);

        $insert->execute();

    }

}