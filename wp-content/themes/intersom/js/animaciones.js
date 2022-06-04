window.addEventListener("scroll", function () {

function fade(dir){
  var altura=window.innerHeight/1.3;
  var elem = document.getElementsByClassName("fade_"+dir);

  for (var o = 0; o < elem.length; o++) {
    let  posicionDiv = elem[o].getBoundingClientRect().top;
    elem[o].classList.add("transform_"+dir);
    if (altura >= posicionDiv) {
      elem[o].classList.add("aparece");
    } else {
      elem[o].classList.remove("aparece");
    }
  }
}

fade('up')
fade('down')
fade('left')
fade('right')

});



