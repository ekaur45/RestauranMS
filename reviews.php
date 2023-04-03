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
        <div class="row pt-5">

            <?php if ($id) { ?>
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
                    <button class="btn btn-outline-dark rounded-pill" style="min-width: 150px;">Add</button>
                </form>
            <?php } ?>

        </div>
    </div>
    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>