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


class ProdutoFactory {

    private $_ci;

    function __construct() {
        //When the class is constructed get an instance of codeigniter so we can access it locally
        $this->_ci = & get_instance();
        
        //Include the produto_model so we can use it
        $this->_ci->load->model("Produto_Model");
    }
    
    
    //se nao passar parâmetro, assume que é zero
    public function getProduto($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("produto", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("produto")->get();
            
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $produtos = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $produtos[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $produtos;
            }
            return false;
        }
    }

    
    
    public function getProduto_argamassa($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            //$this->db->like('tipo','argamassa', 'both');
            $query = $this->_ci->db->get_where("produto", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            
            $this->_ci->db->like('tipo','argamassa');
            $query = $this->_ci->db->get('produto'); 
            //$query = $this->_ci->db->select("*")->from("produto")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $produtos = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $produtos[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $produtos;
            }
            return false;
        }
    }
    
    
    
    
    public function getProduto_rejunte($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            //$this->db->like('tipo','argamassa', 'both');
            $query = $this->_ci->db->get_where("produto", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            
            $this->_ci->db->like('tipo','rejunte');
            $query = $this->_ci->db->get('produto'); 
            //$query = $this->_ci->db->select("*")->from("produto")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $produtos = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $produtos[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $produtos;
            }
            return false;
        }
    }
    
    
    
    
    public function getRow($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("produto", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("produto")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                $pisos = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $produtos[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $query->result();
            }
            return false;
        }
    }

    /*
    public function insertPiso($data) {
        //echo $data[id];
        //echo $data[nome];
        $piso = new Piso_Model();
        $piso->set_nome($data->nome);
        $piso->set_altura($data->altura);
        $piso->set_largura($data->largura);
        $piso->set_preco($data->preco);
        $piso->set_quantidade_embalagem($data->quantidade);
        $piso->set_resistencia($data->resistencia);
        $piso->commit();
    }
    */
    
    public function createObjectFromData($row) {
        //Cria um novo objeto piso com os dados da consulta
        $produto= new Produto_Model();
        $produto->set_id($row->id);
        $produto->set_nome($row->nome);
        $produto->set_descricao($row->descricao);
        $produto->set_preco($row->preco);
        $produto->set_peso($row->peso);
        $produto->set_tipo($row->tipo);
        return $produto;
    }
    
}

    //put your code here

