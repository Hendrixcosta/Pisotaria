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
    <?php
//Check to see if pisos could be found
if ($pisos !== FALSE) {
    
//Do we have an array of pisos or just a single piso object?
    if (is_array($pisos) && count($pisos)) {
    //Loop through all the pisos and create a row for each within the table 
?>
            <div class="row">
<?php
        $count = 0;
        foreach ($pisos as $piso) {
            if( ($count % 4) == 0 ){
                echo '</div><div class="row">';
            }
        ?>

                <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo $piso->get_urlImagem();?>" style="width: 160px; height: 160px;">
                  <div class="caption">
                    <h3><?php echo $piso->get_nome() ?></h3>
                    <ul class="list-unstyled">
                        <li>Comprimento: <?php echo $piso->get_comprimento() ?></li>
                        <li>Largura: <?php echo $piso->get_largura() ?></li>
                        <li>Altura: <?php echo $piso->get_altura() ?></li>
                        <li>Resistência: <?php echo $piso->get_resistencia() ?></li>
                        <li>Preço: <?php echo $piso->get_preco() ?></li>
                        <li>Quantidade/Embalagem: <?php echo $piso->get_quantidade_embalagem() ?></li>
                        
                    </ul>
                    <p class="text-center">
                        <?php 
//                        $id=$piso->get_id();
//                        $nome=$piso->get_nome();
//                        echo $id;
//                        echo $nome;
//                        echo "<button class='btn btn-primary' onclick=(\" Nero Preto  Triunfo\",\"1\") type='button' id=piso1>Remover2</button>";
//                        
                        if (isset($_SESSION['PISO'])) {
                                    if (in_array($piso->get_id(), $_SESSION['PISO'])) {?>
                                        <button  class="btn btn-primary" onclick="pisoadd(<?php
                                            $id=$piso->get_id();
                                            $nome=$piso->get_nome();
                                            echo "'".$nome."'".","."'".$id."'";
                                            ?>)" id="<?php echo "piso".$piso->get_id()?>">Remover</button> 
                                    <?php            
                                    } else { ?>
                                      <button  class="btn btn-primary" onclick="pisoadd(<?php
                                            $id=$piso->get_id();
                                            $nome=$piso->get_nome();
                                            echo "'".$nome."'".","."'".$id."'";
                                            ?>)" id="<?php echo "piso".$piso->get_id()?>">Adicionar</button>  
                                    <?php                                                                                                                         
                                    } 
                        }else { ?>
                                    <button  class="btn btn-primary" onclick="pisoadd(<?php
                                            $id=$piso->get_id();
                                            $nome=$piso->get_nome();
                                            echo "'".$nome."'".","."'".$id."'";
                                            ?>)" id="<?php echo "piso".$piso->get_id()?>">Adicionar</button> 
                        <?php
                        }
                        ?>                        
                        
                        <a href="<?php if(isset($url)){echo $url . "pisos/ver/" . $piso->get_id();} ?>" class="btn btn-default" role="button">Ver</a> <?php
                        if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))){
                        ?>
                        <a href="<?php if(isset($url)){echo $url . "pisos/inserir/" . $piso->get_id();} ?>" class="btn btn-default" role="button">Editar</a>
                        <?php } ?>
                    </p>
                  </div>
                </div>
              </div>
<?php
$count++;
}
?>
            </div>
<?php
} else {
//Only a single piso object so just create one row within the table
?>
<div class="row">
    
        <div class=" col-sm-4 col-md-3">
              <img class="media-object thumbnail" src="<?php echo $pisos->get_urlImagem();?>" style="width: 200px; height: 200px;" alt="1">
        </div>
        <div class=" col-sm-8 col-md-9">
            <h1><?php echo $pisos->get_nome() ?> <small><?php echo $pisos->get_tipo() ?></small></h1>
                
            <h2>Comprimento</h2>
            <p> Este piso possui <strong><?php echo $pisos->get_comprimento() ?> cm</strong> de comprimento.</p>
            <h2>Largura</h2>
            <p> Este piso possui <strong><?php echo $pisos->get_largura() ?> cm</strong> de largura.</p>
            <h2>Altura</h2>
            <p> Este piso possui <strong><?php echo $pisos->get_altura() ?> mm</strong> de altura.</p>
            <h2>Resistência</h2>
            <p> Este piso possui uma resistência de <strong><?php echo $pisos->get_resistencia() ?></strong>.</p>
            <h2>Preço</h2>
            <p> Este piso custa <strong>R$ <?php echo $pisos->get_preco() ?></strong>.</p>
            <h2>Quantidade/Embalagem</h2>
            <p> Este piso possui <strong><?php echo $pisos->get_quantidade_embalagem() ?> unidades</strong> por caixa.</p>
            
            <h2>Descrição</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut enim sit amet urna tempus ultricies. Sed nec auctor neque, vel hendrerit sem. Nullam dapibus sapien eget nunc eleifend, nec cursus velit condimentum. Quisque auctor vitae ligula pretium blandit. Sed accumsan nulla metus, non eleifend nibh euismod non. Pellentesque sit amet hendrerit nisi. Nam tincidunt mauris sit amet dolor ultricies pharetra. Phasellus quis faucibus lectus. Curabitur et ante ac urna rhoncus faucibus. Mauris eget suscipit risus. Integer ut urna facilisis, malesuada justo pretium, molestie mauris. Sed consequat sagittis egestas. In in dui felis. Nulla ex turpis, interdum gravida scelerisque lacinia, tristique non ex. Phasellus leo justo, porttitor in dui vel, tincidunt molestie mi.</p>
            <p>Phasellus rhoncus, lacus nec convallis scelerisque, urna tortor volutpat sapien, nec interdum lacus augue quis neque. In sit amet est vitae leo auctor pharetra. Nulla facilisi. Praesent rutrum ac quam in ultrices. Praesent massa nulla, molestie in mollis non, accumsan non justo. Cras a blandit odio. Donec sit amet est leo. Donec semper molestie mi, id dapibus nibh pharetra eget. Donec luctus fermentum purus eget luctus. Cras at pharetra sem. Sed in sagittis massa, in sodales lacus.</p>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <?php /**
<div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="<?php echo $pisos->get_urlImagem();?>" style="width: 160px; height: 160px;">
                  <div class="caption">
                    <h3><?php echo $pisos->get_nome() ?></h3>
                    <ul class="list-unstyled">
                        <li>Comprimento: <?php echo $pisos->get_comprimento() ?></li>
                        <li>Largura: <?php echo $pisos->get_largura() ?></li>
                        <li>Altura: <?php echo $pisos->get_altura() ?></li>
                        <li>Resistência: <?php echo $pisos->get_resistencia() ?></li>
                        <li>Preço: <?php echo $pisos->get_preco() ?></li>
                        <li>Quantidade/Embalagem: <?php echo $pisos->get_quantidade_embalagem() ?></li>
                        
                    </ul>
                    <p>
                        <?php 
//                        $id=$piso->get_id();
//                        $nome=$piso->get_nome();
//                        echo $id;
//                        echo $nome;
//                        echo "<button class='btn btn-primary' onclick=(\" Nero Preto  Triunfo\",\"1\") type='button' id=piso1>Remover2</button>";
//                        
                        if (isset($_SESSION['PISO'])) {
                                    if (in_array($pisos->get_id(), $_SESSION['PISO'])) {?>
                                        <button  class="btn btn-primary" onclick="pisoadd(<?php
                                            $id=$pisos->get_id();
                                            $nome=$pisos->get_nome();
                                            echo "'".$nome."'".","."'".$id."'";
                                            ?>)" id="<?php echo "piso".$pisos->get_id()?>">Remover</button> 
                                    <?php            
                                    } else { ?>
                                      <button  class="btn btn-primary" onclick="pisoadd(<?php
                                            $id=$pisos->get_id();
                                            $nome=$pisos->get_nome();
                                            echo "'".$nome."'".","."'".$id."'";
                                            ?>)" id="<?php echo "piso".$pisos->get_id()?>">Adicionar</button>  
                                    <?php                                                                                                                         
                                    } 
                        }else { ?>
                                    <button  class="btn btn-primary" onclick="pisoadd(<?php
                                            $id=$pisos->get_id();
                                            $nome=$pisos->get_nome();
                                            echo "'".$nome."'".","."'".$id."'";
                                            ?>)" id="<?php echo "piso".$pisos->get_id()?>">Adicionar</button> 
                        <?php
                        }
                        ?>                        
                        
                        <a href="<?php if(isset($url)){echo $url . "pisos/ver/" . $pisos->get_id();} ?>" class="btn btn-default" role="button">Ver</a> 
                        <a href="<?php if(isset($url)){echo $url . "pisos/inserir/" . $pisos->get_id();} ?>" class="btn btn-default" role="button">Editar</a>
                    </p>
                  </div>
                </div>
              </div>  */?>
</div>

<?php }

}
else {
//Now piso could be found so display an error messsage to the piso
echo <<<HTML

			<p>Não foi encontrado nenhum piso, tente novamente.</p>

HTML;
}
//echo "<br><br><a href='http://localhost/pisotaria/Produtos'>Voltar pra seleção</a>";


