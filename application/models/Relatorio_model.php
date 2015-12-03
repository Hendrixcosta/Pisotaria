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

class Relatorio_model extends CI_Model{
    //put your code here
    
    private $_id;
    private $_nome;
    private $_descricao;
    private $_custototalargamassa;
    private $_customaodeobra;
    private $_custototalprodutos;
    private $_idusuario;
    
    
    function __construct() {
        parent::__construct();
    }
    

    function get_idusuario() {
        return $this->_idusuario;
    }

    function set_idusuario($_idusuario) {
        $this->_idusuario = $_idusuario;
    }

        function get_id() {
        return $this->_id;
    }

    function get_custototalargamassa() {
        return $this->_custototalargamassa;
    }

    function get_customaodeobra() {
        return $this->_customaodeobra;
    }

    function get_custototalprodutos() {
        return $this->_custototalprodutos;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_custototalargamassa($_custototalargamassa) {
        $this->_custototalargamassa = $_custototalargamassa;
    }

    function set_customaodeobra($_customaodeobra) {
        $this->_customaodeobra = $_customaodeobra;
    }

    function set_custototalprodutos($_custototalprodutos) {
        $this->_custototalprodutos = $_custototalprodutos;
    }

    function get_nome() {
        return $this->_nome;
    }

    function get_descricao() {
        return $this->_descricao;
    }

    function set_nome($_nome) {
        $this->_nome = $_nome;
    }

    function set_descricao($_descricao) {
        $this->_descricao = $_descricao;
    }

    
    public function commit() {
        $data = array(
            
             'id' => $this->_id,
             'nome' => $this->_nome,
             'descricao' => $this->_descricao,
             'custototalargamassa' => $this->_custototalargamassa,
             'customaodeobra' => $this->_customaodeobra,
             'custototalprodutos' => $this->_custototalprodutos,
             'idusuario' => $this->_idusuario);
        
        //Se tiver algum ID, será atualizado o objeto, caso contrario sera inserido um novo
        if ($this->_id > 0) {
            if ($this->db->update("relatorio", $data, array("id" => $this->_id))) {
                return true;
            }
        } else {
            //Caso consiga inserir o objeto no BD
            if ($this->db->insert("relatorio", $data)) {
                //Será atualizado o ID do objeto com o valor do BD
                $this->_id = $this->db->insert_id();
                return true;
            }
        }
        return false;
    }
    
    
    
}
