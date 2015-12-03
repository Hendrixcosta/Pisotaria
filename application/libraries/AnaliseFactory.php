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


class AnaliseFactory {

    private $_ci;

    function __construct() {
        //When the class is constructed get an instance of codeigniter so we can access it locally
        $this->_ci = & get_instance();
        
        //Include the produto_model so we can use it
        $this->_ci->load->model("Analise_Model");
    }
    
    
    //se nao passar parâmetro, assume que é zero
    public function getAnalise($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("analise", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("analise")->get();
            
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                
                $analises = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $analises[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $analises;
            }
            return false;
        }
    }
    
    
    public function getAnaliseporIdRelatorio($IdsRelatorios) {
        //Are we getting an individual piso or are we getting them all
        
        $analises = array ();
        foreach ($IdsRelatorios as $id ){
            //Getting an individual piso
            //$query = $this->_ci->db->get_where("analise", array("idRelatorio" => $id));
            $this->_ci->db->where("idRelatorio", $id);
            $query = $this->_ci->db->get('analise');
            //Check if any results were returned
           if ($query->num_rows() > 0) {
               
               foreach ($query->result() as $linha){
                    //Pass the data to our local function to create an object for us and return this new object
                    $objAnalise = $this->createObjectFromData($linha);
                    array_push($analises, $objAnalise);
                }
            }
        }   
        
        return $analises;
            
    }
            
    

    public function getRow($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("analise", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("analise")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                $analises = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $analises[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $query->result();
            }
            return false;
        }
    }
    
    public function createObjectFromData($row) {
        //Cria um novo objeto piso com os dados da consulta
        $analise= new Analise_Model();
        
        $analise->set_id($row->id);
        $analise->set_nomepiso($row->nomepiso);
        $analise->set_qtdpiso($row->qtdpiso);
        $analise->set_custopiso($row->custopiso);
        $analise->set_qtddesperdicio($row->qtddesperdicio);
        $analise->set_custorejunte($row->custorejunte);
        $analise->set_custototal($row->custototal);
        $analise->set_idrelatorio($row->idRelatorio);
        return $analise;
    }
     

}

    //put your code here

