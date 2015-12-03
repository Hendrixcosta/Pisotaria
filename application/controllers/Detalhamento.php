<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detalhamento extends CI_Controller {

    public function index() {
        $this->load->view("template/header");

        if($this->input->post()){
            //salvar dados do form
            //
            // coleta de cada variavel feita da seguinte forma:
            // $this->input->post('margem-seguranca')
            // como mostra em cada "echo" abaixo
            
            $_SESSION['MARGEMSEGURANCA'] = $this->input->post('margem-seguranca'); //retorno 10 ou 25
            $_SESSION['ESPACAMENTO'] = $this->input->post('espacamento'); //retorno = valor em apenas numeros (em mm)
            $_SESSION['RODAPE'] = $this->input->post('rodape'); //TRUE ou FALSE
            $_SESSION['MAODEOBRA'] = $this->input->post('maoDeObra'); //valor em numero colocado
            
            
            // Se quiser mudar o retorno de cada variavel, 
            // alterar view/ver_detalhamento os valores dentro de "value" de cada campo
            //
        }
        $this->load->library('table');  //biblioteca carregada para apresentar os produtos na página
        $this->load->library('ProdutoFactory');
        
        $data = array ("produtos" => $this->produtofactory->getProduto(0));
        
        $this->load->view("ver_detalhamento", $data);
        $this->load->view("template/statusBar");
        $this->load->view("template/footer");
    }

}
