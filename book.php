<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[You title here]</title>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php";
    $id = null;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        header("Location: index.php");
    }
    if (isset($_SESSION["ID"]) && !empty($_SESSION["ID"])) {

    } else {
        header("Location: login.php");
    }
    ?>
</head>

<body>
    <?php include_once "inc/db/connection.php"; ?>
    <div class="container">
        <h1>Book restaurant</h1>
        <div class="row">
            <div class="col-md-12">
                <?php $resSql = "select *,(select image from restaurant_images where restaurant_id = $id limit 1 ) as image from restaurants where id = " . $id;
                $restaurant = null;
                $result = __select($resSql);
                if (sizeof($result) > 0) {
                    $restaurant = $result[0];
                    ?>
                    <div class="card">
                        <div class="card-body">


                            <div class="d-flex gap-5">
                                <div>
                                    <img src="<?= $restaurant["image"] ?>" alt="" style="height:150px;">
                                </div>
                                <div class="w-100">
                                    <h4 class="mb-4 text-black-50">
                                        <?= $restaurant["name"] ?>
                                    </h4>
                                    <p class="mb-2">
                                        <i class="bi bi-geo-alt"></i>
                                        <span>
                                            <?= $restaurant["location"]; ?>
                                        </span>
                                    </p>
                                    <p class="mb-2">
                                        <img src="assets/img/cutlery.png" alt="">
                                        <span>
                                            <?= $restaurant["cuisine"]; ?>
                                        </span>
                                    </p>
                                    <p class="mb-2">
                                        <i class="bi bi-currency-dollar"></i>
                                        <span class="text-capitalize">
                                            <?= $restaurant["price_range"]; ?>
                                        </span>
                                    </p>
                                </div>
                                <div class="align-items-end d-flex flex-row justify-content-end text-end w-100">
                                    <a href="index.php" class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">
                                        Cancel
                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>

                <?php } ?>
            </div>
        </div>
        <hr>
        <?php
        $sql = "select * from restaurants where id=" . $id;
        $restaurants = __select($sql);
        $restaurant = $restaurants[0];
        ?>
        <form action="actions/booking/add.action.php" method="post" class="row">
            <input type="hidden" name="restaurant_id" value="<?= $restaurant["id"] ?>">
            <div class="col-md-6">
                <input type="date" name="date" id="" placeholder="Date" class="form-control mb-2">
            </div>
            <div class="col-md-6">
                <input type="time" name="time" id="" class="form-control mb-2">
            </div>
            <div class="col-md-6">
                <input type="number" name="party_size" id="" class="form-control mb-2" placeholder="Party size">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Book</button>
            </div>
    </div>
    </form>


    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>