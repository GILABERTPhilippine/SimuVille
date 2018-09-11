<?php

namespace Classes;

use CLasses\Databases;

/**
 * class Partie
 * 
 * Permet de créer une partie
 */
class Partie
{
    /**
     * Stocke la date qui est générée dans le constructeur
     *
     * @var string
     */
    private $_datePartie;

    /**
     * id de la partie en cours
     *
     * @var string
     */
    private $_idPartie;

    /**
     * Le nombre d'année de simulation
     *
     * @var int (0-20000)
     */
    private $_nbAnSimu;

    public function __construct()
    {
        $this->_datePartie = date('Y-m-d H:i:s');
    }

    public function createPartie()
    {
        $pdo = new Database;
        $connect = $pdo->getPdo();

        $insertPartie = $connect->preprare('INSERT INTO partie (date_partie, nb_an_sinu) VALUES (?, ?)');
        $insertPartie->bindParam(1, $this->_datePartie);
        $insertPartie->bindParam(2, $this->_nbAnSimu);

        $insertPartie->execute();

        $req = $connect->query('SELECT MAX (id_partie) FROM partie');
        $result = $req - fetch();
        $this->_idPartie = $result[0];
    }


    /**
     * Get stocke la date qui est générée dans le constructeur
     *
     * @return  string
     */
    public function get_datePartie()
    {
        return $this->_datePartie;
    }

    /**
     * Set stocke la date qui est générée dans le constructeur
     *
     * @param  string  $_datePartie  Stocke la date qui est générée dans le constructeur
     *
     * @return  self
     */
    public function set_datePartie(string $_datePartie)
    {
        $this->_datePartie = $_datePartie;

        return $this;
    }

    /**
     * Get id de la partie en cours
     *
     * @return  string
     */
    public function get_idPartie()
    {
        return $this->_idPartie;
    }

    /**
     * Set id de la partie en cours
     *
     * @param  string  $_idPartie  id de la partie en cours
     *
     * @return  self
     */
    public function set_idPartie(string $_idPartie)
    {
        $this->_idPartie = $_idPartie;

        return $this;
    }

    /**
     * Get le nombre d'année de simulation
     *
     * @return  string
     */
    public function get_nbAnSimu()
    {
        return $this->_nbAnSimu;
    }

    /**
     * Set le nombre d'année de simulation
     *
     * @param  string  $_nbAnSimu  Le nombre d'année de simulation
     *
     * @return  self
     */
    public function set_nbAnSimu(string $_nbAnSimu)
    {
        $this->_nbAnSimu = $_nbAnSimu;

        return $this;
    }
}