<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PisoFactory {

    private $_ci;

    function __construct() {
        //When the class is constructed get an instance of codeigniter so we can access it locally
        $this->_ci = & get_instance();
        //Include the piso_model so we can use it
        $this->_ci->load->model("Piso_Model");
    }

    public function getPiso($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("piso", array("id" => $id));
            
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("piso")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                $pisos = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $pisos[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $pisos;
            }
            return false;
        }
    }

    public function getRow($id = 0) {
        //Are we getting an individual piso or are we getting them all
        if ($id > 0) {
            //Getting an individual piso
            $query = $this->_ci->db->get_where("piso", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the pisos
            $query = $this->_ci->db->select("*")->from("piso")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store pisos
                $pisos = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    //Pass the row data to our local function which creates a new piso object with the data provided and add it to the pisos array
                    $pisos[] = $this->createObjectFromData($row);
                }
                //Return the pisos array
                return $query->result();
            }
            return false;
        }
    }

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

    public function createObjectFromData($row) {
        //Cria um novo objeto piso com os dados da consulta
        $piso = new Piso_model();
        $piso->set_id($row->id);
        $piso->set_nome($row->nome);
        $piso->set_comprimento($row->comprimento);
        $piso->set_altura($row->altura);
        $piso->set_largura($row->largura);
        $piso->set_preco($row->preco);
        $piso->set_tipo($row->tipo);
        $piso->set_quantidade_embalagem($row->quantidade);
        $piso->set_resistencia($row->resistencia);
        $piso->set_urlImagem($row->url);
        return $piso;
    }
    
}
