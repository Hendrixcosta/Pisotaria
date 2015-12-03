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
                <li><a href="<?php echo base_url("pisos") ?>">/pisos</a></li>
                <ul>
                    <li><a href="<?php echo base_url("pisos/inserir") ?>">/inserir</a></li>
                    <li><a href="<?php echo base_url("pisos/ver") ?>">/ver</a></li>
                </ul>
                <li><a href="<?php echo base_url("produtos") ?>">/produtos</a></li>
                <ul>
                    <li><a href="<?php echo base_url("produtos/inserir") ?>">/inserir</a></li>
                    <li><a href="<?php echo base_url("produtos/ver") ?>">/ver</a></li>
                </ul>
                <li><a href="<?php echo base_url("relatorios") ?>">/relatorios</a></li>
                <li><a href="<?php echo base_url("usuarios") ?>">/usuarios</a></li>
                <ul>
                    <li><a href="<?php echo base_url("usuarios/inserir") ?>">/inserir</a></li>
                    <li><a href="<?php echo base_url("usuarios/ver") ?>">/ver</a></li>
                </ul>
                <li><a href="<?php echo base_url("api") ?>">/API</a></li>
                <ul>
                    <li><a href="<?php echo base_url("api/pisos") ?>">/pisos</a></li>
                    <li><a href="<?php echo base_url("api/produtos") ?>">/produtos</a></li>
                    <li><a href="<?php echo base_url("api/usuarios") ?>">/usuarios</a></li>
                    <li><a href="<?php echo base_url("api/relatorio") ?>">/relatorio</a></li>
                </ul>
            </ul>
        </p>