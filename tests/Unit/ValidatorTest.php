<?php

it('valiadting a string ', function(){

    $result = \Core\Validator::string('foobarrr');

    expect($result)->toBeTrue();
});