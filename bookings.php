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

</head>

<body>
    <?php include_once "partials/data.partial.php"; ?>

    <form action="actions/booking/add.action.php" method="post">
        Restaurant
        <select name="restaurant_id" id="">
            <?php include_once "inc/db/connection.php";
            $sql = "select * from restaurants";
            $restaurants = __select($sql);
            if (sizeof($restaurants) > 0) {
                for ($i = 0; $i < sizeof($restaurants); $i++) {
                    $row = $restaurants[$i];
                    ?>
                    <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                    <?php
                }
            }

            ?>
        </select>
        <br>
        Date
        <input type="date" name="date" id="">
        <br>
        Time
        <input type="time" name="time" id="">
        <br>
        Party size
        <input type="number" name="party_size" id="">
        <br>
        <button>Add</button>
    </form>
    <table>
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
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $sql = "select *,(select `name` from users where id = user_id) as userName,(select `name` from restaurants where id = restaurant_id) as restaurant from bookings";
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
                            Action
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>