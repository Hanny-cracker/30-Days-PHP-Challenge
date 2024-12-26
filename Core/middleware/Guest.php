<?php

namespace Core\middleware;

class Guest{
    public function handle(){
        if($_SESSION['user']['email']?? false){
           
            header('location: /');
            exit();
          }
    }
}