<div class="footer text-white w-full py-6 mt-2 absolute bottom-0 h-56">

    <div class="flex justify-center text-center py-2 gap-3">
        <a href="https://facebook.com" target="_blank">
            <ion-icon name="logo-facebook"></ion-icon>
        </a>
        <a href="https://twitter.com" target="_blank">
            <ion-icon name="logo-twitter"></ion-icon>
        </a>
        <a href="https://youtube.com" target="_blank">
            <ion-icon name="logo-youtube"></ion-icon>
        </a>
        <a href="https://instagram.com" target="_blank">
            <ion-icon name="logo-instagram"></ion-icon>
        </a>
    </div>

    <div class="flex justify-center py-2 h-16">
        <img src="https://www.ideal.nl/img/logo/ideal-logo.svg" />
    </div>

    <div class="text-center py-1">
        <p>
            <a href="/contact">Contact</a> |
            <a href="/tos"><?php print $GLOBALS['t']['footer-terms-and-conditions'] ?></a> |
            <a href="/privacy">Privacy</a> |
            <a href="/<?php print $GLOBALS['t']['footer-language'] ?>"><?php print $GLOBALS['t']['footer-language-title'] ?></a>
        </p>
    </div>

    <p class="py-1 text-center text-gray-500 text-xs">
        &copy;2020 - 2021 NerdyGadgets.nl
    </p>

</div>

<style>
    .footer {
        background-color: #1E0253;
    }
</style>