<?php
require_once __DIR__.'/header.php';
require_once __DIR__.'/../Controlador/ControladorClass.php';
require_once __DIR__.'/../Modelo/Base/CentroClass.php';


use Bicicleta_solar\Controlador\Controlador;
use Bicicleta_solar\Modelo\Base\Centro;


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
    var reserva;

    function meses(){
        reserva = new Array();
        meses=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        mesesIn = new Array("January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December" );
        dias=new Array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
        monthdays = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        var fecha=new Date();
        mes= fecha.getMonth();
        dia= fecha.getDay();
            if(dia == 0){
                // Arreglo para los domingos getDay = 0 lo iniciamos a 7
                dia = 7;
            }
        anio = fecha.getFullYear();
        diames = fecha.getDate();


        document.getElementById("mes").innerHTML=meses[mes];
        document.getElementById("dia"+dia).innerHTML=diames;
        document.getElementById("anio").innerHTML=anio;

        cargarDias();

        var dia7 = document.getElementById("dia7").textContent;
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
               // document.getElementById("tr"+x).className='nohabil';
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
               //document.getElementsByClassName("img"+x).style.backgroundColor="red";
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
        quitarNoHabil();
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
    function quitarNoHabil(){
        for(x = 1; x <= 6 ; x++){
            document.getElementById("tr"+x).className="";
        }
    }
    function activarHora(hora){
        capa =  document.getElementById(hora.id);
        existe = true;

        for(var x in reserva){
            if(reserva[x]==capa.id){
                delete reserva[x];
                existe = false;
            }

                //document.getElementById("errorHoras").style.visibility="visible";
                //document.getElementById("errorHoras").innerHTML="Las horas deben ser continuas";

        }
        if(existe){
            capa.src="img/si.png";
            reserva.push(hora.id);
        }else{
            capa.src="img/no.png";
        }

    }


</script>
</head>

<body onload="meses()">

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
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img1" 81" id="81"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img2" 82" id="82"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img3" 83" id="83"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img4" 84" id="84"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="img5" 85" id="85"/></th>
                </tr>   

                <tr>
                    <th>9:00 - 10:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 91" id="91"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 92" id="92"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 93" id="93"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 94" id="94"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 95" id="95"/></th>
                </tr>

                <tr>
                    <th>10:00 - 11:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 101" id="101"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 102" id="102"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 103" id="103"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 104" id="104"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 105" id="105"/></th>
                </tr>

                <tr>
                    <th>11:00 - 11:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 111" id="111"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 112" id="112"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 113" id="113"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 114" id="114"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 115" id="115"/></th>
                </tr>

                <tr>
                    <th>11:00 - 12:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 121" id="121"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 122" id="122"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 123" id="123"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 124" id="124"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 125" id="125"/></th>
                </tr>

                <tr>
                    <th>12:00 - 13:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 131" id="131"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 132" id="132"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 133" id="133"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 134" id="134"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 135" id="135"/></th>
                </tr>

                <tr>
                    <th>14:00 - 15:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 141" id="141"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 142" id="142"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 143" id="143"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 144" id="144"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 145" id="145"/></th>
                </tr>

                <tr>
                    <th>15:00 - 16:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 151" id="151"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 152" id="152"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 153" id="153"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 154" id="154"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 155" id="155"/></th>
                </tr>

                <tr>
                    <th>16:00 - 17:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 161" id="161"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 162" id="162"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 163" id="163"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 164" id="164"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 165" id="165"/></th>
                </tr>

                <tr>
                    <th>17:00 - 18:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 171" id="171"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 172" id="172"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 173" id="173"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 174" id="174"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 175" id="175"/></th>
                </tr>

                <tr>
                    <th>18:00 - 19:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 181" id="181"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 182" id="182"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 183" id="183"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 184" id="184"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 185" id="185"/></th>
                </tr>

                <tr>
                    <th>19:00 - 20:00</th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 191" id="191"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 192" id="192"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 193" id="193"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 194" id="194"/></th>
                    <th><img src="img/no.png" onclick="activarHora(this);" class="" 195" id="195"/></th>
                </tr>
            </table>
          </div>
          <div class="alert alert-warning oculto" id="errorHoras"></div>
    </div>
                <div class="col-md-4">
                        <?php
                            if(isset($_SESSION['persona'])){
                        ?>
                        <h4>Bienvenido
                        <?php
                            echo ucfirst ($objeto->getNombre());

                            $arrayCentros=Controlador::sacarCentros();
                        ?>
                        <br/><br/>

                                <!-- Select Basic -->
                                    <label class="col-md-4 control-label" for="centro">Centro </label>
                                    <div class="col-md-4">
                                        <select id="centro" name="centro" class="form-control centroAnchor">
                                         <?php
                                            foreach($arrayCentros as $valor)
                                            {
                                         ?>
                                            <option value="<?php echo $valor->getNombre(); ?>"><?php echo $valor->getNombre(); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div><br/><br/><br/>

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
require_once __DIR__.'/footer.php';
?>
