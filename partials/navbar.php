<nav class="nav" id="nav">
    <div class="row">
        <object class="logo" id="logo" type="image/svg+xml" data="public/img/logo.svg"></object>

        <div class="zoek-container">
            <input class="zoek" type="text" placeholder="Zoeken!" id="zoek" type="text" name="zoek" value="">
        </div>
        <div class="english">
            <a>English</a>
        </div>
        <div class="inloggen">
            <a>Inloggen</a>
        </div>
        <div class="winkelwagentje">
            <a>WW_PH</a>
        </div>
    </div>
    <div class="row categorys">
        <div class="category">
            <a>T-SHIRT</a>
        </div>
        <div class="category">
            <a>T-SHIRT</a>
        </div>
    </div>
</nav>

<style>
    .row {
        justify-content: space-between;
        width: 100%;
        margin: 0px;

    }

    .categorys {
        background-color: gray;

    }

    .nav {
        padding: 15px;
        margin: 0;
        background-color: #1e0253;
        display: flex;
        align-items: center;
    }

    .nav .zoek-container {
        display: flex;
        margin-left: 50px;
        width: 600px;

    }

    .nav .zoek {
        padding: 15px;
        font-size: 20px;
        border: none;
        background-color: #E9E9E9;
        border-radius: 6px;
        width: 100%;
        font-weight: bold;
    }


    .logo {
        height: 60px;
    }

    .english {

    }

    .inloggen {

    }

    .winkelwagentje {
        
    }
</style>