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
<h1>Pisos</h1>
<p>Escolha uma opção:</p>
<ul class="nav nav-pills nav-justified navbar-left"">
    <li role="presentation"><a href="<?php echo base_url("pisos") ?>">Pisos</a></li>
    <li role="presentation"><a href="<?php echo base_url("pisos/ver") ?>">Listar Pisos</a></li>
    <li role="presentation"><a href="<?php echo base_url("pisos/inserir") ?>">Inserir Pisos</a></li>
    <li role="presentation"><a href="<?php echo base_url("pisos/customizado") ?>">Customizar Piso</a></li>
</ul>