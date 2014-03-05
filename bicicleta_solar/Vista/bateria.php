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
        meses=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        capa = document.getElementById("mes");
        for(x = 0 ; x <= 11 ; x++){
            capa.options[x]=new Option(meses[x],x);
        }

    }
    function calcularDias(mes){
        // Para Días
        monthdays = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);


        capa = document.getElementById("dia");
        for(x = 0 ; x < monthdays[mes.value] ; x++){
            capa.options[x]=new Option(x+1,x+1);
        }

    }

</script>
</head>

<body onload="crearSelect();">

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
                            <select id="dia" name="dia" class="form-control anchoSelect2">

                            </select>
                        </div>
                    </div>

                </fieldset>
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
