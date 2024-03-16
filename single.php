<?php 
session_start();
include('include/DBconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOODY STUDIO</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href='./assets/jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="CSS/reset.css" rel="stylesheet">
    <link href="CSS/main.css" rel="stylesheet">
</head>
<body>
    
    <?php include('include/nav.php')?> 

    <div class="single-container">
        <?php
            $sql = "SELECT * FROM `goods` WHERE `id`=  '" . (int)$_GET['id'] . "' ";
            $res = $mysqli -> query($sql);
    
            if ($res -> num_rows > 0) {
                while ($resArticle = $res -> fetch_assoc()) {
        ?>
            <div class="single-product-wrapper">
                <img class="single-product-img" src="./Img/<?=$resArticle["image"]?>" alt="problem">
                <div class="single-product-block">
                    <div class="single-product-title"><?=$resArticle["title"]?></div>
                    <div class="single-product-price"><?=$resArticle["price"]?>$</div>
                    <div class="single-product-text" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima maxime sint, commodi earum, dolorum autem inventore, cum facere quibusdam voluptates doloremque fugiat laborum quam tempore sed omnis quos sequi iste fuga recusandae.</div>
                    <div class="single-product-stores"><img src="./Img/vector tag.png" alt="problem">Not available in stores</div>
                    <?php 
                        if(isset($_SESSION['user']['rights'])=='user' || isset($_SESSION['user']['rights'])=='admin') {         
                    ?>  
                        <form class="single-product-form" action="include/addtocart.php?id=<?=$resArticle["id"]?>" method="post" >
                            <label class='cart-goods-check-label' for="quantity">Quantity</label>
                            <input class="single-product-input" type="number" name="quantity" min="1" max="10" value="1">
                            <input class="single-product-button" type="submit" name="add" id="add" value="Add to shopping bag">
                        </form>
                    <?php  } else { ?>
                        <div class="single-product-warning">Register to add a product to the shopping cart </div>
                     <?php } ?>
                    
                </div>
            </div>
        <?php } } ?>
        <div class="also-container">
            <div class="also-title">Also You May Like</div>
            <div class="also-wrapper">
                <?php
                $sql = "SELECT * FROM `goods` ORDER BY RAND() LIMIT 3";
                $res = $mysqli -> query($sql);
        
                if ($res -> num_rows > 0) {
                    while ($resArticle = $res -> fetch_assoc()) {
                ?>
                <div class="also-card">
                    <a a href="single.php?id=<?=$resArticle["id"]?>">
                        <img class="also-img" src="./Img/<?=$resArticle["image"]?>" alt="problem">
                        <div class="also-block">
                            <div class="also-title"><?=$resArticle["title"]?></div>
                            <div class="also-price"><?=$resArticle["price"]?>$</div>
                        </div>
                    </a>
                </div>
                <?php } } ?>
            </div>
        </div>
    </div>

    <?php include('include/footer.php')?>

    <script src="js/lib/modal.js"></script>

</body>
</html>