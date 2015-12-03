<?php
/*
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */
get_instance()->load->helper('url');
?>
<div id="container">
    <h1>Inserir Piso</h1>
    <form action="<?php echo base_url("produtos/inserir") ?>" method="post">
        <?php
        if ($produtos !== FALSE) {
            if ($produtos->get_id() > 0) {
                echo <<<HTML
                            ID: <input type="text" name="id" value="{$produtos->get_id()}"><br>
HTML;
            }
        }
        ?>

        Nome: <input type="text" name="nome" value="<?php if ($produtos !== FALSE) echo $produtos->get_nome(); ?>"><br>
        Descrição: <input type="text" name="largura" value="<?php if ($produtos !== FALSE) echo $produtos->get_descricao(); ?>"><br>
        Peso: <input type="text" name="altura" value="<?php if ($produtos !== FALSE) echo $produtos->get_peso(); ?>"><br>
        Preço: <input type="text" name="preco" value="<?php if ($produtos !== FALSE) echo $produtos->get_preco(); ?>"><br>
        Tipo: <input type="text" name="nome" value="<?php if ($produtos !== FALSE) echo $produtos->get_tipo(); ?>"><br>
        <input type="submit">
    </form>
</div>