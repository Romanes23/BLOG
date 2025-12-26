<?

class DB{
  
    private PDO $conn;
    private PDOStatement $stmt;
    private static $instance =null;
    private function __construct(){}
    private function __clone() {}
// private function __wakeup(){}

public static function getInstance(){
 return self:: $instance === null
        ? self :: $instance = new self() // если $instance === null создаем новый
			: self::$instance; // Иначе возвращаем существующий объект 

}

public function getConnection($config){
$dsn = "mysql:host={$config['host']};  dbname={$config['dbname']};  charset={$config['charset']}";
try {
    $this->conn = new PDO($dsn, $config['username'],  $config['pass'], $config['options']);
    echo "Connect succsess";
    return $this;
} catch (PDOException $e) { echo "DB error " . $e->getMessage();}
}

public function query($guery, $param=[]){
    $this->stmt = $this->conn->prepare($guery);
 $this->stmt->execute($param);
return $this;}

public function findALL(){
  return  $this->stmt->fetchAll();}

public function find(){
  return  $this->stmt->fetch();}


public function findOrAbort(){
    $result =$this->find();
if ($result) {return $result;} else {abort();} 
}
}