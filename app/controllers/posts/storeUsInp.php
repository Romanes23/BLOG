
<?
global $db;
require_once MODELS."/Validator.php";
     $fillable =['email','password']; //,'confirm_pass'
     $data = get_request_data_1($fillable);
  //dd ($data);
// правила валидации
$rules=[
    'email'=>[
    'required'=> true, 
    'email'=> true
    ],
    'password'=>[
    'required'=> true,
    'min'=> 5,
    'max'=> 400 
    ]
];

$pass= (string) $data["password"];

$validator = new Validator();
 $validation = $validator->validate($data,$rules);

  

  if (empty($validation->getErrors())) {
  //dd($validation->getErrors());
  
  echo "<H3 > $pass </H3>";
  //$sql = "SELECT * FROM `users` WHERE `email` =?  ";





  $sql = "SELECT  password FROM `users` WHERE `email` = ?";
 // try {
  $db->query($sql,[$data['email']]);
       if($db->rowCount()){ 
       $rezult= $db->getColumn();
        echo "<H3 > $rezult </H3>";
        $verify = password_verify($pass, $rezult);  
if ($verify) {
  echo "<H3 style = 'color:green;'> You have entered </H3>";}
redirect(url:"posts/inp"); 

        //              echo "<H3 style = 'color:green;'> You have entered </H3>";
//              $_SESSION['success']= "User created successfully";  
                                                       
//         redirect(url:"posts/reg");    
       } 
        
//         else echo "<H3 style = 'color:green;'> HHHHHHHHHHHHHHHH </H3>";
//      //dump("SUCCESS");
                                      
//   } catch (PDOException $e) {
    
//     $_SESSION['danger']= "User does not exist";            
    
//     redirect(url:"posts/reg"); 
    
//     dump ($e->getMessage());
  }
// }
 
// dump($validation->errors);



require_once V_POSTS."/create.tmpl02.php";

 
