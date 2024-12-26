<?php

namespace Core;

use Core\middleware\Guest;
use Core\middleware\Auth; 
use Core\Middleware\Middleware;

class Router
{

  protected $routes = [];

  public function add($uri, $controller, $method, $middleware = null)
  {
    $this->routes[] = compact('method', 'uri', 'controller', 'middleware'); //the compact function turns elemtens in it ageument parameter to an array
    // $this->routes[] = [
    //   'uri' => $uri,
    //   'controller' => $controller,
    //   'method' => $method
    // ];
    return $this;
  }
  public function get($uri, $controller)
  {
    return $this->add($uri, $controller, 'GET');
  }
  public function post($uri, $controller)
  {
    return $this->add($uri, $controller, 'POST');
  }
  public function delete($uri, $controller)
  {
    return $this->add($uri, $controller, 'DELETE');
  }
  public function patch($uri, $controller)
  {
    return $this->add($uri, $controller, 'PATCH');
  }
  public function put($uri, $controller)
  {
    return $this->add($uri, $controller, 'PUT');
  }

  public function route($uri, $method) 
  #this function is to return a view if the curresponding route is avialable
  {
    foreach ($this->routes as $route) { //this iterates over the routes array
      if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {

        if ($route['middleware']) { // this function is used for middleware. for protecting the routes. 
          Middleware::resolve($route['middleware']);

        }

        return require base_path('Http/controllers/'.$route['controller']);
      }
    }
    $this->abort();
  }
  public function only($key)
  {

    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    //  dd($this->routes);
    return $this;
  }

  protected function abort($code = 404)
  {
    // abording current request
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
  }
}
