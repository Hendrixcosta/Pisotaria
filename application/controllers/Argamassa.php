<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Argamassa
 *
 * @author Hendrix
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Argamassa extends CI_Controller {

    public function index() {
        $this->load->view("template/header");
        $this->load->library("ArgamassaFactory");
        $data = array(
            "argamassas" => $this->argamassafactory->getArgamassa(0)
        );
        $data['h1'] = "Argamassa";
        
        $this->load->view("template/h1", $data);
        $this->load->view("argamassa_menu", $data);
        $this->load->view("template/footer");
    }

    public function ver($argamassaID = 0) {
        $argamassaID = (int) $argamassaID;
        $this->load->library("ArgamassaFactory");
        // $argamassas = $this->argamassafactory->getArgamassa(1);
              
        $data = array(
            "argamassas" => $this->argamassafactory->getArgamassa($argamassaID)
        );
//        echo "<pre>";
//        print_r($argamassas);
//        echo "</pre>";
        $data['h1'] = "Argamassas: ";

        $this->load->library('table');
        
        $this->load->view("template/header");
        $this->load->view("template/h1", $data);
        //$this->load->view("argamassa_menu", $data);
        $this->load->view("argamassa_ver", $data);
        $this->load->view("template/statusBar");
        $this->load->view("template/footer");
    }

    public function inserir($argamassaId = 0) {
        $this->load->helper('url');
        $this->load->view("template/header");
        $this->load->model("Argamassa_Model");
        
        $argamassa = new Argamassa_Model();
        $data = array("argamassas" => $argamassa);
        
        //Salva dados de postagem do formulario
        if($this->input->post()){
            if($argamassaId > 0){
                $argamassa->set_id($argamassaId);
            }
            $argamassa->set_nome($this->input->post('nome'));
            $argamassa->set_descricao($this->input->post('descricao'));
            $argamassa->set_tipo($this->input->post('tipo'));
            $argamassa->set_peso($this->input->post('peso'));
            $argamassa->set_preco($this->input->post('preco'));
            $argamassa->set_preco($this->input->post('preco'));
            $argamassa->set_rendimento($this->input->post('rendimento'));
            if($argamassa->commit()){
                if($argamassaId > 0){
                    $data['mensagem'] = "Atualização de argamassa feita com sucesso!";
                }else{
                    $data['mensagem'] = "Cadastro de argamassa feito com sucesso!";
                }
            }else{
                $data['mensagem'] = "Ocorreu algum erro na atualização da argamassa!";
            }
            $this->load->view('template/mensagem', $data);
        }
            
        if ($argamassaId > 0) {
                $this->load->library("ArgamassaFactory");
                $data = array("argamassas" => $this->argamassafactory->getArgamassa($argamassaId));        
        }
        
        $this->load->view('argamassa_inserir', $data);
        $this->load->view("template/statusBar");
        $this->load->view("template/footer");
    }

}
