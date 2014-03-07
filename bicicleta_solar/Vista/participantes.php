<?php
    require_once __DIR__."/header.php";
?>
    <title>Participantes</title>
    <script>
        function sacar(){
            document.getElementById('oculto').style.display='block';
        }
        function ocultar(){
            document.getElementById('oculto').style.display='none';
        }
    </script>
</head>
<body>
<div class="container">

    <img src="img/logo.jpg" class="" egibide"/>

    <!-- Menú -->
    <div class="masthead">
        <ul class="nav nav-justified" id="menu">
            <li><a href="#" id="act">Presentación</a></li>
            <li><a href="reservas.php">Reservas</a></li>
            <li><a href="#">Proyecto</a></li>
            <li class="active"><a href="participantes.php">Participantes</a></li>
            <li><a href="#">Patricionadores</a></li>
            <li><a href="bateria.php">Baterías</a></li>
        </ul>
    </div>

    <div class="col-md-12">
    <div class="centered">
        <h1>ÁRBOL SOLAR - BICICLETA ELÉCTRICA</h1>
        <h3>Proyecto BETEKU</h3>
    </div>
    <div id="texto">
        <p>
            Este proyecto surge en el año 2011-2012 cuando el profesor Unai Abaunza Zearsolo junto con los alumnos de PCPI transformaron una bicicleta normal en una bicicleta eléctrica. En esta primera experiencia todo se realizó reutilizando una batería desechada de coche y un motor de un patinete eléctrico. La construcción, aunque casera debido a la escasez de medios, fue muy positiva consiguiendo la implicación del alumnado y el éxito del montaje.
                  <p>
                    En base a esto, Jagoba Epalza Palacios propuso la ampliación del proyecto buscando la participación de diferentes departamentos y sus grados asociados para alcanzar un objetivo final más ambicioso. Con esto se pretendía mostrar la potencia que tiene la colaboración de las diferentes especialidades  y enseñar un funcionamiento más semejante al que se tiene dentro de una empresa. Además este proyecto ayudaba a fomentar la relación interdepartamental.
                  </p>

            <input type="button" value="Leer mas" name="mas" onclick="sacar();"/><br/>
        <div id="oculto" style="display: none;">
        <p>
            Para poder gestionar este proyecto, y gracias a la colaboración de Kutxabank, en un  primer momento entró Arturo Valiente Bengoa para realizar las tareas de supervisión, gestión y colaboración con el diseño  electrónico. Y más tarde entro a colaborar y Mikel Fernández García.
        </p>
        <p>

            Con ese punto de partida, el proyecto empezó a llevarse a cabo y gracias a la colaboración de diferentes departamentos se fueron desarrollando las diversas partes del proyecto. Las tareas que se llevaron a cabo son las siguientes:

            <h4>DEPARTAMENTO DE MANTENIMIENTO</h4>
            <p>
                En este departamento, el profesor Juanjo Vivanco dirigió el diseño y montaje del Árbol Solar. Con los alumnos del Grado Soldadura fueron construyendo las diferentes ramas del árbol solar donde van sujetos los paneles fotovoltaicos. Partiendo de barras de acero de 6m, las fueron moldeando para darles la forma adecuada y cortándolas para ajustar las medidas correctas de las ramas. Además hicieron las pletinas de sujeción de los paneles solares. Una labor que además de técnica llega a tener un aspecto artístico digno de valorar.
            </p>
        <h4>DEPARTAMENTO DE INFORMÁTICA</h4>
        <p>
            En este departamento hubo dos colaboraciones distintas. En una primera instancia el profesor Ion Jauregui Alzo desarrolló un programa de comunicación con el micro que lleva la electrónica que controla el estado de la carga de las baterías. Un programa que almacena los datos recibidos en una base de datos que nos permite explotar esos datos para mostrarlos a través de una web. Un trabajo que aunque puede pasar inadvertido, es totalmente imprescindible para lograr los objetivos.
        </p>
        <p>
            La segunda colaboración fue través de la profesora Oihane Garcia Bolumburu quién dirigió el proyecto fin de grado de sus alumnos de informática. Ellos llevaron a cabo el desarrollo de la web donde se muestra una visión general de la instalación, el estado de carga de las baterías, y nos permite la reserva de la bicicleta eléctrica. Una labor que pone el proyecto al alcance de todos y donde se pueden empezar a ver los resultados del proyecto de manera muy visual y muy agradecida. Pero lo mejor será que os lo expliquen ellos mismos:
        </p>
            <img src="img/foto22.jpg" width="568px" height="400px"  alt=""/>
        <h4>DEPARTAMENTO DE ELECTRICIDAD-ELECTRÓNICA</h4>
        <p>
            Como ya hemos comentado antes, gracias a la colaboración de Unai Abaunza Zearsoloy los alumnos de 2ºcurso de PCPI se ha montado el kit de conversión eléctrica. Este año, se partía de materiales de mayor calidad. El resultado ha sido un montaje impecable, como si todo hubiera salido de la fábrica.
            Los alumnos de 2º que han participado en el montaje durante los dos últimos años afirman lo siguiente:
            “El proyecto nos ha gustado, ya que la clase se hacía agradable. Este año ha sido más fácil teniendo en cuenta que el año pasado tuvimos que construir material extra para acoplar el montaje a la bicicleta. Este año en cambio, solo ha habido que montar el material que venía preparado.”
        </p>
        <img src="img/foto11.png" width="568px" height="319px" alt=""/>
        <p>
            Este proyecto tampoco habría sido posible sin la colaboración del centro de Jesús Obrero y la indispensable ayuda de Jon Fernández Alday. Jon ha sido la referencia para poder trabajar en Jesús Obrero y siempre dispuesto a colaborar nos ha ayudado mucho en la realización de las compras, asesoramiento y en cualquier cosa que nos hiciera falta.
        </p>
        <p>
            Y por supuesto, este proyecto nunca habría sido llevado a cabo sin la energía, la creatividad y la persistencia de Jagoba Epalza Palacios, quién ha tirado del proyecto cada día y sin descanso. A pesar de las adversidades que iban surgiendo por el camino, nunca tiró la toalla y fue una fuente de creatividad para que el proyecto creciera en interés y siempre superara las dificultades que aparecían en el camino. Hizo una apuesta arriesgada, valiente y acertada.
        </p>
        <p>
            Tampoco olvidar a todos los que también han colaborado y apoyado este proyecto. Dar las gracias a Jose Antonio Fernández Gallardo, que siempre estuvo dispuesto a dedicar su tiempo para ayudar a lograr que este proyecto funcionara. También agradecer a mucha otra gente que se ha preocupado, interesado y colaborado con el proyecto.
        </p>
        <p>
            Muchas gracias a todos.
        </p>
        <input type="button" value="Leer menos" name="menos" onclick="ocultar();"/>
        </div>


    <?php
    require_once __DIR__."/footer.php";
    ?>




