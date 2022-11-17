<?php
  $styles = array('Inicio.css');
  include '../Templates/header.php';
?>
  <!--SLIDER-->
  
 <section class="carousel">
  <nav class="carousel-nav"></nav>
  <div class="container">
    <div class="slide">
      <nav class="CardPadre"id="card">
        <!---CARD crear un reclamo---->
        
        
          <div class="cards">
            <div class="card" >
              <img src="../../Resources/imgs/mh1.png" alt="placeholder"  >
              <div class="captiont">MANN+HUMMEL
              <div class="caption">We bring sustainability and technological progress together.</div></div>
             
            </div>
          </div>
      </nav>
    </div>
    <div class="slide">
      <nav class="CardPadre" id="card2">
        <!---CARD ver reclamos---->
       
          <div class="cards">
            <div class="card">
              <img src="../../Resources/imgs/mh3-transformed.jpeg" alt="placeholder"  >
              <div class="captiont1">PUNTO DE REUNIONES
             
            </div>
          </div>
      </nav>
    </div>
    <div class="slide">
      <nav class="CardPadre" id="card2">
        <!---CARD FAQS---->
        
          <div class="cards">
            <div class="card">
              <img src="../../Resources/imgs/mh2.png" alt="placeholder"  >
              
            </div>
          </div>
      </nav>
    </div>
  </div>
</section>
  <!--Scripts-->
  <script src="../../JS/slides.js"></script>

<?php
  include '../Templates/Footer.php';
?>

