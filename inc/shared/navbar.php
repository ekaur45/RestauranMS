<?php
$isLoggedIn = false;
if (isset($_SESSION["USER"])) {
  $isLoggedIn = true;
}
function isActive($page)
{
    return basename($_SERVER['PHP_SELF']) == $page ? "active":"";
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">ComfyReserve</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?=isActive("index.php")?>" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isActive("reviews.php")?>" href="reviews.php">Reviews</a>
        </li>
        <?php if($isLoggedIn && $_SESSION["USER"]["role"]=="admin"): ?>
        <li class="nav-item">
          <a class="nav-link <?=isActive("restaurants.php")?>" href="restaurants.php" tabindex="-1">Restaurants</a>
        </li>
        <?php endif;?>
        <li class="nav-item">
          <a class="nav-link <?=isActive("bookings.php")?>" href="bookings.php" tabindex="-1">Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=isActive("about.php")?>" href="about.php" tabindex="-1">About us</a>
        </li>
      </ul>
      <form class="d-flex me-2">
        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" name="q">
        <button class="btn btn-outline-dark rounded-pill" type="submit">Search</button>
      </form>
      <?php if (!$isLoggedIn) { ?>
        <div class="d-flex">
          <a class="me-3" href="login.php">Login</a>
          <a href="register.php">Register</a>
        </div>
      <?php } else { ?>
        <div class="d-flex">
          <label class="me-3">
            <?= $_SESSION["USER"]["name"] ?>
          </label>
          <a href="logout.php">Logout</a>
        </div>
      <?php } ?>
      
    </div>
  </div>
</nav>