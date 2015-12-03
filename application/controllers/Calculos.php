<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calculos
 *
 * @author Hendrix
 */
class Calculos extends CI_Controller {
    //traz os métodos de controller do codeignitter
    // (rotas)

    public function index() {
        session_start();
        
        /*===Calculos da Analise================================================
         * Ja 'implementados' e ja estao na Model_Analise mas nao no banco
         
        custo       -> Custo total daquela combinaçao (custo do piso + do rej + da arg + etc)
        qtdpisos    -> Quantidade de pisos para determinada a area
        qtdcaixas   -> Quantidade de caixas necessarias daquele piso para  preencher a area
        desperdicio -> Numero de pisos que sera comprado menos o numero necessario para cobrir a area
        idpiso      -> a ID do piso da analise
        idarea      -> A gente inicialmente pensou em guardar a ID da area mas acho desnecessario
        idproduto   -> Id do produto da analise
        idrelatorio -> id do relatório que conterá esta analise 
        //====================================================================*/
        
        /*=========================Ainda falta==================================
        Gasto com Argamassa   -> Média de 4Kg para cada m² 
        Gasto com Rejunte     -> Fórmula  = Base * Altura * Espessura * Espaçamento * CR / (Altura * Base)
        Gasto com mao de obra -> Definido pelo Usuário 20 ~ 30 reais o m2
        GAsto com Produtos    -> Soma dos valores de cada produto
        //====================================================================*/
        
        
        //Recuperar variáveis para cálculos===================================*/
        $area = $_SESSION['AREA'];
        $lista_de_pisos = $_SESSION['PISO'];
        $rejunte = $_SESSION['REJUNTE'];
        $argamassa = $_SESSION['ARGAMASSA'];
       
        $analises = $this->analisar($lista_de_pisos, $area);
        //====================================================================*/
        
        
        //dependente do tamanho do revestimento
        //tem que ficar dentro das analises
        $analiseData['gastoRejunte'] = 0; 
        $analiseData['gastoArgamassa'] = 0; 
        
        //fica na array fora
        $analiseData['gastoMaodeObra'] = 0;
        $analiseData['gastoProduto'] = 0;
        $analiseData['Analises'] = $analises;
        
        //imprime a array resultante
        echo "<pre>";
        print_r($analiseData);
        echo "</pre>";
        
        
        
    }
    
    public function analisar($lista_de_pisos, $area){
        $this->_ci = & get_instance();
        $this->load->library("PisoFactory");
        $this->_ci->load->model("Analise_Model");
        
        
        $pisos = array();
        $analises = array();
        
                       
        foreach ($lista_de_pisos as $key => $value){
            $piso = $this->pisofactory->getPiso($value);
            array_push($pisos, $piso);
        }
//        echo "<pre>";
//        print_r($pisos);
//        echo "<pre>";
        foreach ($pisos as $piso){
            //echo $piso->get_comprimento();
            //echo $area;
             $analise = new Analise_Model();
             //$analise->set_custobeneficio($this.)
             
             $analise->set_qtdpisos($this->calcular_qtdpisos($area, $piso));
             $analise->set_custo($this->calcular_custo($analise->get_qtdpisos(), $piso));
             $analise->set_qtdcaixas($this->calcular_qtdcaixas($piso, $analise->get_qtdpisos() ));
             $analise->set_desperdicio($this->calcular_desperdicio(
                     $analise->get_qtdcaixas(),
                     $analise->get_qtdpisos(),
                     $piso));
             
             $analise->set_idpiso($piso->get_id());
             $analise->set_idarea($area);
//             $analise->set_idpiso(90);
             array_push($analises, $analise);
        }   
        return $analises;
    }
    
    public function calcular_desperdicio ($qtdcaixas, $qtdpisos, $piso){    
        //echo "id do piso na func: ".($piso->get_id());
        $qtd_pisos_pagos = $qtdcaixas * $piso-> get_quantidade_embalagem();
        return $qtd_pisos_pagos - $qtdpisos;
    }
    
    public function calcular_qtdcaixas ($piso, $qtdpisos){
        $qtdmaxembalagem = $piso-> get_quantidade_embalagem();
        //echo "id do piso na func: ".($piso->get_id());
        $qtdcaixas= $qtdpisos / $qtdmaxembalagem;
        return ceil($qtdcaixas);
    }
    
    public function calcular_custo ($qtdpisos, $piso){    
        //echo "id do piso na func: ".($piso->get_id());
        return  $qtdpisos * $piso->get_preco();
    }
    
    public function calcular_qtdpisos ($area, $piso){
        //echo "id do piso na func: ".($piso->get_id());
        $areapiso = $piso->get_comprimento() * $piso->get_largura() /10000;
        $total_pisos = $area / $areapiso;
        return ceil ($total_pisos);
       // echo "comprimento = ". $piso->get_comprimento();
        //echo "comprimento = ". $piso->get_largura();
        //echo $total_pisos;
        
        
    }
    
    
}

        