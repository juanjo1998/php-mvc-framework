<?php

namespace app\core;

class Router
{
   protected array $routes = [];
   protected Request $request;
   protected Response $response;

   public function __construct(Request $request, Response $response)
   {
      $this->request = $request;
      $this->response = $response;
   }

   public function get($path, $callback)
   {
      $path = trim($path, "/");
      $this->routes["get"][$path] = $callback;
   }

   public function post($path, $callback)
   {
      $path = trim($path, "/");
      $this->routes["post"][$path] = $callback;
   }

   protected function layoutContent()
   {
      ob_start();
      include_once Application::$ROOT_DIR . "/views/layouts/main.php";
      return ob_get_clean();
   }

   protected function viewContent($view)
   {
      ob_start();
      include_once Application::$ROOT_DIR . "/views/{$view}.php";
      return ob_get_clean();
   }

   public function renderView($view)
   {
      $layoutContent = $this->layoutContent();
      $viewContent = $this->viewContent($view);

      return str_replace("{{content}}", $viewContent, $layoutContent);
   }

   public function resolve()
   {
      $method = $this->request->getMethod();
      $path = $this->request->getPath();
      $callback = $this->routes[$method][$path] ?? false;

      if ($callback === false) {
         $this->response->setStatusCode(404);
         return $this->renderView("_404");
      }

      if (is_string($callback)) {
         return $this->renderView($callback);
      }

      if (is_array($callback)) {
         $callback[0] = new $callback[0];
      }

      return call_user_func($callback);
   }
}
