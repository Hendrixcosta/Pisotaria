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
    if ($pisos !== FALSE) {
        if ($pisos->get_id() > 0) {
            echo "Editar";
        } else {
            echo "Inserir";
        }
    }
    ?> Piso<?php
    if(current_url()== (base_url("/index.php/pisos/customizado"))){
        echo " Customizado";
    }
    ?></h1>

<form class="form-horizontal" action="<?php
    if(current_url()==(base_url ("/index.php/pisos/customizado"))){
        echo base_url("pisos/customizado");
    }else{
        echo base_url("pisos/inserir");
        if ($pisos !== FALSE) {
            if ($pisos->get_id() > 0) {
                echo "/" . $pisos->get_id();
            }
        }
    }
    
    ?>" method="post">
<?php
 
if ($pisos !== FALSE) :
    if ($pisos->get_id() > 0) :
        ?>
            <div class="form-group<?php if(current_url()==(base_url ("/index.php/pisos/customizado"))){ echo " hidden";} ?>">
                <label for="inputId" class="col-sm-2 control-label">ID</label>
                <div class="col-sm-4">
                    <p class="form-control-static"><?php echo $pisos->get_id(); ?></p>
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
            <input type="text" class="form-control" name="nome" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_nome();
    } ?>">
        </div>
    </div>

    <!-- comprimento -->
    <div class="form-group">
        <label for="inputComprimento" class="col-sm-2 control-label">Comprimento</label>
        <div class="col-sm-4">
        <div class="input-group">
            <input type="text" class="form-control" name="comprimento" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_comprimento();
    } ?>">
            <div class="input-group-addon">cm</div>
        </div>
        </div>
    </div>

    <!-- largura -->
    <div class="form-group">
        <label for="inputLargura" class="col-sm-2 control-label">Largura</label>
        <div class="col-sm-4">
        <div class="input-group">
            <input type="text" class="form-control" name="largura" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_largura();
    } ?>">
            <div class="input-group-addon">cm</div>
        </div>
        </div>
    </div>

    <!-- altura -->
    <div class="form-group">
        <label for="inputAltura" class="col-sm-2 control-label">Altura</label>
        <div class="col-sm-4">
        <div class="input-group">
            <input type="text" class="form-control" name="altura" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_altura();
    } ?>">
            <div class="input-group-addon">mm</div>
        </div>
        </div>
    </div>

    <!-- preco -->
    <div class="form-group">
        <label for="inputPreco" class="col-sm-2 control-label">Preço</label>
        <div class="col-sm-4">
        <div class="input-group">
            <div class="input-group-addon">R$</div>
            <input type="text" class="form-control" name="preco" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_preco();
    } ?>">
        </div>
        </div>
    </div>

    <!-- resistencia -->
    <div class="form-group">
        <label for="inputResistencia" class="col-sm-2 control-label">Resistência (PEI)</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="resistencia" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_resistencia();
    } ?>">
        </div>
    </div>

    <!-- Quantidade por Caixa -->
    <div class="form-group">
        <label for="inputQuantidade" class="col-sm-2 control-label">Quantidade por Caixa</label>
        <div class="col-sm-4">
            <input type="number" class="form-control" name="quantidade" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_quantidade_embalagem();
    } ?>">
        </div>
    </div>

    <!-- tipo de piso -->
    <div class="form-group">
        <label for="inputTipo" class="col-sm-2 control-label">Tipo de Piso</label>
        <div class="col-sm-4">

            <select class="form-control" class="form-control" name="tipo">
                <option>Cerâmico</option>
                <option>Porcelanato</option>
                <option>Pastilha</option>
                <option>Laminado</option>
            </select>
        </div>
    </div>

    
    <!-- URL da imagem -->
    <div class="form-group">
        <label for="inputUrl" class="col-sm-2 control-label">URL da Imagem</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="url" value="<?php if ($pisos !== FALSE) {
        echo $pisos->get_urlImagem();
    } ?>">
        </div>
    </div>    

    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-4">
            <button type="submit" class="btn btn-default" ><?php
    if ($pisos !== FALSE) {
        if ($pisos->get_id() > 0) {
            echo "Atualizar";
        } else {
            echo "Cadastrar";
        }
    }
    ?> Piso (Admin)</button>
        </div>
    </div>
    
    <input type="hidden" name="acao" value="addPisoSession"/> 
</form>

        