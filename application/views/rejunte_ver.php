<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */
 
if($rejuntes){
    /**
     * Como inserir uma tabela utilizando a biblioteca "table" chamada na controller
     */
    
    //inserindo a classe de tabela do bootstrap na tabela
    $this->table->set_template(array('table_open'=> '<table class="table table-striped table-hover sortable">'));

    //setando a primeira linha da tabela
    $this->table->set_heading(array('Nome', 'Descrição', 'Tipo', 'Peso', 'Preço', ' '));
    
    if(is_array($rejuntes)){
        // verifica se são várias rejuntes
//        echo '<pre>';
//                    print_r($_SESSION['REJUNTE'][0]);
//                    echo '<pre>';
                    
        foreach($rejuntes as $rejunte){
            
            //define o nome do botão para exibir estaticamente
            if ((isset($_SESSION['REJUNTE'])) && (!empty($_SESSION['REJUNTE']))) {
                if ($_SESSION['REJUNTE'][0]==$rejunte->get_id()){
                    $aux="Remover";
                }else {
                    $aux="Adicionar";
                }
            }else {
                $aux="Adicionar";
            }
            
            //criando variaveis para cada botao, a fim de organizar a parada
           $botaoAdicionar = ' <button class="btn btn-primary btn-xs" onclick="rejunteadd('.$rejunte->get_id().
                    ','."'".$rejunte->get_nome().
                    "'".
                    ')"'.
                    ')'.
                    " id=".
                    "rejunte". 
                    $rejunte->get_id()."  >"
                    . $aux
                    . "</button>";
            $botaoVer = ' <a href="' . base_url() . 'rejunte/ver/' . $rejunte->get_id() . '" class="btn btn-default btn-xs" role="button">Ver</a>';
            
            if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))){
                $botaoEditar = ' <a href="' . base_url() . 'rejunte/inserir/' . $rejunte->get_id() . '" class="btn btn-default btn-xs" role="button">Editar</a>';
                $botoes = $botaoAdicionar . $botaoVer . $botaoEditar;
            }  else {
                $botoes = $botaoAdicionar . $botaoVer;
            }
            
            //adicionando cada linha na tabela com os atributos e botoes gerados
            $this->table->add_row(array(
                $rejunte->get_nome(), 
                $rejunte->get_descricao(), 
                $rejunte->get_tipo(), 
                $rejunte->get_peso(), 
                $rejunte->get_preco(), 
                $botoes
                ));
        }
    }else{
        //Caso seja somente uma rejunte
        $botaoAdicionar = ' <button class="btn btn-primary btn-xs" onclick="rejunteadd('.$rejuntes->get_id().
                    ','."'".$rejuntes->get_nome().
                    "'".
                    ')"'.
                    ')'.
                    " id=".
                    "rejunte". 
                    $rejuntes->get_id()."  >Adicionar</button>";
        $botaoVer = ' <a href="' . base_url() . 'rejunte/ver/' . $rejuntes->get_id() . '" class="btn btn-default btn-xs" role="button">Ver</a>';
        if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))){
            $botaoEditar = ' <a href="' . base_url() . 'rejunte/inserir/' . $rejuntes->get_id() . '" class="btn btn-default btn-xs" role="button">Editar</a>';
            $botoes = $botaoAdicionar . $botaoVer . $botaoEditar;
        }  else {
            $botoes = $botaoAdicionar . $botaoVer;
        }        

        //adicionando cada linha na tabela com os atributos e botoes gerados
        $this->table->add_row(array(
            $rejuntes->get_id(), 
            $rejuntes->get_nome(), 
            $rejuntes->get_descricao(), 
            $rejuntes->get_tipo(), 
            $rejuntes->get_peso(), 
            $rejuntes->get_preco(), 
            $botoes
            ));
    }
    //imprimindo a tabela
    echo $this->table->generate();
       
}else{
    echo '<p>Nenhum rejunte foi encontrado</p>';
}

