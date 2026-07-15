<?php
class Router {
    
    private $routes = [];
    private $groupPrefix = '';
    private $groupMiddleware = [];
    
    public function __construct() {
        $this->registerRoutes();
    }
    
    private function registerRoutes() {
        require_once APP_PATH . '/routes/web.php';
    }
    
    public function get($path, $handler) {
        $this->addRoute('GET', $path, $handler);
    }
    
    public function post($path, $handler) {
        $this->addRoute('POST', $path, $handler);
    }
    
    public function put($path, $handler) {
        $this->addRoute('PUT', $path, $handler);
    }
    
    public function delete($path, $handler) {
        $this->addRoute('DELETE', $path, $handler);
    }
    
    public function any($path, $handler) {
        $methods = ['GET', 'POST', 'PUT', 'DELETE'];
        foreach ($methods as $method) {
            $this->addRoute($method, $path, $handler);
        }
    }
    
    private function addRoute($method, $path, $handler) {
        $fullPath = $this->groupPrefix . $path;
        
        $this->routes[] = [
            'method' => $method,
            'path' => $fullPath,
            'handler' => $handler,
            'middleware' => $this->groupMiddleware
        ];
    }
    
    public function group($prefix, $callback, $middleware = []) {
        $previousPrefix = $this->groupPrefix;
        $previousMiddleware = $this->groupMiddleware;
        
        $this->groupPrefix = $prefix;
        $this->groupMiddleware = array_merge($this->groupMiddleware, $middleware);
        
        $callback($this);
        
        $this->groupPrefix = $previousPrefix;
        $this->groupMiddleware = $previousMiddleware;
    }
    
    public function dispatch($request) {
        $method = $request->getMethod();
        $uri = $request->getPath();
        
        $lang = $request->get('lang', 'zh');
        if (!in_array($lang, ['zh', 'en'])) {
            $lang = 'zh';
        }
        
        $request->setLang($lang);
        
        foreach ($this->routes as $route) {
            $params = $this->matchRoute($route, $method, $uri);
            if ($params !== false) {
                $this->runMiddleware($route['middleware'], $request);
                
                foreach ($params as $key => $value) {
                    $request->set($key, $value);
                }
                
                $this->executeHandler($route['handler'], $request);
                return;
            }
        }
        
        $this->handle404($request);
    }
    
    private function matchRoute($route, $method, $uri) {
        if ($route['method'] !== $method) {
            return false;
        }
        
        $routePath = $route['path'];
        
        preg_match_all('/\{([a-zA-Z_]+)\}/', $routePath, $paramNames);
        $paramNames = $paramNames[1];
        
        $routePath = preg_replace('/\{([a-zA-Z_]+)\}/', '([^/.]+)', $routePath);
        $routePath = '#^' . $routePath . '$#';
        
        if (!preg_match($routePath, $uri, $matches)) {
            return false;
        }
        
        $params = [];
        array_shift($matches);
        foreach ($paramNames as $index => $name) {
            if (isset($matches[$index])) {
                $params[$name] = $matches[$index];
            }
        }
        
        return $params;
    }
    
    private function executeHandler($handler, $request) {
        if (is_callable($handler)) {
            echo $handler($request);
            return;
        }

        if (is_string($handler) && strpos($handler, '@') !== false) {
            list($controller, $action) = explode('@', $handler);
            
            $controllerFile = APP_CONTROLLER_PATH . '/' . $controller . '.php';
            
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                
                $controllerInstance = new $controller($request);
                
                if (method_exists($controllerInstance, $action)) {
                    $uri = $request->getPath();
                    preg_match('/\/([^\/]+)\/([^\/]+)$/', $uri, $matches);
                    if (!empty($matches[2]) && is_numeric($matches[2])) {
                        $request->set('id', $matches[2]);
                    }
                    
                    echo $controllerInstance->$action();
                    return;
                }
            }
        }
        
        echo "Handler not found";
    }
    
    private function runMiddleware($middleware, $request) {
        foreach ($middleware as $mw) {
            if (is_callable($mw)) {
                $mw($request);
            }
        }
    }
    
    private function handle404($request) {
        http_response_code(404);
        
        $lang = $request->getLang();
        
        if ($lang === 'en') {
            echo "404 - Page not found";
        } else {
            echo "404 - 页面不存在";
        }
    }
}
