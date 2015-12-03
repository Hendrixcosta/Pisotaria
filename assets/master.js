/* 
 * Arquivo do projeto Pisotaria para disciplina SIT150 (Cliente/Servidor) da UNIFEI
 * Autores:
 * 	Adan Reno
 * 	Fernando Marcato
 * 	Hendrix Silva
 * 	Thiago Sales
 */

// INSERIR TODOS OS CÓDIGOS JAVA SCRIPT NESSE ARQUIVO

//variavel Global para setar o caminho do servidor:
nome_server = document.getElementById("urlBase").innerHTML;
Sessao = nome_server + "Session";
    

function testa(id){

alert (id);
}

    
function login(){
           $("#myModal").modal('show', {keyboard: true});
    
}    

$('input#exampleInputAmount').bind('blur', function(){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "MaodeObra",
            acao:"add",
            valor : (this.value)            
        },
        success : function(selecionados){
            alert ("Valor da mão de obra salvo com sucesso!");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });
});

//selectobj.value
function Guardar_Margem (selectobj){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "MargemSeguranca",
            acao:"add",
            valor : (selectobj.value)            
        },
        success : function(selecionados){
            alert ("Tipo de alinhamento salvo com sucesso!");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });
}

function Guardar_Espacamento (selectobj){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "Espacamento",
            acao:"add",
            valor : (selectobj.value)            
        },
        success : function(selecionados){
            alert ("Valor do espaçamento salvo com sucesso!");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });
}

function Guardar_Rodape (selectobj){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "Rodape",
            acao:"add",
            valor : (selectobj.value)            
        },
        success : function(selecionados){
            alert ("Opção de rodapé salva com sucesso!");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });
}

function guardar_area(area_total, perimetro){
 
 $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "area",
            acao:"add",
            perimetro : perimetro,
            area : area_total
//            base : base,
//            altura : altura
        },
        success : function(selecionados){
           // alert (selecionados);
            document.getElementById("area_calculada").innerHTML = selecionados + " m²" ;
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });

}

function calcular_area_retangular(){
    var base = document.getElementById("baseRetangulo").value;
    var altura = document.getElementById("alturaRetangulo").value;
    var area_total = base * altura;
    var perimetro = ((2 * base) + (2 *altura));
    //alert (perimetro);
    guardar_area (area_total, perimetro);
}

function calcular_area_triangular(){
    var base = document.getElementById("baseTriangulo").value;
    var altura = document.getElementById("alturaTriangulo").value;
    var area_total = (base * altura) / 2 ;
    var hipotenusa = Math.pow(base,2)  + Math.pow(altura,2);
    var hipotenusa = Math.sqrt(hipotenusa);
    var perimetro = parseInt(hipotenusa) + parseInt(base) + parseInt(altura);
    guardar_area (area_total, perimetro);
}

function calcular_area_circular(){
    var raio = document.getElementById("raioCirculo").value;
    var area_total = Math.PI  * Math.pow(raio,2);
    area_total = parseInt(area_total*100)/100;
    var perimetro = Math.PI * 2 * raio;
    perimetro = parseInt(perimetro*100)/100;
    //alert (area_total);
    guardar_area (area_total, perimetro);
}

function calcular_area_irregular(){
    var area_total = document.getElementById("areaIrregular").value;
    var perimetro = document.getElementById("perimetroIrregular").value;
    //alert (perimetro);
    guardar_area (area_total, perimetro);
}

function produtoadd(id){
   $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "produto",
            acao:"add",
            id : id
        },
        success : function(selecionados){
                  //alert (id);
                  //Status Bar nao tem produtos 
                  //document.getElementById("produtos_selecionados").innerHTML = selecionados ;
                    //alert (selecionados, id);
                  verificarbotao(selecionados, id, "produto");

                  //document.getElementById(id).innerText ='Remover' ;
                  //alert ("this");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });
}

function verificarbotao(selecionados, id, tipo) {
    selecionados = selecionados.split(",");  
    //alert (tipo + id);
    for (i=0; i<selecionados.length; i++) {         
        if (selecionados [i] == id){
            document.getElementById(tipo + id).innerHTML ='Remover' ;
            return;
        }
    }
    document.getElementById(tipo + id).innerHTML ='Adicionar' ;
}


function argamassaadd(id, nome){
   $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "argamassa",
            acao:"add",
            nome: nome,
            id : id
        },
        success : function(selecionados){
            if (selecionados == ""){
               document.getElementById("argamassa_selecionados").innerHTML = '<span class="glyphicon glyphicon-unchecked" aria-hidden="false"></span>';
            }else{
                document.getElementById("argamassa_selecionados").innerHTML = '<span class="glyphicon glyphicon-check" aria-hidden="false"></span> ' + nome ;
            }
            verificarbotao(selecionados, id, "argamassa");
            
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert ("Impossível adicionar 2 argamassas.\n Remova a selecionada e tente novamente");}
                 });
}

function rejunteadd(id, nome){
   $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "rejunte",
            acao:"add",
            nome: nome,
            id : id
        },
        success : function(selecionados){
                  if (selecionados == ""){
                    document.getElementById("rejunte_selecionados").innerHTML = '<span class="glyphicon glyphicon-unchecked" aria-hidden="false"></span>';
                 }else{
                     document.getElementById("rejunte_selecionados").innerHTML = '<span class="glyphicon glyphicon-check" aria-hidden="false"></span> ' + nome ;
                 }
                 verificarbotao(selecionados, id, "rejunte");
        },
         error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert ("Impossível adicionar 2 Rejuntes.\n Remova o selecionado e tente novamente");}
                 });
    }

function pisoadd(nome,id){
    //alert ('chamou pisoadd com id:' + id); 
    //alert (Sessao);
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            tipo: "piso",
            acao:"add",
            nome: nome,
            id : id
        },
        success : function(selecionados){
                  nomes_piso(nome, selecionados);
                  
                  
                  //alert (selecionados[1]);  
                  tam = selecionados.split(","); 
//                  //selecionados = count(selecionados);
                  if (tam != null && tam != undefined && tam != "") {
                        // alert ("|"+tam + "|" + tam.length);
                          document.getElementById("pisos_selecionados").innerHTML = tam.length ;
                  }else {
                      //alert ("|"+tam + "|" + "0");
                       document.getElementById("pisos_selecionados").innerHTML = "0" ;
                  }   
                 verificarbotao(selecionados, id, "piso");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });
    }


    


function nomes_piso(nome, ids){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            acao : "add",
            tipo : "nome",
            nome : nome
        },
        success : function(selecionados){
            var html = "";
            ids_pisos = ids.split(",");
            nomes_pisos = selecionados.split(","); 
                        
                       //document.getElementById("pisos_selecionados").innerHTML = "Nenhum selecionado" ;
                       for (var i=0; i<nomes_pisos.length; i++){
                           //alert (ids_pisos[i]);
                            html = html + "<li><p><a href=" + "/pisos/ver/"+ ids_pisos[i]+ " > " + nomes_pisos[i] + "</a>"
                                        +'<span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="pisoadd(' 
                                        + "'"+nomes_pisos[i]+"','"+ids_pisos[i]+"'" 
                                        +')"' + ' ></span>'
                                        +"</p></li>";
                       }
                       
                       document.getElementById("pisos_selecionados_SB").innerHTML = html ;
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });

}

function limpar_pisos(){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            acao : "limpar",
                id : ""
        },
        success : function(selecionados){
            
                       document.getElementById("pisos_selecionados").innerHTML = "Nenhum selecionado" ;
                       document.getElementById("pisos_selecionados_SB").innerHTML = "Adicione um piso!" ;
                        
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });

}

function limpar_produtos(){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            acao : "limpar",
                id : ""
        },
        success : function(selecionados){
                       document.getElementById("produtos_selecionados").innerHTML = "Nenhum selecionado" ;
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });

}

function limpar_selecao(){
    $.ajax({
        type : 'POST',
        url : Sessao,
        data: {
            acao : "limpar",
                id : ""
        },
        success : function(selecionados){
                       location.reload();
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) 
        {alert (XMLHttpRequest.statusText);}
                 });

}

jQuery(document).ready(function(){
		jQuery('#form2').submit(function(){
			var dados = this;
                        //var dados = JSON.parse(this);
			jQuery.ajax({
				type: "POST",
				url: 'http://localhost/Pisotaria/Session',
                                tipo : 'analise',
				data: {
                                    acao : '',
                                    tipo : 'analise',
                                    analises : dados
                                
                                },
				success: function( data )
				{
					alert( "Piso cadastrado na Sessao!" + data);
				}
			});
			
			return false;
		});
	});