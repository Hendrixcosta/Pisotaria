<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UsuarioFactory {

    private $_ci;

    function __construct() {
        //When the class is constructed get an instance of codeigniter so we can access it locally
        $this->_ci = & get_instance();
        //Include the user_model so we can use it
        $this->_ci->load->model("usuario_model");
    }

    public function getUsuario($id = 0) {
        //Are we getting an individual user or are we getting them all
        if ($id > 0) {
            //Getting an individual user
            $query = $this->_ci->db->get_where("usuario", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the users
            $query = $this->_ci->db->select("*")->from("usuario")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store users
                $users = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new user object with the data provided and add it to the users array
                    $users[] = $this->createObjectFromData($row);
                }
                //Return the users array
                return $users;
            }
            return false;
        }
    }

    public function getUsuarioByUsername($username = '') {
        //Are we getting an individual user or are we getting them all
        $usuario = new Usuario_model();
        if ($username != ''){
            $query = $this->_ci->db->get_where("usuario", array("nome" => $username));
            if ($query->num_rows() > 0) {
                return $this->createObjectFromData($query->row());
            }
        }
        return $usuario;

    }
    
    
    public function createObjectFromData($row) {
        //Cria um objeto usuário e seta seus atributos
        $user = new Usuario_Model();
        $user->set_id($row->id);
        $user->set_cpf($row->CPF);
        $user->set_nome($row->nome);
        $user->set_email($row->email);
        return $user;
    }

}
