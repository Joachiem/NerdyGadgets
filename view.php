<html lang="en"><head>
        <link rel="stylesheet" href="../partials/css/product.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>

    </head>
    <body>
        <div class="container">
            <div class="prodname">
                <h1>Product naam</h1>
            </div>
            <div class="prodprev">
                <div class="slideshow-container">

                <div class="mySlides fade" style="display: block;">
                <img src="Public/StockItemIMG/RC toy vintage car.png">
                </div>

                <div class="mySlides fade" style="display: none;">
                <img src="Public/StockItemIMG/RC toy sedan car.png">
                </div>

                <div class="mySlides fade" style="display: none;">
                <img src="Public/StockItemIMG/RC big wheel.png">
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

                </div>
                <br>

                <div style="text-align:center">
                <span class="miniprev" onclick="currentSlide(1)"><img src="Public/StockItemIMG/RC toy vintage car.png"></span> 
                <span class="miniprev" onclick="currentSlide(2)"><img src="Public/StockItemIMG/RC toy sedan car.png"></span> 
                <span class="miniprev" onclick="currentSlide(3)"><img src="Public/StockItemIMG/RC big wheel.png"></span> 
                </div>
            </div>
            <div class="title">
                <h2>5.00 euro</h2>
                <ul>
                    <li>verzending binnen 2 werkdagen</li>
                    <li>verzending boven 20 euro gratis</li>
                    <li>2 jaar garantie</li>
                </ul>
                <a href="winkelmandje.php"><div class="buybutton">In winkel mandje</div></a>
            </div>
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
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            }
        </script>
    
</body></html>