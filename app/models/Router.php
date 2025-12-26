<?

class Router {

    private array $routes = [];
    private string $uri; 
    private string $method;

    function __construct() {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], "/") ;  //  "post/create"
        $this->method = strtoupper($_SERVER['REQUEST_METHOD']) ;                                // "GET"
  
        
    }

    private function add($uri, $controller, $method) {
        $this->routes[] = [
            'uri' => $uri,
            'method' => $method,
            'controller' => $controller
        ];
    } 

    function get($uri, $controller) {
        $this->add($uri, $controller, "GET");
    }

    function post($uri, $controller) {
        $this->add($uri, $controller, "POST");
    }


    function match() {
        $isMatch = false;

        foreach ($this->routes as $route) {
           // dd([$route['uri'],$this->uri]);
          if(   $route['uri'] == $this->uri

                && $route['method'] == $this->method
                && file_exists($route['controller'])) 
            {   require_once($route['controller']);
                $isMatch = true;
                break;
            }
                
        }

        if(!$isMatch) { abort(); };
    }
    

}