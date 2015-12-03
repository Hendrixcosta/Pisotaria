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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#statusbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand" href="#">Selecionados</span>
    </div>

    <div class="collapse navbar-collapse" id="statusbar-collapse">
      <ul class="nav navbar-nav">

        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pisos <span id="pisos_selecionados"  class="badge"><?php 
        if (!empty($_SESSION['PISO'])){
                 echo count($_SESSION['PISO']);
        }else {
            echo "0";
        }
        ?></span><span class="caret"></span></a>
        
                            <ul class="dropdown-menu" role="menu" id="pisos_selecionados_SB">
                                
                                <?php
                                        $PisosNome = array();
                                        $PisosIds = array();
                                        
                                       //cria um array e coleta os PISOS---------------------------------------
                                        if (!empty($_SESSION['NOME'])) {
                                            foreach ($_SESSION['NOME'] as $PisoNome) {
                                                    array_push($PisosNome, $PisoNome);
                                            }
                                            foreach ($_SESSION['PISO'] as $PisoId){
                                                    array_push($PisosIds, $PisoId);
                                            }
                                            
                                            $j=0;  
                                            foreach ($PisosNome as $Nome){
                                            echo '<li><p>';
                                            echo "<a href=/pisos/ver/" . $PisosIds[$j] . ">" . ($Nome) . "</a> ";
                                            echo '<span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="pisoadd('
                                                . "'".$Nome."'".","."'".$PisosIds[$j]."'"
                                                . ')"'
                                                . "' ></span>";
                                            echo "</p></li>";
                                            $j++;
                                            }

                                        } else {
                                            echo "Adicione 1 PIso!" ;
                                        }

                                        
                                        //glyphicon glyphicon-remove
                                        //----------------------------------------------------------------------
                                
                                ?>
                                
                            </ul>
                        </li>
        
        


        
        <li><a href="<?php echo base_url("rejunte/ver"); ?>">Rejunte <span id="rejunte_selecionados" class="badge">
                    <?php if (isset($_SESSION['NOME_REJUNTE'])){
                echo '<span class="glyphicon glyphicon-check" aria-hidden="false"></span> '.$_SESSION['NOME_REJUNTE'];
            }else {
                echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="false"></span>';
            }
            ?>
                                                                 </span></a></li>
        <li><a href="<?php echo base_url("argamassa/ver"); ?>">Argamassa <span id="argamassa_selecionados" class="badge">
            <?php if (!empty($_SESSION['ARGAMASSA'])){
                echo '<span class="glyphicon glyphicon-check" aria-hidden="false"></span> '.$_SESSION['NOME_ARGAMASSA'];
            }else {
                echo '<span class="glyphicon glyphicon-unchecked" aria-hidden="false"></span>';
            }
            ?>
                    
                    
                                                                    </span></a></li>
        <li><a href="<?php echo base_url("area"); ?>">Area <span class="badge" id="area_calculada"><?php 
        if (!empty($_SESSION['AREA'])){
                 echo $_SESSION['AREA'] . " m²";
        }else {
            echo "0";
        }
        ?></span></a></li>
      </ul>
        <form class="navbar-form navbar-right" role="search">
            <button type="button" onclick="limpar_selecao()" class="btn btn-default" role="button">Limpar Seleções</button>
        </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


