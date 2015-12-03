<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */

?>

<h1>Projeto Pisotaria</h1>

<p>O projeto se baseia em alguns passos.</p>
<div class="row">
<div class="col-md-6">
<div class="panel <?php 
if (!empty($_SESSION['AREA'])){
        echo "panel-success";
    }else {
        echo "panel-default";
    }
?>">
  <div class="panel-heading">
    <h2 class="panel-title"><?php 
if (!empty($_SESSION['AREA'])){
        echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>';
    }else {
        echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>';
    }
?> Passo 1 - Defina a Área</h2>
  </div>
  <div class="panel-body">
      <p>Para prosseguir com a aplicação é necessário que estipule uma área no sistema. Acesse a página de área e defina-a.</p>
      <!-- Paragrafo falando área atual -->
      <p>A área atual é de: <strong><?php 
if (!empty($_SESSION['AREA'])){
        echo $_SESSION['AREA'];
    }else {
        echo "0";
    }
    ?> m²</strong></p>
      <!-- Link para página -->
      <p class="text-center"><a href="<?php echo base_url("area")?>" class="btn btn-default">Definir Área</a></p>
  </div>
</div>
</div>

<!-- PASSO 2 - SELECIONAR PISO -->
<div class="col-md-6">
<div class="<?php 
if (!empty($_SESSION['PISO'])){
        echo "panel panel-success";
    }else {
        echo "panel panel-default";
    }
?> col-">
  <div class="panel-heading">
    <h2 class="panel-title"><?php 
if (!empty($_SESSION['PISO'])){
        echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>';
    }else {
        echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>';
    }
?> Passo 2 - Escolha o(s) Piso(s)</h2>
  </div>
  <div class="panel-body">
      <p>Para prosseguir com a aplicação é necessário que escolha os pisos para análise. Acesse a página de pisos e selecione os que desejar.</p>
      <!-- Paragrafo falando área atual -->
      <?php
                   if (!empty($_SESSION['NOME'])) { ?>
      <p>Os pisos selecionados são: </p>
            <ul>
                <?php
                        foreach ($_SESSION['NOME'] as $Nome){
                        echo '<li>' . $Nome . "</li>";
                        } ?>
                
            </ul><?php
                    }
      ?>
      
      <p class="text-center"><a href="<?php echo base_url("pisos/ver")?>" class="btn btn-default">Escolher Pisos</a></p>
  </div>
</div>
</div>

</div>
<div class="row">

<!-- PASSO 3 - SELECIONAR Rejunte e Argamassa -->
<div class="col-md-6">
<div class="<?php 
if (!empty($_SESSION['REJUNTE'])){
        echo "panel panel-success";
    }else {
        echo "panel panel-default";
    }
?>">
  <div class="panel-heading">
    <h2 class="panel-title"><?php 
if (!empty($_SESSION['REJUNTE'])){
        echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>';
    }else {
        echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>';
    }
    ?> Passo 3 - Selecione um Rejunte <small>(não obrigatório)</small></h2>
  </div>
  <div class="panel-body">
      <p>Podemos estimar os seus gastos com mais precisão se especificar o rejunte desejado.</p>
      <!-- Paragrafo falando o rejunte atual -->
      <p class="text-center"><a href="<?php echo base_url("rejunte/ver")?>" class="btn btn-default">Selecionar Rejunte</a></p>
  </div>
</div>
</div>

<!-- PASSO 4 - SELECIONAR Rejunte e Argamassa -->
    
<div class="col-md-6">    
<div class="<?php 
if (!empty($_SESSION['ARGAMASSA'])){
        echo "panel panel-success";
    }else {
        echo "panel panel-default";
    }
?>">
  <div class="panel-heading">
    <h2 class="panel-title"><?php 
if (!empty($_SESSION['ARGAMASSA'])){
        echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>';
    }else {
        echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>';
    }
?> Passo 4 - Selecione uma Argamassa <small>(não obrigatório)</small></h2>
  </div>
  <div class="panel-body">
      <p>Podemos estimar os seus gastos com mais precisão se especificar a argamassa desejada.</p>
      <!-- Paragrafo falando a argamassa atual -->
      <p class="text-center"><a href="<?php echo base_url("argamassa/ver")?>" class="btn btn-default">Selecionar Argamassa</a></p>
  </div>
</div>
</div>

</div>
<div class="row">

<!-- PASSO 5 - Detalhamento e Outros Produtos -->
<div class="col-md-6">
<div class="<?php 
if (!empty($_SESSION['PRODUTO'])){
        echo "panel panel-success";
    }else {
        echo "panel panel-default";
    }
?>">
  <div class="panel-heading">
    <h2 class="panel-title"><?php 
if (!empty($_SESSION['PRODUTO'])){
        echo '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>';
    }else {
        echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>';
    }
?> Passo 5 - Especifique Detalhes e Outros Produtos <small>(não obrigatório)</small></h2>
  </div>
  <div class="panel-body">
      <p>Para tornar o orçamento mais preciso, gostaríamos que nos informasse detalhes como:</p>
      <ul>
          <li>Alinhamento do Piso</li>
          <li>Espaçamento do Piso</li>
          <li>Rodapé</li>
          <li>Mão de Obra</li>
          <li>Produtos Adicionais</li>
      </ul>
      <p class="text-center"><a href="<?php echo base_url("relatorios")?>" class="btn btn-default">Detalhes Adicionais do Orçamento</a></p>
  </div>
</div>
</div>

<div class="col-md-6">
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h2 class="panel-title">Passo 6 - Veja seu Relatório</h2>
  </div>
  <div class="panel-body">
      <?php if((!empty($_SESSION['AREA']))&&(!empty($_SESSION['PISO']))){
          //passos obrigatórios foram realizados, opção 
?>
        <p>Relatório já pode ser gerado, acesse e confira:</p>
        <p class="text-center"><a href="<?php echo base_url("relatorios")?>" class="btn btn-primary">Ver Relatório</a></p>
<?php      }else{
          //pedir ao usuário completar os passos antes de prosseguir
?>
        <p>Complete os passos obrigatórios para ver o seu relatório</p>
        <p class="text-center"><a href="<?php echo base_url("relatorios")?>" class="btn btn-default disabled">Ver Relatório</a></p>
<?php      }?>
  </div>        
</div>
</div>
</div>

