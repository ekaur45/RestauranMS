<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php";
    $id = null;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    $user = null;
    if($isLoggedIn){
        $user = $_SESSION["USER"];
    }
    ?>

</head>

<body>
    <div class="container">
        <div class="row">

            <?php if ($id && $isLoggedIn) { ?>
                <h1>Leave a review</h1>
                <form action="actions/reviews/add.action.php" method="post">
                    <input type="hidden" name="id" value="<?= $id ?>" class="form-control mb-2">
                    <select name="rating" id="" class="form-control mb-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <textarea name="comments" placeholder="Comments" class="form-control mb-2"></textarea>
                    <button class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Add comment</button>
                </form>
            <?php } ?>

        </div>
        <div class="row mt-3">
            <h1>Reviews</h1>
            <?php
            include_once "inc/db/connection.php";
            $sql = "select *,(select image from restaurant_images where restaurant_id = restaurants.id limit 1) as image from restaurants";
            $restaurants = __select($sql);
            if (sizeof($restaurants) > 0) {
                for ($i = 0; $i < sizeof($restaurants); $i++) {
                    $row = $restaurants[$i];
                    ?>
                    <div class="col-md-6 mb-3">
                        <div class="card position-ralative">
                            <div class="rating-container position-absolute">
                            <div class="rating">
                                    <?php $ratingSql = "select ifnull(ROUND(ifnull(sum(rating),0)/count(rating),1),0) as rating from reviews where restaurant_id = ".$row["id"];
                                        $rating = 0;
                                        $result = __select($ratingSql);
                                        if(sizeof($result)>0){
                                            $rating = $result[0]["rating"];
                                        }
                                    ?>
                                    <span><?=$rating?></span>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                            </div>
                            
                            <div class="card-img-top" style="max-height: 250px;">
                                <img src="<?=$row["image"]?>"
                                    alt="" style="max-height: 250px;width: 100%;">
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
                                <!-- <div class="d-flex">
                                    <a href="book.php?id=<?= $row["id"] ?>" class="btn btn-outline-primary w-100" type="button">
                                        <i class="bi bi-cart-plus-fill"></i>
                                        book
                                    </a>
                                    <a href="reviews.php?id=<?= $row["id"] ?>" class="btn  btn-outline-primary w-100 ms-2"
                                        type="button">
                                        <i class="bi bi-chat"></i>
                                        review
                                    </a>
                                </div> -->
                                <hr>
                                
                                <?php $sql1 = "select t1.id, t1.user_id, t1.rating,t1.comments,t2.name,t2.email from reviews t1 join users t2 on t1.user_id = t2.id where restaurant_id = ".$row["id"]; ?>
                                <?php $reviews = __select($sql1);?>
                                <?php if(sizeof($reviews)>0){
                                    ?><h3>Reviews and comments</h3><?php
                                    for ($j=0; $j < sizeof($reviews); $j++) { 
                                        $row1 = $reviews[$j];
                                        ?>
                                        <div class="comment-container position-ralative">
                                            <?php if($isLoggedIn && $user["id"]==$row1["user_id"] || $isLoggedIn&&$user["role"]=='admin'):?>
                                            <div class="position-absolute" style="right:20px">
                                                <ul class="d-flex list-unstyled">                                                   
                                                    <li class="me-2">
                                                        <a href="#" onclick="getReviews('<?=$row1["id"]?>')" class="text-info">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a onclick="return delConfirm()" href="actions/reviews/delete.action.php?id=<?=$row1["id"]?>" class="text-danger">
                                                            <i class="bi bi-trash"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php endif;?>
                                            <div class="d-flex align-items-end">
                                                <img src="https://cu-sehati.com/wp-content/uploads/2020/04/avatar.png.jpg" alt="" style="height:44px;width:44px;" class="rounded-circle me-2">
                                                <h6 class="d-flex flex-column m-0">
                                                    <span class="text-capitalize"><?= $row1["name"]?></span>
                                                    <span class="text-black-50"><?= $row1["email"]?></span>
                                                </h6>
                                            </div>
                                            <p class="ps-5 mb-0">
                                                <?= $row1["comments"]?>
                                            </p>
                                        </div>                                        
                                        <?php
                                    }
                                } else {?>
                                <div class="bg-light no-comment-found p-3 text-center">
                                <h4 class="text-black-50">No review found on this restaurant.</h4>
                                    <a href="reviews.php?id=<?=$row["id"]?>">Add your review</a>
                                </div>
                                <?php }?>
                            </div>

                        </div>
                    </div>
                <?php }
            } ?>
        </div>


    </div>
    <div class="modal fade" id="editReviewModal" tabindex="-1" aria-labelledby="editReviewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="actions/reviews/update.action.php" method="post" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReviewModalLabel">Update </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <input type="hidden" name="review_id" id="review_id">
                        <select name="rating" id="rating" class="form-control mb-2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <textarea name="comments" placeholder="Comments" id="comments" class="form-control mb-2"></textarea>
                        </div>
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
        var model = new bootstrap.Modal("#editReviewModal");
        function getReviews(id) {
            $.get("actions/reviews/one.action.php?id=" + id).then(x => {
                if (x) {
                    $("#review_id").val(x.id);
                    $("#rating").val(x.rating);
                    $("#comments").val(x.comments);
                    model.show();
                }
            })
        }
    </script>
</body>

</html>