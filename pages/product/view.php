<?php


if ($arg != null) {
?>

    <div class="centercontainer">
        <div class="prodname">
            <h1><?php print $arg['StockItemName']; ?></h1>
        </div>
        <div class="prodprev">
            <div class="slideshow-container">
                <?php for ($i = 0; $i < count($Images); $i++) {
                ?>
                    <div class="mySlides fade" style="display: block;">
                        <img src="/public/StockItemIMG/<?php print $Images[$i]['ImagePath'] ?>">
                    </div>
                <?php } ?>

                <?php if (count($Images) >= 2) { ?>
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

            </div>

            <div style="text-align:center">
                <?php for ($i = 0; $i < count($Images); $i++) {
                ?>
                    <span class="miniprev" onclick="currentSlide(<?php print($i + 1) ?>)"><img src="/public/StockItemIMG/<?php print $Images[$i]['ImagePath'] ?>"></span>
            <?php }
                } ?>
            </div>
        </div>
        <div class="title">
            <h2><?php print sprintf("€ %.2f", $arg['SellPrice']); ?></h2>
            <ul>
                <li>verzending binnen 2 werkdagen</li>
                <li>verzending boven 20 euro gratis</li>
                <li>2 jaar garantie</li>
            </ul>
            <a href="winkelmandje.php">
                <div class="buybutton">In winkelmandje</div>
            </a>
        </div>
        <div class="infobox">
            <h2>Beschrijving</h2>
            <p><?php print $arg['SearchDetails']; ?></p>
        </div>
        <div class="infobox">
            <h2>Specificaties</h2>
            <?php
            $CustomFields = json_decode($arg['CustomFields'], true);
            if (is_array($CustomFields)) { ?>
                <table>
                    <thead>
                        <th>Naam</th>
                        <th>Data</th>
                    </thead>
                    <?php
                    foreach ($CustomFields as $SpecName => $SpecText) { ?>
                        <tr>
                            <td>
                                <?php print $SpecName; ?>
                            </td>
                            <td>
                                <?php
                                if (is_array($SpecText)) {
                                    foreach ($SpecText as $SubText) {
                                        print $SubText . " ";
                                    }
                                } else {
                                    print $SpecText;
                                }
                                ?>
                            </td>
                        </tr>

                    <?php } ?>

                </table>

            <?php } else { ?>

                <p><?php print $arg['CustomFields']; ?>.</p>

            <?php } ?>

        </div>

    <?php } else { ?>

        <h2 id="ProductNotFound">Het opgevraagde product is niet gevonden.</h2>

    <?php } ?>

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
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }


        (() => {
            const addToCartBtn = document.querySelector('#add-to-card-btn')

            addToCartBtn.addEventListener("click", () => {
                let request = new XMLHttpRequest()
                request.open('POST', '/products/add?id=1')
                request.send()
            })
        })()
    </script>