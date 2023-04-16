<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0fa65bfd04.js" crossorigin="anonymous"></script>
</head>

<div class="col-12 d-flex align-items-center vh-100" style="background-image: url('../assets/images/bg.png'); background-size: cover;" ;>
    <div class="card-body p-4 p-lg-5 text-black">
        <form id="login_admin" method="POST" action="../include/admin.inc.php">
            <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                <span class="h1 fw-bold mb-0">
                    <img src="../assets/images/logo1.png" width="120">
                </span>
            </div>
            <center>
                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 2px; font-size: x-large;">Admin Login</h5>
            </center>
            <div class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control form-control-lg" />
                <label class="form-label" for="email" style="font-size: large;">Email address</label>
            </div>

            <div class="form-outline mb-4">
                <input type="password" id="password" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="password" style="font-size: large;">Password</label>
            </div>
            <div class="pt-1 mb-4">
                <center><button class="btn btn-dark btn-lg btn-block" type="submit">Login</button></center>
            </div>
        </form>
    </div>
</div>

</html>