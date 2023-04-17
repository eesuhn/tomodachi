<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body style="background-color: #f2f2f2;">


  <nav class="navbar">
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="login.front.php" class="active">Login</a></li>
      <li><a href="register.front.php">Register</a></li>
    </ul>
  </nav>

  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-md-6 d-flex align-items-center">
        <div class="container p-5">
          <center><img src="../assets/images/logo1.png" width="195"></center>
          <h1 class="text-center mb-5">Sign into your account</h1>
          <form id="login_user" method="POST" action="../include/login.inc.php">
            <div class="form-group">
              <label for="email" style="font-size: 24px;">Email address</label>
              <input type="email" id="email" name="email" class="form-control form-control-lg" required />
            </div>
            <div class="form-group">
              <label for="password" style="font-size: 24px;">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" required />
            </div>
            <div class="text-center">
              <button class="btn btn-primary btn-lg btn-block" type="submit" style="width: 30%; margin-top: 15px;">Login</button>
            </div>
            <p class="text-center mt-3 mb-0" style="font-size: 20px">Don't have an account? <a href="register.front.php">Register here</a></p>
          </form>
        </div>
      </div>
      <div class="col-md-6 d-none d-md-block">
        <img src="../assets/images/loginbg.png" alt="Login image" class="w-100" style="object-fit: cover; height: 105vh;">
      </div>
    </div>
  </div>

  <footer class="bg-dark text-center text-lg-start text-white" style="font-size:19px">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h3 class="text-uppercase">Tomodachi</h3>
          <p>
            Final Year Project, DIIT AUG 2021
          </p>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Quick Access</h5>
          <ul class="list-unstyled mb-0">
            <li>
              <a href="front/login.front.php" class="text-white">Login</a>
            </li>
            <li>
              <a href="front/register.front.php" class="text-white">Register</a>
            </li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Creators</h5>
          <ul class="list-unstyled mb-0 text-white">
            <li>
              Lim Yi Hong
            </li>
            <li>
              Mak Wei Jen
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>