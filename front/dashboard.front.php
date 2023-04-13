<?php
include '../include/dashboard.inc.php';
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

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

<body style="background-color:#f1f1f1;">

  <div class="sidebar">
    <div class="logo">
      <img src="../assets/images/logo2.png" alt="My Website Logo">
    </div>
    <a class="active" href="#home">Home</a>
    <a href="../front/shop.front.php">Shop</a>
    <a href="#contact">Study</a>
    <a href="#about">Schedule</a>
    <div class="logout">
      <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
    </div>
  </div>

  <div class="content">
    <div class="container" id="statsHeader">
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
              background: rgba(0, 0, 0, 0.5); 
              padding: 5px;" class="inventory">
            <a data-bs-target="#inventory" data-bs-toggle="modal" onclick="refreshInventory()"><img src="../assets/images/inventory.png" style="width: auto; height: 36px;">
              <span style="margin-left: 10px; color: white; font-size: 20px;">Inventory</span></a>
          </div>
          <div class="pet" id="petImg">
            <!-- display petImage with AJAX -->
          </div>
        </div>
      </div></a>

      <div class="col-md-4 py-1">
        <h3><img src="../assets/images/habit.png" width="30" style="margin-right: 10px" ;>Habits</h3>
        <div class="container" style="height: 500px; width: 100%; overflow-y: scroll; position: relative; background-color: #A4A4A4; border-radius: 6px;">
          <input type="text" class="form-control" id="habit" placeholder="Add a new habit" style="margin-top: 10px;">
        </div>
      </div>

      <div class="col-md-4 py-1">
        <h3><img src="../assets/images/task.png" width="30" style="margin-right: 10px;">To-Do's</h3>
        <div class="container" style="height: 500px; width: 100%; overflow-y: scroll; position: relative; background-color: #A4A4A4; border-radius: 6px; display: flex; flex-direction: column;">
          <input type="text" class="form-control" id="taskTitle" name="taskTitle" placeholder="Add a new task" style="margin-top: 10px;">

          <div class="btn-group justify-content-end" style="margin-top: 10px;">
            <button type="button" id="active-btn" class="btn btn-secondary active">Active</button>
            <button type="button" id="completed-btn" class="btn btn-secondary">Completed</button>
          </div>

          <div id="taskList">
            <!-- display tasks with AJAX -->
          </div>
          <div style="margin-top: 10px;"></div>
        </div>
      </div>

      <div class="card shadow  text-white bg-dark" style="margin-top: 30px;">
        <div class="card-header">
          <h4>Foods</h4>
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


  <div class="modal fade" id="inventory" aria-hidden="true" aria-labelledby="inventoryTitle" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body" style="color:black" id="inventoryData">
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
        <div class="modal-body" style="color:black">
          <h4>Are you sure you want to log out?</h4>
        </div>
        <div class="modal-footer">
          <a href="../include/logout.inc.php" class="btn btn-primary" role="button" aria-pressed="true">Confirm</a>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!--Toast notifications-->
  <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 0; right: 0; z-index: 1060;">
    <div class="toast toast-equipped" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="../assets/images/logo3.png" width="20">
        <strong class="me-auto">Tomodachi</strong>
      </div>
      <div class="toast-body">
        Equipped Successfully
      </div>
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 0; right: 0; z-index: 1060;">
    <div class="toast toast-feeding" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="../assets/images/logo3.png" width="20">
        <strong class="me-auto">Tomodachi</strong>
      </div>
      <div class="toast-body">
        Fed Successfully
      </div>
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 0; right: 0; z-index: 1060;">
    <div class="toast toast-task" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="../assets/images/logo3.png" width="20">
        <strong class="me-auto">Tomodachi</strong>
      </div>
      <div class="toast-body">
        Task Completed
      </div>
    </div>
  </div>

  <audio id="toast-feed">
    <source src="../assets/audio/fed.mp3" type="audio/mpeg">
  </audio>

  <audio id="toast-positive">
    <source src="../assets/audio/positive.mp3" type="audio/mpeg">
  </audio>

  <audio id="toast-task">
    <source src="../assets/audio/task.mp3" type="audio/mpeg">
  </audio>

  <script>
    document.getElementById('taskTitle').addEventListener('keypress', function(event) {
      if (event.key === 'Enter') {
        // prevent the form from being submitted
        event.preventDefault();

        // add task
        addTask();
      }
    });


    $('#active-btn').on('click', function() {
      toggleStatus('Active');
    });

    $('#completed-btn').on('click', function() {
      toggleStatus('Completed');
    });

    function toggleStatus(status) {

      $('#active-btn').removeClass('active');
      $('#completed-btn').removeClass('active');
      $('#' + status.toLowerCase() + '-btn').addClass('active');

      refreshTask(status);
    }
  </script>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>