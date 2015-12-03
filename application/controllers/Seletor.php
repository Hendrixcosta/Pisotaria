    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seletor
 *
 * @author Hendrix
 */
class Seletor extends CI_Controller {
    
    public function index (){
        $this->load->library("ProdutoFactory");
        $this->load->library("PisoFactory");
        $this->load->library("ArgamassaFactory");
        $this->load->library("RejunteFactory");
        
        //cria um array e no índice, chave relativo a produtos coloca o retorno da consulta bd
        $produtos_bd = array("produtos" => $this->produtofactory->getProduto(0));
        $pisos_bd = array("pisos" => $this->pisofactory->getPiso(0));
        $argamassas_bd = array("argamassas" => $this->argamassafactory->getArgamassa(0));
        $rejuntes_bd = array("rejuntes" => $this->rejuntefactory->getRejunte(0));
        
        //$this->load->view("template/header");
        $this->load->view("simples/template/header");

        ?> 
<!--<html>
    <head>
<link rel="stylesheet" type="text/css" href="../../pisotaria/assets/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="../../pisotaria/assets/easyui/themes/icon.css">
<script type="text/javascript" src="../../pisotaria/assets/easyui/jquery.min.js"></script>
<script type="text/javascript" src="../../pisotaria/assets/easyui/jquery.easyui.min.js"></script>

</head>
<body>


	

	<div id="target" style="border:1px solid #ccc;width:300px;height:400px;float:right;margin:5px;">
		drop Aqui os pisos para análise
	</div>
	
	<style type="text/css">
		.drag{
			
			padding:10px;
			margin:5px;
			
			background:#AACCFF;
		}
		.dp{
			opacity:0.5;
			filter:alpha(opacity=50);
		}
		.over{
			background:#FBEC88;
		}
	</style>
	<script>
		$(function(){
			$('.drag').draggable({
				proxy:'clone',
				revert:true,
				cursor:'auto',
				onStartDrag:function(){
					$(this).draggable('options').cursor='not-allowed';
					$(this).draggable('proxy').addClass('dp');
				},
				onStopDrag:function(){
					$(this).draggable('options').cursor='auto';
				}
			});
			$('#target').droppable({
				//accept:'#d1,#d3',
				onDragEnter:function(e,source){
					$(source).draggable('options').cursor='auto';
					$(source).draggable('proxy').css('border','1px solid red');
					$(this).addClass('over');
				},
				onDragLeave:function(e,source){
					$(source).draggable('options').cursor='not-allowed';
					$(source).draggable('proxy').css('border','1px solid #ccc');
					$(this).removeClass('over');
				},
				onDrop:function(e,source){
					$(this).append(source)
					$(this).removeClass('over');
				}
			});
		});
	</script>-->

        
        
<!--echo <<<HTML

<link rel="stylesheet" type="text/css" href="easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="easyui/themes/icon.css">
<script type="text/javascript" src="easyui/jquery.min.js"></script>
<script type="text/javascript" src="easyui/jquery.easyui.min.js"></script>
        
HTML;
//fim do html-->
        

<?php
        
        $this->load->view("calc_area");
        $this->load->view("show_produtos", $produtos_bd);
        $this->load->view("show_pisos", $pisos_bd);
        $this->load->view("show_argamassas", $argamassas_bd);
        $this->load->view("show_rejuntes", $rejuntes_bd);
        
        
        
        $this->load->view("simples/template/footer");
        
        //Close the table HTML
       
        
    }
    //put your code here
}
