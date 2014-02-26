<?php
    require_once __DIR__.'/header.php';
?>
    <!-- Tabla de reservas-->
     <div class="row marginTop">
      <div class="col-md-8">
          <div class="panel panel-default ">
            <!-- Default panel contents -->
            <div class="panel-heading">Reservas</div>

            <!-- Table -->
            <table class="table table-striped table-bordered">
                <tr>
                    <th></th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miércoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
                <tr>
                    <th>8:00</th>
                </tr>   
                <tr>
                    <th>9:00</th>
                </tr> 
                <tr>
                    <th>10:00</th>
                </tr> 
                <tr>
                    <th>11:00</th>
                </tr> 
                <tr>
                    <th>12:00</th>
                </tr> 
                <tr>
                    <th>13:00</th>
                </tr> 
                <tr>
                    <th>14:00</th>
                </tr> 
                <tr>
                    <th>15:00</th>
                </tr> 
                <tr>
                    <th>16:00</th>
                </tr> 
                <tr>
                    <th>17:00</th>
                </tr> 
                <tr>
                    <th>18:00</th>
                </tr> 
                <tr>
                    <th>19:00</th>
                </tr> 
                <tr>
                    <th>20:00</th>
                </tr> 
            </table>
          </div>
    </div>
    <div class="col-md-4">
        Datos Persona con reserva <br/>
        <form name="form1" action="<?php echo $ruta ?>Controlador/Controlador_Puente.php?cod=3" method="post">
            <label>Introduzca dni:</label>
            <input type="text" name="dni"><br/>
            <label>Introduzca contraseña:</label>
            <input type="password" name="contrasena"><br/>
            <input type="submit" name="enviar" value="Enviar">
        </form>

    </div>
    </div>
    <!-- Fin de tabla reservas--> 



      <!-- Site footer -->
      <div class="footer">
        <p>&copy; bicicletas_baterias 2014</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
