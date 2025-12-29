<?

class Router {

    private array $routes = [];
    private string $uri; 
    private string $method;

    function __construct() {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], "/") ;  //  "posts/create"
        $this->method = isset($_POST['_method'])? $_POST['_method']:  strtoupper($_SERVER['REQUEST_METHOD']) ;                                // "GET"
  
        
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
function put($uri, $controller) {
        $this->add($uri, $controller, "PUT");
    }

function patch($uri, $controller) {
        $this->add($uri, $controller, "PATCH");
    }


function delete($uri, $controller) {
        $this->add($uri, $controller, "DELETE");
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