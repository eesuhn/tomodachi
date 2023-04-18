<?php
include 'toast.inc.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
    <link rel="stylesheet" href="../assets/css/study.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="../assets/js/data/shop.data.js"></script>
    <script src="../assets/js/action/shop.action.js"></script>
    <script src="../assets/js/toast.js"></script>

</head>

<div class="sidebar">
    <div class="logo">
        <img src="../assets/images/logo2.png" alt="My Website Logo">
    </div>
    <a href="../front/dashboard.front.php">Home</a>
    <a href="../front/shop.front.php">Shop</a>
    <a class="active" href="study.front.php">Study</a>
    <div class="logout">
        <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
    </div>
</div>
<div style="background-image: url('../assets/images/bg2.png'); background-size: cover; background-repeat: no-repeat; background-position: center center;">

<div class="content vh-100">

<center><img src="../assets/images/studying.png" width="400"  style="margin-top: 150px; margin-right: 80px;"></center>
<div id="wrapper">
		<div id="main-panel">
			<div id="pomodoro-box">
				<h1 style="font-size: 45px">Pomodoro Studying</h1>
				<h4 class="text-muted">Earn currencies for each session you complete!</h4>
				<div class="time" id="timer">00:00</div>
				<!-- <div class="time-strip"></div> -->
				<div class="controls" id="pomodoro-controls">
					<div class="button-container">
						<button class="btn btn-primary btn-lg" id="workButton">Work</button>
						<div class="button-time">25:00</div>
					</div>
					<div class="button-container">
                    <button class="btn btn-dark btn-lg" id="restButton">Rest</button>
						<div class="button-time">5:00</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

<script src="../assets/js/study.js"></script>
<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-study" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>You just completed a session and earned some gold.</p>
            <center>
            <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast" aria-label="Close">
                Close
            </button>
            </center>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-break" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>Your 5 minutes break has completed</p>
            <center>
            <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="toast" aria-label="Close">
                Close
            </button>
            </center>
        </div>
    </div>
</div>

<audio id="toast-level">
    <source src="../assets/audio/level.mp3" type="audio/mpeg">
</audio>
