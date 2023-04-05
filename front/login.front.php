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

  <body style="background-image: url(../assets/images/bg.png); background-size: cover;">

    <nav class="navbar">
      <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="login.front.php">Login</a></li>
      </ul>
    </nav>

    <section class="vh-80">
      <div class="container py-5 h-80">
        <div class="row d-flex justify-content-center align-items-center h-100">

          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">

              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img src="../assets/images/loginbg.png" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>

                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">

                    <form id="login_user" method="POST" action="../include/login.inc.php">
                      <div class="d-flex align-items-center mb-3 pb-1 justify-content-center">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">
                          <img src="../assets/images/logo1.png" width="120">
                        </span>
                      </div>

                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                      <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label" for="email">Email address</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label" for="password">Password</label>
                      </div>

                      <div class="pt-1 mb-4">
                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                      </div>

                      <a class="small text-muted" href="#!">Forgot password?</a>

                      <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account?
                        <a href="#registerModal" data-bs-target="#registerModal" data-bs-toggle="modal" style="color: #393f81;">Register here</a>
                      </p>

                      <a href="#!" class="small text-muted">Terms of use.</a>
                      <a href="#!" class="small text-muted">Privacy policy</a>
                    </form>

                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <footer class="bg-dark text-center text-lg-start text-white">
      <div class="container p-4">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h5 class="text-uppercase">Tomodachi</h5>
            <p>
              Final Year Project, DIIT AUG 2021
            </p>
          </div>

          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Quick Access</h5>
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#!" class="text-white">About us</a>
              </li>
              <li>
                <a href="#!" class="text-white">Contact us</a>
              </li>
              <li>
                <a href="#!" class="text-white">Login</a>
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

    <div class="modal fade modal-lg" id="registerModal" aria-hidden="true" aria-labelledby="registerTitle" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <div class="modal-header">
            <h1 class="modal-title fs-5" id="registerTitle">Account Creation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form id="register_user" method="POST" action="../include/register.inc.php">
            <div class="modal-body">
              <div class="row">

                <div class="col-6" style="background-image: url(../assets/images/registerbg.png);background-size: cover; background-position: center;"></div>
                
                <div class="col-6">
                  <label for="text">Username</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="e.g. John Doe" required>
                  <div id="nameHelp" class="form-text">This is how we will be announcing you on our page.</div>

                  <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="e.g. john@gmail.com" required>
                  <div id="emailHelp" class="form-text">Please enter a valid email address</div>

                  <label for="text">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter a secure password" required>
                  <div id="passwordHelp" class="form-text">Keep your account protected!</div>

                  <label for="text">Password Confirmation</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Retype your password" required>
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-dark">Proceed</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>

    <script>
      const form = document.querySelector('#register_user');
      const passwordInput = form.querySelector('#password');
      const confirmPasswordInput = form.querySelector('#confirm_password');
      const errorMessage = document.createElement('div');
      errorMessage.classList.add('text-danger');
      errorMessage.textContent = 'Passwords do not match';
      const submitButton = form.querySelector('button[type="submit"]');

      form.addEventListener('submit', (event) => {
        if (passwordInput.value !== confirmPasswordInput.value) {
          event.preventDefault();
          if (!form.contains(errorMessage)) {
            confirmPasswordInput.insertAdjacentElement('afterend', errorMessage);
          }
          submitButton.disabled = true;
        }
      });

      confirmPasswordInput.addEventListener('input', () => {
        if (form.contains(errorMessage)) {
          errorMessage.remove();
        }
        submitButton.disabled = false;
      });
    </script>

    <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

  </body>

</html>