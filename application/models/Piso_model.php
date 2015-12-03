<?php


class Piso_model extends CI_Model {

    private $_id;
    private $_nome;
    private $_altura;
    private $_largura;
    private $_comprimento;
    private $_resistencia;
    private $_preco;
    private $_quantidade_embalagem;
    private $_tipo;
    private $_urlImagem;
    
    
    //
    //Construtor
    //
    function __construct() {
        parent::__construct();
    }
    
    /**
     * GETers e SETers
     * 
     */
    function get_comprimento() {
        return $this->_comprimento;
    }

    function set_comprimento($_comprimento) {
        $this->_comprimento = $_comprimento;
    }

    public function get_id() {
        return $this->_id;
    }

    public function set_id($value) {
        $this->_id = $value;
    }

    function get_nome() {
        return $this->_nome;
    }

    function get_altura() {
        return $this->_altura;
    }

    function get_largura() {
        return $this->_largura;
    }

    function get_resistencia() {
        return $this->_resistencia;
    }

    function get_preco() {
        return $this->_preco;
    }

    function get_quantidade_embalagem() {
        return $this->_quantidade_embalagem;
    }

    function set_nome($_nome) {
        $this->_nome = $_nome;
    }

    function set_altura($_altura) {
        $this->_altura = $_altura;
    }

    function set_largura($_largura) {
        $this->_largura = $_largura;
    }

    function set_resistencia($_resistencia) {
        $this->_resistencia = $_resistencia;
    }

    function set_preco($_preco) {
        $this->_preco = $_preco;
    }

    function set_quantidade_embalagem($_quantidade_embalagem) {
        $this->_quantidade_embalagem = $_quantidade_embalagem;
    }
    function get_tipo() {
        return $this->_tipo;
    }

    function set_tipo($_tipo) {
        $this->_tipo = $_tipo;
    }
    
    function get_urlImagem() {
        return $this->_urlImagem;
    }

    function set_urlImagem($_urlImagem) {
        $this->_urlImagem = $_urlImagem;
    }

    
        /*
     * Class Methods
     */

    /**
     * 	Método Commit, this will comment the entire object to the database
     */
    public function commit() {
        $data = array(
            'id' => $this->_id,
            'largura' => $this->_largura,
            'comprimento' => $this->_comprimento,
            'preco' => $this->_preco,
            'altura' => $this->_altura,
            'nome' => $this->_nome,
            'resistencia' => $this->_resistencia,
            'quantidade' => $this->_quantidade_embalagem,
            'tipo' => $this->_tipo,
            'url' => $this->_urlImagem
        );
        //Se tiver algum ID, será atualizado o objeto, caso contrario sera inserido um novo
        if ($this->_id > 0) {
            if ($this->db->update("piso", $data, array("id" => $this->_id))) {
                return true;
            }
        } else {
            //Caso consiga inserir o objeto no BD
            if ($this->db->insert("piso", $data)) {
                //Será atualizado o ID do objeto com o valor do BD
                $this->_id = $this->db->insert_id();
                return true;
            }
        }
        return false;
    }
}