<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */
$count = 0;
?>
<h1>Meus Relatórios Salvos</h1>

<div class="row">
    <?php
    if (isset($relatorios))
{    foreach ($relatorios as $relatorio) {
        $count++;
        ?>
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <div class="caption">
                <h3 class="text-center piso-nome" style="margin-top: 5px;"><?php if(empty($relatorio['nome'])){ echo "Meu Relatório " . $count; } else { echo $relatorio['nome']; } ?></h3>
                <p class="text-justify"><?php if(empty($relatorio['descricao'])){ echo "Descrição não setada do Relatório " . $count . '. Clique em "Ver Relatório" para visualizar o comparativo de gasto para instalação dos pisos.'; } else { echo $relatorio['descricao']; } ?></p>
                <p class="text-center"><a href="<?php echo base_url("relatorios/historico/" . $relatorio['id']); ?>" class="btn btn-primary" role="button">Ver Relatório</a></p>
            </div>
        </div>
    </div>
    <?php 
    if ($count % 4 == 0){ ?>
</div>
<div class="row">
    <?php
    
    }
}} ?>
</div>