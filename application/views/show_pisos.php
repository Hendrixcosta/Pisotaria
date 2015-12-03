<?php   
//Check to see if pisos could be found
if ($pisos !== FALSE) {

//Create the HTML table header
echo <<<HTML
                <br>Pisos: </br>
		<table border='1' id="cartcontent">
			<tr>
				<th>ID #</th>
				<th>Nome</th>
				<th>Comprimento</th>
				<th>Largura</th>
                                <th>Altura</th>
				<th>Resistencia</th>
				<th>Preço</th>
				<th>Quantidade/Embalagem</th>
                                <th>Selecionar</th>
			</tr>

HTML;
//Do we have an array of pisos or just a single piso object?
if (is_array($pisos) && count($pisos)) {
//Loop through all the pisos and create a row for each within the table
foreach ($pisos as $piso) {
                                    echo "<tr class='drag' onclick='pisoadd({$piso->get_id()})')>";
                                     
                                                echo '<td>'.$piso->get_id().'</td>';
						echo '<td>'.$piso->get_nome().'</td>';
						echo '<td>'.$piso->get_comprimento().'</td>';
						echo '<td>'.$piso->get_largura().'</td>';
						echo '<td>'.$piso->get_altura().'</td>';
						echo '<td>'.$piso->get_resistencia().'</td>';
						echo '<td>'.$piso->get_preco().'</td>';
						echo '<td>'.$piso->get_quantidade_embalagem().'</td>';
                                                echo "<td>";
                                                    if (isset($_SESSION['PISO'])) {
                                                             if (in_array($piso->get_id(), $_SESSION['PISO'])) {
                                                                echo "<button type='button' id=piso{$piso->get_id()}>Remover</button>";
                                                            } else {
                                                                echo "<button type='button' id=piso{$piso->get_id()}>Adicionar</button>";
                                                            } 
                                                    }else {
                                                                echo "<button type='button' id=piso{$piso->get_id()}>Adicionar</button>";
                                                    }
                                                echo "</td>";
					echo "</tr>";


}

} else {
//Only a single piso object so just create one row within the table
echo <<<HTML

					 <tr class=add  onclick= "pisoadd({$piso->get_id()})">
                                                <td>{$pisos->get_id()}</td>
						<td>{$pisos->get_nome()}</td>
						<td>{$pisos->get_comprimento()}</td>
						<td>{$pisos->get_largura()}</td>
						<td>{$pisos->get_altura()}</td>
						<td>{$pisos->get_resistencia()}</td>
						<td>{$pisos->get_preco()}</td>
						<td>{$pisos->get_quantidade_embalagem()}</td>
                                                <td><button type='button'>Adicionar</button></td>
					</tr>

HTML;
}

//div para mostrar pisos selecionados
//echo '<div id=pisos_selecionados>';
//
//if (isset($_SESSION['PISOS'])){
//    echo $_SESSION['PISOS'];
//}
//echo '</div>';


//Close the table HTML
echo <<<HTML
		</table>
 
<!--<a href="http://localhost/pisotaria/Relatorios">Ir para relatorio</a>-->

<button onclick='limpar_pisos()'>Limpar Seleção de Pisos </button>
<br>
<br>

HTML;

} else {
//Now piso could be found so display an error messsage to the piso
echo <<<HTML

			<p>Não foi encontrado nenhum piso, tente novamente.</p>

HTML;
}
//echo "<br><br><a href='http://localhost/pisotaria/Produtos'>Voltar pra seleção</a>";


