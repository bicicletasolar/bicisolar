//Calendario y módulos reserva

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
var biciSel = false;

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
    men = "";
    if(mensaje == 1){
        men = "Reserva realizada con éxito";
        document.getElementById("mensajeReserva").className='alert alert-success';
        document.getElementById("mensajeReserva").innerHTML=men;
    }else{
        document.getElementById("mensajeReserva").className='alert alert-danger';
        document.getElementById("mensajeReserva").innerHTML=mensaje;
    }
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
                        if(!biciSel){
                            document.getElementById("errorHoras").style.visibility="visible";
                            document.getElementById("errorHoras").innerHTML="Selecciona una bicicleta";
                        }else{
                            document.getElementById("errorHoras").style.visibility="hidden";
                        }
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


    if(diasValido && horasValido && reservaValido && centroSel && biciSel && diaValido)
        valido = true;

}
function vaciarHoras(){

    for(var x in reserva){
        document.getElementById(reserva[x]).src="img/no.png";
    }
    reserva = new Array();
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

        while(document.getElementById("bici").options.length > 0){
            document.getElementById("bici").remove(0);
        }

    b = JSON.parse(bici);
    document.getElementById("bici").style.visibility="visible";
    document.getElementById("titulobici").style.visibility="visible";
    centroSel = true;
    capa = document.getElementById("bici");
    var option = document.createElement("option");
    option.text = "Selecciona";
    capa.add(option);

    for(var i in b){
        var option = document.createElement("option");
        option.text = b[i].id_bicicleta;
        capa.add(option);
    }


}
function cogerReservasBD(bici){
    biciSel = true;

    indice = document.getElementById("centro").selectedIndex;
    centro = document.getElementById("centro")[indice].value;
    crearObjeto();

    xmlhttp.onreadystatechange = function(){

        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            procesarDatos(xmlhttp.responseText);
        }
    }

    xmlhttp.open("POST", "http://localhost/bicisolar/trunk/bicicleta_solar/Controlador/AJAX/biciCentro.php", true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=utf-8');
    xmlhttp.send("centro="+centro+"&bici="+bici.value);
}
function procesarDatos(reservas){
    alert(reservas);
    //r = JSON.parse(reservas)

}
