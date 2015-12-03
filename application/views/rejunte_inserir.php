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
<h1><?php
    if ($rejuntes !== FALSE) {
        if ($rejuntes->get_id() > 0) {
            echo "Editar";
        } else {
            echo "Inserir";
        }
    }
    ?> Rejunte</h1>

<form class="form-horizontal" action="<?php
    echo base_url("rejunte/inserir");
    if ($rejuntes !== FALSE) {
        if ($rejuntes->get_id() > 0) {
            echo "/" . $rejuntes->get_id();
        }
    }
    
    ?>" method="post">
<?php
if ($rejuntes !== FALSE) :
    if ($rejuntes->get_id() > 0) :
        ?>
            <div class="form-group">
                <label for="inputId" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-4">
                    <p class="form-control-static"><?php echo $rejuntes->get_id(); ?></p>
                </div>
            </div>
            <?php
    endif;
endif;
    ?>
    <!-- nome -->
    <div class="form-group">
        <label for="inputNome" class="col-sm-2 control-label">Nome</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="nome" value="<?php if ($rejuntes !== FALSE) {
        echo $rejuntes->get_nome();
    } ?>">
        </div>
    </div>

    <!-- comprimento -->
    <div class="form-group">
        <label for="inputDescricao" class="col-sm-2 control-label">Descrição</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="descricao" value="<?php if ($rejuntes !== FALSE) {
        echo $rejuntes->get_descricao();
    } ?>">
        </div>
    </div>
    
    <!-- tipo de piso -->
    <div class="form-group">
        <label for="inputTipo" class="col-sm-2 control-label">Tipo de Rejunte</label>
        <div class="col-sm-4">
            <select class="form-control" class="form-control" name="tipo">
                <option value="epoxi">Epóxi</option>
                <option value="flexivel">Flexível</option>
                <option value="acrilico">Acrílico</option>
            </select>
        </div>
    </div>

    <!-- peso -->
    <div class="form-group">
        <label for="inputPeso" class="col-sm-2 control-label">Peso</label>
        <div class="col-sm-4">
        <div class="input-group">
            <input type="text" class="form-control" name="peso" value="<?php if ($rejuntes !== FALSE) {
        echo $rejuntes->get_peso();
    } ?>">
            <div class="input-group-addon">Kg</div>
        </div>
        </div>
    </div>
        
    <!-- preco -->
    <div class="form-group">
        <label for="inputPreco" class="col-sm-2 control-label">Preço</label>
        <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-addon">R$</div>
            <input type="text" class="form-control" name="preco" value="<?php if ($rejuntes !== FALSE) {
        echo $rejuntes->get_preco();
    } ?>">
        </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default" ><?php
    if ($rejuntes !== FALSE) {
        if ($rejuntes->get_id() > 0) {
            echo "Atualizar";
        } else {
            echo "Cadastrar";
        }
    }
    ?> Rejunte (Admin)</button>
        </div>
    </div>
    
    <input type="hidden" name="acao" value="addPisoSession"/> 
</form>

        