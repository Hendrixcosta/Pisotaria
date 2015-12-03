<?php

/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */

if(isset($mensagem)){
    $this->load->view('template/mensagem', $mensagem);
}

?>


    <h1><?php echo $h1; ?></h1>

<?php

    echo form_open(base_url('usuarios'), array('class' => "form-horizontal"));
    $label = array(
        'type'  => 'submit',
        'class' => 'btn btn-default'
    );

    //
    //
    //inserindo campo ESCONDIDO para armazenar o ID do usuário
    //
    //
    if(site_url("usuarios/cadastrar") != current_url()){
        echo '<div class="form-group">';
        echo form_label("ID", 'id', array('class' => "col-sm-2 control-label"));
        echo '<div class="col-sm-6 col-md-4">';
        echo form_input(array(
            'type'          => "text",
            'class'         => "form-control",
            'name'          => "id",
            'readonly'      => ""
    //        'id'            => "exampleInputPassword1",
    //        'placeholder'   => "Insira seu nome"
            ), 
                $users->get_id());        //setar aqui o nome do usuario
        echo '</div>';
        echo '</div>';
    }
    
    
    //inserindo campo Nome Completo do usuário
    echo '<div class="form-group">';
    echo form_label("Nome completo", 'nome', array('class' => "col-sm-2 control-label"));
    echo '<div class="col-sm-6 col-md-4">';
    echo form_input(array(
        'type'          => "text",
        'class'         => "form-control",
        'name'          => "nome",
//        'id'            => "exampleInputPassword1",
        'placeholder'   => "Insira seu nome"
        ), 
            '');        //setar aqui o nome do usuario
    echo '</div>';
    echo '</div>';
    
    //inserindo campo usuário
    echo '<div class="form-group">';
    echo form_label("username", 'username', array('class' => "col-sm-2 control-label"));
    echo '<div class="col-sm-6 col-md-4">';
    echo form_input(array(
        'type'          => "text",
        'class'         => "form-control",
        'name'          => "username",
//        'id'            => "exampleInputPassword1",
        'placeholder'   => "Insira o login desejado"
        ), 
           $users->get_nome());        //setar aqui o nome do usuario
    echo '</div>';
    echo '</div>';

    //inserindo campo senha
    echo '<div class="form-group">';
    echo form_label("Senha", 'senha', array('class' => "col-sm-2 control-label"));
    echo '<div class="col-sm-6 col-md-4">';
    echo form_input(array(
        'type'          => "password",
        'class'         => "form-control",
        'name'          => "senha",
//        'id'            => "exampleInputPassword1",
        'placeholder'   => "Definir senha"
        ), $users->get_cpf());        //setar aqui a senha
    echo '</div>';
    echo '</div>';

    //inserindo email
    echo '<div class="form-group">';
    echo form_label("e-mail", 'email', array('class' => "col-sm-2 control-label"));
    echo '<div class="col-sm-6 col-md-4">';
    echo form_input(array(
        'type'          => "text",
        'class'         => "form-control",
        'name'          => "email",
//        'id'            => "exampleInputPassword1",
        'placeholder'   => "Insira seu e-mail"
        ), 
            $users->get_email());        //setar aqui o email
    echo '</div>';
    echo '</div>';

    //inserindo botão do formulário
    echo '<div class="form-group">';
    echo '<div class="col-sm-offset-2 col-sm-10">';
    echo form_button(
            array(          //primeiro campo, atributos da tag button
                'type'  => 'submit',
                'class' => 'btn btn-default'
            ),
            "Salvar");// segundo campo, texto dentro da tag
    echo '</div>';
    echo '</div>';

    echo form_close();