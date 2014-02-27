<?php
require_once __DIR__.'/header.php';
?>

    <div class="row marginTop">

        <!-- Gráfico Árbol-->
        <div class="col-md-7">

            <h2 style="text-align: center">Grafico de Árbol</h2>


        </div>


        <!-- Gráfico de bateria-->
        <div class="col-md-3 centered">
            <h2 style="text-align: center">Grafico de Batería</h2>


            <img src="img/grafica.png">

            <canvas id="nuestroCanvas" width="451" height="274">

            </canvas>

            </img>
        </div>
        <!-- Fin de grafico de bateria-->


    </div>



<?php
require_once __DIR__.'/footer.php';
?>
