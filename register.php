<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include_once "inc/shared/cookie-init.php"; ?>
    <?php include_once "inc/shared/head.php"; ?>
    <?php include_once "inc/shared/navbar.php"; ?>
</head>

<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                    <h1>Register</h1>
                <form action="actions/account/signup.action.php" method="post">
                    <input type="text" name="name" class="form-control mb-2" placeholder="Name" />
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" />
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" />
                    <button class="btn btn-outline-dark rounded-pill" style="min-width: 100px;">Signup</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "inc/shared/footer.php"; ?>
</body>

</html>