<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Relatorios extends CI_Controller {
//    custoArgamassa
//    custoMaodeObra
//    custoProdutos
//    Analises
//            nomePiso
//            qtdPiso
//            qtdDesperdicio
//            qtdCaixas
//            custoPiso
//            custoRejunte
//            custoTotal
    private $_ci;

    
     
    public function index () {
        
        $this->load->view("template/header");
        $this->load->helper('url');
       
                
//        ($_SESSION['MARGEMSEGURANCA'])// Retorna 10 ou 25  (padrao 10)  
//        ($_SESSION['ESPACAMENTO'])    // Retorno = valor em apenas numeros (padrao 5 mm)       
//        ($_SESSION['RODAPE'])         // TRUE ou FALSE  (padrao "FALSE")
//        ($_SESSION['MAODEOBRA'])      // valor em numero colocado  (padrao 25) 

/*        if($this->input->post()){
            echo "POST";
        }
 * 
 */
        //validação dos variaveis essenciais 1/2 bosta
        if (empty($_SESSION['AREA']) || empty($_SESSION['PISO']) || $_SESSION['AREA']==0 ){
            $data['mensagem']="Impossível continuar."
                    . "<br> Nao foram definidos os parametros referentes à <a href="
                    . base_url('/Area')
                    . ">Área </a> ou <a href="
                    . base_url('/Pisos/ver')
                    . ">Piso. </a>";
            $this->load->view("template/mensagem", $data);
        }else{

            //Carregando os modelos e bibliotecas necessárias
            $this->carregarModelosBiblioteca();

            //contas feitas através de funcoes listadas abaixo
            $analiseData['custoArgamassa'] = $this->calcularCustoArgamassa();
            $analiseData['custoMaodeObra'] = $this->calcularCustoMaodeObra();
            $analiseData['custoProdutos'] =  $this->calcularCustoProdutos();


            $contador = 0;

            if (isset($_SESSION['PISO_CUSTOMIZADO'])||isset($_SESSION['PISO'])) {
                if(isset($_SESSION['PISO_CUSTOMIZADO'])){
                    //inserir como primeiro piso o customizado
//                    $analiseData['analises'][$contador]['nomePiso'] = $_SESSION['PISO_CUSTOMIZADO']['nome'];
//
//                    $analiseData['analises'][$contador]['qtdPiso'] =  
//                            $this->calcular_qtdpisos(
//                                $_SESSION['PERIMETRO'], 
//                                $_SESSION['PISO_CUSTOMIZADO']['largura'], $_SESSION['PISO_CUSTOMIZADO']['comprimento'] );
//
//                    $analiseData['analises'][$contador]['custoPiso'] = 
//                            $this->calcular_custo($analiseData['analises'][$contador]['qtdPiso'], 
//                                    $_SESSION['PISO_CUSTOMIZADO']['preco'],
//                                    $_SESSION['PISO_CUSTOMIZADO']['quantidade']);
//
//                    $analiseData['analises'][$contador]['qtdDesperdicio'] = 
//                            $this->calcular_desperdicio(
//                                     $analiseData['analises'][$contador]['qtdPiso'], 
//                                    $_SESSION['PISO_CUSTOMIZADO']['quantidade']);
//
//                    //calcularCustoRejunte($Altura, $Largura, $Comprimento, $Espacamento, $CR ){
//                    $analiseData['analises'][$contador]['custoRejunte'] = 
//                            $this->calcularCustoRejunte(
//                                    $_SESSION['PISO_CUSTOMIZADO']['altura'],
//                                    $_SESSION['PISO_CUSTOMIZADO']['largura']*10,
//                                    $_SESSION['PISO_CUSTOMIZADO']['comprimento']*10);
//
//                    $analiseData['analises'][$contador]['custoTotal'] = 
//                            $this->calcular_custo_final(
//                                $analiseData['analises'][$contador]['custoPiso'],
//                                $analiseData['custoArgamassa'],
//                                $analiseData['analises'][$contador]['custoRejunte'],        
//                                $analiseData['custoProdutos'],
//                                $analiseData['custoMaodeObra']);
//                                
//                    $contador++;
                }
                $piso = new Piso_Model();
                foreach ($_SESSION['PISO'] as $pisoID) {
                    $pisoId = (int) $pisoID;    
                    if($pisoId != 100){
                    $piso = $this->pisofactory->getPiso($pisoId);

                    //calcular gastos para cada piso e embutir na variavel de analise
                    $analiseData['analises'][$contador]['nomePiso'] = $piso->get_nome();
                    //calcular quantidade de caixas necessárias para (area + rodape) * despedicio

                    // calcular_qtdpisos ($area, $Perimetro, $Largura, $Comprimento){
                    $analiseData['analises'][$contador]['qtdPiso'] = 
                            $this->calcular_qtdpisos($_SESSION['PERIMETRO'], 
                                $piso->get_largura(), $piso->get_comprimento());

                    // calcular_custo ($qtdpisos, $valor_piso){
                    $analiseData['analises'][$contador]['custoPiso'] = 
                            $this->calcular_custo(
                                    $analiseData['analises'][$contador]['qtdPiso'], 
                                    $piso->get_preco(), $piso->get_quantidade_embalagem()
                                    );

                    //calcular_desperdicio($qtdPisos, $qtdPisosxCaixas, $MargemSeguranca);
                    $analiseData['analises'][$contador]['qtdDesperdicio'] = 
                            $this->calcular_desperdicio($analiseData['analises'][$contador]['qtdPiso'],
                                    $piso->get_quantidade_embalagem());

                    //calcularCustoRejunte($Altura, $Largura, $Comprimento, $Espacamento, $Rejunte)0;
                    $analiseData['analises'][$contador]['custoRejunte'] = 
                            $this->calcularCustoRejunte($piso->get_altura(),
                                    $piso->get_largura(),
                                    $piso->get_comprimento());

                    //calcular_custo_final($CustoPisos, $Custo_Argamassa, $CustoRejunte, $CustoProdutos, $MaodeObra)0;
                    $analiseData['analises'][$contador]['custoTotal'] = 
                            $this->calcular_custo_final($analiseData['analises'][$contador]['custoPiso'],
                                $analiseData['custoArgamassa'],
                                $analiseData['analises'][$contador]['custoRejunte'],        
                                $analiseData['custoProdutos'],
                                $analiseData['custoMaodeObra']);            

                   // array_push($analiseData['analises'][], $analise);
                    $contador++;
                    }else{
                        $analiseData['analises'][$contador]['nomePiso'] = $_SESSION['PISO_CUSTOMIZADO']['nome'];

                        $analiseData['analises'][$contador]['qtdPiso'] =  
                                $this->calcular_qtdpisos(
                                    $_SESSION['PERIMETRO'], 
                                    $_SESSION['PISO_CUSTOMIZADO']['largura'], $_SESSION['PISO_CUSTOMIZADO']['comprimento'] );

                        $analiseData['analises'][$contador]['custoPiso'] = 
                                $this->calcular_custo($analiseData['analises'][$contador]['qtdPiso'], 
                                        $_SESSION['PISO_CUSTOMIZADO']['preco'],
                                        $_SESSION['PISO_CUSTOMIZADO']['quantidade']);

                        $analiseData['analises'][$contador]['qtdDesperdicio'] = 
                                $this->calcular_desperdicio(
                                         $analiseData['analises'][$contador]['qtdPiso'], 
                                        $_SESSION['PISO_CUSTOMIZADO']['quantidade']);

                        //calcularCustoRejunte($Altura, $Largura, $Comprimento, $Espacamento, $CR ){
                        $analiseData['analises'][$contador]['custoRejunte'] = 
                                $this->calcularCustoRejunte(
                                        $_SESSION['PISO_CUSTOMIZADO']['altura'],
                                        $_SESSION['PISO_CUSTOMIZADO']['largura']*10,
                                        $_SESSION['PISO_CUSTOMIZADO']['comprimento']*10);

                        $analiseData['analises'][$contador]['custoTotal'] = 
                                $this->calcular_custo_final(
                                    $analiseData['analises'][$contador]['custoPiso'],
                                    $analiseData['custoArgamassa'],
                                    $analiseData['analises'][$contador]['custoRejunte'],        
                                    $analiseData['custoProdutos'],
                                    $analiseData['custoMaodeObra']);

                        $contador++;                        
                    }
                }
            } else {
                $pisos = FALSE;
                //nenhum piso foi selecionado, requisitar para que o usuário o faça
            }
            
//            echo '<pre>';
//            print_r($analiseData);
//            echo '</pre>';

            $this->load->view("ver_relatorios", $analiseData);
        }
        
          
        if ($this->input->post()){
            
                //construução do relatório
                    //Create a data array so we can pass information to the view
                    $relatorio = new Relatorio_model();
                    
                    $analiseData['custoArgamassa'] = $this->calcularCustoArgamassa();
                    $analiseData['custoMaodeObra'] = $this->calcularCustoMaodeObra();
                    $analiseData['custoProdutos'] =  $this->calcularCustoProdutos();

                    $relatorio->set_custototalargamassa($analiseData['custoArgamassa']);
                    $relatorio->set_customaodeobra($analiseData['custoMaodeObra']);
                    $relatorio->set_custototalprodutos($analiseData['custoProdutos']);
                    
                    if (isset($_POST['nome'])){
                        $nomeRelatorio =  $_POST['nome'];
                    }else {
                        $nomeRelatorio = 'Meu relatorio';
                    }
                    if (isset($_POST['descricao'])){
                        $descRelatorio =  $_POST['descricao'];
                    }
                    
                    $relatorio->set_nome($nomeRelatorio);
                    $relatorio->set_descricao($descRelatorio);
            
                    $nomeUser = $_SESSION['LOGIN'];
                    $Usuario = $this->usuariofactory->getUsuarioByUsername($nomeUser);
            
                    $relatorio->set_idusuario($Usuario->get_id());
                    
                    $relatorio->commit();
                    //$id = $this->relatoriofactory->getMaxId() + 1;
                    //$relatorio->set_id($id);
                    
            foreach ($analiseData['analises'] as $analise) {
                
                $analise_model = new Analise_Model();
                $analise_model->set_nomepiso($analise['nomePiso']);
                $analise_model->set_qtdpiso($analise['qtdPiso']);
                $analise_model->set_custopiso($analise['custoPiso']);
                $analise_model->set_qtddesperdicio($analise['qtdDesperdicio']);
                $analise_model->set_custorejunte($analise['custoRejunte']);
                $analise_model->set_custototal($analise['custoTotal']);
                $analise_model->set_idrelatorio($relatorio->get_id());
                $analise_model->commit();
                
            }
            
             $data ['mensagem'] = "Relatório salvo com sucesso!";
             $this->load->view('template/mensagem', $data);
                    
         }

//        echo '<pre>';
//        print_r($analiseData);
//        echo '</pre>';
        $this->load->view("template/footer");
    }
    
    private function carregarModelosBiblioteca(){
        $this->load->library("PisoFactory");
        $this->load->library("ArgamassaFactory");
        $this->load->library("RejunteFactory");
        $this->load->library("ProdutoFactory");
        $this->load->library("AnaliseFactory");
        $this->load->library("RelatorioFactory");
        $this->load->library("UsuarioFactory");
        $this->load->model("Usuario_Model");
        $this->load->model("Relatorio_Model");
        $this->load->model("Analise_Model");
        $this->load->model("Piso_Model");
        $this->load->model("Argamassa_Model");
        $this->load->model("Rejunte_Model");
        $this->load->model("Produto_Model");
    }
       
    private function calcularCustoArgamassa(){
        //Revisado OK
        //Fórmulas para calculo do custo de argamassa:
        //
        //quantidadePacotesNecessarios = area / (pesoArgamassa / rendimento)
        //custoArgamassa = precoArgamassa * quantidadePacotesNecessarios
        
        //valida se existe as variáveis necessarias para o calculo, sendo a area e a argamassa
        if((isset($_SESSION['ARGAMASSA']))&&(!empty($_SESSION['ARGAMASSA']))&&(isset($_SESSION['AREA']))){
            //Coletando dados da argamassa selecionada
            $argamassa = new Argamassa_Model();
            $id = (int) ($_SESSION['ARGAMASSA'][0]);
            $argamassa = $this->argamassafactory->getArgamassa($id);
//            echo "<pre>";
//            print_r($_SESSION['ARGAMASSA']);
//            echo "</pre>";
//            
            //executando formulas e retornando o valor final
            //saco = 20 Kg
            //rendimento = 4m²/kg
            //cada saco == 80m² que cobre
            // 
           $quantidadePacotesNecessarios = $_SESSION['AREA'] / ($argamassa->get_peso() * $argamassa->get_rendimento());
           $quantidadePacotesNecessarios  = ceil($quantidadePacotesNecessarios) ;
           $custoArgamassa = $argamassa->get_preco() * $quantidadePacotesNecessarios;
            //echo $custoArgamassa;
            return $custoArgamassa;
        }
        return "Argamassa nao selecionada.";
    }
    
    private function calcularCustoMaodeObra(){
        //Revisado OK
        //Fórmulas para calculo do custo de mão de obra:
        //
        //custoTotalMO = area * custoMaoObra
        
        //valida se existe as variáveis necessarias para o calculo
        if((isset($_SESSION['MAODEOBRA']))&&(isset($_SESSION['AREA']))
                                          && ($_SESSION['MAODEOBRA']) != "" 
                                          && ($_SESSION['AREA']) != "" ){
            return $_SESSION['AREA'] * $_SESSION['MAODEOBRA'];
        }else {
            return $_SESSION['AREA'] * 25;
        }
        
    }
    
    private function calcularCustoProdutos(){
        
        //valida se existe as variáveis necessarias para o calculo
        if(isset($_SESSION['PRODUTO'])){
            $custoTotalProduto = 0;
            foreach ($_SESSION['PRODUTO'] as $produtoId){
                $produto = $this->produtofactory->getProduto($produtoId);
                $custoTotalProduto += $produto->get_preco();
            }
            return $custoTotalProduto;
        }
        return "Produtos não selecionados.";
    }
    
    public function calcular_desperdicio ($qtdPisos, $qtdPisosxCaixas){    
        //REVISADO OK
        
        //valida variaveis de sessao e seta padrao caso encontre algum problema
        if (isset($_SESSION['MARGEMSEGURANCA'])) {
            $MargemSeguranca = $_SESSION['MARGEMSEGURANCA'] ;
        }else {
            $MargemSeguranca = 10 ;
        }
        
        //calculos: 
        //1º calculo a quantidade de pisos que preciso comprar contando com a margem de segurança
        //2º calculo a quantidade de caixas que será preciso comprar, que atenda os pisos necessarios + os de segurança
        //3º Vejo quantos pisos a mais tive que comprar devido a restrição de quantidade por caixas
        //echo "<br>QTD PISOS:".$qtdPisos." | qtdPIsosCaixas:".$qtdPisosxCaixas." | Margem Seguança:".$MargemSeguranca;
        $qtdSeguranca = ceil($MargemSeguranca/100 * $qtdPisos) + $qtdPisos;
        //echo " | seguranca:".$qtdSeguranca;
        
        //calcula quantas caixas de piso eu preciso levar 
        $qtdCaixas = ceil($qtdSeguranca / $qtdPisosxCaixas);
        //echo " | qtdCaixas:".$qtdCaixas;
        
        $desperdicio = ($qtdCaixas * $qtdPisosxCaixas) - ($qtdSeguranca);
        //echo " | desperdicio:".$desperdicio;
        return $desperdicio;
        
    }
    
    private function calcularCustoRejunte($Altura, $Largura, $Comprimento){
        //Revisado OK
        // Fórmula  = Base * Altura * Espessura * Espaçamento * CR / (Altura * Base)

        //Validacao da Sessao de espacamento.
        if (isset($_SESSION['ESPACAMENTO'])){
            $Espacamento = $_SESSION['ESPACAMENTO'];
        }else {
             $Espacamento = 5; //assume um espacamento padrão
        }
        
        //validacao da Sessao de rejunte.
        if (empty($_SESSION['REJUNTE'])){
             return "Rejunte Nao Selecionado.";
        }else {
              $idRejunte = (int)$_SESSION['REJUNTE'][0];
        
                //echo "<br>Altura: ".$Altura." | Largura: ".$Largura." | Comprimento: ".$Comprimento." | Espacamento: ".$Espacamento;
                $Rejunte = new Rejunte_Model();
                $Rejunte = $this->rejuntefactory->getRejunte($idRejunte);

                $qtdRejunteNum = ($Comprimento*10 + $Largura*10) * $Altura * $Espacamento * $Rejunte->get_cr() ;
                $qtdRejunteDen = ($Comprimento*10 * $Largura*10);

                //echo " | qtdRejunteNum: ". $qtdRejunteNum;  
                //echo " | qtdRejunteDen: ". $qtdRejunteDen;  

                //qtdRejunte por m²
                $qtdRejunte = $qtdRejunteNum / $qtdRejunteDen;

                //casas decimais para 2
                $qtdRejunte=  round($qtdRejunte, 2);
                //echo " | CR:".$Rejunte->get_cr()."| qtdRejunte/m²: ".$qtdRejunte;

                //define o quanto vai gastar para cobrir toda a área em Kg
                $qtdRejunteTotal = ($qtdRejunte * $_SESSION['AREA']);
                //echo " | Areaa: ". $_SESSION['AREA'];  
                //echo " | qtdRejunteTotal: ". $qtdRejunteTotal;  

                //Definir a quantidade que devo comprar para atender o quanto preciso
                // retorna o arrendondamento pra cima
                // vou precisar de 3,4 Kg divido pelo peso cadastrado do rejunte 
                // (3,4 / 2kg = 1.7 ) retorno 2 unidades que preciso comprar
                $qtdComprar = ceil ($qtdRejunteTotal / $Rejunte->get_peso());
                $custoRejunte = $qtdComprar * $Rejunte->get_preco();
                //echo " | qtdComprar: ". $qtdComprar;  
                return $custoRejunte;
        }

    }
            
    private function calcular_custo ($qtdpisos, $valor_caixa, $qtdPorCaixa){
        //Revisado OK
        $qtdCXPiso = ceil ($qtdpisos / $qtdPorCaixa);
        return   $qtdCXPiso * $valor_caixa;
    }
    
    private function calcular_custo_final ($CustoPisos, $Custo_Argamassa, $CustoRejunte, $CustoProdutos, $MaodeObra){
        //Revisado OK
        //echo '<br>custo total:'. $CustoPisos .' | '. $Custo_Argamassa .' | '. $CustoRejunte .' | '. $CustoProdutos .' | '. $MaodeObra;
        return $CustoPisos + $Custo_Argamassa + $CustoRejunte + $CustoProdutos + $MaodeObra;
    }
    
    private function calcular_qtdpisos ($Perimetro, $Largura, $Comprimento) {
        //Revisado OK
        //quantidade de piso necessario para cobrir determinada area
        //total_de_pisos = (Area_a_Ser_coberta) / (Area_do_piso em cm²)
        
        //Area a ser coberta
        $area = $_SESSION['AREA'];
        
        //area do piso
        $AreaPiso = $Largura * $Comprimento;
        
        //Iguala unidades de medida
        $AreaPiso = $AreaPiso /10000;
       // echo "Area = ".$area." | Area do piso = ".$AreaPiso;
        
        //Calcula quantidade de piso para àrea
        $total_pisos = ceil ($area / $AreaPiso);
        //echo " | Total_pisos=".$total_pisos. " | Perimetro: ".$_SESSION['PERIMETRO'];
        
        //pega maior lado
        if ($Largura > $Comprimento){$lado = $Largura/100;}else {$lado = $Comprimento/100;}
        
        //Calcula quantidade de piso para rodapé
        if ((isset($_SESSION['RODAPE'])) && ($_SESSION['RODAPE']== "TRUE") ){
            $total_pisos_rodape =  ceil ($Perimetro / ($lado * 2));
        }else {
            $total_pisos_rodape =  0;
        }
        //pega o inteiro acima. Ex: 0,64 == return 1;
        return ($total_pisos + $total_pisos_rodape);
    }
    
    public function historico($idRelatorio = 0){
        $this->load->view('template/header');
        
        $this->load->library('RelatorioFactory');
        $this->load->library('AnaliseFactory');
        if(!isset($_SESSION['LOGIN'])){
            redirect('/', 'location', 302);
        }
        
        if($idRelatorio > 0) { //deseja acessar um relatório especifico se nao for do seu id retorna false
            
            //estrutura da analise data de um relatorio unico
            //$analisedata = ['nome']
            //               ['id']
            //               ['custoArgamassa']
            //               [custoMaodeObra]
            //               [custoProdutos]
            //               ['analises'] => array (Model_analises) //*tipo: model de analises
            
            
            //recupera o relatório de id especifico fazendo a validação do id do usuario na factory
            $data = array(
                "relatorios" => $this->relatoriofactory->getRelatorioLogado($idRelatorio)
            );
            
            //recupera as analises que contem chave estrangeiro para o relatorio em questao
            $data ['analises'] = new Analise_model();
            $data ['analises'] = $this->analisefactory->getAnaliseporIdRelatorio(array ($idRelatorio));
            
            //cria a variavel que contera as informações
            $analiseData = array();
            $analiseData['nome'] = $data['relatorios']->get_nome();
            $analiseData['id'] = $data['relatorios']->get_id();
            $analiseData['descricao'] = $data['relatorios']->get_descricao();
            $analiseData['custoArgamassa'] = $data['relatorios']->get_custototalargamassa();
            $analiseData['custoMaodeObra'] = $data['relatorios']->get_customaodeobra();
            $analiseData['custoProdutos'] = $data['relatorios']->get_custototalprodutos();
            foreach ($data ['analises'] as $analise){
                $analiseData['analises'][] = $analise->toArray();
            }
//            $analiseData['analises'] = $this->analisefactory->getAnaliseporIdRelatorio(array ($idRelatorio));
                     
//            echo '<pre>'   ;
//            print_r($analiseData);
//            echo '</pre>'   ;
//            
            $this->load->view('relatorio_mostrarSalvo', $analiseData);
        
        } else {    //deseja acessar uma lista de seus relatorios
           
//           //estrutura da analise data que conterá varios relatorios do usuario logado
            //$analisedata = array (
            //                          ['nome']
            //                          ['id']
            //                          ['custoArgamassa']
            //                          [custoMaodeObra]
            //                          [custoProdutos]
            //                          ['analises'] => array (Model_analises)
            //               );
            
            //recupera todos relatorios do usuario
            $data = array(
                "relatorios" => $this->relatoriofactory->getRelatorioLogado($idRelatorio)   
            );
            
            //cria variavel que conterá as informações
            $analiseData = array();
            $cont=0; //contador de controle
            if(!empty($data['relatorios'])){
            foreach ($data['relatorios'] as $relatorio){
                
                $analiseData['relatorios'][$cont]['nome']= $relatorio->get_nome();
                $analiseData['relatorios'][$cont]['descricao']= $relatorio->get_descricao();
                $analiseData['relatorios'][$cont]['id']= $relatorio->get_id();
//                $analiseData['relatorios'][$cont]['custoArgamassa']= $relatorio->get_custototalargamassa();
//                $analiseData['relatorios'][$cont]['custoMaodeObra']= $relatorio->get_customaodeobra();
//                $analiseData['relatorios'][$cont]['custoProdutos']= $relatorio->get_custototalprodutos();
//                //recupera as analises de cada relatorio
//                $analises = $this->analisefactory->getAnaliseporIdRelatorio(array ($relatorio->get_id()));
//                $analiseData['relatorios'][$cont]['analises'] = $analises;
                
                $cont++;
            }}
            
//            echo '<pre>'   ;
//            print_r($analiseData);
//            echo '</pre>'   ;
            
            $this->load->view('relatorio_listaHistorico', $analiseData);
            
        }
        $this->load->view('template/footer');
    }    
}

?>