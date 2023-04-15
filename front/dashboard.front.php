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
          <input type="text" class="form-control" id="habit" placeholder="Add a new habit" style="margin-top: 10px; margin-bottom: 10px;" autocomplete="off">

          <div id="habitTracker">
            <style>
              .dropdown-opt {
                display: none;
              }

              .card:hover .dropdown-opt {
                display: inline-block;
              }

              .nature-btn {
                border: none;
                color: white;
                font-size: 1.2rem;
                padding: 4px 12px;
                cursor: pointer;
                transition: 0.2s ease;
                border-radius: 4px;
              }

              .nature-btn:focus {
                outline: none;
              }

              .nature-btn.positive {
                background-color: #097724;
                margin-right: 12px;
              }

              .nature-btn.negative {
                background-color: #aa0808;
              }

              .nature-btn.positive:active,
              .nature-btn.negative:active {
                transform: translateY(2px);
              }

              .nature-btn.disabled {
                opacity: 0.6;
                cursor: default;
              }

              .option-menu a:hover {
                background-color: #dcdcdc;
              }
            </style>

            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-2 d-flex justify-content-center align-items-center">
                    <i class="fa-sharp fa-solid fa-circle-plus fa-xl" style="color: #097724; font-size: 30px;"></i>
                  </div>

                  <div class="col-8 flex-grow-1">
                    <div class="row align-items-center">
                      <div class="col-10">
                        <h5 class="card-title">Habit Name</h5>
                        <p class="card-text">Habit Description</p>
                      </div>

                      <div class="col-1 text-right">
                        <div class="dropdown">
                          <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-h fa-xl dropdown-opt" style="color: #212529;"></i>
                          </a>

                          <ul class="dropdown-menu option-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="edit" data-bs-target="#editHabit" data-bs-toggle="modal">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-2">
                    <i class="fa-solid fa-circle-minus fa-xl" style="color: #aa0808; font-size: 30px;"></i>
                  </div>

                </div>
              </div>
            </div>

            <div class="modal fade" id="editHabit" aria-hidden="true" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-center px-2 py-2">
                      <h2>Edit Habit</h2>
                    </div>

                    <form>
                      <div class="col-12 px-2">
                        <label for="habit">Habit</label>
                      </div>
                      <div class="col-12 d-flex justify-content-center px-2">
                        <input type="text" class="form-control" id="habit" name="habit" placeholder="" required>
                      </div>
                      <div class="col-12 px-2">
                        <label for="description">Description</label>
                      </div>
                      <div class="col-12 d-flex justify-content-center px-2">
                        <textarea class="form-control" id="description" rows="4" style="resize: none; overflow-y: scroll;"></textarea>
                      </div>

                      <div class="col-12 d-flex justify-content-center px-2 py-2">
                        <input type="hidden" name="naturePositive" id="naturePositive" value="">
                        <button type="button" class="nature-btn positive" id="togglePositive" onclick="toggleNature('positive')">Positive</button>

                        <input type="hidden" name="natureNegative" id="natureNegative" value="">
                        <button type="button" class="nature-btn negative" id="toggleNegative" onclick="toggleNature('negative')">Negative</button>
                      </div>
                      
                      <div class="col-12 px-2">
                        <label for="difficulty">Difficulty </label>
                      </div>
                      <div class="col-12 px-2">
                        <select class="form-control" id="difficulty">
                          <option value="easy" selected>Easy ✦ </option>
                          <option value="medium">Medium ✦ ✦ </option>
                          <option value="hard">Hard ✦ ✦ ✦ </option>
                        </select>
                      </div>
                    </form>
                  </div>

                  <div style="margin-bottom: 10px;"></div>
                  <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>

            <script>
              function toggleNature(nature) {
                var currentNature = nature ?? '';

                const togglePositive = document.getElementById('togglePositive');
                const toggleNegative = document.getElementById('toggleNegative');

                const naturePositive = document.getElementById('naturePositive');
                const natureNegative = document.getElementById('natureNegative');

                if (currentNature === 'positive') {
                  if (togglePositive.classList.contains('disabled')) {
                    togglePositive.classList.remove('disabled');
                    naturePositive.value = 'false';

                  } else {
                    togglePositive.classList.add('disabled');
                    naturePositive.value = 'true';
                  }

                } else if (currentNature === 'negative') {
                  if (toggleNegative.classList.contains('disabled')) {
                    toggleNegative.classList.remove('disabled');
                    natureNegative.value = 'false';

                  } else {
                    toggleNegative.classList.add('disabled');
                    natureNegative.value = 'true';
                  }

                } else {
                  console.log('Error');
                }
              }
            </script>

          </div>
        </div>
      </div>

      <div class="col-md-4 py-1" id="taskTracker">
        <!-- display task tracker with AJAX -->
      </div>

      <div class="card shadow text-white bg-dark" style="margin-top: 30px;">
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

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>