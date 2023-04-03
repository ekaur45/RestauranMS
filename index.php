<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comfy Reserve</title>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
    <?php include_once "inc/shared/cookie-init.php"; ?>

</head>

<body>
    <div class="container">

        <?php include_once "partials/data.partial.php"; ?>
        <div class="row mt-3">
            <?php
            include_once "inc/db/connection.php";
            $sql = "select * from restaurants";
            $restaurants = __select($sql);
            if (sizeof($restaurants) > 0) {
                for ($i = 0; $i < sizeof($restaurants); $i++) {
                    $row = $restaurants[$i];
                    ?>
                    <div class="col-md-3">
                        <div class="card position-ralative">
                            <div class="rating-container position-absolute">
                                <div class="rating">
                                    <span>3.5</span>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                            </div>
                            <img src="https://toohotel.com/wp-content/uploads/2022/09/TOO_restaurant_Panoramique_vue_Paris_Seine_Tour_Eiffel_2.jpg"
                                class="card-img-top" alt="">
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
                                    <span>
                                        <?= $row["price_range"]; ?>
                                    </span>
                                </p>
                                <div class="d-flex">
                                    <a href="book.php?id=<?= $row["id"] ?>" class="btn btn-outline-primary w-100" type="button">
                                        <i class="bi bi-cart-plus-fill"></i>
                                        book
                </a>
                                    <a href="reviews.php?id=<?= $row["id"] ?>" class="btn  btn-outline-primary w-100 ms-2" type="button">
                                        <i class="bi bi-chat"></i>
                                        review
                </a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php }
            } ?>
        </div>


    </div>
    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>