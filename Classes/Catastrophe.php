<?php 

namespace Classes;

use Classes\Database;

/**
 * Class Catastrophe
 * 
 */
class Catastrophe
{

    /**
     * Stocke l'id de la catastrophe
     *
     * @var int
     */
    private $_idCata;

    /**
     * Type de catastrophes
     * 
     * @var string
     */
    protected $_typeCata;

    public function __construct()
    {

    }



    /**
     * Get stocke l'id de la catastrophe
     *
     * @return  int
     */
    public function get_idCata()
    {
        return $this->_idCata;
    }

    /**
     * Set stocke l'id de la catastrophe
     *
     * @param  int  $_idCata  Stocke l'id de la catastrophe
     *
     * @return  self
     */
    public function set_idCata(int $_idCata)
    {
        $this->_idCata = $_idCata;

        return $this;
    }

    /**
     * Get type de catastrophes
     *
     * @return  string
     */
    public function get_typeCata()
    {
        return $this->_typeCata;
    }

    /**
     * Set type de catastrophes
     *
     * @param  string  $_typeCata  Type de catastrophes
     *
     * @return  self
     */
    public function set_typeCata(string $_typeCata)
    {
        $this->_typeCata = $_typeCata;

        return $this;
    }

}