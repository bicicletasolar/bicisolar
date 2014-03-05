<?php

    require_once __DIR__.'/header.php';
    require_once __DIR__.'/../Controlador/ControladorClass.php';
    require_once __DIR__.'/../Modelo/Base/CentroClass.php';




use bicicleta_solar\Controlador\Controlador;

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
    var valido;
    var diasReserva;
    var horasReserva;
    var r; // Objeto reserva final
    var centroSel = false;

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
            vaciarHoras()
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
            vaciarHoras()
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
        vaciarHoras()
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
        vaciarHoras()
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
                //delete reserva[x];
                reserva.splice(x,1);
                existe = false;
            }



        }
        if(existe){
            capa.src="img/si.png";
            reserva.push(hora.id);
        }else{
            capa.src="img/no.png";
        }

    }
    function reservar(){
      validar();
      if(valido){
          diaReserva = parseInt(document.getElementById("dia"+diasReserva[0]).textContent)+1;
          mesReserva = mes+1;
          anioReserva = document.getElementById("anio").textContent;
          horaInicio= horasReserva[0];
          horaFin = parseInt(horasReserva[horasReserva.length-1])+1;
          horaFin = horaFin.toString();
          fechaReserva = new Date(anioReserva+"-"+mesReserva+"-"+diaReserva);
          centroReserva = document.getElementById("centro").value;
          indice = document.getElementById("bici").selectedIndex;
          biciReserva = document.getElementById("bici")[indice].value;

          r = new Reserva(fechaReserva,horaInicio,horaFin);
          r.addCentro(centroReserva);
          r.addBici(biciReserva);

          console.log(r);
          enviarReserva();

      }
    }
    function enviarReserva(){
        crearObjeto();
        r = JSON.stringify(r);
        xmlhttp.onreadystatechange = function(){

            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                procesarReserva(xmlhttp.responseText);
            }
        }

        xmlhttp.open("POST", "http://localhost/bicisolar/trunk/bicicleta_solar/Controlador/AJAX/enviarReserva.php", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf-8');
        xmlhttp.send("r="+r);
    }
    function procesarReserva(mensaje){
        alert(mensaje);
    }
    function validar(){
        diasReserva=new Array();
        horasReserva=new Array();
        reservaValido = false;
        diasValido = false;
        horasValido = false;
        diaValido = false;
        valido = false;
        reserva = reserva.sort();


        //Validar que reservas no está vacío
        if(reserva.length==0)
        {
            document.getElementById("errorHoras").style.visibility="visible";
            document.getElementById("errorHoras").innerHTML="Seleccione al menos una hora";
        }
        else
        {
            document.getElementById("errorHoras").style.visibility="hidden";
            reservaValido = true;

            // Validar que la reserva es para un día
            for(var x in reserva){
                diasReserva[x]=reserva[x].charAt(reserva[x].length-1); // Cogemos el día 3
                horasReserva[x]=reserva[x].substr(0,reserva[x].length-1); //Cogemos la hora
                horasReserva = horasReserva.sort(); // Ordenar horas
            }

            for(i = 0; i < diasReserva.length && diasReserva[0] == diasReserva[i]; i++);
            if(i == diasReserva.length){
                diasValido = true;
                document.getElementById("errorHoras").style.visibility="hidden";
                //Validar horas continuas
                for(i = 0; i < horasReserva.length && parseInt(horasReserva[0])+i==horasReserva[i];i++);
                if(i == horasReserva.length){
                    horasValido = true;
                    document.getElementById("errorHoras").style.visibility="hidden";
                    if(document.getElementById("dia"+diasReserva[0]).textContent==""){
                        document.getElementById("errorHoras").style.visibility="visible";
                        document.getElementById("errorHoras").innerHTML="Este día no es posible reservar";
                    }else{
                        if(!centroSel){
                            document.getElementById("errorHoras").style.visibility="visible";
                            document.getElementById("errorHoras").innerHTML="Selecciona un Centro";

                        }else{
                            document.getElementById("errorHoras").style.visibility="hidden";
                        }
                        diaValido = true;
                    }
                }else{
                    document.getElementById("errorHoras").style.visibility="visible";
                    document.getElementById("errorHoras").innerHTML="Todas las horas deben ser continuas";
                }
            }else{
                document.getElementById("errorHoras").style.visibility="visible";
                document.getElementById("errorHoras").innerHTML="La reserva debe de ser para máximo un día";
            }
        }

                //PENDIENTE VALIDAR DIAS VACIOS

        if(diasValido && horasValido && reservaValido && centroSel)
            valido = true;

    }
    function vaciarHoras(){

        for(var x in reserva){
            document.getElementById(reserva[x]).src="img/no.png";
        }
        reserva = new Array();
        console.log(reserva);
    }
    function crearObjeto(){

        try
        {
            xmlhttp = new XMLHttpRequest();

        }
        catch (a)
        {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                alert("objeto creado en internet explorer antiguo");
            }
            catch (b) {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            }
        }

    }
    function cogerBicicleta(){

        indice = document.getElementById("centro").selectedIndex;
        centro = document.getElementById("centro")[indice].value;

        crearObjeto();

        xmlhttp.onreadystatechange = function(){

            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                procesarCentro(xmlhttp.responseText);
            }
        }

        xmlhttp.open("POST", "http://localhost/bicisolar/trunk/bicicleta_solar/Controlador/AJAX/cogerBici.php", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf-8');
        xmlhttp.send("centro="+centro);
    }
    function procesarCentro(bici){
        b = JSON.parse(bici);
        document.getElementById("bici").style.visibility="visible";
        document.getElementById("titulobici").style.visibility="visible";
        centroSel = true;
        capa = document.getElementById("bici");
        for(var i in b){
            capa.options[i]=new Option(b[i].id_bicicleta,b[i].id_bicicleta);
        }
    }



</script>
</head>

<body onload="meses()">

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
                                <label class="col-md-4 control-label" for="centro">Centros </label>
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
                                <label class="col-md-4 control-label oculto" for="bici" id="titulobici">Bicicleta </label>
                                <div class="col-md-4">
                                    <select id="bici" name="bici" class="form-control centroAnchor oculto">

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
require_once __DIR__.'/footer.php';
?>
