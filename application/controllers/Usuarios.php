<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function index() {
        $this->load->view("template/header");
        $this->load->helper('form');
        $this->load->library("UsuarioFactory");
        
        if($this->input->post()){
            $usuario = new Usuario_model();
            
            $usuario->set_id($this->input->post('id'));
            $usuario->set_cpf($this->input->post('senha'));
            $usuario->set_nome($this->input->post('username'));
            $usuario->set_email($this->input->post('email'));
            
            if(isset($_SESSION['LOGIN'])){
                $acao = 'atualizado';
            } else {
                $acao = 'cadastrado';
            }
            
            if($usuario->commit()){
                $data['mensagem'] = 'Usuario ' . $acao . ' com sucesso!';
            } else {
                $data['mensagem'] = 'Usuario não foi' . $acao . ' com sucesso!';
            }
            
            $_SESSION['LOGIN'] = $this->input->post('username');
        }
        
        if(isset($_SESSION['LOGIN'])){ //caso usuario logado
            //mostra a view pra ele ver seus dados
            
            //carregar dados do usuario e enviar para view
            $data['h1'] = "Seu Perfil";
            
            //carregar usuario logado
            $data['users'] = $this->usuariofactory->getUsuarioByUsername($_SESSION['LOGIN']);
            
            //enviar usuario logado para view
            $this->load->view("usuario_perfil", $data);
        }else{
            //mostra tela de login
            $this->load->view("usuario_login");
        }
        $this->load->view("template/footer");
    }

    /**
     * 
     * @param type $usuarioId
     * 
     * Melhorias:
     *      consertar erro que da quando tenta acessar um ID inexistente
     */
    public function cadastrar($usuarioId = 0) {
        $this->load->view("template/header");
        $this->load->helper('form');

        $this->load->model("Usuario_model");
        $this->load->library("UsuarioFactory");

        $usr = new Usuario_Model();
        $data = array(
            "users" => $usr,
            'h1'    => 'Cadastrar Usuario');
        

        //verifica se existem passagem de parametro POST e faz a inserção no BD
        if ($this->input->post()) {
            
//            $usr = $this->usuariofactory->postToObject($this->input->post());
            
            $usr->set_id($this->input->post('id'));
            $usr->set_cpf($this->input->post('cpf'));
            $usr->set_nome($this->input->post('nome'));
            $usr->set_email($this->input->post('email'));
            
            if ($usr->commit()) {
                $data = array("mensagem" => "Usuário inserido com sucesso!");
            } else {
                $data = array("mensagem" => "Falha ao inserir o usuário!");
            }
            $this->load->view("template/mensagem", $data);
        } else {
            //verifica se 
            if ($usuarioId !== 0) {
                $data = array(
                    "users" => $this->usuariofactory->getUsuario($usuarioId)
                );
                //    $this->load->view('simples/inserir_usuario', $data);
            }
            $this->load->view("usuario_perfil", $data);
        }

        $this->load->view("template/footer");
    }
    
    public function logout(){
        $this->load->view("template/header");
        unset($_SESSION['LOGIN']);
        
        if (!isset($_GET['reload'])) {
            echo "<meta HTTP-EQUIV='refresh' CONTENT=0;url=?reload=1'>";
        }
        
        $this->load->view("template/mensagem", array("mensagem" => 'Usuário foi deslogado.'));
        
        $this->load->view("template/footer");
        
    }
    public function login(){

        
    }
}
