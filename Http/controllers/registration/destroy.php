<?php

use Core\Authenticator;

(new Authenticator) -> logout();
// log the user out
header('location: /');
exit();