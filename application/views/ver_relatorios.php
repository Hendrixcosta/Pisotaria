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
    if($menorValor > $analise['custoTotal']){
        $menorValor = $analise['custoTotal'];
    }
}

?>
<link rel="stylesheet" href="<?php echo base_url("assets/css/feiticeira.css")?>"> 

<h1>Relatório</h1>

<p>Veja agora a comparação de orçamento dos pisos selecionados para a sua casa.</p>
<?php

$this->load->view('analise_comparacao', $analises);


if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))) {
?>

<form class="form-horizontal" action="#" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Nome do Relatório</label>
        <input type="text" name="nome" class="form-control" placeholder="Meu Relatorio 1">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Descrição do Relatório</label>
        <textarea class="form-control" rows="3" name="descricao"></textarea>
    </div>
    <div class="form-group">
        <p class="text-center"><button type="submit"  class="btn btn-primary" > Salvar Relatório!</button></p>
    </div>
</form>  
<?php
}