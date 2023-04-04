<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
    <?php
    $user = null;
    if ($isLoggedIn) {
        $user = $_SESSION["USER"];
    }else{
        header("Location: login.php");
    }
    ?>
</head>

<body>
    <div class="container">

        <?php include_once "partials/data.partial.php"; ?>
        <div class="row pt-5">
            <div class="col-md-12" style="overflow: auto;">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>
                                No.
                            </th>
                            <th>
                                Restaurant
                            </th>
                            <th>
                                User
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Time
                            </th>
                            <th>
                                Party size
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sql = "select *,(select `name` from users where id = user_id) as userName,(select `name` from restaurants where id = restaurant_id) as restaurant from bookings".($user["role"]=='user'?"where user_id=" . $user["id"] . "":"");                        
                        $bookings = __select($sql);
                        if (sizeof($bookings) > 0) {
                            for ($i = 0; $i < sizeof($bookings); $i++) {
                                $row = $bookings[$i];
                                ?>
                                <tr>
                                    <td>
                                        <?= $i + 1 ?>
                                    </td>
                                    <td>
                                        <?= $row["restaurant"] ?>
                                    </td>
                                    <td>
                                        <?= $row["userName"] ?>
                                    </td>
                                    <td>
                                        <?= $row["date"] ?>
                                    </td>
                                    <td>
                                        <?= $row["time"] ?>
                                    </td>
                                    <td>
                                        <?= $row["party_size"] ?>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled d-flex mb-0 justify-content-center gap-2">
                                            <li>
                                                <a href="bookings.php?id=<?= $row["id"] ?>" class="text-info">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="actions/booking/delete.action.php?id=<?= $row["id"] ?>"
                                                    class="text-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7">
                                    <div class="bg-light no-comment-found p-3 text-center">
                                        <img src="assets/img/no-data.svg" alt="" style="width: 150px;" class="mb-3">
                                        <h4 class="text-black-50">You have no bookings.</h4>
                                        <a href="index.php">Click to add booking.</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>