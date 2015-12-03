    <?php
    
        
    if (isset($_SESSION['AREA'])){
        echo "<br>Calcular Area</br>
    <table border=2 > 
        <tr>
                <td>
                    <div class='input-group'>
                        <span class='input-group-addon'> Base:</span>
                        <input type='text' id='base' value=".  $_SESSION['BASE']   ." class='form-control'>
                        <span class='input-group-addon'>Metros</span>
                    </div>
                    <div class='input-group'>
                        <span class='input-group-addon'> Altura:</span>
                        <input type='text' id='altura' value=".  $_SESSION['ALTURA']   ." class='form-control'>
                        <span class='input-group-addon'>Metros</span>
                    </div>
                    <button type='submit' onClick ='calcular_area()' class='btn btn-default'>Calcular Area</button>
                  
                </td>
        </tr>
    </table>";
    }else {
         echo "<br>Calcular Area</br>
    <table border=2 > 
        <tr>
                <td>
                    <div class='input-group'>
                        <span class='input-group-addon'> Base:</span>
                        <input type='text' id='base' class='form-control'>
                        <span class='input-group-addon'>Metros</span>
                    </div>
                    <div class='input-group'>
                        <span class='input-group-addon'> Altura:</span>
                        <input type='text' id='altura' class='form-control' value='' >
                        <span class='input-group-addon'>Metros</span>
                    </div>
                    <button type='submit' onClick ='calcular_area()' class='btn btn-default'>Calcular Area</button>
                  
                </td>
        </tr>
    </table>";
    }

//Check to see if pisos could be found

?>

<!--//echo "<input type='text' id='base' value=''class='form-control'>";
                        //echo "<span class='input-group-addon'>Metros</span>-->


