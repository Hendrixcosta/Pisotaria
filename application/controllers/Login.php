<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Hendrix
 */
class Login extends CI_Controller {
    //put your code here
    
    public function index() {
        $this->_ci = & get_instance();
        $this->load->view("template/header");
        $this->load->library("UsuarioFactory");
        $data = array(
            "users" => $this->usuariofactory->getUsuario(0)
        );
        
         if ($this->input->post()) { 
                if ((isset($_POST['nome'])) && (isset($_POST['senha']))) {
                    $nome = $_POST['nome'];
                    $senha =$_POST['senha'];
                }else {
                    $nome = "";
                    $senha = "";
                }    
                $this->_ci->db->where("nome", $nome);
                $this->_ci->db->where("CPF", $senha);
                $query = $this->db->get('usuario')->result();

                if (count($query) > 0) {
                   $_SESSION['LOGIN'] = $query[0]->nome;
                   header("Location:". base_url());

                }else {
                    $data ['mensagem'] = "Falha no Login tente novamente ou entre como visitante.";
                    $this->load->view('template/mensagem', $data);
                    $this->load->view('ver_falhalogin', $data);
                }
                   

            
                    
        } 
                
                
        //$this->load->view("template/header");
        
        $this->load->view("template/footer");
     
    }
        
     
    
}
