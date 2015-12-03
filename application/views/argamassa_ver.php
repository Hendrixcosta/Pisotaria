<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */
if($argamassas){
    
    /**
     * Como inserir uma tabela utilizando a biblioteca "table" chamada na controller
     */
    
    //inserindo a classe de tabela do bootstrap na tabela
    $this->table->set_template(array('table_open'=> '<table class="table table-striped table-hover sortable ">'));

    //setando a primeira linha da tabela
    $this->table->set_heading(array('Nome', 'Descrição', 'Tipo', 'Peso', 'Preço','Rendimento', ''));
    
    if(is_array($argamassas)){
        // verifica se são várias argamassas
        foreach($argamassas as $argamassa){
            
            //define o nome do botão para exibir estaticamente
            if ((isset($_SESSION['ARGAMASSA'])) && (!empty($_SESSION['ARGAMASSA']))) {
                if ($_SESSION['ARGAMASSA'][0]==$argamassa->get_id()){
                    $aux="Remover";
                }else {
                    $aux="Adicionar";
                }
            }else {
                $aux="Adicionar";
            }
            
            //criando variaveis para cada botao, a fim de organizar a parada
            $botaoAdicionar = ' <button class="btn btn-primary btn-xs" onclick="argamassaadd('.$argamassa->get_id().
                    ','."'".$argamassa->get_nome().
                    "'".
                    ')"'.
                    ')'.
                    " id=".
                    "argamassa". 
                    $argamassa->get_id()."  >"
                    . $aux
                    . "</button>";
            $botaoVer = ' <a href="' . base_url() . 'argamassa/ver/' . $argamassa->get_id() . '" class="btn btn-default btn-xs" role="button">Ver</a>';
            
            if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))){
                $botaoEditar = ' <a href="' . base_url() . 'argamassa/inserir/' . $argamassa->get_id() . '" class="btn btn-default btn-xs" role="button">Editar</a>';
                $botoes = $botaoAdicionar . $botaoVer . $botaoEditar;
            }  else {
                $botoes = $botaoAdicionar . $botaoVer;
            }
            
            //adicionando cada linha na tabela com os atributos e botoes gerados
            $this->table->add_row(array(
                $argamassa->get_nome(), 
                $argamassa->get_descricao(), 
                $argamassa->get_tipo(), 
                $argamassa->get_peso(), 
                $argamassa->get_preco(), 
                $argamassa->get_rendimento(), 
                $botoes
                ));
        }
    }else{
        //Caso seja somente uma argamassa
        //define o nome do botão para exibir estaticamente
            if ((isset($_SESSION['ARGAMASSA'])) && (!empty($_SESSION['ARGAMASSA']))) {
                if ($_SESSION['ARGAMASSA'][0]==$argamassas->get_id()){
                    $aux="Remover";
                }else {
                    $aux="Adicionar";
                }
            }else {
                $aux="Adicionar";
            }
            
            //criando variaveis para cada botao, a fim de organizar a parada
            $botaoAdicionar = ' <button class="btn btn-primary btn-xs" onclick="argamassaadd('.$argamassas->get_id().
                    ','."'".$argamassas->get_nome().
                    "'".
                    ')"'.
                    ')'.
                    " id=".
                    "argamassa". 
                    $argamassas->get_id()."  >"
                    . $aux
                    . "</button>";
            $botaoVer = ' <a href="' . base_url() . 'argamassa/ver/' . $argamassas->get_id() . '" class="btn btn-default btn-xs" role="button">Ver</a>';
//            $botaoEditar = ' <a href="' . base_url() . 'argamassa/inserir/' . $argamassas->get_id() . '" class="btn btn-default btn-xs" role="button">Editar</a>';
            
            if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))){
                $botaoEditar = ' <a href="' . base_url() . 'argamassa/inserir/' . $argamassas->get_id() . '" class="btn btn-default btn-xs" role="button">Editar</a>';
                $botoes = $botaoAdicionar . $botaoVer . $botaoEditar;
            }  else {
                $botoes = $botaoAdicionar . $botaoVer;
            }
        
        
        //adicionando cada linha na tabela com os atributos e botoes gerados
        $this->table->add_row(array(
            $argamassas->get_id(), 
            $argamassas->get_nome(), 
            $argamassas->get_descricao(), 
            $argamassas->get_tipo(), 
            $argamassas->get_peso(), 
            $argamassas->get_preco(), 
            $botoes
            ));
    }
    //imprimindo a tabela
    echo $this->table->generate();
//    echo '<pre>';
//    print_r( $_SESSION['ARGAMASSA']  );
//    echo '</pre>';
}else{
    echo '<p>Nenhum produto foi encontrado</p>';
}

