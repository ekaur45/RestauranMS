<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurants</title>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
    <script>
        function uploadFile(e) {
            var formData = new FormData();
            formData.append("file", e.files[0]);
            $.ajax({
                method: "POST",
                url: "actions/files/upload.action.php",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    let div = document.createElement("div");
                    div.classList = "position-relative";
                    let btnRemove = document.createElement("button");
                    let icon = document.createElement("i");
                    icon.classList = "bi bi-trash";
                    btnRemove.append(icon);
                    btnRemove.classList = "bg-light btn btn-sm position-absolute text-danger";
                    btnRemove.style = "right:3px;top:3px";
                    btnRemove.type = "button";
                    btnRemove.onclick = (e) => {
                        e.currentTarget.parentNode.remove()
                    }
                    div.append(btnRemove);
                    let img = document.createElement("img");
                    img.src = result;
                    img.style = "height:64px;width:64px";
                    div.append(img);
                    let el = document.createElement("input");
                    el.type = "hidden";
                    el.name = "files[]";
                    el.value = result;
                    div.append(el);
                    $("#files-container").append(div);
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
                <input type="file" class="form-control mb-2" onchange="uploadFile(this)">
            </div>
            <div id="files-container" class="d-flex flex-wrap">

            </div>
            <div class="col-md-12 d-flex justify-content-end">
                <button class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Add</button>
            </div>
        </form>
        <hr>
        <div class="row mt-3">
            <h1>Your restaurants</h1>
            <?php
            include_once "inc/db/connection.php";
            $sql = "select *,(select image from restaurant_images where restaurant_id = restaurants.id limit 1) as image from restaurants";
            $restaurants = __select($sql);
            if (sizeof($restaurants) > 0) {
                for ($i = 0; $i < sizeof($restaurants); $i++) {
                    $row = $restaurants[$i];
                    ?>
                    <div class="col-md-3">
                        <div class="card position-ralative">
                            <div class="rating-container position-absolute d-flex">
                                <div class="rating">
                                    <span>3.5</span>
                                    <i class="bi bi-star-fill text-warning"></i>

                                </div>
                                <ul class="d-flex list-unstyled ps-2 pe-2 rounded-pill bg-light ms-2">
                                    <li class="me-2">
                                        <a href="#" onclick="getRestaurant('<?= $row["id"] ?>')" class="text-info">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="actions/restaurant/delete.action.php?id=<?= $row["id"] ?>" class="text-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </li>
                                </ul>
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
    <div class="modal fade" id="editRestaurantModal" tabindex="-1" aria-labelledby="editRestaurantModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="actions/restaurant/update.action.php" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRestaurantModalLabel">Update <span class="text-black-50"
                            id="restaurant"></span> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" id="restaurant_id">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Name" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="location" id="location" class="form-control mb-2" placeholder="Location" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="cuisine" id="cuisine" class="form-control mb-2" placeholder="Cuisine" />
                        </div>
                        <div class="col-md-6">
                            <select name="price_range" id="price_range" class="form-select mb-2">
                                <option value="cheap">Cheap</option>
                                <option value="moderate">Moderate</option>
                                <option value="expensive">Expensive</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-12">
                            <input type="file" class="form-control mb-2" onchange="uploadFile(this)">
                        </div>
                        <div id="files-container" class="d-flex flex-wrap">

                        </div> -->
                        <!-- <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Add</button>
                        </div> -->
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal"
                        style="min-width: 150px;">Cancel</button>
                    <button type="submit" style="min-width: 150px;"
                        class="btn btn-outline-dark rounded-pill">Update</button>
                </div>
            </form>
        </div>
    </div>

    <?php include_once "inc/shared/footer.php"; ?>
    <script>
        var model = new bootstrap.Modal("#editRestaurantModal");
        function getRestaurant(id) {
            $.get("actions/restaurant/one.action.php?id=" + id).then(x => {
                if (x) {
                    $("#restaurant").text(x.name);
                    $("#restaurant_id").val(x.id);
                    $("#name").val(x.name);
                    $("#location").val(x.location);
                    $("#cuisine").val(x.cuisine);
                    $("#price_range").val(x.price_range);
                    model.show();
                }
            })
        }
    </script>
</body>

</html>