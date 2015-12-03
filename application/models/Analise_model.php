<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Analise
 *
 * @author Hendrix
 * 
 * 
 * 
 * 
 * 
 */

class Analise_model extends CI_Model{
    //put your code here
    
    private $_id;
    private $_nomepiso;
    private $_qtdpiso;
    private $_custopiso;
    private $_qtddesperdicio;
    private $_custorejunte;
    private $_custototal;
    private $_idrelatorio;    
    
     function __construct() {
        parent::__construct();
    }
    function get_id() {
        return $this->_id;
    }

    function get_nomepiso() {
        return $this->_nomepiso;
    }

    function get_qtdpiso() {
        return $this->_qtdpiso;
    }

    function get_custopiso() {
        return $this->_custopiso;
    }

    function get_qtddesperdicio() {
        return $this->_qtddesperdicio;
    }

    function get_custorejunte() {
        return $this->_custorejunte;
    }

    function get_custototal() {
        return $this->_custototal;
    }

    function get_idrelatorio() {
        return $this->_idrelatorio;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_nomepiso($_nomepiso) {
        $this->_nomepiso = $_nomepiso;
    }

    function set_qtdpiso($_qtdpiso) {
        $this->_qtdpiso = $_qtdpiso;
    }

    function set_custopiso($_custopiso) {
        $this->_custopiso = $_custopiso;
    }

    function set_qtddesperdicio($_qtddesperdicio) {
        $this->_qtddesperdicio = $_qtddesperdicio;
    }

    function set_custorejunte($_custorejunte) {
        $this->_custorejunte = $_custorejunte;
    }

    function set_custototal($_custototal) {
        $this->_custototal = $_custototal;
    }

    function set_idrelatorio($_idrelatorio) {
        $this->_idrelatorio = $_idrelatorio;
    }

    public function toArray() {
        return array(
             'id' => $this->_id,
             'nomePiso' => $this->_nomepiso,
             'qtdPiso' => $this->_qtdpiso,
             'custoPiso' => $this->_custopiso,
             'qtdDesperdicio' => $this->_qtddesperdicio,
             'custoRejunte' => $this->_custorejunte,
             'custoTotal' => $this->_custototal,
             'idRelatorio' => $this->_idrelatorio);
    }

    public function commit() {
        $data = array(
            
             'id' => $this->_id,
             'nomepiso' => $this->_nomepiso,
             'qtdpiso' => $this->_qtdpiso,
             'custopiso' => $this->_custopiso,
             'qtddesperdicio' => $this->_qtddesperdicio,
             'custorejunte' => $this->_custorejunte,
             'custototal' => $this->_custototal,
             'idrelatorio' => $this->_idrelatorio);
        
        //Se tiver algum ID, será atualizado o objeto, caso contrario sera inserido um novo
        if ($this->_id > 0) {
            if ($this->db->update("analise", $data, array("id" => $this->_id))) {
                return true;
            }
        } else {
            //Caso consiga inserir o objeto no BD
            if ($this->db->insert("analise", $data)) {
                //Será atualizado o ID do objeto com o valor do BD
                $this->_id = $this->db->insert_id();
                return true;
            }
        }
        return false;
    }
    
    
    
    
}
