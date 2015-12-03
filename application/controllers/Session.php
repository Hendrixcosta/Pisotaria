<?php
/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */

/*
 * Vamos colocar aqui toda a estrutura da variavel $_SESSION ?
 * 
 *  PISO_CUSTOMIZADO        //armazena o piso inserido pelo usuario
 *      id                      //variavel id do piso
 *      nome
 *      altura
 *      comprimento
 *      largura
 *      preco
 *      quantidade
 *      resistencia
 *      tipo
 *  PISO                    // Lista contendo IDs de pisos armazenados
 *      array contendo IDs
 *  NOME                    // ????????????
 *  AREA                    // Valor da área já calculada
 *  PERIMETRO               // Perímetro da área já calculado
 *  PRODUTO                 // 
 *  	array contendo IDs  // 
 *  ARGAMASSA               // ID da argamassa utilizada
 *  REJUNTE                 // ID do rejunte utilizado
 * 
 *  ...                     //proximos itens foram definidos na controller Detalhamento'
 *  MARGEMSEGURANCA         // Valor 10 ou 25, referente a porcentagem de segurança para posicionamento horizontal ou vertical respectivamente
 *  ESPACAMENTO             // Valor em milimetros do espaçamento entre um piso e outro (0 a 10)
 *  RODAPE                  // Valor booleano indicando a presença de rodapé ou não
 *  MAODEOBRA               // Valor de mão de obra por m²
 * 
 */

class Session extends CI_Controller {
    var $_ci;
    public function index(){
        session_start();    
        $piso_post = array();
        
        
        
         
        
        
        if ($_POST['acao'] === "addPisoSession" ) {
                        
                         
                        $piso_post['id']= 100;
                        $piso_post['nome']=($this->input->post('nome'));
                        $piso_post['altura']=($this->input->post('altura'));
                        $piso_post['comprimento']=($this->input->post('comprimento'));
                        $piso_post['largura']=($this->input->post('largura'));
                        $piso_post['preco']=($this->input->post('preco'));
                        $piso_post['quantidade']=($this->input->post('quantidade'));
                        $piso_post['resistencia']=($this->input->post('resistencia'));
                        $piso_post['tipo']=($this->input->post('tipo'));

                        $_SESSION['PISO_CUSTOMIZADO'] = $piso_post;
                        //echo "<pre>";
                        //print_r($_SESSION['PISO_CUSTOMIZADO']);
                        //echo "</pre>";
        }
        
        if ($_POST['acao']=== 'limpar'){
            session_destroy();
            echo "";
        }
        
        if ($_POST['tipo']==='piso'){
            
             if (isset($_SESSION['PISO'])){
                //$_SESSION['PRODUTO']= $_SESSION['PRODUTO'].','.$_POST['id'];
                if (in_array($_POST['id'], $_SESSION['PISO'])) {

                    $key = array_search($_POST['id'], $_SESSION['PISO']);
                    
                    if ($key !== false) {
                        unset($_SESSION['PISO'][$key]);
                    }
                } else {
                    array_push($_SESSION['PISO'], $_POST['id']); //inserre elemento
                }
            }else {
                $_SESSION['PISO'] = array($_POST['id']);
                $json = array ('id' => $_POST['id'], 'nome' => $_POST['nome'] );                
            }

            
//           echo "<pre>";
//           print_r ($_SESSION['PISO']);
//           echo "</pre>";
            echo implode(',',$_SESSION['PISO']);            

        }
        
        
        if ($_POST['tipo']==='nome'){
            
             if (isset($_SESSION['NOME'])){
                //$_SESSION['PRODUTO']= $_SESSION['PRODUTO'].','.$_POST['id'];
                if (in_array($_POST['nome'], $_SESSION['NOME'])) {

                    $key = array_search($_POST['nome'], $_SESSION['NOME']);
                    
                    if ($key !== false) {
                        unset($_SESSION['NOME'][$key]);
                    }
                } else {
                    array_push($_SESSION['NOME'], $_POST['nome']); //inserre elemento
                }
            }else {
                $_SESSION['NOME'] = array($_POST['nome']);
            }
            
//           echo "<pre>";
//           print_r ($_SESSION['PISO']);
//           echo "</pre>";
            echo implode(',',$_SESSION['NOME']);            
             //echo implode(',', $json);            
        }
        
        if ($_POST['tipo']==='area'){
                $_SESSION['AREA'] = $_POST['area'];
                $_SESSION['PERIMETRO'] = $_POST['perimetro'];
                //$_SESSION['BASE'] = $_POST['base'];
                //$_SESSION['ALTURA'] = $_POST['altura'];
                echo  $_SESSION['AREA'];   
                        //" base: " . $_SESSION['BASE']. " Altura: ".$_SESSION['ALTURA']   ;
        }
        
        if ($_POST['tipo']==="MargemSeguranca"){
                $_SESSION['MARGEMSEGURANCA'] = $_POST['valor'];
                echo  $_SESSION['MARGEMSEGURANCA'];
        }
        
        if ($_POST['tipo']==="Espacamento"){
                $_SESSION['ESPACAMENTO'] = $_POST['valor'];
                echo  $_SESSION['ESPACAMENTO'];
        }
        
        if ($_POST['tipo']==="Rodape"){
                $_SESSION['RODAPE'] = $_POST['valor'];
                echo  $_SESSION['RODAPE'];
        }
        
        if ($_POST['tipo']==="MaodeObra"){
                $_SESSION['MAODEOBRA'] = $_POST['valor'];
                echo  $_SESSION['MAODEOBRA'];
        }
        
        if ($_POST['tipo']==='produto'){
            
            if (isset($_SESSION['PRODUTO'])){
                //$_SESSION['PRODUTO']= $_SESSION['PRODUTO'].','.$_POST['id'];
                if (in_array($_POST['id'], $_SESSION['PRODUTO'])) {

                    $key = array_search($_POST['id'], $_SESSION['PRODUTO']);
                    if ($key !== false) {
                        unset($_SESSION['PRODUTO'][$key]);
                    }
                } else {
                    array_push($_SESSION['PRODUTO'], $_POST['id']); //inserre elemento
                }
            }else {
                //$_SESSION['PRODUTO']= $_POST['id'];
                $_SESSION['PRODUTO'] = array($_POST['id']);
            }
            //echo "Produtos Selecionados: ".$_SESSION['PRODUTO'];
            
//            echo "<pre>";
//            print_r($_SESSION['PRODUTO']);
//            echo "</pre>";
            
            echo implode(', ',$_SESSION['PRODUTO']);
        }
        
        
        
        if ($_POST['tipo']==='argamassa'){
            if (!empty($_SESSION['ARGAMASSA'])){
                //$_SESSION['PRODUTO']= $_SESSION['PRODUTO'].','.$_POST['id'];
                if (in_array($_POST['id'], $_SESSION['ARGAMASSA'])) {

                    $key = array_search($_POST['id'], $_SESSION['ARGAMASSA']);
                    if ($key !== false) {
                        unset($_SESSION['ARGAMASSA'][$key]);
                        unset($_SESSION['NOME_ARGAMASSA']);
                        
                    }
                } else {
                         throw new Exception(); //Ja existe um elemento 
                }
            }else {
                //$_SESSION['PRODUTO']= $_POST['id'];
                $_SESSION['ARGAMASSA'] = array($_POST['id']);
                $_SESSION['NOME_ARGAMASSA'] = ($_POST['nome']);
            }
            echo implode(', ',$_SESSION['ARGAMASSA']);
        }
        
        
        if ($_POST['tipo']==='rejunte'){
            if (!empty($_SESSION['REJUNTE'])){
                //$_SESSION['PRODUTO']= $_SESSION['PRODUTO'].','.$_POST['id'];
                if (in_array($_POST['id'], $_SESSION['REJUNTE'])) {

                    $key = array_search($_POST['id'], $_SESSION['REJUNTE']);
                    if ($key !== false) {
                        unset($_SESSION['REJUNTE'][$key]);
                        unset($_SESSION['NOME_REJUNTE']);
                    }
                } else {
                         throw new Exception(); //Ja existe um elemento 
                }
            }else {
                //$_SESSION['PRODUTO']= $_POST['id'];
                $_SESSION['REJUNTE'] = array($_POST['id']);
                $_SESSION['NOME_REJUNTE'] = ($_POST['nome']);
            }
            echo implode(', ',$_SESSION['REJUNTE']);
        }
        
        if ($_POST['tipo']== 'analise'){
            echo '<pre>';
            print_r(($_POST['analises']));
            echo '</pre>';
        }
        
    }
        
}
