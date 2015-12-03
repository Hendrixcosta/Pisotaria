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
        <h1>Pisotaria</h1>
        <p>Menu:</p>
        <p>
            <ul>
                <li><a href="<?php echo base_url("pisos") ?>">Pisos</a></li>
                <li><a href="<?php echo base_url("produtos") ?>">Produtos</a></li>
                <li><a href="<?php echo base_url("relatorio") ?>">Relatorio</a></li>
                <li><a href="<?php echo base_url("usuarios") ?>">Usuarios</a></li>
                <li><a href="<?php echo base_url("api") ?>">API</a></li>
            </ul>
        </p> 