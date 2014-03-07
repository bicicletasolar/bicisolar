<?php
namespace bicicleta_solar\Vista;
require_once __DIR__."/../Controlador/ControladorClass.php";
use bicicleta_solar\Controlador;

?>

<title>Baterías</title>
<meta charset="utf-8">
<script type="text/javascript">
    function crearSelect(){
        // Para Años
        capa = document.getElementById("anio");
        i = 2014;
        for(x = 0 ; x < 20 ; x++){
            capa.options[x]=new Option(i,i);
            i++
        }

        // Para Mes
        capa = document.getElementById("mes");
        var option = document.createElement("option");
        option.text = "Selecciona";
        capa.add(option);
        meses=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        for(x = 0 ; x <= 11 ; x++){
            //capa.options[x]=new Option(meses[x],x);
            var option = document.createElement("option");
            option.text = meses[x];
            option.value = x;
            capa.add(option);
        }



    }
    function calcularDias(mes){
        // Para Días
        capa = document.getElementById("dia");

        while(capa.options.length > 0){
            capa.remove(0);
        }

        monthdays = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        capa.className="form-control anchoSelect2";
        for(x = 0 ; x < monthdays[mes.value] ; x++){
            capa.options[x]=new Option(x+1,x+1);
        }

    }

    // Esto esta hecho por ohiane y pertenece al grafico de la bateria general y las baterias de las bicis.

    var maxprogress_general = 120;
    var actualprogress_general = 0;
    var itv_general = 0;
    function prog_general()
    {
        if(actualprogress_general >= maxprogress_general)
        {
            clearInterval(itv_general);
            maxprogress_general = 120;
            actualprogress_general = 0;
            itv_general = setInterval(prog_general, 100)

        }
        var progressnum_general = document.getElementById("progressnum_general");
        var indicador_general = document.getElementById("indicador_general");
        actualprogress_general += 1;
        indicador_general.style.width=actualprogress_general + "px";
        progressnum_general.innerHTML = (maxprogress_general - actualprogress_general) + " MS Faltantes";
    }

    var maxprogress_bici1 = 68;
    var actualprogress_bici1 = 0;
    var itv_bici1 = 0;
    function prog_bici1()
    {
        if(actualprogress_bici1 >= maxprogress_bici1)
        {
            clearInterval(itv_bici1);
            maxprogress_bici1 = 68;
            actualprogress_bici1 = 0;
            itv_bici1 = setInterval(prog_bici1, 100)

        }
        var progressnum_bici1 = document.getElementById("progressnum_bici1");
        var indicador_bici1 = document.getElementById("indicador_bici1");
        actualprogress_bici1 += 1;
        indicador_bici1.style.height=actualprogress_bici1 + "px";
        progressnum_bici1.innerHTML = (maxprogress_bici1 - actualprogress_bici1) + " %";
    }

    var maxprogress_bici2 = 68;
    var actualprogress_bici2 = 0;
    var itv_bici2 = 0;
    function prog_bici2()
    {
        if(actualprogress_bici2 >= maxprogress_bici2)
        {
            clearInterval(itv_bici2);
            maxprogress_bici2 = 68;
            actualprogress_bici2 = 0;
            itv_bici2 = setInterval(prog_bici2, 100)

        }
        var progressnum_bici2 = document.getElementById("progressnum_bici2");
        var indicador_bici2 = document.getElementById("indicador_bici2");
        actualprogress_bici2 += 1;
        indicador_bici2.style.height=actualprogress_bici2 + "px";
        progressnum_bici2.innerHTML = (maxprogress_bici2 - actualprogress_bici2) + " %";
    }
    function iniciar()
    {
        itv_general = setInterval(prog_general, 100);
        itv_bici1 = setInterval(prog_bici1, 100);
        itv_bici2 = setInterval(prog_bici2, 100);
        //t_general=setTimeout("llamadaAjax_general()",9000);
        //t_bici1=setTimeout("llamadaAjax_bici1()",9000);
        //t_bici2=setTimeout("llamadaAjax_bici2()",9000);
        crearSelect();
    }
    function vaciarCampos(){
        capa= document.getElementById("dia");
        capa.className = "form-control anchoSelect";
        while(capa.options.length > 0){
            capa.remove(0);
        }
        capa.options[0] = new Option("Selecciona");
    }
    function llamadaAjax_general()
    {
        crearObjeto();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                progressnum_general.innerHTML = xmlhttp.responseText + " %";
            }
        }

        xmlhttp.open("POST","http://..../carga_general.php", true);
        xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=utf-8');
        xmlhttp.send("id_arbol=1");
    }
</script>
</head>

<body onload="iniciar() <?php Controlador\Controlador::selectBateria(); ?>">

<div class="container">
    <img src="img/logo.jpg" alt="egibide"/>

    <!-- Menú -->
    <div class="masthead">
        <ul class="nav nav-justified" id="menu">
            <li><a href="#" id="act">Presentación</a></li>
            <li><a href="reservas.php">Reservas</a></li>
            <li><a href="#">Proyecto</a></li>
            <li><a href="#">Participantes</a></li>
            <li><a href="#">Patricionadores</a></li>
            <li class="active"><a href="bateria.php">Baterías</a></li>
        </ul>
    </div>
    <!-- Fin Menú -->
<?php
require_once __DIR__.'/header.php';
?>

    <div class="row marginTop">

        <!-- Gráfico Árbol-->
        <div class="col-md-7">
            <h2 style="text-align: center">Grafico de Árbol</h2>
            <div id="imagen_baterias">

            <div id="bateria_general">
                <div id="precargador_general">

                    <div id="progressbar_general">
                        <div id="indicador_general"></div>
                    </div>
                    <p id="progressnum_general"></p>
                </div>
            </div>
            <div id="bateria_bici1">
                <div id="precargador_bici1">

                    <div id="progressbar_bici1">
                        <div id="indicador_bici1"></div>
                    </div>
                    <p id="progressnum_bici1"></p>
                </div>
            </div>
            <div id="bateria_bici2">
                <div id="precargador_bici2">

                    <div id="progressbar_bici2">
                        <div id="indicador_bici2"></div>
                    </div>
                    <p id="progressnum_bici2"></p>
                </div>
            </div>
            </div>
        </div>


        <!-- Gráfico de bateria-->
        <div class="col-md-5 centered ">
            <h2 style="text-align: center">Grafico de Batería</h2>
            <form class="form-horizontal">

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="anio">Año *</label>
                        <div class="col-md-4">
                            <select id="anio" name="anio" class="form-control anchoSelect">
                            </select>
                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="mes">Mes (opcional)</label>
                        <div class="col-md-4">
                            <select id="mes" name="mes" class="form-control anchoSelect" onchange="calcularDias(this);">
                            </select>
                        </div>
                    </div>

                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="dia">Día (opcional)</label>
                        <div class="col-md-4">
                            <select id="dia" name="dia" class="form-control anchoSelect">
                                <option value="Selecciona">Selecciona</option>
                            </select>
                        </div>
                    </div>

                </fieldset>
                <input type="button" class="btn btn-primary" value="Procesar"/>
                <input type="reset" class="btn btn-primary" value="Restablecer" onclick="vaciarCampos();"/>

            </form>

            </fieldset>
            </form>

            <img src="img/grafica.png" class="centered">
                <canvas id="nuestroCanvas"  width="451" height="274">

                </canvas>
            </img>
        </div>
        <!-- Fin de grafico de bateria-->


    </div>



<?php
require_once __DIR__.'/footer.php';
?>
