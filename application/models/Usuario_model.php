<?php

class Usuario_model extends CI_Model
{
    
    private $_id;
    private $_nome;
    private $_cpf;
    private $_email;

    function __construct()
    {
            parent::__construct();
    }

    /*
    * SET's & GET's
    */

   function get_id() {
       return $this->_id;
   }

   function get_nome() {
       return $this->_nome;
   }

   function get_cpf() {
       return $this->_cpf;
   }

   function get_email() {
       return $this->_email;
   }

   function set_id($_id) {
       $this->_id = $_id;
   }

   function set_nome($_nome) {
       $this->_nome = $_nome;
   }

   function set_cpf($_cpf) {
       $this->_cpf = $_cpf;
   }

   function set_email($_email) {
       $this->_email = $_email;
   }

    /*
    * Class Methods
    */

    /**
    *	Metodo Commit, envia o objeto para o banco de dados
    */
    public function commit()
    {
            $data = array(
                    'id' => $this->_id,
                    'nome' => $this->_nome,
                    'cpf' => $this->_cpf,
                    'email' => $this->_email
            );

            if ($this->_id > 0) {
                    //Se ID > 0 vamos atualizar o cadastro já existente
                    if ($this->db->update("usuario", $data, array("id" => $this->_id))) {
                            return true;
                    }
            } else {
                    //A inexistencia de ID significa que temos um novo objeto a ser inserido
                    if ($this->db->insert("usuario", $data)) {
                            $this->_id = $this->db->insert_id();
                            return true;
                    }
            }
            return false;
    }
}