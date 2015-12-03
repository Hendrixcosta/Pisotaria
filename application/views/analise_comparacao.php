<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */
$menorValor = 9999999999;
foreach ($analises as $analise){
    if($menorValor > $analise['custoTotal']){
        $menorValor = $analise['custoTotal'];
    }
}
?>


<div class="row pricing-tables">
<?php if(isset($analises)){ 
     foreach ($analises as $analise) {
     ?>

    <div class="col-md-4 col-sm-6"><div class="pricing-table<?php if($menorValor == $analise['custoTotal']){ echo " highlight-plan"; } ?>">
        <div class="plan-name">
                <h3 class="text-center piso-nome"><?php echo $analise['nomePiso'] ?></h3>
        </div>
        <div class="plan-price">
            <div class="price-value">R$ <?php echo floor($analise['custoTotal']); ?><span>.<?php 
                $centavos = ceil(($analise['custoTotal'] - floor($analise['custoTotal'])) * 100);
                if($centavos < 10){
                    echo '0' . $centavos;
                }else{
                    echo $centavos;
                }
?></span></div>
        </div>
        <div class="plan-list">
            <ul class="list-unstyled">
                        <li>Custo com Pisos: <strong>R$ <?php echo $analise['custoPiso'] ?></strong></li>
                        <li>Pisos Utilizados: <strong><?php echo $analise['qtdPiso'] ?></strong></li>
                        <li>Pisos Desperdiçados: <strong><?php echo $analise['qtdDesperdicio'] ?></strong></li>
                        <li>Custo de Rejunte: <strong>R$ <?php echo $analise['custoRejunte'] ?></strong></li>
                        <li>Custo de Argamassa: <strong>R$ <?php echo $custoArgamassa ?></strong></li>
                        <li>Custo de Mão de obra: <strong>R$ <?php echo $custoMaodeObra ?></strong></li>
                        <li>Custo de Produtos: <strong>R$ <?php echo $custoProdutos ?></strong></li>
                </ul>
        </div>
        <div class="plan-signup">
                <a href="#" class="btn-system btn-small<?php if($menorValor == $analise['custoTotal']){ echo " border-btn"; } ?>">Pedir Orçamento</a>
        </div>
    </div></div>
    
<?php } }?>
</div>