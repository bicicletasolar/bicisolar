<?php
    require_once __DIR__.'/header.php';

?>
    <!-- Tabla de reservas-->
     <div class="row marginTop">
      <div class="col-md-7">
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
         <?php
         if(isset($_SESSION['persona']))

            {?>
                <div class="col-md-4">
                    <h3 style="text-align: center">Bienvenido <?php

                            echo $objeto->getNombre();

                        ?></h3><br/>
                </div>
            <?php
            }
            else
            {?>
                <div class="col-md-4">
                    <h3 style="text-align: center">Datos Persona con reserva</h3><br/>
                    <form name="form1" class="" action="<?php echo $ruta;?>Controlador/Controlador_Puente.php?cod=3" method="post">
                        <div class="form-group">
                            <label>Introduzca dni:</label>
                            <input type="text" class="form-control" name="dni" placeholder="Dni"><br/>
                        </div>
                        <div class="form-group">
                            <label>Introduzca contraseña:</label>
                            <input type="password" class="form-control"  name="contrasena" placeholder="Contraseña"><br/>
                        </div>
                        <input type="submit" class="btn btn-primary" name="enviar" value="Enviar">
                    </form>

                </div>

            <?php
            }
        ?>



    </div>
    <!-- Fin de tabla reservas-->

<?php
require_once __DIR__.'/footer.php';
?>
