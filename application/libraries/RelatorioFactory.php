    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProdutoFactory
 *
 * @author Hendrix
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class RelatorioFactory {

    private $_ci;
    
    function __construct() {
        //When the class is constructed get an instance of codeigniter so we can access it locally
        $this->_ci = & get_instance();
        //Include the produto_model so we can use it
        $this->_ci->load->model("Relatorio_Model");
        $this->_ci->load->model("usuario_model");
        $this->_ci->load->library("UsuarioFactory");
    }
    
    
    //se nao passar parâmetro, assume que é zero
    public function getRelatorio($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("relatorio", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("relatorio")->get();
            
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $relatorios = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $relatorios[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $relatorios;
            }
            return false;
        }
    }
    
    
    public function getRelatorioLogado($id = 0) {
        
        if (isset($_SESSION['LOGIN'])) {
            $usuario = new Usuario_model();
            $usuario = $this->_ci->usuariofactory->getUsuarioByUsername($_SESSION['LOGIN']);
            $usuarioID= $usuario->get_id();
            
        }else {
            
            return false;
        }
        
        
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            
            $this->_ci->db->where("id", $id);
            $this->_ci->db->where("idusuario", $usuarioID);
            $query = $this->_ci->db->get('relatorio');
                

            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            
            //Getting all the pisos
            
            $this->_ci->db->where("idusuario", $usuarioID);
            $query = $this->_ci->db->get('relatorio');
            
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $relatorios = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $relatorios[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $relatorios;
            }
            return false;
        }
    }
    
    
    
    public function getRelatorioUsuario($idUsuario = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($idUsuario > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("relatorio", array("idusuario" => $idUsuario));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //não especificou usuario, retorna falso
            return false;
        }
    }

    public function getRow($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("relatorio", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("relatorio")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                $relatorios = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $relatorios[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $relatorios;
            }
            return false;
        }
    }
    
     public function getMaxId($id = 0) {

         $query = $this->_ci->db->query("SELECT max(id) as max FROM `relatorio`;");   
         
//         echo '<pre>';
//         print_r($query->result());
//         echo '</pre>';
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                $MaxId = $query->result() ;
                return $MaxId[0]->max;
            }
            return false;
        
    }
    
    public function createObjectFromData($row) {
        //Cria um novo objeto piso com os dados da consulta
        $relatorio= new Relatorio_Model();
        $relatorio->set_id($row->id);
        $relatorio->set_nome($row->nome);
        $relatorio->set_descricao($row->descricao);
        $relatorio->set_custototalargamassa($row->custototalargamassa);
        $relatorio->set_customaodeobra($row->customaodeobra);
        $relatorio->set_custototalprodutos($row->custototalprodutos);
        $relatorio->set_idusuario($row->id);
        return $relatorio;
    }
     

}

    //put your code here

