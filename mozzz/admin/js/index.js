x = document.querySelector('.t');
y = document.querySelector('.col-1');
window.addEventListener("resize", function () {
    // check width
    if (window.innerWidth<=1210) {
        y.style.display="none";
    }else {
        y.style.display="block";
    } 
});

function test() {
   if ((y.style.display=="none") && (window.innerWidth<=1210)) {
       y.style.display="block";
      
   }else if ((y.style.display=="block") && (window.innerWidth<=1210)) {
    y.style.display="none";
   }
}
console.log(y.style.display);
if ((y.style.display=="none") && (window.innerWidth>1210)) {
    y.style.display="block";
   }
 
