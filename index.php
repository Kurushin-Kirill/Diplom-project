<?php 
session_start();
include('include/DBconnect.php');
$id = isset($_SESSION['id']); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOODY STUDIO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="CSS/reset.css" rel="stylesheet">
    <link href="CSS/main.css" rel="stylesheet">
    <link href="CSS/swiper-bundle.min.css" rel="stylesheet">
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href='./assets/jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
</head>
<body>

    <?php include('include/nav.php')?>
    
    <header>
        <div class="header-container">
            <div class="header-upper">
                <div class="header-upper-wrapper header-upper-first">
                    <img src="./Img/Vector car.png" alt="problem">
                    <div class="header-upper-text">FREE SHIPPING</div>
                </div>
                <div class="header-upper-wrapper header-upper-second">
                    <img src="./Img/Vector card.png" alt="problem">
                    <div class="header-upper-text">100% MONEY BACK</div>
                </div>
                <div class="header-upper-wrapper header-upper-third">
                    <img src="./Img/Vector headset.png" alt="problem">
                    <div class="header-upper-text">SUPPORT 24/7</div>
                </div>
            </div>
        
            <div class="swiper-container header-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide header-lower">
                        <div class="header-lower-wrapper">
                            <div class="header-lower-block">
                                <div class="header-lower-title">HOT DEALS THIS WEEK</div>
                                <div class="header-lower-text">SALE UP 50% MODERN FURNITURE</div>
                                <a class="header-lower-button" href="#">VIEW NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide header-lower2">
                        <div class="header-lower-wrapper">
                            <div class="header-lower-block">
                                <div class="header-lower-title">HOT DEALS THIS WEEK</div>
                                <div class="header-lower-text">SALE UP 50% MODERN FURNITURE</div>
                                <a class="header-lower-button" href="#">VIEW NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide header-lower3">
                        <div class="header-lower-wrapper">
                            <div class="header-lower-block">
                                <div class="header-lower-title">HOT DEALS THIS WEEK</div>
                                <div class="header-lower-text">SALE UP 50% MODERN FURNITURE</div>
                                <a class="header-lower-button" href="#">VIEW NOW</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="example">
        <div class="section-example-container">
            <?php
                $sql = "SELECT * FROM `goods` ORDER BY RAND() limit 2";
                $res = $mysqli -> query($sql);

                if ($res -> num_rows > 0) {
                    while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="section-example-wrapper">
                <img class="section-example-img" src="./Img/<?=$resArticle["image"]?>" alt="problem">
                <div class="section-example-block">
                    <div class="section-example-text"><?=$resArticle["title"]?></div>
                    <a class="section-example-button" href="single.php?id=<?php echo $product_id?>">VIEW DETAILS</a>
                </div>
            </div>
            <?php } } ?>
        </div>
    </section>

    <section class="section-shop">
        <div class="section-shop-container">
        
            <?php include "include/showrating.php"; ?>
                    
        </div>
        <div class="section-rating-button">load all products</div>
    </section>

    <section>
        <div class="section-discount-container">
        <?php
            $sql = "SELECT * FROM `discountgoods` ORDER BY RAND() limit 1";
            $res = $mysqli -> query($sql);

            if ($res -> num_rows > 0) {
                while ($resArticle = $res -> fetch_assoc()) {
        ?>
            <img class="section-discount-img" src="./Img/<?=$resArticle["image"]?>" alt="problem">
            <div class="section-discount-block">
                <div class="section-discount-wrapper">
                    <div class="section-discount-title"><?=$resArticle["title"]?></div>
                    <div class="section-discount-price">
                        <div class="section-discount-newprice">$<?=$resArticle["discount"]?></div>
                        <div class="section-discount-oldprice">$<?=$resArticle["price"]?></div>
                    </div>
                    <div class="section-discount-description"><?=$resArticle["text"]?></div>
                    <a class="header-lower-button" href="#">VIEW DETAILS</a>
                </div>
            </div>
        <?php } } ?>
        </div>
    </section>

    <section>
        <div class="section-rating-container">
            <div class="section-rating-title">TOP SALES</div>
            <div class="section-rating-container-inner">
            <?php
            $sql = "SELECT * FROM `goods` ORDER BY `count` DESC limit 6";
            $res = $mysqli -> query($sql);

            if ($res -> num_rows > 0) {
                while ($resArticle = $res -> fetch_assoc()) {
             ?>
                <div class="section-rating-card">
                    <img class="section-rating-card-img" src="./Img/<?=$resArticle["image"]?>" alt="problem">
                    <div class="section-rating-card-wrapper">
                        <div class="section-rating-card-title"><?=$resArticle["title"]?></div>
                        <div class="section-rating-card-price"><?=$resArticle["price"]?>$</div>
                    </div>
                </div>
            <?php } } ?>
            </div>
        </div>
    </section>

    <section>
        <div class="section-newsletter-container">
            <div class="section-newsletter-textwrapper">
                <div class="section-newsletter-title">SIGN UP FOR THE NEWSLETTER</div>
                <div class="section-newsletter-subtitle">Subscribe for the latest stories and promotions</div>
            </div>
            <div>
                <form action="" class="section-newsletter-inputwrapper">
                    <input class="section-newsletter-input" type="text" placeholder="Enter your e-mail address">
                    <input class="section-newsletter-button" type="button" value="sign up">
                </form>
            </div>
        </div>
    </section>

    <?php include('include/footer.php')?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/jquery-bar-rating-master/dist/jquery.barrating.min.js"></script>
    <script src="js/vendor/swiper-bundle.min.js"></script>
    <script src="js/lib/morebutton.js"></script>
    <script src="js/lib/slider.js"></script>
    <script src="js/lib/modal.js"></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            $('#star_rating_<?php echo $product_id; ?>').barrating('set', <?php echo $rating; ?>);
        });
        $(function () {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function (value, text, event) {
                    var el = this;
                    var el_id = el.$elem.data('id');
                    if (typeof (event) !== 'undefined') {
                        var split_id = el_id.split("_");
                        var product_id = split_id[1];
                        $.ajax({
                            url: './rating.php',
                            type: 'post',
                            data: {
                                product_id: product_id,
                                rating: value
                            },
                            dataType: 'json',
                            success: function (data) {
                                var average = data['numRating'];
                                $('#numeric_rating_' + product_id).text(average);
                            }
                        });
                    }
                }
            });
        });
    </script>

</body>
</html>