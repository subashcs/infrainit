
 <!--either slider or video or photo-->
 <!-- cover photo-->

<div class="slideshow-container-feat">
  <div class="mySlidesfeat fade">
    <div class="numbertext">1 / 3</div>
    <img src="/ibuild/images/featured/featur4.jpg" style="width:100%;height:430px;">
    <div class="textfeat"><h2 style="font-size:110%;font-variant:petite-caps;color:maroon;margin-top:-1%;">Welcome to infrainit</h2>Allocate resources you need</div>
  </div>

  <div class="mySlidesfeat fade">
    <div class="numbertext">2 / 3</div>
    <img src="/ibuild/images/featured/feature.jpg" style="width:100%;height:480px;">
    <div class="textfeat">View architectures you want to build</div>
  </div>

  <div class="mySlidesfeat fade">
    <div class="numbertext">3 / 3</div>
    <img src="/ibuild/images/featured/featur3.jpg" style="width:100%;height:480px;z-index:1;">
    <div class="textfeat">Consult Our expertise Team for your problems</div>
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<div style="text-align:center;background-color: #000003;margin:-1% -.5% 0% -1%;position:relative;" id="tagsdots">
  <span class="dotfeat" onclick="currentSlide(1)">Allocate Resources</span>
  <span class="dotfeat" onclick="currentSlide(2)">View Architectures</span>
  <span class="dotfeat" onclick="currentSlide(3)">Consult Expert</span>
</div>
<script>
var slideIndex = 1;

showSlides(slideIndex);


function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlidesfeat");
  var dots = document.getElementsByClassName("dotfeat");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace("activefeat", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " activefeat";



}
setInterval(function (){ plusSlides(1);}, 6000);
</script>
