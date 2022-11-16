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
           <a href="#p1"> <div class="extensible"><div class="extnum animext1">1</div><div class="ext" onclick="openReal('p1');">¿Como crear un reclamo?</div></div></a>
            <div class="real animext" id="p1">
              <section class="carousel">
  <div class="container">
              <div class="cards">
            <div class="card" >
              <img class="cardimg" src="../../Resources/imgs/card.jpg" alt="placeholder"  width="400" height="250">
              <div class="container">
              <h5><b><h4>paso 1</h4> Dirigirse a la página de creación de reclamos</b></h5>
                <div class="content"><p class="cardtxt">Primero hay que dar click en la parte superior de la pantalla, donde se encuentra el botón "Iniciar reclamos", el cual lo dirigirá a la página de creación de reclamos.</p></div>
                <br> 
              </div>
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/card.jpg" alt="placeholder"  width="400" height="250">
              <div class="container">
              <h5><b><h4>paso 2</h4> Seleccionar y rellenar el formulario digital</b></h5>
                <div class="content"><p class="cardtxt">Seleccionar la opción "Completar formulario en linea" y proceder a completar los datos requeridos para el envío del formulario correctamente.</p></div>
                <br>
              </div>         
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/card.jpg" alt="placeholder"  width="400" height="250">
              <div class="container">
              <h5><b><h4>paso 3</h4> Adjuntar archivos y enviar formulario</b></h5>
                <div class="content"><p class="cardtxt">Seleccionar archivos extra que se quieran enviar junto al reclamo (como fotos, vídeos, etc.), y finalmente tocar el botón "Enviar formulario".</p></div>
                <br>  
                  
              </div> 
            </div>
          </div>
        </div>
        </section>   
</div>
<div class="underlinetwo"></div>  
<a href="#p2"><div class="extensible"><div class="extnum animext1">2</div><div class="ext" onclick="openReal('p2');">¿Como ver un reclamo?</div></div></a>
            <div class="real animext" id="p2">
              <section class="carousel">
  <div class="container">
              <div class="cards">
            <div class="card" >
              <img class="cardimg" src="../../Resources/imgs/card1.jpg" alt="placeholder"  width="400" height="250">
              <div class="container">
                <h5><b><h4>paso 1</h4> Dirigirse a la página de creación de reclamos</b></h5>
                <div class="content"><p class="cardtxt">Primero hay que dar click en la parte superior de la pantalla, donde se encuentra el botón "Iniciar reclamos", el cual lo dirigirá a la página de creación de reclamos.</p></div>
                <br> 
              </div>
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/card1.jpg" alt="placeholder"  width="400" height="250">
              <div class="container">
                <h5><b><h4>paso 2</h4> Seleccionar y rellenar el formulario digital</b></h5>
                <div class="content"><p class="cardtxt">Seleccionar la opción "Completar formulario en linea" y proceder a completar los datos requeridos para el envío del formulario correctamente.</p></div>
                <br>
              </div>         
            </div>
            <div class="card">
              <img class="cardimg" src="../../Resources/imgs/card1.jpg" alt="placeholder"  width="400" height="250">
              <div class="container">
                <h5><b><h4>paso 3</h4> Adjuntar archivos y enviar formulario</b></h5>
                <div class="content"><p class="cardtxt">Seleccionar archivos extra que se quieran enviar junto al reclamo (como fotos, vídeos, etc.), y finalmente tocar el botón "Enviar formulario".</p></div>
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
            <div class="real animext" id="p0"><a href="#">Quality-MHAR@mann-hummel.com</a></div>
            <div class="underlinetwo"></div>
        </div>
        </li>
      </ul>
    </div>
  </div>

<!--Scripts-->
    <script src="../../JS/Faqbuttons.js"></script>
    <script src="../../JS/expand.js"></script>