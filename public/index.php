<?

session_start();
require_once dirname(__DIR__)."/config/config.php";
require_once MODELS."/helpers.php";
require_once CONFIG."/routes.php";

$db_config = require_once CONFIG."/db.php";
require_once MODELS."/DB.php";
$db = DB::getInstance()->getConnection($db_config);



// require_once C_POSTS."/index.php";

$uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], "/") ;
//dd($uri);
if (isset($routes[$uri]) && file_exists($routes[$uri])) {
    require_once $routes[$uri];
}
else abort();

?>
