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
        if(site_url("rejunte") == current_url()){ 
            echo ' class="active"'; 
        }?>><a href="<?php echo base_url("rejunte") ?>">Rejunte</a></li>
    <li role="presentation"<?php 
        if(site_url("rejunte/ver") == current_url()){ 
            echo ' class="active"'; 
        }?>><a href="<?php echo base_url("rejunte/ver") ?>">Listar Rejuntes</a></li>
    <li role="presentation"<?php 
        if(site_url("rejunte/inserir") == current_url()){ 
            echo ' class="active"'; 
        }?>><a href="<?php echo base_url("rejunte/inserir") ?>">Inserir Rejunte</a></li>
</ul>