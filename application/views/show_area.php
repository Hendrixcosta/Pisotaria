<?php
//Check to see if pisos could be found
if ($area !== FALSE) {

    
//Create the HTML table header
echo <<<HTML
                <br>Calcular area regular: </br>
            	<table border='1'>
			<tr>
				<th>Area total</th>
				
			</tr>
    
			<tr>
				<th> {$area} </th>
				
			</tr>
                        
    
HTML;
//Do we have an array of pisos or just a single piso object?

} 



 else {
//Now piso could be found so display an error messsage to the piso
echo <<<HTML

			<p>Não foi encontrado nenhuma area, tente novamente.</p>

HTML;
}
//echo "<br><br><a href='http://localhost/pisotaria/Produtos'>Voltar pra seleção</a>";


