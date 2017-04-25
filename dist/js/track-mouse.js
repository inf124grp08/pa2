document.addEventListener("DOMContentLoaded", function(event) {
  //do work
  console.log('ready');

  var images = document.getElementsByClassName('product-image');

  Array.from(images).forEach(img => {
    var cstyle = window.getComputedStyle(img);
    img.addEventListener('mouseenter', ()=>{
      img.style.height = `${parseInt(cstyle.height)*1.2}px`;
    });

    img.addEventListener('mouseout', ()=>{
      img.style.height = cstyle.height;
    });
  });
});
