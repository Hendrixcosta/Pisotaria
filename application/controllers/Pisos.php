<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pisos extends CI_Controller {
    //traz os métodos de controller do codeignitter
    // (rotas)

    public function index() {
        
        
        $this->load->view("template/header");
        $this->load->view("pisos");
        $this->load->view("template/footer");    }

    public function ver($pisoId = 0) {
        $this->load->view("template/header");
        
        $this->load->helper('url');
        //Always ensure an integer
        $pisoId = (int) $pisoId;
        //Load the user factory
        $this->load->library("PisoFactory");
        
        //Create a data array so we can pass information to the view
        $data = array(
                "pisos" => $this->pisofactory->getPiso($pisoId)
        );
        

//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//         
        
        //Load the view and pass the data to it
        $data['url'] = base_url();
        
        if (isset($_SESSION['PISO_CUSTOMIZADO'])&&($pisoId == 0)){
        $this->load->model("Piso_Model");
        $piso = new Piso_Model();
            $piso->set_id($_SESSION['PISO_CUSTOMIZADO']['id']);
            $piso->set_nome($_SESSION['PISO_CUSTOMIZADO']['nome']);
            $piso->set_altura($_SESSION['PISO_CUSTOMIZADO']['altura']);
            $piso->set_comprimento($_SESSION['PISO_CUSTOMIZADO']['comprimento']);
            $piso->set_largura($_SESSION['PISO_CUSTOMIZADO']['largura']);
            $piso->set_preco($_SESSION['PISO_CUSTOMIZADO']['preco']);
            $piso->set_quantidade_embalagem($_SESSION['PISO_CUSTOMIZADO']['quantidade']);
            $piso->set_resistencia($_SESSION['PISO_CUSTOMIZADO']['resistencia']);
            $piso->set_urlImagem($_SESSION['PISO_CUSTOMIZADO']['url']);
            array_unshift($data['pisos'], $piso);
        }
        
        $this->load->view("ver_pisos", $data);
        $this->load->view("template/statusBar", $data);
        $this->load->view("template/footer", $data);
    }

    public function inserir($pisoId = 0) {
        $this->load->helper('url');
        $data['url'] = base_url();
        
        $this->load->view("template/header", $data);
        $this->load->model("Piso_Model");
        $piso = new Piso_Model;
        
        //cria variavel de dados do tipo array, e coloca na chave "pisos" uma classe de piso -> só a estrutura 
        $data = array("pisos" => $piso);
        
        if ($pisoId > 0) {

                if ($this->input->post('nome') == NULL) 
                { //?? porque testa o POST['nome'] aqui?
                } 
                
                else
                {
                        $piso->set_id($pisoId);
                        $piso->set_nome($this->input->post('nome'));
                        $piso->set_altura($this->input->post('altura'));
                        $piso->set_comprimento($this->input->post('comprimento'));
                        $piso->set_largura($this->input->post('largura'));
                        $piso->set_preco($this->input->post('preco'));
                        $piso->set_quantidade_embalagem($this->input->post('quantidade'));
                        $piso->set_resistencia($this->input->post('resistencia'));
                        $piso->set_tipo($this->input->post('tipo'));
                        $piso->set_urlImagem($this->input->post('url'));
                        if($piso->commit()){
                            $data['mensagem'] = "Atualização de piso feita com sucesso!";
                        }else{
                            $data['mensagem'] = "Ocorreu algum erro na atualização do piso!";
                        }
                        $this->load->view('template/mensagem', $data);
                }
                $this->load->library("PisoFactory");
                $data = array("pisos" => $this->pisofactory->getPiso($pisoId));        
                
        } 
        else {
            if ($this->input->post('nome') == NULL) 
            {//$this->load->view('inserir_pisos', $data);
            } 
            else {
                $piso->set_nome($this->input->post('nome'));
                $piso->set_altura($this->input->post('altura'));
                $piso->set_comprimento($this->input->post('comprimento'));
                $piso->set_largura($this->input->post('largura'));
                $piso->set_preco($this->input->post('preco'));
                $piso->set_quantidade_embalagem($this->input->post('quantidade'));
                $piso->set_resistencia($this->input->post('resistencia'));
                $piso->set_tipo($this->input->post('tipo'));
                $piso->set_urlImagem($this->input->post('url'));
                if($piso->commit()){
                    $data['mensagem'] = "Inserção de piso feita com sucesso!";
                }else{
                    $data['mensagem'] = "Ocorreu algum erro ao inserir o piso!";
                }
                $this->load->view('template/mensagem', $data);
            }
        }
        $this->load->view('inserir_pisos', $data);
        $this->load->view("template/footer");
    }
    
    public function customizado() {
        
        $this->load->view("template/header");
        
        $this->load->model("Piso_Model");
        $piso = new Piso_Model;
        
        
        //cria variavel de dados do tipo array, e coloca na chave "pisos" uma classe de piso -> só a estrutura 
        $data = array("pisos" => $piso);
       
        if($this->input->post()){
            //salva o piso na sessão
            $piso_post['id']= 100;
            $piso_post['nome']=($this->input->post('nome'));
            $piso_post['altura']=($this->input->post('altura'));
            $piso_post['comprimento']=($this->input->post('comprimento'));
            $piso_post['largura']=($this->input->post('largura'));
            $piso_post['preco']=($this->input->post('preco'));
            $piso_post['quantidade']=($this->input->post('quantidade'));
            $piso_post['resistencia']=($this->input->post('resistencia'));
            $piso_post['tipo']=($this->input->post('tipo'));
            $piso_post['url']=($this->input->post('url'));

            $_SESSION['PISO_CUSTOMIZADO'] = $piso_post;
            $data['mensagem'] = "Piso customizado foi salvo com sucesso!";
            $this->load->view('template/mensagem', $data);
        }
        
        //adaptando de array para piso model
        if (isset($_SESSION['PISO_CUSTOMIZADO'])){
        $piso = new Piso_Model();
            $piso->set_id($_SESSION['PISO_CUSTOMIZADO']['id']);
            $piso->set_nome($_SESSION['PISO_CUSTOMIZADO']['nome']);
            $piso->set_altura($_SESSION['PISO_CUSTOMIZADO']['altura']);
            $piso->set_comprimento($_SESSION['PISO_CUSTOMIZADO']['comprimento']);
            $piso->set_largura($_SESSION['PISO_CUSTOMIZADO']['largura']);
            $piso->set_preco($_SESSION['PISO_CUSTOMIZADO']['preco']);
            $piso->set_quantidade_embalagem($_SESSION['PISO_CUSTOMIZADO']['quantidade']);
            $piso->set_resistencia($_SESSION['PISO_CUSTOMIZADO']['resistencia']);
            $piso->set_urlImagem($_SESSION['PISO_CUSTOMIZADO']['url']);
            $data['pisos'] = $piso;
        }

        $this->load->view('inserir_pisos', $data);
        $this->load->view("template/footer");
    }
}
