let slideIndex = 1;
mostrarSlides(slideIndex);
transicion();

function slideActual(n) {
  mostrarSlides(slideIndex = n);
}

function mostrarSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  let ctrles = document.getElementsByClassName("ctrl");

  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < ctrles.length; i++) {
    ctrles[i].className = ctrles[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  ctrles[slideIndex-1].className += " active"; 
}

function transicion() {
  var i;
  var x = document.getElementsByClassName("slide");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 

  
}
