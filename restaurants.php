<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[You title here]</title>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <script>
        function uploadFile(e){
            var formData = new FormData();
            formData.append("file",e.files[0]);
            $.ajax({
                method:"POST",
                url:"actions/files/upload.action.php",
                data:formData,
                cache: false,
        contentType: false,
        processData: false,
                success:function(result){

                }
            })
        }
    </script>
</head>

<body>
    <div class="container">
        <form action="actions/restaurant/add.action.php" method="post" class="row mt-5">
            <h1>Add restaurant</h1>
            <div class="col-md-6">
                <input type="text" name="name" class="form-control mb-2" placeholder="Name" />
            </div>
            <div class="col-md-6">
                <input type="text" name="location" class="form-control mb-2" placeholder="Location" />
            </div>
            <div class="col-md-6">
                <input type="text" name="cuisine" class="form-control mb-2" placeholder="Cuisine" />
            </div>
            <div class="col-md-6">
                <select name="price_range" class="form-select mb-2">
                    <option value="cheap">Cheap</option>
                    <option value="moderate">Moderate</option>
                    <option value="expensive">Expensive</option>
                </select>
            </div>
            <div class="col-md-12">
                <input type="file" class="form-control" onchange="uploadFile(this)">
            </div>
            <div class="files-container col-md-12"></div>
            <div class="col-md-12 d-flex justify-content-end">
                <button class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Add</button>
            </div>
        </form>
        <hr>
        <div class="row mt-3">
            <h1>Your restaurants</h1>
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
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>

        <!-- <a href="#">edit</a>
                                <a href="actions/restaurant/delete.action.php?id=<?= $row["id"] ?>">Delete</a>
                                <a href="reviews.php?id=<?= $row["id"] ?>">Leave a review</a> -->


    </div>


    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>