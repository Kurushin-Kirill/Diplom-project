<?php 
session_start();
include('include/classes.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

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

    <div class="category-container">
        <div class="category-exclusive-wrapper">
            <div class="category-exclusive-title">MEMBER EXCLUSIVE</div>
            <div class="category-exclusive-off">15% OFF EVERYTHING + EXTRA $10 OFF FOR PLUS STATUS</div>
            <div class="category-exclusive-not">NOT A MEMBER? JOIN NOW TO SHOP</div>
        </div>
        <div class="category-content-wrapper">
            <div class="category-content-menu">
            <div>
                <div class="flexDiv">
                    <button class="sec_btn" onclick="openMulti();">Shop By Room</button>
                    <div class="selectWrapper">
                        <div class="multiSelect" id="menu-0">
                            <?php
                            $pdo=Tools::connect();
                            $ps = $pdo->prepare("SELECT * FROM categories");
                            $ps->execute();
                            while ($row=$ps->fetch())
                            {
                                echo '<option class="leftmenu-options" onclick="getItemsCat(this.value)" value="'.$row['id'].'">'.$row['category'].'</option>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="category-content-goods">
                <?php
                echo '<div class="row" id="result" style="margin-right:10px;" >';
                $items=Item::GetItems();
                foreach($items as $item)
                {
                    $item->Draw();
                }
                echo '</div>';
                ?>
            </div>
        </div>
    </div>

    <?php include('include/footer.php')?>

    <script src="js/lib/modal.js"></script>
    <script src="js/lib/menu.js"></script>
    <script src="js/lib/getCat.js"></script>

</body>
</html>