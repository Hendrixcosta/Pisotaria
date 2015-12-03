<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Produtos extends CI_Controller {
    
    
    //função index é a função carregada pela URL ao acessar a classe controladora
    public function index ($id=0) {
        
            
        
        
        $this->load->library("ProdutoFactory");
        //cria um array e no índice, chave relativo a produtos coloca o retorno da consulta bd
        $data = array("produtos" => $this->produtofactory->getProduto(0));
        $this->load->view("simples/template/header");
        $this->load->view("show_produtos", $data);
        
        $this->load->view("simples/template/footer");
        
        //echo '<pre>'; 
        //$data = $this->produtofactory->getProduto(0);
        //print_r($data);   
        // echo '</pre>'; 
    }
    
    public function ver ($id = 0){
        $ID = (int)$id;
        $this->load->library("ProdutoFactory");
        $data = array("produtos" => $this->produtofactory->getProduto($ID));
        $this->load->view("template/header");
        $this->load->view("show_produtos", $data);
        $this->load->view("template/footer");
        
    }
    
    public function argamassa ($id = 0){
        $ID = (int)$id;
        $this->load->library("ProdutoFactory");
        
        $data = array("produtos" => $this->produtofactory->getProduto_argamassa($ID));

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        
        $this->load->view("simples/template/header");
        $this->load->view("show_produtos", $data);
        $this->load->view("simples/template/footer");
        
    }
    
    public function rejunte ($id = 0){
        $ID = (int)$id;
        $this->load->library("ProdutoFactory");
        
        $data = array("produtos" => $this->produtofactory->getProduto_rejunte($ID));

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        
        $this->load->view("simples/template/header");
        $this->load->view("show_produtos", $data);
        $this->load->view("simples/template/footer");
        
    }
    
    
    public function inserir ($produtoId = 0){
        $this->load->view("simples/template/header");

        $this->load->library("ProdutoFactory");
        $this->load->model("Produto_model");

        $produtos = new Produto_Model();

        $data = array("produtos" => $produtos);

        //verifica se existem passagem de parametro POST e faz a inserção no BD
        if ($this->input->post()) {
            $produtos->set_id($this->input->post('id'));
            $produtos->set_nome($this->input->post('nome'));
            $produtos->set_descricao($this->input->post('descricao'));
            $produtos->set_peso($this->input->post('peso'));
            $produtos->set_preco($this->input->post('preco'));
            $produtos->set_tipo($this->input->post('tipo'));
            
            if ($produtos->commit()) {
                $data = array("mensagem" => "Produto inserido com sucesso!");
            } else {
                $data = array("mensagem" => "Falha ao inserir o produto!");
            }
            $this->load->view("simples/template/mensagem", $data);
        } else {
            //verifica se 
            if ($produtoId !== 0) {
                $data = array(
                    "produtos" => $this->produtofactory->getProduto($produtoId)
                );
                //    $this->load->view('simples/inserir_usuario', $data);
            }
            $this->load->view('simples/inserir_produto', $data);
        }
        $this->load->view("simples/template/footer");
    }
}
