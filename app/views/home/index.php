<!doctype html>
<html lang="id" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/622aa0f466.js" crossorigin="anonymous"></script>

  <!-- My Css -->
  <link rel="stylesheet" href="<?= BASEPUBLIC; ?>/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASEPUBLIC; ?>/css/style.css">

  <title><?= $data['title']; ?></title>
</head>

<body style="background-color: #ddf3f5;">

  <div class="container mt-3">
    <div class="row mt-2 justify-content-center">
      <div class="col-lg-6 text-center">
        <?php Flasher::flash(); ?>
      </div>
    </div>
    <div class="card shadow-lg card-sign-in" style="width: 25rem; border: 1px solid grey">
      <div class="img-hover-zoom">
        <img src="<?= BASEPUBLIC; ?>/img/login-banner.jpg" class="card-img-top" style="filter: brightness(80%);">
        <div class="centered">
          <div class="centered-text" style="text-shadow: 2px 2px black;">
            CAFINAR
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= BASEURL; ?>/auth/signin" method="POST">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="text-right d-flex justify-content-between">
            <button type="submit" class="btn btn-primary text-white">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="<?= BASEPUBLIC; ?>/js/jquery.min.js"></script>
  <script src="<?= BASEPUBLIC; ?>/js/popper.min.js"></script>
  <script src="<?= BASEPUBLIC; ?>/js/bootstrap/bootstrap.min.js"></script>
  <script src="<?= BASEPUBLIC; ?>/js/script.js"></script>
</body>

</html>