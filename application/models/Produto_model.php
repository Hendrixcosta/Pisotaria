<?php


class Produto_model extends CI_Model {
    //put your code here
    
    private $_id;
    private $_nome;
    private $_descricao;
    private $_peso;
    private $_preco;
    private $_tipo;
    
      //
    //Construtor
    //
    function __construct() {
        parent::__construct();
    }
    
    function get_id () {
        return $this->_id;
    }
    
    function set_id ($_id) {
        $this->_id = $_id;
    }
    
    function get_nome () {
        return $this->_nome;
    }
    
    function set_nome ($_nome){
        $this->_nome=$_nome;
    }
    
    function get_descricao (){
        return $this->_descricao;
    } 
    
    function set_descricao($_descricao){
        $this->_descricao=$_descricao;
    }
    
    function get_peso (){
        return $this->_peso;
    }
    
    function set_peso($_peso){
        $this->_peso=$_peso;
    }
    
    function get_preco(){
        return $this->_preco;
    }
    
    function set_preco($_preco){
        $this->_preco=$_preco;
    }
    
    function get_tipo (){
        return $this->_tipo;
    }
    
    function set_tipo($_tipo){
        $this->_tipo=$_tipo;
    }
    
    
    public function commit()
    {
            $data = array(
                    'id' => $this->_id,
                    'nome' => $this->_nome,
                    'descricao' => $this->_descricao,
                    'peso' => $this->_peso,
                    'preco' => $this->_preco,
                    'tipo' => $this->_tipo,
            );

            if ($this->_id > 0) {
                    //Se ID > 0 vamos atualizar o cadastro já existente
                    if ($this->db->update("produto", $data, array("id" => $this->_id))) {
                            return true;
                    }
            } else {
                    //A inexistencia de ID significa que temos um novo objeto a ser inserido
                    if ($this->db->insert("produto", $data)) {
                            $this->_id = $this->db->insert_id();
                            return true;
                    }
            }
            return false;
    }
}
