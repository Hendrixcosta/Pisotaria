<?php 
//Check to see if pisos could be found

if ($argamassas !== FALSE) {

//Create the HTML table header
echo <<<HTML
                <br>Argamassas: </br>
		<table border='2'>
			<tr>
				<th>ID #</th>
				<th>Nome</th>
				<th>Descricao</th>
				<th>Tipo</th>
                                
                                <th>Adicionar</th>
                        </tr>

HTML;


//Do we have an array of pisos or just a single piso object?
if (is_array($argamassas) && count($argamassas)) {
//Loop through all the pisos and create a row for each within the table
foreach ($argamassas as $argamassa) {
                                    echo "<tr onclick= 'argamassaadd({$argamassa->get_id()})'>";
                                    
                                        echo "<td>".$argamassa->get_id()."</td>";;
					echo "<td>".$argamassa->get_nome()."</td>";
					echo "<td>".$argamassa->get_descricao()."</td>";
					echo "<td>".$argamassa->get_tipo()."</td>";
					echo "<td>";
                                              if (isset($_SESSION['ARGAMASSA'])) {
                                                         if (in_array($argamassa->get_id(), $_SESSION['ARGAMASSA'])) {
                                                            echo "<button type='button' id=argamassa{$argamassa->get_id()}>Remover</button>";
                                                        } else {
                                                            echo "<button type='button' id=argamassa{$argamassa->get_id()}>Adicionar</button>";
                                                        } 
                                                }else {
                                                            echo "<button type='button' id=argamassa{$argamassa->get_id()}>Adicionar</button>";
                                                }
                                        echo "</td>";
                                        
                                    echo "</tr>";
}
 
//echo "<td> <button type="button" onclick="add(".$produtos->get_id().")">Adicionar</button>"</td>";
} else {
//Only a single piso object so just create one row within the table
echo <<<HTML
                                    
                                    <tr onclick='argamassaadd({$argamassas->get_id()})'>
					
                                                <td>{$argamassas->get_id()}</td>
						<td>{$argamassas->get_nome()}</td>
						<td>{$argamassas->get_descricao()}</td>
						<td>{$argamassas->get_tipo()}</td>
						
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




