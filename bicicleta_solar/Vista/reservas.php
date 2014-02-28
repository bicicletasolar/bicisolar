<?php
require_once __DIR__.'/header.php';
?>
<title>Reservas</title>
<meta charset="utf-8">
<script>
    //Calendario

    var monthdays ;
    var meses;
    var dias;
    var mes=0;
    var dia;
    var mesesIn;

    function meses(){

        meses=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        mesesIn = new Array("January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December" );
        dias=new Array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
        monthdays = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var fecha=new Date();
        mes=fecha.getMonth();
        dia=fecha.getDay();
        anio = fecha.getFullYear();
        diames = fecha.getDate();
        document.getElementById("mes").innerHTML=meses[mes];
        document.getElementById("dia"+dia).innerHTML=diames;
        document.getElementById("anio").innerHTML=anio;


        cargarDias();

        var dia7 = document.getElementById("dia7").textContent; //31
        if(dia7>monthdays[mes] || dia7==""){
            document.getElementById("diaSiguiente").style.visibility="hidden";
        }

        validarPrincipioSemana();

        console.log(mes);
        console.log(diames);
    }
    function mesAnt(){
        if(mes!=0){
            diames=1;
            mes--;
            var mesActual = new Date(mesesIn[mes]+" "+diames +", "+anio);
            dia = mesActual.getDay();
            if(dia==0)
                dia = 7;
            vaciarCampos();
            activarBotonSemanas();
            validarInicioSemana();

            document.getElementById("mes").innerHTML=meses[mes];
            cargarDias();
        }else{
            return false;
        }


    }
    function mesPos(){
        if(mes!=11){
            mes++;
            diames=1;
            var mesActual = new Date(mesesIn[mes]+" "+diames +", "+anio);
            dia = mesActual.getDay();
            if(dia==0)
                dia = 7;
            vaciarCampos();
            activarBotonSemanas();
            validarInicioSemana();

            document.getElementById("mes").innerHTML=meses[mes];
            cargarDias();
        }else{
            return false;
        }

    }
    function cargarDias(){
        i = 0;
        for(x = dia ; x <= 7 ; x++ ){
            if(diames+i>monthdays[mes]){
                document.getElementById("dia"+x).innerHTML="";
            }else{
                document.getElementById("dia"+x).innerHTML=diames+i;
                i++;
            }

        }
        i = 1;
        for(x = dia-1 ; x > 0 ; x-- ){
            if(diames-1<1 || diames-i==0){
                document.getElementById("dia"+x).innerHTML="";
            }else{
                document.getElementById("dia"+x).innerHTML=diames-i;
                i++;
            }
        }
    }
    function semanaAnt(){
       if(document.getElementById("diaSiguiente").style.visibility="hidden"){
           document.getElementById("diaSiguiente").style.visibility="visible";
       }
       dia1 = document.getElementById("dia1").textContent-1;
       for(x = 7 ; x > 0 ; x--){
           if(dia1<1){
               document.getElementById("dia"+x).innerHTML="";
               document.getElementById("diaAnterior").style.visibility="hidden";
           }else{
               document.getElementById("dia"+x).innerHTML=dia1;
               dia1--;
           }

       }
        validarPrincipioSemana();
    }
    function semanaPos(){
        if(document.getElementById("diaAnterior").style.visibility="hidden"){
            document.getElementById("diaAnterior").style.visibility="visible";
        }
        dia7 = parseInt(document.getElementById("dia7").textContent)+1;

        for(x=1;x<=7;x++)
        {
            if(dia7>monthdays[mes])
            {
                document.getElementById("dia"+x).innerHTML="";
                document.getElementById("diaSiguiente").style.visibility="hidden";
            }
            else
            {
                document.getElementById("dia"+x).innerHTML=dia7;
                dia7++;
            }
        }
        validarFinSemana();

    }
    function vaciarCampos(){
        for(x = 1; x <= 7 ; x++){
            document.getElementById("dia"+x).innerHTML="";
        }
    }
    function activarBotonSemanas(){
        document.getElementById("diaAnterior").style.visibility="visible";
        document.getElementById("diaSiguiente").style.visibility="visible";
    }
    function validarInicioSemana(){
        i = 1;
        for(x = dia-1 ; x >= 0 ; x-- ){
            if(diames-1<1 || diames-i==0){
                document.getElementById("diaAnterior").style.visibility="hidden";
            }
        }
    }
    function validarFinSemana(){
        // Esto es una validación para los meses que terminan en Domingo
        var dia7 = document.getElementById("dia7").textContent; //31

        if(dia7>=monthdays[mes] || dia7==""){
            document.getElementById("diaSiguiente").style.visibility="hidden";
        }
    }
    function validarPrincipioSemana(){
        // Esto es una validación para los meses que empiezan en Lunes
        var dia1 = document.getElementById("dia1").textContent;
        if(dia1<=1 || dia1 == null){
            document.getElementById("diaAnterior").style.visibility="hidden";
        }
    }


</script>
</head>

<body onload="meses()">

<div class="container">
    <img src="img/logo.jpg" alt="egibide"/>

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
     <div class="row marginTop">
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
                    <th>Lunes <br> <span id="dia1" class="dia"></span></th>
                    <th>Martes <br> <span id="dia2" class="dia"></span></th>
                    <th>Miércoles<br> <span id="dia3" class="dia"></span></th>
                    <th>Jueves<br> <span id="dia4" class="dia"></span></th>
                    <th>Viernes<br> <span id="dia5" class="dia"></span></th>
                    <th class="findeSemana">Sabado<br> <span id="dia6" class="dia"></span></th>
                    <th class="findeSemana">Domingo<br> <span id="dia7" class="dia"></span></th>
                    <th><a onclick="semanaPos();" id="diaSiguiente" class="puntero"><span class="glyphicon  glyphicon-chevron-right marginTop"></span></a></th>

                </tr>
                <tr>
                    <th>8:00 - 9:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>   

                <tr>
                    <th>9:00 - 10:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>10:00 - 11:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>11:00 - 11:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>11:00 - 12:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>12:00 - 13:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>14:00 - 15:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>15:00 - 16:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>16:00 - 17:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>17:00 - 18:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>18:00 - 19:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>

                <tr>
                    <th>19:00 - 20:00</th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                    <th><img src="img/no.png" alt=""/></th>
                </tr>
            </table>
          </div>
    </div>
         <?php
         if(isset($_SESSION['persona']))

            {?>
                <div class="col-md-3">
                    <h3 style="text-align: center">Bienvenido <?php

                            echo $objeto->getNombre();

                        ?></h3><br/>

                </div>
            <?php
            }
            else
            {
                if(isset($_GET['men'])){
                    echo $_GET['men'];

                }
                ?>

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
