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

    public function __construct()
    {
        $this->_popInitiale = mt_rand(2, 5000);
        $this->_txNat = mt_rand(0, 1);
        $this->_txMort = mt_rand(0, 1);
    }

    // public function evolpopulation() {

    //     switch (nbrAnneeSimu){
    //         case 'Eau' :
    //         $population = _popIniale 
    //     }

    // }



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
}