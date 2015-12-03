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
<html>
    <head>
        
        
        <title>Pisotaria</title>
        <meta charset="UTF-8">
        
                <script type="text/javascript" src="http://localhost/pisotaria/assets/jquery.min.js.js"></script>
                
    </head>
    <body>
        
        <p><a href="<?php echo base_url() ?>">Home (Pisotaria)</a></p><p>
           <a href='http://localhost/pisotaria/Relatorios'>Gerar relatorio</a>;
           <br>
           <a href='http://localhost/pisotaria/Calculos'>Gerar Calculos</a>;
           <br><br>
        <?php
            echo "<table border=2>";
                echo "<tr>";
                    echo "<th>";
                        echo "Area:_______";
                    echo "</th>";

                    echo "<th>";
                        echo "Pisos:______";
                    echo "</th>";
                    
                    echo "<th>";
                        echo "Argamassa:__";
                    echo "</th>";
                    
                    echo "<th>";
                        echo "Rejunte:____";
                    echo "</th>";
                    
                    echo "<th>";
                        echo "Produtos:___";
                    echo "</th>";
                    
                echo "</tr>";
                
                echo "<tr>";
                
                    echo "<th>";
                        echo '<div id=area_calculada>';
                        if (isset($_SESSION['AREA'])){
                        //    echo $_SESSION['id'];
                                //echo "<pre>";
                                //print_r($_SESSION['PRODUTO']);
                                echo ($_SESSION['AREA']);

                                //echo json_encode($_SESSION['PRODUTO']);
                                //echo "</pre>";
                        }
                        echo '</div>';
                    echo "</th>";
                    
                    echo "<th>";
                        echo '<div id=pisos_selecionados>';

                        if (isset($_SESSION['PISO'])){
                                echo "<pre>";
                                print_r($_SESSION['PISO']);
                                echo "</pre>";
                            
                                
                               // echo implode(', ',$_SESSION['PISO']);
                        }
                        echo '</div>';
                    echo "</th>";
                    
                    
                    echo "<th>";
                        echo '<div id=argamassas_selecionados>';

                        if (isset($_SESSION['ARGAMASSA'])){
//                                echo "<pre>";
//                                print_r($_SESSION['PISO']);
//                                echo "</pre>";
                            
                                
                                echo implode(', ',$_SESSION['ARGAMASSA']);
                        }
                        echo '</div>';
                    echo "</th>";
                    
                    echo "<th>";
                        echo '<div id=rejuntes_selecionados>';

                        if (isset($_SESSION['REJUNTE'])){
//                                echo "<pre>";
//                                print_r($_SESSION['PISO']);
//                                echo "</pre>";
                            
                                
                                echo implode(', ',$_SESSION['REJUNTE']);
                        }
                        echo '</div>';
                    echo "</th>";
                    
                    echo "<th>";
                        echo '<div id=produtos_selecionados>';
                        if (isset($_SESSION['PRODUTO'])){
                        //    echo $_SESSION['id'];
                                //echo "<pre>";
                                //print_r($_SESSION['PRODUTO']);
                                echo implode(', ',$_SESSION['PRODUTO']);

                                //echo json_encode($_SESSION['PRODUTO']);
                                //echo "</pre>";
                        }
                        echo '</div>';
                    echo "</th>";
                    
                    
                    
                echo "<tr>";
                
            echo "</table>";
            echo "<br><br><br>";
          
   
            
        ?>    

