<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>

<div>
  <img class="mySlides" src="slider_images/1.jpg" style="width:1400px; height: 550px;">
  <img class="mySlides" src="slider_images/2.jpg" style="width:1400px; height: 550px;">
   <img class="mySlides" src="slider_images/3.jpg" style="width:1400px; height: 550px;">
    <img class="mySlides" src="slider_images/4.jpg" style="width:1400px; height: 550px;">
     <img class="mySlides" src="slider_images/5.jpg" style="width:1400px; height: 550px;">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>
