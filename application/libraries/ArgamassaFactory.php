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


class ArgamassaFactory {

    private $_ci;

    function __construct() {
        //When the class is constructed get an instance of codeigniter so we can access it locally
        $this->_ci = & get_instance();
        
        //Include the produto_model so we can use it
        $this->_ci->load->model("Argamassa_Model");
    }
    
    
    //se nao passar parâmetro, assume que é zero
    public function getArgamassa($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("argamassa", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("argamassa")->get();
            
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $argamassas = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $argamassas[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $argamassas;
            }
            return false;
        }
    }

    public function getRow($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("argamassa", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("argamassa")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                $argamassas = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $argamassas[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $query->result();
            }
            return false;
        }
    }
    
    public function createObjectFromData($row) {
        //Cria um novo objeto piso com os dados da consulta
        $argamassa= new Argamassa_Model();
        $argamassa->set_id($row->id);
        $argamassa->set_nome($row->nome);
        $argamassa->set_descricao($row->descricao);
        $argamassa->set_tipo($row->tipo);
        $argamassa->set_peso($row->peso);
        $argamassa->set_preco($row->preco);
        $argamassa->set_rendimento($row->rendimento);
        return $argamassa;
    }
     

}

    //put your code here

