<?php 
session_start();
include('include/DBconnect.php');
if(isset($_GET['reset'])) {
    unset($_SESSION['shoppingcart']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

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

    <div class="cart-goods-container">
        <div class="cart-goods-title">Shopping bag</div>
        <div class="cart-goods-wrapper">
           <div class="cart-goods-active">
                <?php
                    if(isset($_SESSION['shoppingcart']) && count($_SESSION['shoppingcart'])) {
                        $list = $_SESSION['shoppingcart'];
            
                        foreach($list as $item) {
                            $id = $item['id'];
                            $query  = "SELECT * FROM goods WHERE id='$id'";
                            $result = mysqli_query($mysqli, $query);
            
                            if(mysqli_num_rows($result) == 1) {
                                $row = mysqli_fetch_array($result);
            
                                $id = $row['id'];
                                $name = $row['title'];
                                $price = $row['price'];
                                $img = $row['image'];
                                $quantity = $item['quantity'];
            
                                print(
                                    "<div class='cart-goods-block'>
                                        <a href='single.php?id=$id'>
                                            <img class='cart-goods-img' src='./Img/$img' src='' alt='problem'>
                                            <div class='cart-goods-description'>
                                                <div class='cart-goods-text'>$name</div>
                                                <div class='cart-goods-price'>$price $</div>
                                                <div class='cart-goods-quantity'>Quantity: $quantity</div>
                                            </div>
                                        </a>
                                    </div>");
                            };
                        };
                    } else {
                        print("<div class='cart-goods-text'>You don't have any items in your shopping cart.</div>");
                    };
                ?>
                <form class='cart-goods-form' action="#" method="GET">
                    <label class='cart-goods-quantity' for="reset">Reset cart: </label>
                    <input class='cart-goods-button' type="submit" value="RESET" name="reset" id="reset" />
                </form>
           </div>
           
           <div class="cart-goods-check">
                <div class="cart-goods-check-wrapper">
                    <form class='cart-goods-check-form' action="#" method="">
                        <label class='cart-goods-check-label' for="code">ADD A DISCOUNT CODE </label>
                        <div class='cart-goods-check-wrap'>
                            <input class='cart-goods-check-input' type="text" value="" name="code" id="code" />
                            <div class='cart-goods-check-button'>ADD</div>
                        </div>
                    </form>
                    <div></div>
                </div>
                <div class="cart-goods-checkout">Continue to checkout</div>
           </div>
        </div>
    
        
    </div>

    <div class="cart-container">
        <div class="single-also-container">
            <div class="cart-container"></div>
            <div class="also-title">Also You May Buy</div>
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