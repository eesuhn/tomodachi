<?php
  include '../include/dashboard.inc.php';
  include '../include/toast.inc.php';
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/sidebar.css">
  <link rel="stylesheet" href="../assets/css/pet_animation.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0fa65bfd04.js" crossorigin="anonymous"></script>

  <script src="../assets/js/data/dashboard.data.js"></script>
  <script src="../assets/js/action/dashboard.action.js"></script>
  <script src="../assets/js/toast.js"></script>

</head>

<body style="background-image: url('../assets/images/bg3.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; opacity: 92%;">

  <div class="sidebar">
    <div class="logo">
      <img src="../assets/images/logo2.png" alt="Tomodachi">
    </div>
    <a class="active" href="dashboard.front.php">Home</a>
    <a href="../front/shop.front.php">Shop</a>
    <a href="../front/study.front.php">Study</a>
    <div class="logout">
      <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
    </div>
  </div>

  <div class="content">
    <div class="container" id="statsHeader" style="margin-bottom: -10px;">
      <!-- display stats header with AJAX -->
    </div>

    <div class="row px-4 py-2">
      <div class="col-md-4">
        <div id="wallpaper" style="
            height: 550px; 
            width: auto; 
            border: 5px solid black; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            position: relative; 
            background-size: cover; 
            background-position: center;">
          <div style="
              position: absolute; 
              bottom: 0; 
              left: 0; 
              display: flex; 
              align-items: center; 
              margin: 5px; 
              background: rgba(0, 0, 0, 0.8); 
              padding: 2px 8px 2px;" class="inventory">
            <a data-bs-target="#inventory" data-bs-toggle="modal" onclick="refreshInventory()">
              <img src="../assets/images/inventory.png" style="width: auto; height: 40px; margin-bottom: 5px;">
              <span style="margin-left: 10px; color: white; font-size: 24px;">Inventory</span>
            </a>
          </div>
          <div class="pet" id="petImg">
            <!-- display petImage with AJAX -->
          </div>
        </div>
      </div></a>

      <div class="col-md-4 py-1">
        <h3><img src="../assets/images/habit.png" width="30" style="margin-right: 10px" ;>Habits</h3>
        <div class="container" style="height: 500px; width: 100%; overflow-y: scroll; position: relative; background-color: #5C6C7D; border-radius: 6px;">
          <input type="text" class="form-control" id="habitTitle" name="habitTitle" placeholder="Add a new habit" style="margin-top: 16px; font-size: 20px;" autocomplete="off">

          <div id="habitTracker">
            <!-- display habit tracker with AJAX -->
          </div>
        </div>
      </div>

      <div class="col-md-4 py-1" id="taskTracker">
        <!-- display task tracker with AJAX -->
      </div>

      <div class="card shadow text-white bg-dark" style="margin-top: 20px;">
        <div class="card-header">
          <h4 style="font-size: 24px; padding-top: 6px; padding-left: 2px;">Foods</h4>
        </div>
        <div class="row no-gutters">
          <div class="col-md-12"></div>
          <div class="counter">
            <div class="row" id="foodCounter">
              <!-- display food with AJAX -->
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- modals used in dashboard -->
  <div class="modal fade" id="inventory" aria-hidden="true" aria-labelledby="inventoryTitle" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body" style="color: black" id="inventoryData">
          <!-- display inventory with AJAX -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="logout" aria-hidden="true" aria-labelledby="logoutTitle" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" style="color: black">
          <h4>Are you sure you want to log out?</h4>
        </div>
        <div class="modal-footer">
          <a href="../include/logout.inc.php" class="btn btn-primary" role="button" aria-pressed="true">Confirm</a>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deadModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" style="color: black" id="inventoryData">
          <h3 style="margin: 20px;">Uh oh, your pet has died due to your bad habits!</h3>
          <h5 style="margin: 20px;" class="text-muted">Accumulate coins to revive it!</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="tutorial1" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <center>
            <img src="../assets/images/logo1.png" width="120px">
            <h2>Welcome abroad, we are very excited to have you here with us.</h2>
            <h5 class="text-muted">Before you get started, let's kick off with a bit of a tutorial to demonstrate how you should be using our app.</h5>
            <a  href="" data-bs-target="#skip" data-bs-toggle="modal" class="link-danger">Do not show this again.</a>
        </center>
    </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#tutorial2" data-bs-toggle="modal">Proceed</button>
        <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="skip" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <center>
            <img src="../assets/images/logo1.png" width="120px">
            <h2>Are you sure you want to stop seeing this tutorial?</h2>
        </center>
    </div>
      <div class="modal-footer">
        <button class="btn btn-danger" data-bs-dismiss="modal" onclick="setTutModal()">Yes</button>
        <button class="btn btn-primary" data-bs-target="#tutorial1" data-bs-toggle="modal">No, bring me back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial2" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg1.png" width="90%">
            <h3>This is your dashboard, where everything is accessible at a glance.</h3>
            <h5 class="text-muted">On this page, you will be able to add a new habit, set tasks into your to-do's, navigate around the application and most importantly, interact with your selected pet.</h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#tutorial3" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial1" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="tutorial3" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg2.png" width="90%">
            <h3>This is the stat header, where information of your equipped pet will be displayed.</h3>
            <h5 class="text-muted">The <img src="../assets/images/level.png" width="10">Level indicates the level of your pet. The <img src="../assets/images/health.png" width="10"> health indicates the health points of your pet and the <img src="../assets/images/hunger.png" width="10"> Happy indicates the happiness of your pet. Lastly, the <img src="../assets/images/coin.png" width="10"> represents the amount of gold you have gained by accomplishing tasks. </h5>
            <h5 class="text-muted"> Earn experience points by completing tasks and habits and keep your pet happy by feeding it food using your hard earned gold. </h5>
            <h5 class="text-muted"> At maximum happiness, your rewards received will receive a<span style="color: green"> massive</span> boost, so try making it your daily goal. </h5>
            <h5 class="text-muted"> Please remember to <span style="color: red">take extra care</span> of your pet by avoiding bad habits as it could bring consequences. </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-target="#tutorial4" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial2" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial4" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg3.png" width="90%">
            <h3>Moving on, this is where you will be able to add in a new habit to keep up with.</h3>
            <h5 class="text-muted">Do note that after entering a habit, you are required to select a nature of the habit (<span style="color: green;">Positive</span>/<span style="color: red;">Negative</span>) and its difficulty. </h5>
            <h5 class="text-muted"> For every <span style="color: green;">positive</span> habits that you accomplish, you will earn some <img src="../assets/images/coin.png" width="10"> gold and some <img src="../assets/images/level.png" width="10"> experience points in your journey to level up. 
            On the other hand, for each <span style="color: red;">negative</span> habits that you have done, you will lose some <img src="../assets/images/health.png" width="10"> health and some <img src="../assets/images/coin.png" width="10"> gold. </h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-target="#tutorial5" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial3" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial5" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg4.png" width="45%">
            <h3>Similarly, your to-do's can be added here and each time you check off a task, you will be rewarded with some <img src="../assets/images/coin.png" width="10"> gold and some <img src="../assets/images/level.png" width="10"> experience points.</h3>
            <h5 class="text-muted">Other details such as due dates or descriptions can be added by hovering over the task that have been added.</h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-target="#tutorial6" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial4" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial6" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg5.png" width="90%">
            <h3>By accessing your inventory in the dashboard, you will be able to check out your owned pets and wallpapers.</h3>
            <h5 class="text-muted">These can be purchased from the <span style="color:#FFD700;">shop</span>, so gather up enough coins and find your favourite combination.</h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-target="#tutorial7" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial5" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial7" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg7.png" width="90%">
            <h3>As previously mentioned, there is a happiness indicator in the stats header and the way you can build this meter up is by <span style="color:green">feeding </span> your pet!</h3>
            <h5 class="text-muted">Again, food can be purchased from the <span style="color:#FFD700;">shop</span> and the happiness meter can only go up to a maximum of 200.</h5>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-target="#tutorial8" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial6" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial8" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/tutimg8.png" width="90%">
            <h3>A studying feature is also included within our application following the pomodoro studying method. It includes 2 timers, at which both are 25 minutes and 5 minutes respectively. </h3>
            <h5 class="text-muted">To effectively use it, you should start each studying session by starting the timer, and take a 5 minutes break once you have completed the session, then repeat!</h5>
            <h6 class="text-muted">Everytime you <span style="color: green">complete</span> a studying session, you will be rewarded with some <img src="../assets/images/coin.png" width="10">gold to use at the shop.</h6>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-target="#tutorial9" data-bs-toggle="modal">Next</button>
        <button class="btn btn-dark" data-bs-target="#tutorial7" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="tutorial9" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <center>
        <img src="../assets/images/logo1.png" width="120px">
            <h3>You have reached the end of this tutorial.</h3>
            <h6 class="text-muted">Start this <span style="color: green">positive</span> journey in building healthy habits and be in better control of your life.</h6>
            <h6 class="text-muted">Please remember to be <span style="color: red">honest</span> when using our application and we only want to help you build positive habits and reach your goals.</h6>
            <h6 class="text-muted">We hope you enjoy!</h6>
        </center>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left:0; position: absolute;">Back to first</button>
        <button class="btn btn-primary" data-bs-dismiss="modal" onclick="setTutModal()">Done</button>
      </div>
    </div>
  </div>
</div>

  <script>
    var habitTitle = document.getElementById('habitTitle') ?? {
      textContent: ''
    };

    if (habitTitle && habitTitle.tagName === 'INPUT') {
      habitTitle.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
          // prevent the form from being submitted
          event.preventDefault();

          // add habit
          addHabit();
        }
      });
    }
  </script>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>