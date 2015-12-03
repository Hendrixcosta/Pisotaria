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
    <h1>Inserir Usuario</h1>
    <form action="http://localhost/pisotaria/usuarios/inserir" method="post">
        <?php
        if ($users !== FALSE) {
            if ($users->get_id() > 0) {
                echo <<<HTML
        ID: <input type="text" name="id" value="{$users->get_id()}"><br>
HTML;
            }
        }
        ?>
        Nome: <input type="text" name="nome" value="<?php if ($users !== FALSE) echo $users->get_nome(); ?>"><br>
        CPF: <input type="text" name="cpf" value="<?php if ($users !== FALSE) echo $users->get_cpf(); ?>"><br>
        e-mail: <input type="text" name="email" value="<?php if ($users !== FALSE) echo $users->get_email(); ?>"><br>
        <input type="submit">
    </form>
</div>