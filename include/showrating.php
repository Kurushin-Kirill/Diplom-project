<?php
include "include/DBconnect.php";

if (isset($_SESSION['user'])){
    $index = implode($_SESSION['user']);
    $user_id = $index[0];
} else {
    $user_id = 0;
}
$query = "SELECT * FROM goods";
$result = mysqli_query($mysqli, $query);
while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['id'];
    $name = $row['title'];
    $price = $row['price'];
    $img = $row['image'];
    $query = "SELECT * FROM rating WHERE product_id = " . $product_id . " and user_id = " . $user_id;
    $productResult = mysqli_query($mysqli, $query);
    $getRating = mysqli_fetch_array($productResult);
    $rating = !isset($getRating['rating']);

    $query = "SELECT ROUND(AVG(rating), 1) as numRating FROM rating WHERE product_id=" . $product_id;
    $avgresult = mysqli_query($mysqli, $query);
    $fetchAverage = mysqli_fetch_array($avgresult);
    $numRating = $fetchAverage['numRating'];
    if ($numRating <= 0) {
        $numRating = "Not ratings given.";
    }
    ?>
    
    <div class="section-shop-card">
        <img class="section-shop-img" src="./Img/<?php echo $img?>" alt="problem">
        <div class="section-shop-description">
            <div class="section-shop-description-block">
                <div class="section-shop-description-title"><?php echo $name?></div>
                <div class="section-shop-description-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                <a class="section-shop-description-button" href="single.php?id=<?php echo $product_id?>">VIEW ALL</a>
            </div>
        </div>
        <div class="section-shop-block">
            <div class="section-shop-title"><?php echo $name?></div>
            <select name="star_rating_option" class="rating" id='star_rating_<?php echo $product_id; ?>'
                data-id='rating_<?php echo $product_id; ?>'>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div class="section-shop-rating-wrapper">
                <strong class="section-shop-rating-text">Rating:</strong> <span id='numeric_rating_<?php echo $product_id; ?>'>
                    <?php echo $numRating; ?>
                </span>
            </div>
            <div class="section-shop-price"><?php echo $price; ?>$</div>
        </div>
    </div>
<?php } ?>