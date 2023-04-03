<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[You title here]</title>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
    <?php include_once "inc/shared/cookie-init.php";
    $id = null;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    ?>
</head>

<body>
    <div class="container">
        <?php include_once "inc/db/connection.php";
        $sql = "select * from restaurants where id=".$id;
        $restaurants = __select($sql);
        $restaurant = $restaurants[0];
        ?>        
        <form action="actions/booking/add.action.php" method="post" class="row pt-5">
            <input type="hidden" name="restaurant_id" value="<?=$restaurant["id"]?>">
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
                <button type="submit" class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Add</button>
            </div>
    </div>
    </form>


    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>