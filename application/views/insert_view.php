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
<div id="container">
    <h1>Inserir Piso</h1>
    <form action="http://localhost/pisotaria/pisos/inserir" method="post">
        <?php
        if ($pisos !== FALSE) {
            if ($pisos->get_id() > 0) {
                echo <<<HTML
        ID: <input type="text" name="id" value="{$pisos->get_id()}"><br>
HTML;
            }
        }
        ?>

        Largura: <input type="text" name="largura" value="<?php if ($pisos !== FALSE) echo $pisos->get_largura(); ?>"><br>
        Preço: <input type="text" name="preco" value="<?php if ($pisos !== FALSE) echo $pisos->get_preco(); ?>"><br>
        Altura: <input type="text" name="altura" value="<?php if ($pisos !== FALSE) echo $pisos->get_altura(); ?>"><br>
        Nome: <input type="text" name="nome" value="<?php if ($pisos !== FALSE) echo $pisos->get_nome(); ?>"><br>
        PEI (resistencia): <input type="text" name="resistencia" value="<?php if ($pisos !== FALSE) echo $pisos->get_resistencia(); ?>"><br>
        Quantidade por caixa: <input type="text" name="quantidade" value="<?php if ($pisos !== FALSE) echo $pisos->get_quantidade_embalagem(); ?>"><br>
        <input type="submit">
    </form>
</div>