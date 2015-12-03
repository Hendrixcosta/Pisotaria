<?php
/*
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 * 
 * 
 * 
 * 
 */

    session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pisotaria</title>
        <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/pisotaria-style.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url("assets/tablesorter.js"); ?>"></script> 
        <script type="text/JavaScript" src="<?php echo base_url("assets/jsDraw2D.js"); ?>"></script> 
<!--        <script type="text/javascript" src="<?php echo base_url("assets/jquery-latest.js"); ?>"></script> -->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="padding-top: 70px;">
     <?php 
     
     //mensagem que carrega toda hora que o usuário está logado
    if ((isset($_SESSION['LOGIN'])) && (!empty($_SESSION['LOGIN']))) {
        // echo "<h4>Seja Bem vindo, ". $_SESSION['LOGIN'] . "!</h4>";
    
        //Se estiver logado carrega este nav: 
    ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(""); ?>">Pisotaria</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url();?>area">Área</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pisos <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url();?>pisos/ver">Listar Pisos</a></li>
                                <li><a href="<?php echo base_url();?>pisos/inserir">Inserir Piso BD</a></li>
                                <li><a href="<?php echo base_url();?>pisos/customizado">Customizar Piso</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Argamassa <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url("argamassa/ver");?>">Listar Argamassas</a></li>
                                <li><a href="<?php echo base_url("argamassa/inserir");?>">Inserir Argamassa</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rejunte <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url("rejunte/ver");?>">Listar Rejuntes</a></li>
                                <li><a href="<?php echo base_url("rejunte/inserir");?>">Inserir Rejunte</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url();?>detalhamento">Detalhamento</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Relatórios <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url("relatorios");?>">Relatório Corrente</a></li>
                                <li><a href="<?php echo base_url("relatorios/historico");?>">Histórico de Relatórios</a></li>
                            </ul>
                        </li>
<!--                        <li><a href="<?php echo base_url();?>relatorios">Relatórios</a></li> -->
                    </ul>
<!--                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Sobre <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Disciplina</a></li>
                                <li><a href="#">Trabalho</a></li>
                                <li><a href="#">Alunos</a></li>
                                <li><a href="#">Mapa do site</a></li>
                            </ul>
                        </li>
                    </ul>
-->                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['LOGIN']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url("usuarios");?>">Ver Perfil</a></li>
                                <li><a href="<?php echo base_url("usuarios/logout");?>">Logout</a></li>
                            </ul>
                        </li>

                    </ul>
                    
                </div>
            </div>
        </nav>
        <div class="container">
    <?php
    
    } else { //se nao carreha esse nav para quem nao esta logado
        
    ?>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(""); ?>">Pisotaria</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url();?>area">Área</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pisos <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url();?>pisos/ver">Pisos</a></li>
                                <li><a href="<?php echo base_url();?>pisos/customizado">Customizar Piso</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url();?>argamassa/ver">Argamassa</a></li>
                        <li><a href="<?php echo base_url();?>rejunte/ver">Rejunte</a></li>
                        <li><a href="<?php echo base_url();?>detalhamento">Detalhamento</a></li>
                        <li><a href="<?php echo base_url();?>relatorios">Relatórios</a></li>
                    </ul>
<!--                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Sobre <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Disciplina</a></li>
                                <li><a href="#">Trabalho</a></li>
                                <li><a href="#">Alunos</a></li>
                                <li><a href="#">Mapa do site</a></li>
                            </ul>
                        </li>
                    </ul>
-->                    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="login-btn" onclick="login()">Login</a></li>                       
                    </ul>
                    
                </div>
            </div>
        </nav>
        <div class="container">   
            
        <?php
        }
        ?> 
            
            <!--Modal-->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
                    </div>
                    <div class="modal-body">
                      <form  class="form-horizontal" action="<?php echo base_url()."login";?>" method="post" >
                        <div class="form-group">
                          <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                          <input type="text" class="form-control" name="nome" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                          <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                          <input type="password" class="form-control" name="senha"  placeholder="Senha">
                        </div>
                        <div class="checkbox">

                        </div>
                        <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                      <p>Não é membro?<a href=<?php echo base_url("usuarios/cadastrar");?> >Cadastre!</a></p>

                    </div>
                  </div>
                </div>
              </div> 
            
            <div class="hidden" id="urlBase"><?php echo base_url()?></div>