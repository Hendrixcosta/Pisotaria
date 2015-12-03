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
<h1>Área</h1>
<p>Especifique o tipo de área que deseja fazer cotações de pisos e seus dados.</p>
<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#irregular" aria-controls="irregular" role="tab" data-toggle="tab">Irregular</a></li>
    <li role="presentation"><a href="#retangular" aria-controls="home" role="tab" data-toggle="tab">Retangular</a></li>
    <li role="presentation"><a href="#triangular" aria-controls="triangular" role="tab" data-toggle="tab">Triangular</a></li>
    <li role="presentation"><a href="#circular" aria-controls="circular" role="tab" data-toggle="tab">Circular</a></li>
    <li role="presentation"><a href="#manual" aria-controls="manual" role="tab" data-toggle="tab">Inserir Manual</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content"><?php
      /**
       * Inicio do formulario de area irregular
       */
      ?>
    <div role="tabpanel" class="tab-pane fade in active" id="irregular">
        <p>Para área irregular, clique nos pontos referentes às quinas da área e posteriormente em "calcular área" que o desenho será preenchido.</p>
        <p></p>
        <div class="row" style="margin-right: 0px; margin-left: 0px;">
        
            <p class="text-center">
                <button class="btn btn-default" type="button" onclick="clearCanvas();">Limpar Área</button>
                <button class="btn btn-default" type="button" onclick="areaCanvas()">Calcular Área</button>
            </p>
        
        <div onclick="drawPolyline()">
            <div id="canvas"></div>
        </div>
<!--        <p id="demo">Defina o primeiro ponto e verifique a distância até o próximo ponto.</p>-->
        <input id="penwidth" class="hidden" type="text" value="1" size="20"/>
        <input id="color" class="hidden" type="text" value="#0000ff" size="20"/>
        <p> </p>Escala  1: <input id="escala"  type="text" value="1" size="20"/> metro(s).
        <!--
        <input style="font-weight:bold" type="button" value="Draw Polyline" onclick="drawPolyline();"/>
        <input style="font-weight:bold" type="button" value="Draw Polygon" onclick="drawPolygon();"/>
        <input style="font-weight:bold" type="button" value="Fill Polygon" onclick="fillPolygon();"/>
        <input style="font-weight:bold" type="button" value="Clear Canvas" onclick="clearCanvas();"/>
        <input style="font-weight:bold" type="button" value="Clear Previous Points Set" onclick="clearPreviousPoints();"/>
        <input style="font-weight:bold" type="button" value="Calcular Área" onclick="polygonArea();"/>
        -->
        
        </div>
        <p></p>
    </div><?php
      /**
       * Inicio do formulario de area retangular
       */
      ?>
    <div role="tabpanel" class="tab-pane fade" id="retangular">
        <p>Para área retangular, digite a base e altura correspondente à área desejada.</p>
        <form class="form-inline">
            <div class="form-group">
                <label for="baseRetangulo">Base</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="baseRetangulo" placeholder="3">
                    <span class="input-group-addon" id="basic-addon2">metros</span>
                </div>
            </div>
            <div class="form-group">
                <label for="alturaRetangulo">Altura</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="alturaRetangulo" placeholder="4">
                    <span class="input-group-addon" id="basic-addon2">metros</span>
                </div>
            </div><p></p>
            <a  href="#retangular" onclick="calcular_area_retangular()" class="btn btn-default" >Calcular área</a>
            
        </form>
        <p></p>
    </div><?php
      /**
       * Inicio do formulario de area triangular
       */
      ?>
    <div role="tabpanel" class="tab-pane fade" id="triangular">
        <p>Para área triangular, digite a base e altura correspondente à área desejada.</p>
        <form class="form-inline">
            <div class="form-group">
                <label for="baseTriangulo">Base</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="baseTriangulo" placeholder="4">
                    <span class="input-group-addon" id="basic-addon2">metros</span>
                </div>
            </div>
            <div class="form-group">
                <label for="alturaTriangulo">Altura</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="alturaTriangulo" placeholder="3">
                    <span class="input-group-addon" id="basic-addon2">metros</span>
                </div>
            </div><p></p>
              <a href="#triangular" onclick="calcular_area_triangular()"class="btn btn-default">Calcular área</a>
        </form>
        <p></p>        
    </div><?php
      /**
       * Inicio do formulario de area circular
       */
      ?>
    <div role="tabpanel" class="tab-pane fade" id="circular">
        <p>Para área circular, digite o raio correspondente à área desejada.</p>
        <form class="form-inline">
            <div class="form-group">
                <label for="raioCirculo">Raio</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="raioCirculo" placeholder="2">
                    <span class="input-group-addon" id="basic-addon2">metros</span>
                </div>
            </div><p></p>
             <a href="#triangular" onclick="calcular_area_circular()" class="btn btn-default">Calcular área</a>
        </form>
        <p></p>        
    </div><?php
      /**
       * Inicio do formulario de area irregular
       */
      ?>
    <div role="tabpanel" class="tab-pane fade" id="manual">
        <p>Para inserir manualmente a área, basta digitar o valor da área desejada e seu Perímetro.</p>
        <form class="form-inline">
            <div class="form-group">
                <label for="areaIrregular">Área</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="areaIrregular" placeholder="12">
                    <span class="input-group-addon" id="basic-addon2">metros²</span>
                </div>
            </div>
            <div class="form-group">
                <label for="perimetroIrregular">Perímetro</label>
                <div class="input-group">
                    <input type="number" class="form-control" id="perimetroIrregular" placeholder="12">
                    <span class="input-group-addon" id="basic-addon2">metros</span>
                </div>
            </div><p></p>
             <a href="#triangular" onclick="calcular_area_irregular()" class="btn btn-default">Calcular área</a>
        </form>
        <p></p>
    </div>






<script type="text/javascript">
var canvasDiv=document.getElementById("canvas");
var gr=new jsGraphics(canvasDiv);
PontoFixo=[];
//gr.showGrid(10, true, new jsColor("green"));

//var penWidth;
var col;
var pen;
var d1,d2;
//var msdiv=document.getElementById("timems");
setPenColor(true);
var points=new Array();

var MedirDistancia=0;

var ie=false;
if(document.all)
	ie=true;

if (!ie)
{
 //canvasDiv.captureEvents(Event.MOUSEMOVE)
 //canvasDiv.captureEvents(Event.CLICK)
}
canvasDiv.onmousemove = getMouseXY;

canvasDiv.onclick=drawPoint;

var mouseX = 0
var mouseY = 0

//Get mouse position
function getMouseXY(e)
{
  if (ie) 
	{
    mouseX = event.clientX + document.body.parentElement.scrollLeft;
    mouseY = event.clientY + document.body.parentElement.scrollTop;
  } else { 
    mouseX = e.pageX
    mouseY = e.pageY
  }  

  if (mouseX < 0){mouseX = 0}
  if (mouseY < 0){mouseY = 0}  
  
  mouseX =mouseX - canvasDiv.offsetLeft;
  mouseY =mouseY - canvasDiv.offsetTop;

    //coor = "Coordenadas: (" + mouseX + "," + mouseY + ")";
    //document.getElementById("demo").value= coor;
    
    var pontosX = [];
    var pontosY = [];
    
    if (PontoFixo  != ""){
    pontosX[0] = PontoFixo[0];
    pontosY[0] = PontoFixo[1];
    
    //var distance = Math.sqrt(   ( (pontosX[0]-mouseX) * (pontosX[0]-mouseX) ) + ((pontosY[0]-mouseY)*(pontosY[0]-mouseY)));
    //distance = ((distance - (4.2426))/20);
    //coor = "Distancia: (" + distance + ")";
    //document.getElementById("demo").innerHTML = coor;
    }
    
  return true;
  
}

function setPenColor(noAlert)
{
	if(document.getElementById("color").value!="")
		col=new jsColor(document.getElementById("color").value);
	else
		col=new jsColor("blue");

	if(document.getElementById("penwidth").value!="")
		penWidth=document.getElementById("penwidth").value;
        else
                penWidth=1;

	if(!isNaN(penWidth))
		pen=new jsPen(col,penWidth);
	else
		pen=new jsPen(col,1);
		
	if(!noAlert)
	{
		if(points.length==0)
		{
			alert("Please click at any location on the blank canvas at left side to plot the points!");
			return false;
		}
		else if(points.length==1)
		{
			//alert("2 or more points are required to draw a line, polyline or polygon! Please plot more points by clicking at any location on the blank canvas at left side.");
			return false;			
		}
	}	
	return true;	
}

function drawPoint()
{
        PontoFixo =[];
	gr.fillRectangle(new jsColor("green"),new jsPoint(mouseX-3,mouseY-3),3,3);
	points[points.length]=new jsPoint(mouseX-3,mouseY-3);
        //gr.showGrid();
        PontoFixo[0] = mouseX-3;
        PontoFixo[1] = mouseY-3;        
                
                
}

function drawPolygon()
{
	if(!setPenColor())
	    return;
	d1=(new Date()).getTime();
	gr.drawPolygon(pen,points);
	d2=(new Date()).getTime();
	//msdiv.innerHTML=(d2-d1);
	ShowPoints();
	//points=new Array();
}

function drawPolyline()
{
	if(!setPenColor())
	    return;
	d1=(new Date()).getTime();
	gr.drawPolyline(pen,points);
	d2=(new Date()).getTime();
	//msdiv.innerHTML=(d2-d1);
	ShowPoints();
	//points=new Array();
}

function drawLine()
{
	if(!setPenColor())
	    return;
	d1=(new Date()).getTime();
	gr.drawLine(pen,points[points.length-2],points[points.length-1]);
	d2=(new Date()).getTime();
	//msdiv.innerHTML=(d2-d1);
	ShowPoints();
	//points=new Array();
}

function fillPolygon()
{
	if(!setPenColor())
	    return;
	d1=(new Date()).getTime();
	gr.fillPolygon(col,points);
	d2=(new Date()).getTime();
	msdiv.innerHTML=(d2-d1);
	ShowPoints();
	//points=new Array();
}


function clearCanvas()
{
	gr.clear();
	points=new Array();
}

function clearPreviousPoints()
{
	points=new Array();
}

function ShowPoints()
{
	var txt=document.getElementById("txt");
	//txt.value="";
	for(var i=0;i<points.length;i++)
	{
		//txt.value=txt.value + "new jsPoint(" + points[i].x + "," + points[i].y + "),";
	}
}

//function polygonArea(X, Y, numPoints) 
function polygonArea() 
{ 
    var pontosX = [];
    var pontosY = [];
    	for(var i=0;i<points.length;i++)
	{
                pontosX.push((points[i].x));
                pontosY.push((points[i].y));
	}
        //var xPts = [4,  4,  8,  8, -4,-4];
        var a = CalculaAreaIrregular (pontosX, pontosY, pontosY.length);
        
        alert (a);
}

function Mouse(e) {
    var txt=document.getElementById("txt");
    
    
    //Xfixo = points[][x];
//    x =  e.clientX - 104;
//    pontosX[0] = e.clientX;
//    y = e.clientY - 129;
//    pontosY[0] = e.clientY;
// 
// 
//    if (PontoFixo  != ""){
//    pontosX[1] = PontoFixo[0];
//    pontosY[1] = PontoFixo[1];
//    var distance = Math.sqrt(   ((pontosX[0]-pontosX[1])*(pontosX[0]-pontosX[1])) + ((pontosY[0]-pontosY[1])*(pontosY[0]-pontosY[1])));
//    distance = distance - 170;
//    coor = "Distancia: (" + distance + ")";
//    document.getElementById("demo").innerHTML = coor
//    } 
//            
//    coor = "Distancia: (" + x + "," + y + ")";
//    txt.value= coor;
     
 
 
}




function CalculaAreaIrregular(X, Y, numPoints) {
  area = 0;         // Accumulates area in the loop
  j = numPoints-1;  // The last vertex is the 'previous' one to the first
  
  for (i=0; i<numPoints; i++)
    { area = area +  (X[j]+X[i]) * (Y[j]-Y[i]); 
      j = i;  //j is previous vertex to i
    }
  area =  area/2;
  escala = document.getElementById("escala").value;
  //$distCSS = 20;
 
 aux = (20/escala);
 aux = Math.pow(aux, 2);
  
    //alert (aux);
  
  area = (area/aux);
  area = parseInt(area*100)/100;
  
if (area <0 ){
      return area * -1;
  }else {
      return area;
  }    
}

function areaCanvas(){
    //polygonArea();
        var pontosX = [];
        var pontosY = [];
    	for(var i=0;i<points.length;i++)
	{
                pontosX.push((points[i].x));
                pontosY.push((points[i].y));
	}
        //var xPts = [4,  4,  8,  8, -4,-4];
        var a = CalculaAreaIrregular (pontosX, pontosY, pontosY.length);
        
    //substituir próxima linha pela inserção da área na seção e na statusbar
        guardar_area (a , a);
    
    //fillPolygon();
    	if(!setPenColor())
	    return;
	d1=(new Date()).getTime();
	gr.fillPolygon(col,points);
	d2=(new Date()).getTime();
	//msdiv.innerHTML=(d2-d1);
	//ShowPoints();
    
}

</script>
