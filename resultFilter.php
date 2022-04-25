<?php
require_once('lib/infos.php');
require_once('lib/session.php');
require_once('lib/produits.php');
if (empty($_GET['page'])) {
    header("Location: /resultFilter.php?page=1&name={$_get['name']}&price={$_GET['price']}&category={$_GET['category']}&Best_match={$_GET['Best_match']}");
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
    <header>
        <div id="davin_header">

            <div id="logo">
                <a href="index.php"><img src="/assets/images/Logo.png" alt="Logo" /></a>
                <a class='lien' class="pasEnMobile" href="">HOME </a>
                <a class='lien' class="pasEnMobile" href="">SHOPPING </a>
                <a class='lien' class="pasEnMobile" href="">MAGAZINE </a>
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
    </header>
    <div id="corp">
        <?php
        if (!isset($_GET['page']) || $_GET['page'] == 1) {
            foreach (filterProductsp1($_get['name'], $_GET['price'], $_GET['category'], $_GET['Best_match']) as $product) {
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
                                <a href=''><img src='/assets/images/Cart Button.png'></a>
                            </div>
                        </div>
                        </article>";
            }
        } else {
            foreach (filterProductspagine($_get['name'], $_GET['price'], $_GET['category'], $_GET['Best_match'], $_GET['page'] * 7) as $product) {
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
                                    <a href=''><img src='/assets/images/Cart Button.png'></a>
                                </div>
                            </div>
                        </article>";
            }
        }

        ?>
    </div>

    <footer>
        <?php
        $nombre_de_page_max = ceil(count(filterProducts($_get['name'], $_GET['price'], $_GET['category'], $_GET['Best_match'])) / 7);

        for ($page = 1; $page <= $nombre_de_page_max; $page++) {

            if ($_GET['page'] == $page) {
                echo "<a id='active' href='index.php?page={$page}'>$page</a>";
            } else {
                echo "<a href='index.php?page={$page}'>$page</a>";
            }
        }
        ?>
    </footer>
</body>

</html>