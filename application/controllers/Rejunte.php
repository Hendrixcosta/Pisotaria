<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rejunte extends CI_Controller {

    public function index() {
        $this->load->model("Rejunte_Model");
        $this->load->library("RejunteFactory");
        $data = array(
            "rejuntes" => $this->rejuntefactory->getRejunte(0)
        );
        $this->load->view("template/header");
        $data['h1'] = "Rejunte";
        $this->load->view("template/h1", $data);
        $this->load->view("rejunte_menu", $data);
        $this->load->view("template/footer");
    }

    public function ver($rejunteID = 0) {
        $rejunteID = (int) $rejunteID;
        $this->load->library("RejunteFactory");
        $data = array(
            "rejuntes" => $this->rejuntefactory->getRejunte($rejunteID)
        );
        $this->load->library('table');
        $this->load->view("template/header");
        $data['h1'] = "Rejuntes";
        $this->load->view("template/h1", $data);
        $this->load->view("rejunte_ver", $data);
        $this->load->view("template/statusBar");
        $this->load->view("template/footer");
    }

    public function inserir($rejunteId = 0) {
        $this->load->view("template/header");
        $this->load->model("Rejunte_Model");
        
        $rejunte = new Rejunte_Model();
        $data = array("rejuntes" => $rejunte);
        
        //Salva dados de postagem do formulario
        if($this->input->post()){
            if($rejunteId > 0){
                $rejunte->set_id($rejunteId);
            }            
            $rejunte->set_nome($this->input->post('nome'));
            $rejunte->set_descricao($this->input->post('descricao'));
            $rejunte->set_tipo($this->input->post('tipo'));
            $rejunte->set_peso($this->input->post('peso'));
            $rejunte->set_preco($this->input->post('preco'));
            if($rejunte->commit()){
                if($rejunteId > 0){
                    $data['mensagem'] = "Atualização de rejunte feita com sucesso!";
                }else{
                    $data['mensagem'] = "Cadastro de rejunte feito com sucesso!";
                }
            }else{
                $data['mensagem'] = "Ocorreu algum erro na atualização da rejunte!";
            }
            $this->load->view('template/mensagem', $data);
        }
            
        if ($rejunteId > 0) {
                $this->load->library("RejunteFactory");
                $data = array("rejuntes" => $this->rejuntefactory->getRejunte($rejunteId));        
        }
        
        $this->load->view('rejunte_inserir', $data);
        $this->load->view("template/statusBar");
        $this->load->view("template/footer");
    }
}
