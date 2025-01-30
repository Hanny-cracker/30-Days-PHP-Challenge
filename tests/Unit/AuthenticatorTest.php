<?php

it("this is to test if the authentication class is working well", function(){
    $authenticator = new \Core\Authenticator();
    $result = $authenticator->login(["email" => "hanl@gmail.com"]);

    expect($result)->toBe(true);
});