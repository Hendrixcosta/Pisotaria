<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * API
 * 
 * Utiliza biblioteca disponivel em:
 * https://github.com/chriskacerguis/codeigniter-restserver
 * 
 * 
 */
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

    /**
     * Função 
     * Retornando apenas o JSON com as linhas do banco de dados
     * 
     * Melhoramentos:
     *      Implementar para cada CRUDE necessario
     * 
     * Dados Retornaveis:
     *      usuarios
     *      pisos
     *      produtos
     * 
     * Metodos utilizados:
     *      GET     -   ver
     *      POST    -   inserir / atualizar
     *      DELETE  -   deletar
     *  
     * Possiveis retornos: (iremos escolher JSON)
     * a  xml - almost any programming language can read XML
     *   json - useful for JavaScript and increasingly PHP apps.
     *   csv - open with spreadsheet programs
     *   html - a simple HTML table
     *   php - Representation of PHP code that can be eval()'ed
     *   serialize - Serialized data that can be unserialized in PHP
     * 
     */
    function __construct() {
        parent::__construct();

        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; //500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; //100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; //50 requests per hour per user/key
    }

    public function index() {
        
    }

    /*
     * Pisos
     * 
     * Consulta, insere, atualiza e deleta pisos. Cada um feito utilizando
     * seu método adequado.
     */

    /**
     * Pisos GET
     * 
     * Uma requisição GET em pisos retorna todos os pisos do BD
     * 
     * @param int $pisoId
     * @return JSON
     */

    public function pisos_get($pisoId = 0) {
        if ($pisoId > 0) {
            $this->db->where('id', $pisoId);
        }
        if($this->get('limite')){
            $this->db->limit($this->get('limite'));
        }
        if($this->get('resistencia')){
            $this->db->where('resistencia', $this->get('resistencia'));
        }
        if($this->get('precoMax')){
            $this->db->where('preco <', $this->get('precoMax'));
        }
        $this->response($this->db->get('piso')->result());
    }
    

    /**
     * Pisos POST
     * 
     * Parametro POST deve contar os atributos do metodo Piso, sendo:
     * nome, comprimento, largura, altura, preco, resistencia, quantidade
     * Realiza a insercao de um novo elemento na url /api/pisos ou
     * atualiza um elemento quando ID é especificado /api/pisos/3
     * 
     * Para fins de averiguacao, retorna os dados enviados na requisicao POST
     * 
     * @param type $pisoId
     * @return JSON Description
     */
    public function pisos_post($pisoId = 0) {
        //$this->get_instance('Piso_Model');
        $this->load->model("Piso_Model");
        $piso = new Piso_Model();

        //transformando valores 
        $piso->set_id($pisoId);
        $piso->set_nome($this->post('nome'));
        $piso->set_comprimento($this->post('comprimento'));
        $piso->set_largura($this->post('largura'));
        $piso->set_altura($this->post('altura'));
        $piso->set_preco($this->post('preco'));
        $piso->set_resistencia($this->post('resistencia'));
        $piso->set_quantidade_embalagem($this->post('quantidade'));
        $piso->set_tipo($this->post('tipo')); 
        $piso->set_urlImagem($this->post('url')); 
        //inserindo ou atualizado o objeto
        if ($piso->commit()) {
            $this->response($this->post(), 200);
            //ATUALIZAR RESPOSTA PARA NÃO CONTER O PARAMETRO POST
        } else {
            $this->response();
        }
    }

    /**
     * Pisos DELETE
     * 
     * Uma simples requisicao na URL /api/pisos/2 remove o item de id 2 do 
     * banco de dados.
     * 
     * @param type $pisoId
     * @return Confirmacao, ou 404
     */
    public function pisos_delete($pisoId = 0) {
        if ($pisoId > 0) {
            if ($this->db->get_where("piso", array("id" => $pisoId))->num_rows() > 0){
                if($this->db->simple_query("DELETE FROM piso WHERE id = " . $pisoId)){
                    $this->response("Removido", 200);
                }else{
                    $this->response("Erro ao solicitar remocao no banco de dados", 404);
                }
            }else{
                $this->response("Piso a ser removido nao foi encontrado", 404);
            }
        }
        $this->response();
    }

    public function argamassa_get($argamassaId = 0) {
       
        if ($argamassaId > 0) {
            $this->db->where('id', $argamassaId);
        }
        
        if($this->get('limite')){
            $this->db->limit($this->get('limite'));
        }
        
        if($this->get('precoMax')){
            $this->db->where('preco <', $this->get('precoMax'));
        }
        
        //caso não exista piso a ser retornado, retorna resposta 404
        $this->response($this->db->get('argamassa')->result());

    }

    public function argamassa_post($argamassaId = 0) {
        $this->load->model("Argamassa_Model");
        $argamassa = new Argamassa_Model();
        $argamassa->set_id($argamassaId);
        $argamassa->set_nome($this->post('nome'));
        $argamassa->set_comprimento($this->post('comprimento'));
        $argamassa->set_largura($this->post('largura'));
        $argamassa->set_altura($this->post('altura'));
        $argamassa->set_preco($this->post('preco'));
        $argamassa->set_resistencia($this->post('resistencia'));
        $argamassa->set_quantidade_embalagem($this->post('quantidade'));
        if ($argamassa->commit()) {
            $this->response($this->post(), 200);
        } else {
            $this->response();
        }
    }

    public function argamassa_delete($argamassaId = 0) {
        if ($argamassaId > 0) {
            if ($this->db->get_where("argamassa", array("id" => $argamassaId))->num_rows() > 0){
                if($this->db->simple_query("DELETE FROM argamassa WHERE id = " . $argamassaId)){
                    $this->response("Removido", 200);
                }else{
                    $this->response("Erro ao solicitar remocao no banco de dados", 404);
                }
            }else{
                $this->response("Piso a ser removido nao foi encontrado", 404);
            }
        }
        $this->response();
    }

    public function rejunte_get($rejunteId = 0) {
        //verifica se solicita somente um piso ou vários
       
        if ($rejunteId > 0) {
            $this->db->where('id', $rejunteId);
        }
        
        if($this->get('limite')){
            $this->db->limit($this->get('limite'));
        }
        
        if($this->get('precoMax')){
            $this->db->where('preco <', $this->get('precoMax'));
        }
        
        //caso não exista piso a ser retornado, retorna resposta 404
        $this->response($this->db->get('rejunte')->result());
    }

    public function produtos_get($rejunteId = 0) {
        //verifica se solicita somente um piso ou vários
       
        if ($rejunteId > 0) {
            $this->db->where('id', $rejunteId);
        }
        
        if($this->get('limite')){
            $this->db->limit($this->get('limite'));
        }
        
        if($this->get('precoMax')){
            $this->db->where('preco <', $this->get('precoMax'));
        }
        
        //caso não exista piso a ser retornado, retorna resposta 404
        $this->response($this->db->get('produto')->result());
    }    
}



