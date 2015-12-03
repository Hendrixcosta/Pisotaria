<?php 
//Check to see if pisos could be found

if ($rejuntes !== FALSE) {

//Create the HTML table header
echo <<<HTML
                <br>Rejuntes: </br>
		<table border='2'>
			<tr>
				<th>ID #</th>
				<th>Nome</th>
				<th>Descricao</th>
				<th>Tipo</th>
                                <th>CR</th>
                                <th>Adicionar</th>
                        </tr>

HTML;


//Do we have an array of pisos or just a single piso object?
if (is_array($rejuntes) && count($rejuntes)) {
//Loop through all the pisos and create a row for each within the table
foreach ($rejuntes as $rejunte) {
                                    echo "<tr onclick= 'rejunteadd({$rejunte->get_id()})'>";
                                    
                                        echo "<td>".$rejunte->get_id()."</td>";;
					echo "<td>".$rejunte->get_nome()."</td>";
					echo "<td>".$rejunte->get_descricao()."</td>";
					echo "<td>".$rejunte->get_tipo()."</td>";
                                        echo "<td>".$rejunte->get_cr()."</td>";
					echo "<td>";
                                             if (isset($_SESSION['REJUNTE'])) {
                                                         if (in_array($rejunte->get_id(), $_SESSION['REJUNTE'])) {
                                                            echo "<button type='button' id=rejunte{$rejunte->get_id()}>Remover</button>";
                                                        } else {
                                                            echo "<button type='button' id=rejunte{$rejunte->get_id()}>Adicionar</button>";
                                                        } 
                                                }else {
                                                            echo "<button type='button' id=rejunte{$rejunte->get_id()}>Adicionar</button>";
                                                }
                                        echo "</td>";
                                        
                                    echo "</tr>";
}
 
//echo "<td> <button type="button" onclick="add(".$produtos->get_id().")">Adicionar</button>"</td>";
} else {
//Only a single piso object so just create one row within the table
echo <<<HTML
                                    
                                    <tr onclick='rejunteadd({$rejuntes->get_id()})'>
					
                                                <td>{$rejuntes->get_id()}</td>
						<td>{$rejuntes->get_nome()}</td>
						<td>{$rejuntes->get_descricao()}</td>
						<td>{$rejuntes->get_tipo()}</td>
                                                <td>{$rejuntes->get_cr()}</td>
						
                                                <td> <button type="button">Adicionar</button></td>
                                    </tr>
                                    

HTML;
}
//Close the table HTML

    echo  "</table>";
    echo "<button onclick='limpar_produtos()'>Limpar Seleção de Produtos </button><br><br>";


} else {//Now piso could be found so display an error messsage to the piso
    
        echo "<p>Não foi encontrado nenhum Produto, tente novamente.</p>";
        
}




