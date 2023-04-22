<?php
require_once('menu.php');
?>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<div class="slideshow-container">
    <div class="mySlides">
        <img src="resources/pictures/galerie.png">
        <div class="caption">Rubrique 1</div>
    </div>

    <div class="mySlides">
        <img src="resources/pictures/admin.png">
        <div class="caption">Rubrique 2</div>
    </div>

    <div class="mySlides">
        <img src="resources/pictures/cpf_2022.jpg">
        <div class="caption">Rubrique 3</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>


<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Défilement automatique toutes les 3 secondes
    setInterval(function() {
        plusSlides(1);
    }, 3000);

    function plusSlides(n) {
        showSlides((slideIndex += n));
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {
            slideIndex = 1;
        }
        if (n < 1) {
            slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";
    }
</script>
