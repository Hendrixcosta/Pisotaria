<?php


class Argamassa_model extends CI_Model{
    //put your code here
    
    private $_id;
    private $_nome;
    private $_descricao;
    private $_tipo;
    private $_peso;
    private $_preco;
    private $_rendimento;
    // adicionar atributos e rendimento
    
    
     function __construct() {
        parent::__construct();
    }
    
    function get_id() {
        return $this->_id;
    }

    function get_nome() {
        return $this->_nome;
    }

    function get_descricao() {
        return $this->_descricao;
    }

    function get_tipo() {
        return $this->_tipo;
    }

    function set_id($_id) {
        $this->_id = $_id;
    }

    function set_nome($_nome) {
        $this->_nome = $_nome;
    }

    function set_descricao($_descricao) {
        $this->_descricao = $_descricao;
    }

    function set_tipo($_tipo) {
        $this->_tipo = $_tipo;
    }

    function get_peso() {
        return $this->_peso;
    }

    function set_peso($_peso) {
        $this->_peso = $_peso;
    }

    function get_preco() {
        return $this->_preco;
    }

    function set_preco($_preco) {
        $this->_preco = $_preco;
    }
    function get_rendimento() {
        return $this->_rendimento;
    }

    function set_rendimento($_rendimento) {
        $this->_rendimento = $_rendimento;
    }

    

    public function commit() {
        $data = array(
            'id' => $this->_id,
            'nome' => $this->_nome,
            'descricao' => $this->_descricao,
            'tipo' => $this->_tipo,
            'peso' => $this->_peso,
            'preco' => $this->_preco,
            'rendimento' => $this->_rendimento
        );
        //Se tiver algum ID, será atualizado o objeto, caso contrario sera inserido um novo
        if ($this->_id > 0) {
            if ($this->db->update("argamassa", $data, array("id" => $this->_id))) {
                return true;
            }
        } else {
            //Caso consiga inserir o objeto no BD
            if ($this->db->insert("argamassa", $data)) {
                //Será atualizado o ID do objeto com o valor do BD
                $this->_id = $this->db->insert_id();
                return true;
            }
        }
        return false;
    }

}
