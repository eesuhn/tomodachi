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

<body style="background-color: #f2f2f2; margin: 0;">

  <nav class="navbar">
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="login.front.php">Login</a></li>
      <li><a href="register.front.php" class="active">Register</a></li>
    </ul>
  </nav>

  <div class="container-fluid p-0">
    <div class="row no-gutters">
      <div class="col-md-6 d-none d-md-block">
        <img src="../assets/images/registerbg.png" alt="Login image" class="w-100" style="object-fit: cover; height: 105vh;">
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <div class="container p-5">
          <center><img src="../assets/images/logo1.png" width="195"></center>
          <h1 class="text-center mb-5">Create an account</h1>
          <form id="register_user" method="POST" action="../include/register.inc.php">
            <div class="form-group">
              <label for="name" style="font-size: 24px;">Username</label>
              <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="e.g. John Doe" required />
            </div>
            <div class="form-group">
              <label for="email" style="font-size: 24px;">Email address</label>
              <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="e.g. john@gmail.com" required />
            </div>
            <div class="form-group">
              <label for="password" style="font-size: 24px;">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter a secure password" required />
              <div id="passwordHelp" class="form-text">Keep your account protected!</div>
            </div>
            <div class="form-group">
              <label for="confirm_password" style="font-size: 24px;">Password Confirmation</label>
              <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" placeholder="Retype your password" required />
            </div>
            <div class="text-center">
              <button class="btn btn-primary btn-lg btn-block" type="submit" style="width: 30%; margin-top: 15px;">Create Account</button>
            </div>
            <p class="text-center mt-3 mb-0" style="font-size: 20px;">Already have an account? <a href="login.front.php">Login here</a></p>
          </form>
        </div>
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

  <script>
    const form = document.querySelector('#register_user');
    const emailInput = form.querySelector('#email');
    const passwordInput = form.querySelector('#password');
    const confirmPasswordInput = form.querySelector('#confirm_password');
    const errorMessage = document.createElement('div');
    errorMessage.classList.add('text-danger');
    const emailErrorMessage = document.createElement('div');
    emailErrorMessage.classList.add('text-danger');
    const submitButton = form.querySelector('button[type="submit"]');

    function checkPasswordStrength() {
      const password = passwordInput.value;
      const regex = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+){8,}$/;

      if (regex.test(password)) {
        errorMessage.textContent = '';
        return true;
      } else {
        errorMessage.textContent = 'Password should be at least 8 characters long and include at least 1 digit and alphabet';
        return false;
      }
    }

    function validateEmail() {
      const email = emailInput.value;
      const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (regex.test(email)) {
        emailErrorMessage.textContent = '';
        return true;
      } else {
        emailErrorMessage.textContent = 'Please enter a valid email address';
        return false;
      }
    }

    form.addEventListener('submit', (event) => {
      if (passwordInput.value !== confirmPasswordInput.value || !checkPasswordStrength() || !validateEmail()) {
        event.preventDefault();
        if (!form.contains(errorMessage)) {
          confirmPasswordInput.insertAdjacentElement('afterend', errorMessage);
        }
        if (!form.contains(emailErrorMessage)) {
          emailInput.insertAdjacentElement('afterend', emailErrorMessage);
        }
        submitButton.disabled = true;
      }
    });

    confirmPasswordInput.addEventListener('input', () => {
      if (form.contains(errorMessage)) {
        errorMessage.remove();
      }
      checkPasswordStrength();
      validateEmail();
      submitButton.disabled = false;
    });

    passwordInput.addEventListener('input', () => {
      if (form.contains(errorMessage)) {
        errorMessage.remove();
      }
      checkPasswordStrength();
      validateEmail();
      submitButton.disabled = false;
    });

    emailInput.addEventListener('input', () => {
      if (form.contains(emailErrorMessage)) {
        emailErrorMessage.remove();
      }
      validateEmail();
      submitButton.disabled = false;
    });
  </script>


</body>

</html>