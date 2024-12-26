<?php
view('registration/login.view.php',[
    'error' => $_SESSION['_flash']['errors'] ?? []
]);