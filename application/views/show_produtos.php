<?php 
//Check to see if pisos could be found

if ($produtos !== FALSE) {

//Create the HTML table header
echo <<<HTML
                <br>Produtos: </br>
		<table border='2' class="sortable" id="myTable" >
			<thead>
                        <tr>
				<th>ID #</th>
				<th>Nome</th>
				<th>Descricao</th>
				<th>Tipo</th>
                                <th>Peso</th>
                                <th>Preco</th>
                                <th>Adicionar</th>
                        </tr>
                        </thead>
                        <tbody>

HTML;


//Do we have an array of pisos or just a single piso object?
if (is_array($produtos) && count($produtos)) {
//Loop through all the pisos and create a row for each within the table
foreach ($produtos as $produto) {
                                    echo "<tr onclick= 'produtoadd({$produto->get_id()})'>";
                                    
                                        echo "<td>".$produto->get_id()."</td>";;
					echo "<td>".$produto->get_nome()."</td>";
					echo "<td>".$produto->get_descricao()."</td>";
					echo "<td>".$produto->get_tipo()."</td>";
					echo "<td>".$produto->get_peso()."</td>";
					echo "<td>".$produto->get_preco()."</td>";
                                        echo "<td>";
                                                if (isset($_SESSION['PRODUTO'])) {
                                                         if (in_array($produto->get_id(), $_SESSION['PRODUTO'])) {
                                                            echo "<button type='button' id=produto{$produto->get_id()}>Remover</button>";
                                                        } else {
                                                            echo "<button type='button' id=produto{$produto->get_id()}>Adicionar</button>";
                                                        } 
                                                }else {
                                                            echo "<button type='button' id=produto{$produto->get_id()}>Adicionar</button>";
                                                }		
                                        echo "</td>";
                                        
                                    echo "</tr>";
}
 
 	
//echo "<td> <button type="button" onclick="add(".$produtos->get_id().")">Adicionar</button>"</td>";
} else {
//Only a single piso object so just create one row within the table
echo <<<HTML
                                    
                                    <tr onclick='produtoadd({$produtos->get_id()})'>
					
                                                <td>{$produtos->get_id()}</td>
						<td>{$produtos->get_nome()}</td>
						<td>{$produtos->get_descricao()}</td>
						<td>{$produtos->get_tipo()}</td>
						<td>{$produtos->get_peso()}</td>
						<td>{$produtos->get_preco()}</td>
                                                <td> <button type="button" id=btn >Adicionar</button></td>
                                    </tr>
                                    

HTML;
}
//Close the table HTML

    echo  "</tbody></table>";
    echo "<button onclick='limpar_produtos()'>Limpar Seleção de Produtos </button><br><br>";
echo '
            <br>ALinhamento dos pisos 
            <INPUT TYPE="RADIO" NAME="Alinhamento" VALUE="op1"> Alinhado
            <INPUT TYPE="RADIO" NAME="Alinhamento" VALUE="op2"> Diagonal
            
            <br>Espaçamento de rejunte
            <input type="number" class="form-control" id="espacamentoRejunte" > mm 
            
            <br>Altura do rodapé
            <input type="number" class="form-control" id="alturaRodape" > cm 
            
            <br>Mao de obra
            <input type="number" class="form-control" id="maodeObra" > R$ 
       ';

} else {//Now piso could be found so display an error messsage to the piso
    
        echo "<p>Não foi encontrado nenhum Produto, tente novamente.</p>";
        
}

echo '

<table>
<tr>
<td valign="top">
<div id="canvas" style="overflow:hidden;position:relative;width:600px;height:370px;border:#999999 1px solid;"></div>
<p>Time required to draw: <b><span id="timems"></span></b>&nbsp;milliseconds</p>
<td valign="top" style="padding-left:10px">
<table>
<tr><td><b>Pen Width:</b></td><td><input id="penwidth" type="text" value="1" size="20"/></td></tr>
<tr><td><b>Color:</b></td><td><input id="color" type="text" value="#0000ff" size="20""/></td></tr>
</table>
<br>
<input style="font-weight:bold" type="button" value="Draw Line (last 2 points)" onclick="drawLine();"/>
<br><br>
<input style="font-weight:bold" type="button" value="Draw Polyline" onclick="drawPolyline();"/>
<br><br>
<input style="font-weight:bold" type="button" value="Draw Polygon" onclick="drawPolygon();"/>
<br><br>
<input style="font-weight:bold" type="button" value="Fill Polygon" onclick="fillPolygon();"/>
<br><br>
<input style="font-weight:bold" type="button" value="Clear Canvas" onclick="clearCanvas();"/>
<br><br>
<input style="font-weight:bold" type="button" value="Clear Previous Points Set" onclick="clearPreviousPoints();"/>
<br><br>
<p><b>Points Data (for bug reporting):</b></p><br>
<textarea  style="height:50px;width:250px" id="txt" rows="1" cols="20"></textarea><br>
<td>
</td>
</tr>
</table>
</div>




</div></div>
<div class="footer">
</div>

</div>
</div>
<script src="../jsDraw2D.js" type="text/javascript">
</script>

<script type="text/javascript">
var canvasDiv=document.getElementById("canvas");
var gr=new jsGraphics(canvasDiv);
//var penWidth;
var col;
var pen;
var d1,d2;
var msdiv=document.getElementById("timems");
setPenColor(true);
var points=new Array();

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
			alert("2 or more points are required to draw a line, polyline or polygon! Please plot more points by clicking at any location on the blank canvas at left side.");
			return false;			
		}
	}	
	return true;	
}

function drawPoint()
{
	gr.fillRectangle(new jsColor("green"),new jsPoint(mouseX-6,mouseY-6),6,6);
	points[points.length]=new jsPoint(mouseX-3,mouseY-3);
}

function drawPolygon()
{
	if(!setPenColor())
	    return;
	d1=(new Date()).getTime();
	gr.drawPolygon(pen,points);
	d2=(new Date()).getTime();
	msdiv.innerHTML=(d2-d1);
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
	msdiv.innerHTML=(d2-d1);
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
	msdiv.innerHTML=(d2-d1);
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
	txt.value="";
	for(var i=0;i<points.length;i++)
	{
		txt.value=txt.value + "new jsPoint(" + points[i].x + "," + points[i].y + "),";
	}
}
</script>



';