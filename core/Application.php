<?php

namespace app\core;

use app\core\Request;
use app\core\Router;

class Application
{
   public static string $ROOT_DIR;
   public Request $request;
   public Response $response;
   public Router $router;

   public function __construct($rootPath)
   {
      self::$ROOT_DIR = $rootPath;

      $this->response = new Response();
      $this->request = new Request();

      $this->router = new Router($this->request, $this->response);
   }

   public function run()
   {
      echo $this->router->resolve();
   }
}
