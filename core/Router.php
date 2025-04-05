<?php

namespace app\core;

class Router
{
   protected array $routes = [];
   protected Request $request;

   public function __construct(Request $request)
   {
      $this->request = $request;
   }

   public function get($path, $callback)
   {
      $path = trim($path, "/");
      $this->routes["get"][$path] = $callback;
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
         return "Not Found";
      }

      if (is_string($callback)) {
         return $this->renderView($callback);
      }

      return $callback();
   }
}
