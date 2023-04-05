<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comfy Reserve</title>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
    <?php include_once "inc/db/connection.php"; ?>
    <?php

    $whereCondi = "";
    if ($query) {
        $query = __escape($query);
        $whereCondi = " where cuisine like '%$query%' or price_range = '$query' or location like '%$query%' or `name` like '%$query%'";
    }
    ?>

</head>

<body>
    <div class="container">
        <?php if ($query): ?>
            <div>
                <span style="font-weight: 600;">
                    Search text:
                </span>
                <span class="text-black-50">
                    "
                    <?= $query ?>"
                </span>
                <a href="index.php" class="ms-3">
                    Clear search
                </a>
            </div>
        <?php endif; ?>
        <?php include_once "partials/data.partial.php"; ?>
        <div class="row mt-3">
            <?php
            $sql = "select *,(select image from restaurant_images where restaurant_id = restaurants.id limit 1) as image from restaurants " . $whereCondi;
            $restaurants = __select($sql);
            if (sizeof($restaurants) > 0) {
                for ($i = 0; $i < sizeof($restaurants); $i++) {
                    $row = $restaurants[$i];
                    ?>
                    <div class="col-md-3">
                        <div class="card position-ralative">
                            <div class="rating-container position-absolute">
                                <div class="rating">
                                    <?php $ratingSql = "select ifnull(ROUND(ifnull(sum(rating),0)/count(rating),1),0) as rating from reviews where restaurant_id = " . $row["id"];
                                    $rating = 0;
                                    $result = __select($ratingSql);
                                    if (sizeof($result) > 0) {
                                        $rating = $result[0]["rating"];
                                    }
                                    ?>
                                    <span>
                                        <?= $rating ?>
                                    </span>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                            </div>
                            <div class="card-img-top" style="max-height: 200px;">
                                <img src="<?= $row["image"] ?>" alt="" style="max-height: 200px;width: 100%;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $row["name"]; ?>
                                </h5>
                                <p class="card-text">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>
                                        <?= $row["location"]; ?>
                                    </span>
                                </p>
                                <p>
                                    <img src="assets/img/cutlery.png" alt="">
                                    <span>
                                        <?= $row["cuisine"]; ?>
                                    </span>
                                </p>
                                <p>
                                    <i class="bi bi-currency-dollar"></i>
                                    <span class="text-capitalize">
                                        <?= $row["price_range"]; ?>
                                    </span>
                                </p>
                                <div class="d-flex">
                                    <a href="book.php?id=<?= $row["id"] ?>" class="btn btn-outline-primary w-100" type="button">
                                        <i class="bi bi-cart-plus-fill"></i>
                                        book
                                    </a>
                                    <a href="reviews.php?id=<?= $row["id"] ?>" class="btn  btn-outline-primary w-100 ms-2"
                                        type="button">
                                        <i class="bi bi-chat"></i>
                                        review
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php }
            } else {
                if ($query) { ?>
                    <div class="bg-light no-comment-found p-3 text-center">
                        <img src="assets/img/no-data.svg" alt="" style="width: 150px;" class="mb-3">
                        <h4 class="text-black-50">No restaurant found against "<span
                                style="font-weight: 600;color:#000 !important" class="text-black">
                                <?= $query ?>
                            </span> ".</h4>
                        <a href="index.php">Clear search &times;</a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>


    </div>
    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>