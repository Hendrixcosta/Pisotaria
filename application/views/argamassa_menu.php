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
<ul class="nav nav-pills nav-justified navbar-left"">
    <li role="presentation"<?php
        if(site_url("argamassa") == current_url()){ 
            echo ' class="active"'; 
        }?>><a href="<?php echo base_url("argamassa") ?>">Argamassa</a></li>
    <li role="presentation"<?php 
        if(site_url("argamassa/ver") == current_url()){ 
            echo ' class="active"'; 
        }?>><a href="<?php echo base_url("argamassa/ver") ?>">Listar Argamassas</a></li>
    <li role="presentation"<?php 
        if(site_url("argamassa/inserir") == current_url()){ 
            echo ' class="active"'; 
        }?>><a href="<?php echo base_url("argamassa/inserir") ?>">Inserir Argamassa</a></li>
</ul>