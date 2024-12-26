<?php

namespace Core\middleware;

class Auth{
    public function handle(){
        if(!$_SESSION['user']['email']?? false){
           
            header('location: /');
            exit();
          } 
    }
}