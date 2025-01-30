<?php

use Core\Container;

test('it can resolve somthing out of the container', function () {
    // expect(true)->toBeTrue();
     $container = new Container();

     $container->bind("foo", fn() => "bar");

     $result = $container->resolve("foo");
     expect($result)->toEqual('bar');
});
