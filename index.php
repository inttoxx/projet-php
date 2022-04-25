<?php
require_once('lib/infos.php');
require_once('lib/session.php');
require_once('lib/produits.php');
require_once('lib/categories.php');

$nombre_de_page_max = ceil(getRowProduct() / 7);

if (empty($_GET['page'])) {
    header("Location: /index.php?page=1");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href="/assets/style/style.css">
    <link rel='stylesheet' href="/assets/style/Style_Davin.css">
    <link rel='stylesheet' href="/assets/style/stylemo.css">
    <link rel="stylesheet" media="screen and (max-width: 500px)" href="/assets/style/styleMobile.css">
    <script src="https://kit.fontawesome.com/9b9ba54603.js" crossorigin="anonymous"></script>
    <title>My shop</title>
</head>

<body>
    <form method="get" action="resultFilter.php">
        <header>
            <div id="davin_header">

                <div id="logo">
                    <a href="index.php"><img src="/assets/images/Logo.png" alt="Logo" /></a>
                    <a class="pasEnMobile" href="">HOME </a>
                    <a class="pasEnMobile" href="">SHOPPING </a>
                    <a class="pasEnMobile" href="">MAGAZINE </a>
                </div>

                <?php
                if (isset($_GET['message'])) {
                    echo "<h1>{$_GET['message']}</h1>";
                }
                ?>
                <div id="cart">
                    <?php
                    if (isset($_SESSION['id_user'])) {
                        echo '<a href="#"><img src="/assets/images/Cart Button.png" alt="Cart button" /></a>';
                        echo "<p>Bienvenue " . getCurrentUsername() . "</p>";
                        if (isCurrentUserAdmin()) {
                            echo "<a href='home.php'>Admin center</a>";
                        }
                        echo "<a class='lien' href='actions/logout.php'>LOGOUT</a>";
                    } else {
                        echo '<a href="#"><img src="/assets/images/Cart Button.png" alt="Cart button" /></a>';
                        echo "<a class='lien'class='pasEnMobile' href='signin.php'>LOGIN </a>";
                    }
                    ?>
                    <div class="enMobile" class="navbar">
                        <div class="dropdown">
                            <div class="dropbtn"><i class="fa fa-bars"></i>

                            </div>
                            <div class="dropdownCont">
                                <a href="#">HOME</a>
                                <a href="#">SHOPING</a>
                                <a href="#">MAGAZINE</a>
                                <a href='signin.php'>LOGIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mourad">
                <label for='text'><img class="loupe" src="/assets/images/Search.png" alt="search logo"></label>

                <div class="search-box">
                    <input id="text" type="text" name='name' value="living room">
                    <p class="pasEnMobile">Powered by <b>Algoila</b></p>
                    <img class="pasEnMobile" src="/assets/images/Sajari Logo.png" alt="logo Sajari">
                </div>
                <select class="pasEnMobile" name="Best_match">
                    <option value='name ASC'>Best match</option>
                    <option value='name ASC'>A->Z</option>
                    <option value='name DESC'>Z->A</option>
                    <option value='price ASC'>Increasing price,</option>
                    <option value='price DESC'>Decreasing price</option>
                </select>
            </div>
        </header>
        <section id="corp">

            <nav>
                <div class='enMobile'>
                    <select name="BestMatch">
                        <option value='default'>Best match</option>
                        <option value='alfa'>A->Z</option>
                        <option value='antiAlfa'>Z->A</option>
                        <option value='P_Croissant'>Increasing price,</option>
                        <option value='P_Decroissant'>Decreasing price</option>
                    </select>

                    <select name="Filters">
                        <option value="Filters">Filters</option>
                    </select>
                </div>
                <div class='pasEnMobile' id='form'>
                    <p class='pasEnMobile' id='filter'>FILTER BY</p>

                    <select class='pasEnMobile' name='Collection'>
                        <option value=''>--Collection--</option>
                    </select>

                    <select class='pasEnMobile' name='Color'>
                        <option value=''>--Color--</option>
                    </select>
                    <select class='pasEnMobile' name='category'>
                        <option value=''>--Category--</option>
                        <?php
                        foreach (getCategories() as $cat) {
                            echo "<option value={$cat['id']}> {$cat['name']}</option>";
                        }
                        ?>
                    </select>
                    <div class="pasEnMobile">
                        <p class='pasEnMobile'>Price Range</p>
                        <input class='pasEnMobile' type="range" id="prix" name="PriceRange" min="0" max="10000">
                        <div class='pasEnMobile' id="ordreDePrix">
                            <div>$0</div>
                            <div>$10,000+</div>
                        </div>
                    </div>
                    <input class='pasEnMobile' type="submit" value="Filter">
                </div>

            </nav>
            <?php
            if (!isset($_GET['page']) || $_GET['page'] == 1) {
                foreach (getLimitedProductsp1() as $product) {
                    echo "<article>
                        <img id='picture' src='assets/products/{$product['id']}{$product['picture_ext']}'>
                        <div class='descriptions'>
                            <div>
                                <h3>{$product['name']}</h3>
                                <p class='type'>{$product['description']}</p>
                                <img src='/assets/images/Star - On.png'><img src='/assets/images/Star - On.png'><img src='/assets/images/Star - On.png'><img src='/assets/images/Star - On.png'><img src='/assets/images/Star.png'>
                            </div>
                            <div class='shop'>
                                <p>$ {$product['price']}</p>
                                <a href='#'><img src='/assets/images/Cart Button.png'></a>
                            </div>
                        </div>
                        </article>";
                }
            } else {
                foreach (getlimitedProducts($_GET['page'] * 7) as $product) {
                    echo "<article>
                            <img src='assets/products/{$product['id']}{$product['picture_ext']}'>
                            <div class='descriptions'>
                                <div>
                                    <h3>{$product['name']}</h3>
                                    <p class='type'>{$product['description']}</p>
                                    <img src='/assets/images/Star - On.png'><img src='/assets/images/Star - On.png'><img src='/assets/images/Star - On.png'><img src='/assets/images/Star - On.png'><img src='/assets/images/Star.png'>
                                </div>
                                <div class='shop'>
                                    <p>$ {$product['price']}</p>
                                    <a href='#'><img src='/assets/images/Cart Button.png'></a>
                                </div>
                            </div>
                        </article>";
                }
            }

            ?>
        </section>
        <footer>
            <?php


            for ($page = 1; $page <= $nombre_de_page_max; $page++) {

                if ($_GET['page'] == $page) {
                    echo "<a id='active' href='index.php?page={$page}'>$page</a>";
                } else {
                    echo "<a href='index.php?page={$page}'>$page</a>";
                }
            }
            ?>
        </footer>
    </form>
</body>

</html>