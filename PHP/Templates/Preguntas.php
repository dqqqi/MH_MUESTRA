<?php 
  include_once '../private/clases/faqDB.php';

  use BDD\Tables\FAQ;

  $faq = new FAQ();

  $faqData = $faq->getFAQ();

  $getFaq = $faqData->fetchAll();
?>
  <!--SLIDER-->
  <i class='bx bxs-help-circle '></i>
  <div class="wrapper">
    <div class="slider">
        <a href="#slideContainer"><span class="ctrl" onclick="slideActual(1)">preguntas frecuentes</span></a>
        <a href="#slideContainer2"><span class="ctrl" onclick="slideActual(2)">¿no encuentra su pregunta?</span></a>
      

      <!---CARD crear un reclamo---->

      <ul>
        <li class="slide desv">
            <div class="slideContainer" id="slideContainer">             
           <a href="#p1"> <div class="extensible"><div class="extnum animext1">1</div><div class="ext" onclick="openReal('p1');">¿Como crear un formulario?</div></div></a>
            <div class="real animext" id="p1">
              <section class="carousel">
  <div class="container">
              <div class="cards">
            <div class="card" >
              <img class="cardimg" src="../../Resources/imgs/tutorial1.PNG" alt="placeholder"  width="400" height="250">
              <div class="container">
              <h5><b><h4>paso 1</h4> Dirigirse a la página de creación de formularios</b></h5>
                <div class="content"><p class="cardtxt">Primero hay que dar click en la parte superior de la pantalla, donde se encuentra el botón "Encuesta", el cual lo dirigirá a la página de creación de formularios.</p></div>
                <br> 
              </div>
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/tutorial2.PNG" alt="placeholder"  width="400" height="250">
              <div class="container">
              <h5><b><h4>paso 2</h4> Seleccionar y rellenar el formulario digital</b></h5>
                <div class="content"><p class="cardtxt">Seleccionar la opción "Completar formulario en linea" y proceder a completar los datos requeridos para el envío del formulario correctamente.</p></div>
                <br>
              </div>         
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/tutorial3.PNG" alt="placeholder"  width="400" height="250">
              <div class="container">
              <h5><b><h4>paso 3</h4> Adjuntar archivos y enviar formulario</b></h5>
                <div class="content"><p class="cardtxt">Seleccionar archivos extra que se quieran enviar junto al formulario (como fotos, vídeos, etc.), y finalmente tocar el botón "Enviar formulario".</p></div>
                <br>  
                  
              </div> 
            </div>
          </div>
        </div>
        </section>   
</div>
<div class="underlinetwo"></div>  
<a href="#p2"><div class="extensible"><div class="extnum animext1">2</div><div class="ext" onclick="openReal('p2');">¿Como ver un formulario?</div></div></a>
            <div class="real animext" id="p2">
              <section class="carousel">
  <div class="container">
              <div class="cards">
            <div class="card" >
              <img class="cardimg" src="../../Resources/imgs/tut1.PNG" alt="placeholder"  width="400" height="250">
              <div class="container">
                <h5><b><h4>paso 1</h4> Dirigirse a la página de visualización de formularios</b></h5>
                <div class="content"><p class="cardtxt">Primero hay que dar click en la parte superior de la pantalla, donde se encuentra el botón "Sus formularios", el cual lo dirigirá a la página de vista de sus formularios.</p></div>
                <br> 
              </div>
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/tut2.PNG" alt="placeholder"  width="400" height="250">
              <div class="container">
                <h5><b><h4>paso 2</h4> Podra visualizar la vista simple del formulario</b></h5>
                <div class="content"><p class="cardtxt">Clickee su formulario para poder visualizar la vista expandida, que contiene más información.</p></div>
                <br>
              </div>         
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/tut3.PNG" alt="placeholder"  width="400" height="250">
              <div class="container">
                <h5><b><h4>paso 3</h4> Como cerrar la vista expandida </b></h5>
                <div class="content"><p class="cardtxt">Para cerrar la vista expandida, clickee otra vez en la fila de sus formulario. El administrador podra modificar sus datos</p></div>
                <br>  
                  
              </div> 
            </div>
          </div>
        </div>
        </section>   

         
            </div>
            <div class="underlinetwo"></div> 
        </li>
        

     <!---CARD ver reclamos---->

        <li class="slide desv">
        <div class="slideContainer" id="slideContainer2">
            <div class="extensible"><div class="extnum animext1">1</div><div class="ext"onclick="openReal('p0')">Contactanos por e-mail</div></div>
            <div class="real animext" id="p0"><a href="#">Una pena che</a></div>
            <div class="underlinetwo"></div>
        </div>
        </li>
      </ul>
    </div>
  </div>

<!--Scripts-->
    <script src="../../JS/Faqbuttons.js"></script>
    <script src="../../JS/expand.js"></script>