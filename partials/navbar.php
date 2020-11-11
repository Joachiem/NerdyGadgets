<nav class="nav" id="nav">
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
</nav>

<style>
    .nav {
        background-color: #1e0253;
        padding: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav .zoek-container {
        display: flex;
        margin-left: 50px;
        width: 800px;

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
</style>