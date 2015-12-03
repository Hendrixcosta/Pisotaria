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

<h1>Detalhamento</h1>
<p>Especifique detalhes para melhor adequar o orçamento.</p>
<form action="<?php echo base_url("detalhamento"); ?>" method="POST">
<div class="row">
<div class="col-md-3 col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Alinhamento do Piso</h2>
        </div>
        <div class="panel-body">
            <p class="text-center">
                Como será o alinhamento dos pisos em relação à área?
            </p>
            <select  name="margem-seguranca" onchange="Guardar_Margem(this)" class="form-control col-md-2">
                <?php 
                $check0 = $check1 = $check2 ="";
                if (isset($_SESSION['MARGEMSEGURANCA'])) {
                    if ($_SESSION['MARGEMSEGURANCA'] == 10){
                        $check1 = 'selected';
                    }elseif ($_SESSION['MARGEMSEGURANCA'] == 25) {
                        $check2 = 'selected';
                    }
                }else {
                     $check0 = 'selected';
                }
                ?>
                <option value="10" <?php echo $check1.$check0; ?> >Horizontal</option>
                <option value="25" <?php echo $check2; ?> >Diagonal</option>
            </select>
        </div>

    </div>
</div>


<div class="col-md-3 col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Espaçamento do Piso</h2>
        </div>
        <div class="panel-body">
            <p class="text-center">
                Qual será o espaçamento entre os pisos assentados?
            </p>
            <select name="espacamento" onchange="Guardar_Espacamento(this)" class="form-control col-md-2" name="espacamento">

                
                <option value="10" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==10 ){ echo "selected";}?> >10 mm</option>
                <option value="9" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])== 9 ){ echo "selected";}?> >9 mm</option>
                <option value="8" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==8 ){ echo "selected";}?> >8 mm</option>
                <option value="7" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==7 ){ echo "selected";}?> >7 mm</option>
                <option value="6" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==6 ){ echo "selected";}?> >6 mm</option>
                <option value="5" <?php if (!isset ($_SESSION['ESPACAMENTO']) || ($_SESSION['ESPACAMENTO'])==5 ){ echo "selected";}?> >5 mm</option>
                <option value="4" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==4 ){ echo "selected";}?>  >4 mm</option>
                <option value="3" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==3 ){ echo "selected";}?> >3 mm</option>
                <option value="2" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==2 ){ echo "selected";}?> >2 mm</option>
                <option value="1" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==1 ){ echo "selected";}?> >1 mm</option>
                <option value="0" <?php if (isset ($_SESSION['ESPACAMENTO']) && ($_SESSION['ESPACAMENTO'])==0 ){ echo "selected";}?> >0 mm</option>

            </select>
        </div>

    </div>
</div>

<div class="col-md-3 col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Rodapé</h2>
        </div>
        <div class="panel-body">
            <p class="text-center">
                Será colocado rodapé utilizando o mesmo piso do local?
            </p>
            <select name="rodape" onchange="Guardar_Rodape(this)" class="form-control col-md-2">
                    <?php 
                        $check0 = $check1 = $check2 ="";
                        if (isset($_SESSION['RODAPE'])) {
                            if ($_SESSION['RODAPE'] == 'FALSE'){
                                $check1 = 'selected';
                            }elseif ($_SESSION['RODAPE'] == 'TRUE'){
                                $check2 = 'selected';
                            }
                        }else {
                                $check0 = 'selected';
                        }
                    ?>
                    <option value="FALSE" <?php echo $check1.$check0; ?> >Não</option>
                    <option value="TRUE" <?php echo $check2; ?> >Sim</option>
                </select>
        </div>

    </div>
</div>

<div class="col-md-3 col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title text-center">Mão de Obra</h2>
        </div>
        <div class="panel-body">
            <p class="text-center">
                Qual será o gasto de mão de obra por m²?
            </p>
            <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">R$</div>
                  <input type="number" class="form-control" <?php
                         if (isset($_SESSION['MAODEOBRA'])) {echo 'value="'.$_SESSION['MAODEOBRA'].'"';  }
                         
                         ?> id="exampleInputAmount" name="maoDeObra" placeholder="25" >
                  <div class="input-group-addon">.00</div>
                </div>
            </div>

        </div>
    </div>
</div>

</div>
<!--        <p class="text-center">
            <button  type="submit" class="btn btn-primary">Nao preciso desse botao</button>
        </p>-->
    </form>

<h2>Outros Produtos</h2>

<?php 
if($produtos){
    /**
     * Como inserir uma tabela utilizando a biblioteca "table" chamada na controller
     */
    
    //inserindo a classe de tabela do bootstrap na tabela
    $this->table->set_template(array('table_open'=> '<table class="table table-striped table-hover sortable">'));

    //setando a primeira linha da tabela
    $this->table->set_heading(array('Nome', 'Descrição', 'Preço', 'Tipo', ''));
    
    
    foreach($produtos as $produto){
        
        if (isset($_SESSION['PRODUTO'])) {
                if (in_array($produto->get_id(), $_SESSION['PRODUTO'])) {
                   $aux = "Remover";
               } else {
                   $aux = "Adicionar";
               } 
       }else {
                   $aux = 'Adicionar';
       }		

        //criando variaveis para cada botao, a fim de organizar a parada
        $botaoAdicionar = ' <button class="btn btn-primary btn-xs" onclick="produtoadd('.$produto->get_id().')"'." id="."produto". $produto->get_id()."  "
                . ">"
                . $aux
                . "</button>";
        //$botaoAdicionar = ' <button class="btn btn-primary btn-xs" onclick="produtoadd("' . $produto->get_id() . '") id="piso"' . "" . $produto->get_id() . '>Adicionar</button>';
        $botaoVer = ' <a href="' . base_url() . 'produtos/ver/' . $produto->get_id() . '" class="btn btn-default btn-xs" role="button">Ver</a>';
        
        if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))){
            $botaoEditar = ' <a href="' . base_url() . 'produtos/inserir/' . $produto->get_id() . '" class="btn btn-default btn-xs" role="button">Editar</a>';
            $botoes = $botaoAdicionar . $botaoVer . $botaoEditar;
        }  else {
            $botoes = $botaoAdicionar . $botaoVer;
        }           
        //adicionando cada linha na tabela com os atributos e botoes gerados
        $this->table->add_row(array(
            $produto->get_nome(), 
            $produto->get_descricao(), 
            $produto->get_preco(), 
            $produto->get_tipo(), 
            $botoes
            ));
    }

    //imprimindo a tabela
    echo $this->table->generate();
       
}else{
    echo '<p>Nenhum produto foi encontrado</p>';
}
