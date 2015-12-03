<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author Hendrix
 */

class Area extends CI_Controller {
    //traz os métodos de controller do codeignitter
    // (rotas)

    public function index() { 
        
        $this->load->view('template/header');
        //$this->load->helper("url");
        //$data = array( "area"=>12 ,"url" => base_url());
        //$this->load->view('show_area',$data);
        $this->load->view('ver_area');
        $this->load->view('template/statusBar');
        $this->load->view('template/footer');
    }
    
    

}