function Ascunde() {
  var text = document.getElementById("textascuns");
  if (text.style.display === "none") {
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function feedbackyes(){
  document.getElementById('minion')
  .src="../imagines/minionn2.jfif";
}

function feedbackno(){
  document.getElementById('minion')
  .src="../imagines/minionn3.jpg";
}


var slideIndex = 1;
showCheesecake(slideIndex);


function Sageata(n) {
  showCheesecake(slideIndex += n);
}


function showCheesecake(n) {
  var photo;
  var slides = document.getElementsByClassName("Photoslide");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (photo = 0; photo < slides.length; photo++) {
      slides[photo].style.display = "none";
  }
  
  slides[slideIndex-1].style.display = "block";
  
}