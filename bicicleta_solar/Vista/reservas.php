<?php

    require_once __DIR__.'/header.php';
    require_once __DIR__.'/../Controlador/ControladorClass.php';
    require_once __DIR__.'/../Modelo/Base/CentroClass.php';

    use bicicleta_solar\Controlador\Controlador;

?>
<script type="text/javascript" src="js/funciones.js"></script>
<title>Reservas</title>
<meta charset="utf-8">
<script>



</script>
</head>

<body onload="meses()">
<!-- MODAL
    <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span></a>
                    <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                </div>
                <div class="modal-body">
                    <h4>Text in a modal</h4>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Save changes</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <input type="hidden"  data-toggle="modal" href="#myModal" id="confirmar"/>
-->

<?php
    $centros = Controlador::sacarCentros();
?>
<div class="container">
    <img src="img/logo.jpg" class="" egibide"/>

    <!-- Menú -->
    <div class="masthead">
        <ul class="nav nav-justified" id="menu">
            <li><a href="#" id="act">Presentación</a></li>
            <li class="active"><a href="reservas.php">Reservas</a></li>
            <li><a href="#">Proyecto</a></li>
            <li><a href="#">Participantes</a></li>
            <li><a href="#">Patricionadores</a></li>
            <li><a href="bateria.php">Baterías</a></li>
        </ul>
    </div>
    <!-- Fin Menú -->


    <!-- Tabla de reservas-->
     <div class="row marginTop seleccion">
      <div class="col-md-8">
          <div class="panel panel-default ">
            <!-- Default panel contents -->
            <div class="panel-heading centrado">
                Reservas <span id="anio"></span>
            </div>
            <!-- Table -->
            <table class="table table-striped table-bordered " border="1">
                <td colspan="3"><button onclick="mesAnt();" class="btn btn-primary"><span class="glyphicon glyphicon-backward"></span></button></td>
                <td colspan="5" id="mes"> </td>
                <td colspan="1"> <button onclick="mesPos();" class="btn btn-primary"><span class="glyphicon glyphicon-forward"></span></button>
                </td>
                <tr>
                    <th><a onclick="semanaAnt();" id="diaAnterior" class="puntero"><span class="glyphicon  glyphicon-chevron-left marginTop"></span></a></th>
                    <th id="tr1">Lunes <br> <span id="dia1" class="dia"></span></th>
                    <th id="tr2">Martes <br> <span id="dia2" class="dia"></span></th>
                    <th id="tr3">Miércoles<br> <span id="dia3" class="dia"></span></th>
                    <th id="tr4">Jueves<br> <span id="dia4" class="dia"></span></th>
                    <th id="tr5">Viernes<br> <span id="dia5" class="dia"></span></th>
                    <th class="findeSemana">Sabado<br> <span id="dia6" class="dia"></span></th>
                    <th class="findeSemana">Domingo<br> <span id="dia7" class="dia"></span></th>
                    <th><a onclick="semanaPos();" id="diaSiguiente" class="puntero"><span class="glyphicon  glyphicon-chevron-right marginTop"></span></a></th>

                </tr>
                <tr>
                    <th>8:00 - 9:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img1" id="081"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img2" id="082"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img3" id="083"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img4" id="084"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img5" id="085"/></th>
                </tr>

                <tr>
                    <th>9:00 - 10:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="091"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="092"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="093"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="094"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="095"/></th>
                </tr>

                <tr>
                    <th>10:00 - 11:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="101"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="102"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="103"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="104"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="105"/></th>
                </tr>

                <tr>
                    <th>11:00 - 12:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="111"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="112"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="113"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="114"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="115"/></th>
                </tr>

                <tr>
                    <th>12:00 - 13:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="121"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="122"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="123"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="124"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="125"/></th>
                </tr>

                <tr>
                    <th>13:00 - 14:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="131"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="132"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="133"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="134"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="135"/></th>
                </tr>

                <tr>
                    <th>14:00 - 15:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="141"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="142"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="143"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="144"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="145"/></th>
                </tr>

                <tr>
                    <th>15:00 - 16:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="151"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="152"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="153"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="154"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="155"/></th>
                </tr>

                <tr>
                    <th>16:00 - 17:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="161"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="162"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="163"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="164"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="165"/></th>
                </tr>

                <tr>
                    <th>17:00 - 18:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="171"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="172"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="173"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="174"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="175"/></th>
                </tr>

                <tr>
                    <th>18:00 - 19:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="181"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="182"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="183"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="184"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="185"/></th>
                </tr>

                <tr>
                    <th>19:00 - 20:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="191"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" id="192"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="193"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="194"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class=""  id="195"/></th>
                </tr>
            </table>
          </div>
          * Nota: Hacer la reserva para un único día y con las horas continuas </br></br>
          <div class="alert alert-warning oculto" id="errorHoras"></div>
    </div>
                <div class="col-md-4">
                        <?php
                            if(isset($_SESSION['persona'])){
                        ?>
                        <h4>Bienvenido

                        <?php
                            echo ucfirst($objeto->getNombre());
                        ?>

                                <br/><br/>

                                <!-- Select Basic -->
                                <label class="col-md-4 control-label formatoLetra" for="centro">Centros </label>
                                <div class="col-md-4">
                                    <select id="centro" name="centro" class="form-control centroAnchor" onchange="cogerBicicleta();">
                                        <option value="">Selecciona</option>
                                        <?php
                                        foreach($centros as $centro ){
                                            ?>
                                            <?php
                                            echo "<option value='".$centro->getIdCentro()."'>".$centro->getNombre()."</option>";
                                        }

                                        ?>
                                    </select>
                                </div><br/><br/><br/>
                                <!-- Select Basic -->
                                <label class="col-md-4 control-label oculto formatoLetra" for="bici" id="titulobici">Bicicleta </label>
                                <div class="col-md-4">
                                    <select id="bici" name="bici" class="form-control centroAnchor oculto" onchange="cogerReservasBD(this);">
                                    </select>
                                </div><br/><br/><br/>
                        <input type="button" class="btn btn-success" value="Reservar" onclick="reservar();"/>
                        <input type="button" class="btn btn-primary" value="Restablecer" onclick="vaciarHoras();"/>


                                <a href="../Configuracion/cerrarsesion.php" class="btn btn-primary">Cerrar Sesión</a>

                    <?php
                    }else{
                        ?></h4><br/>
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
                    <br/>
                    <?php
                        if(isset($_GET['men'])){
                           echo "<div class='alert alert-warning'>Usuario o Contraseña incorrectos</div>";
                        }
                    }

                    ?>

                </div>
    </div>

    <!-- Fin de tabla reservas-->

<?php
echo "<PRE>";
var_dump($centros);
echo "</PRE>";
die();
require_once __DIR__.'/footer.php';
?>
