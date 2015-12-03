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

            <!--Modal-->

                  <!-- Modal content-->
                  <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
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
                      <p>Não é membro?<a href=<?php echo base_url();?>>Visite-nos!</a></p>



                    </div>
                  </div>
                      </div>