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
    if ($argamassas !== FALSE) {
        if ($argamassas->get_id() > 0) {
            echo "Editar";
        } else {
            echo "Inserir";
        }
    }
    ?> Argamassa</h1>

<form class="form-horizontal" action="<?php
    echo base_url("argamassa/inserir");
    if ($argamassas !== FALSE) {
        if ($argamassas->get_id() > 0) {
            echo "/" . $argamassas->get_id();
        }
    }
    
    ?>" method="post">
<?php
if ($argamassas !== FALSE) :
    if ($argamassas->get_id() > 0) :
        ?>
            <div class="form-group">
                <label for="inputId" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-4">
                    <p class="form-control-static"><?php echo $argamassas->get_id(); ?></p>
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
            <input type="text" class="form-control" name="nome" value="<?php if ($argamassas !== FALSE) {
        echo $argamassas->get_nome();
    } ?>">
        </div>
    </div>

    <!-- comprimento -->
    <div class="form-group">
        <label for="inputDescricao" class="col-sm-2 control-label">Descrição</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="descricao" value="<?php if ($argamassas !== FALSE) {
        echo $argamassas->get_descricao();
    } ?>">
        </div>
    </div>
    
    <!-- tipo de piso -->
    <div class="form-group">
        <label for="inputTipo" class="col-sm-2 control-label">Tipo de Argamassa</label>
        <div class="col-sm-4">
            <select class="form-control" class="form-control" name="tipo">
                <option value="aci">ACI</option>
                <option value="acii">ACII</option>
                <option value="aciii">ACIII</option>
                <option value="aciiie">ACIII E</option>
<!--                <option value="acrilica">Acrílica</option>
                <option value="basica">Básica</option>
                <option value="bloco vidro">Bloco de Vidro</option>
                <option value="cimento queimado">Cimento Queimado</option>
                <option value="colante">Colante</option>
                <option value="contrapiso">Contrapiso</option>
                <option value="massa pronta">Massa Pronta</option>
                <option value="mineral">Mineral</option>
                <option value="polimerica">Polimérica</option>
-->
            </select>
        </div>
    </div>

    <!-- peso -->
    <div class="form-group">
        <label for="inputPreco" class="col-sm-2 control-label">Peso</label>
        <div class="col-sm-4">
        <div class="input-group">
            <input type="text" class="form-control" name="peso" value="<?php if ($argamassas !== FALSE) {
        echo $argamassas->get_peso();
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
            <input type="text" class="form-control" name="preco" value="<?php if ($argamassas !== FALSE) {
        echo $argamassas->get_preco();
    } ?>">
        </div>
        </div>
    </div>
    
        <!-- rendimento -->
    <div class="form-group">
        <label for="inputRendimento" class="col-sm-2 control-label">Rendimento</label>
        <div class="col-sm-4">
        <div class="input-group">
            <input type="text" class="form-control" name="rendimento" value="<?php if ($argamassas !== FALSE) {
        echo $argamassas->get_rendimento();
    } ?>">
            <div class="input-group-addon">kg/m²</div>
        </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default" ><?php
    if ($argamassas !== FALSE) {
        if ($argamassas->get_id() > 0) {
            echo "Atualizar";
        } else {
            echo "Cadastrar";
        }
    }
    ?> Argamassa (Admin)</button>
        </div>
    </div>
    
    <input type="hidden" name="acao" value="addPisoSession"/> 
</form>

        