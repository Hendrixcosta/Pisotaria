<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */


//coletando o menor valor das análises

$menorValor = 9999999999;
foreach ($analises as $analise){

//            echo '<pre>'   ;
//            print_r($analise);
//            echo '</pre>'   ;    
    if($menorValor > $analise['custoTotal']){
        $menorValor = $analise['custoTotal'];
    }
}

?>
<link rel="stylesheet" href="<?php echo base_url("assets/css/feiticeira.css")?>"> 

<h1><?php echo $nome; ?></h1>

<p><?php echo $descricao; ?></p>

<p><a class="btn btn-default" href="<?php echo base_url("relatorios/historico");?>" role="button">Voltar aos Seus Relatórios</a></p>

<?php

$this->load->view('analise_comparacao', $analises);

?>
 