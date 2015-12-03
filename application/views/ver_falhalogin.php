<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 * <!--<form class="form-horizontal" action="<?php echo base_url()."login";?>" method="post">-->
 */


?>


<form class="form-horizontal" action="<?php echo base_url()."login";?>" method="post">

    <br><br>
    <!-- nome -->
    <div class="form-group">
        <label for="inputNome" class="col-sm-2 control-label">Nome: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" placeholder="Usuario1" >
        </div>
    </div>

    <div class="form-group">
        <label for="inputSenha" class="col-sm-2 control-label">Senha: </label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="senha" placeholder="123" >
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default" > Login</button>
        </div>
    </div>
    <br><a class="btn btn-primary" href="<?php echo base_url();?>">Entrar como Visitante</a></p>
     
</form>

           