<?php
    include '../back/level.back.php';

    $level = new Level();

    $userID = $_SESSION['userID'];

    $petAlive = $level->checkAlive($userID);
?>
<style>
    .toast-body p {
        font-size: 20px;
        font-weight: 400;
    }

    .toast-body {
        margin-bottom: -12px;
    }

    .toast-header strong {
        font-size: 20px;
        font-weight: 600;
        letter-spacing: 0.4px;
    }
</style>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-equipped" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>Equipped Successfully</p>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-feeding" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <?php if ($petAlive == "alive") { ?>
                <p>Fed Successfully</p>
            <?php } else { ?>
                <p>You can't feed your dead pet.</p>
            <?php } ?>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-task" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>Task Completed!</p>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-purchase" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>Purchased successfully!</p>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-positive" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>You've earned some currency and experience points</p>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-negative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>You've lost some currency and health points</p>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-revive" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>Your pet has been successfully revived.</p>
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" style="position: fixed; top: 26px; right: 20px; z-index: 1060;">
    <div class="toast toast-no-feed" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="../assets/images/logo3.png" width="20">
            <strong>&nbsp Tomodachi</strong>
        </div>
        <div class="toast-body">
            <p>You can't feed your dead pet.</p>
        </div>
    </div>
</div>

<!-- audio files -->
<audio id="toast-feed">
    <?php if ($petAlive == "alive") {?>
        <source src="../assets/audio/fed.mp3" type="audio/mpeg">
    <?php } else { ?>
        <source src="../assets/audio/negative.mp3" type="audio/mpeg">
    <?php } ?>
</audio>

<audio id="toast-task">
    <source src="../assets/audio/task.mp3" type="audio/mpeg">
</audio>

<audio id="toast-delete">
    <source src="../assets/audio/delete.mp3" type="audio/mpeg">
</audio>

<audio id="toast-equip">
    <source src="../assets/audio/equip.mp3" type="audio/mpeg">
</audio>

<audio id="toast-purchase">
    <source src="../assets/audio/purchase.mp3" type="audio/mpeg">
</audio>

<audio id="toast-positive">
    <source src="../assets/audio/positive.mp3" type="audio/mpeg">
</audio>

<audio id="toast-negative">
    <source src="../assets/audio/negative.mp3" type="audio/mpeg">
</audio>

<audio id="toast-dead">
    <source src="../assets/audio/error.mp3" type="audio/mpeg">
</audio>