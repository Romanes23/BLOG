
<?
global $db;
require_once MODELS."/Validator.php";
     $fillable =['username','email','password','confirm_pass']; //,'confirm_pass'
     $data = get_request_data($fillable);
  //dd ($data);
// правила валидации
$rules=[
    'username'=>[
    'required'=> true,
    'min'=> 5,
    'max'=> 15
    ],
    'email'=>[
    'required'=> true, 
    'email'=> true
    ],
    'password'=>[
    'required'=> true,
    'min'=> 5,
    'max'=> 400 
    ],
    'confirm_pass'=>[
    'required'=> true,  
    'match'=>"password"
    ]
];



$validator = new Validator();
 $validation = $validator->validate($data,$rules);
$sql = "SELECT * FROM `users` WHERE `name` =? OR `email` =?";
  $db->query($sql,[$data['username'], $data['email']]);
        if($db->rowCount()){ 
             echo "<H3 style = 'color:red;'> login or email exists already </H3>";
        }
  else
  if (empty($validation->getErrors())) {
  //dd($validation->getErrors());
   $sql = "INSERT INTO `users`(`name`,`email`,`password`) VALUES(?,?,?)";
  try {
    $db->query($sql,[$data['username'], $data['email'], $data['password']]);
     //dump("SUCCESS");
    $_SESSION['success']= "User created successfully"; // это пока одномерный массив, но можно вот так $_SESSION['success'][] и $_SESSION['danger'][], 
                                                       // и дальше толкать в конец, что бы сделать несколько сообщений за раз
    redirect();                                        // но это тянет еще на один еласс
  } catch (PDOException $e) {
    
    $_SESSION['danger']= "User destroed";            //  $_SESSION['danger'][]
    
    redirect(url:"posts/reg"); 
    
    dump ($e->getMessage());
  }
}
 
// dump($validation->errors);



require_once V_POSTS."/create.tmpl01.php";