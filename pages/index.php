<section class="container pb-8">

    <div class="grid-container bg-gray-500">
        <div class="Grid-2">
            <a href="">
                <img src="public/ProductIMGHighRes/mug.png"/>
            </a>
        </div>
        <div class="Grid-3 bg-gray-600">
            <p>Prijs: €3,99</p>
        </div>
        <div class="Grid-1 bg-gray-400">
            <a href="">
                <img src="public/ProductIMGHighRes/hoodie.png"/>
            </a>
        </div>
    </div>
    <br>

    <p>Aangeraden producten</p>
    <div class="flex justify-between bg-gray-200">
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
            </a>
            <p>Product 1</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
            </a>
            <p>Product 2</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
            </a>
            <p>Product 3</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
            </a>
            <p>Product 4</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/580b57fbd9996e24bc43bf55.png" />
            </a>
            <p>Product 5</p>
        </div>
    </div>
    <br>

    <p>Aangeraden categorieën</p>
    <div class="flex justify-between bg-gray-200">
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-64 w-64" href="">
                <img src="public/ProductIMGHighRes/hoodie.png" />
            </a>
            <p>Product 1</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-64 w-64" href="">
                <img src="public/ProductIMGHighRes/hoodie.png" />
            </a>
            <p>Product 2</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-64 w-64" href="">
                <img src="public/ProductIMGHighRes/hoodie.png" />
            </a>
            <p>Product 3</p>
        </div>
    </div>
    <br>

    <p>Producten</p>
    <div class="flex justify-between bg-gray-200">
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/mug.png" />
            </a>
            <p>Product 1</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/mug.png" />
            </a>
            <p>Product 2</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/mug.png" />
            </a>
            <p>Product 3</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/mug.png" />
            </a>
            <p>Product 4</p>
        </div>
        <div class="text-gray-700 bg-gray-400 flex justify-center items-center px-4 py-2">
            <a class="h-32 w-32" href="">
                <img src="public/ProductIMGHighRes/mug.png" />
            </a>
            <p>Product 5</p>
        </div>
    </div>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            gap: 0px 0px;
            grid-template-areas:
    "Grid-1 Grid-1 Grid-1 Grid-2 Grid-2"
    "Grid-1 Grid-1 Grid-1 Grid-2 Grid-2"
    "Grid-1 Grid-1 Grid-1 Grid-3 Grid-3";
        }

        .Grid-1 {
            grid-area: Grid-1;
        }

        .Grid-2 {
            grid-area: Grid-2;
        }

        .Grid-3 {
            grid-area: Grid-3;
        }

    </style>

    <h1>index</h1>

    <?php

    // $handle = $Connection->prepare('SELECT * FROM stockitems');

    // $handle->bindValue(1, 100);
    // $handle->bindValue(2, 'Bilbo Baggins');
    // $handle->bindValue(3, 5);

    // $handle->execute();

    // $result = $handle->fetchAll(PDO::FETCH_OBJ);

    // foreach ($result as $row) {
    //     print_r($row->StockItemName);
    // }

    ?>
</section>